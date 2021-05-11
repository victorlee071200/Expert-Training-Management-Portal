<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\PaypalController;
use App\Http\Controllers\Admin\StripeController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\Admin\BraintreeController;
use App\Http\Controllers\FrontendProgramController;
use App\Http\Controllers\New\AdminOrdersController;
use App\Http\Controllers\New\AdminPaypalController;
use App\Http\Controllers\New\AdminStripeController;
use App\Http\Controllers\New\AdminSupportController;
use App\Http\Controllers\New\AdminProgramsController;
use App\Http\Controllers\New\ClientAboutUsController;
use App\Http\Controllers\New\ClientSupportController;
use App\Http\Controllers\New\StaffProgramsController;
use App\Http\Controllers\New\AdminBraintreeController;
use App\Http\Controllers\New\AdminDashboardController;
use App\Http\Controllers\New\ClientHomepageController;
use App\Http\Controllers\New\ClientProgramsController;
use App\Http\Controllers\New\AdminDepartmentController;
use App\Http\Controllers\New\ClientDashboardController;
use App\Http\Controllers\Member\MemberDashboardController;
use App\Http\Controllers\New\AdminUserManagementController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// all





// Admin Routes

Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'verified','admin'])->group(function () {

    Route::resource('/dashboard', AdminDashboardController::class);
    Route::resource('/department', AdminDepartmentController::class);
    Route::resource('/program', AdminProgramsController::class);
    Route::get('/program/approve/{id}', [AdminProgramsController::class, 'approve'])->name('admin-approve-a-program-page');
    Route::get('/program/approved/{id}', [AdminProgramsController::class, 'approved'])->name('admin-view-approved-program');
    Route::put('/program/approve/{id}', [AdminProgramsController::class, 'update'])->name('admin-approve-a-program');
    Route::resource('/management', AdminUserManagementController::class);
    Route::resource('/support', AdminSupportController::class);
    Route::resource('/users', AdminUserManagementController::class);


});

Route::prefix('client')->name('client.')->middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::resource('/home', ClientHomepageController::class);
    Route::resource('/program', ClientProgramsController::class);
    Route::resource('/dashboard', ClientDashboardController::class);
    Route::resource('/aboutus', ClientAboutUsController::class);
    Route::resource('/support', ClientSupportController::class);

});


Route::prefix('staff')->name('staff.')->middleware(['auth:sanctum', 'verified','admin'])->group(function () {

    Route::resource('/dashboard', StaffDashboardController::class);
    Route::resource('/program', StaffProgramsController::class);
    Route::get('/program/pending/{id}', [StaffProgramsController::class, 'pending']);
    Route::get('/program/pending/edit/{id}', [StaffProgramsController::class, 'edit']);
    Route::get('/program/approved/{id}', [StaffProgramsController::class, 'approved']);


});






// To-Be-Confirmed

Route::get('checkout/{courseSlug}', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');
Route::post('checkout/validate/{courseId}/{courseSlug}', [CheckoutController::class, 'prePaymentValidation'])->name('checkout.validate');
Route::post('checkout/fulfill/order', [CheckoutController::class, 'fulfillOrder'])->name('checkout.fulfill.order');
Route::post('payment/braintree', [BraintreeController::class, 'braintreePayment'])->name('braintree.payment');
Route::post('payment/stripe/{paymentIntentId}', [StripeController::class, 'getStripePaymentIntent'])->name('stripe.payment');
Route::get('checkout/success/thank-you', [CheckoutController::class, 'showThanks'])->name('thanks');

Route::get('privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('terms', [PageController::class, 'terms'])->name('terms');

Route::get('courses', [FrontendProgramController::class, 'index'])->name('courses.index');
Route::get('courses/{courseId}', [FrontendProgramController::class, 'show'])->name('courses.show');

// Admin To Be Confirmed
Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'verified','admin'])->group(function () {


    //Course routes
    Route::get('courses', [CourseController::class, 'index'])->name('courses');
    Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('courses/{courseId}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('courses/{courseId}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('courses/{courseId}', [CourseController::class, 'destroy'])->name('courses.destroy');

    // Braintree routes
    Route::get('payments/braintree', [AdminBraintreeController::class, 'index'])->name('braintree');
    Route::put('payments/braintree/update', [AdminBraintreeController::class, 'update'])->name('braintree.update');

    // Stripe routes
    Route::get('payments/stripe', [AdminStripeController::class, 'index'])->name('stripe');
    Route::put('payments/stripe/update', [AdminStripeController::class, 'update'])->name('stripe.update');

    // PayPal routes
    Route::get('payments/paypal', [AdminPaypalController::class, 'index'])->name('paypal');
    Route::put('payments/paypal/update', [AdminPaypalController::class, 'update'])->name('paypal.update');

    // Settings route
    Route::get('payments/settings', [SettingsController::class, 'index'])->name('settings');
    Route::put('payments/settings/update', [SettingsController::class, 'update'])->name('settings.update');

    // Users route
    Route::get('users', [UsersController::class, 'index'])->name('users');
    // Route::delete('users/{userId}', [UsersController::class, 'destroy'])->name('users.destroy');

    // Orders route
    Route::get('orders', [OrdersController::class, 'index'])->name('orders');
    Route::delete('orders/{orderId}', [AdminOrdersController::class, 'destroy'])->name('orders.destroy');

    Route::get('/', [HomeController::class, 'index'])->name('home');


});

// Routes for Member group
Route::group([
    'as'=>'member.',
    'prefix'=>'member',
    'middleware' => ['auth']],

    function() {
        Route::get('dashboard', [MemberDashboardController::class, 'index'])->name('dash');
    }

);











