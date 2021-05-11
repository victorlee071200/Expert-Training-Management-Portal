<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController\AnnouncementController;
use App\Http\Controllers\NewController\CheckoutController;
use App\Http\Controllers\NewController\AdminSupportController;
use App\Http\Controllers\NewController\AdminProgramsController;
use App\Http\Controllers\NewController\ClientAboutUsController;
use App\Http\Controllers\NewController\ClientSupportController;
use App\Http\Controllers\NewController\StaffProgramsController;
use App\Http\Controllers\NewController\AdminDashboardController;
use App\Http\Controllers\NewController\ClientHomepageController;
use App\Http\Controllers\NewController\ClientProgramsController;
use App\Http\Controllers\NewController\StaffDashboardController;
use App\Http\Controllers\NewController\AdminDepartmentController;
use App\Http\Controllers\NewController\ClientDashboardController;
use App\Http\Controllers\NewController\AdminUserManagementController;




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

// client routes
Route::prefix('client')->name('client.')->middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::resource('/home', ClientHomepageController::class);
    Route::resource('/program', ClientProgramsController::class);
    Route::resource('/dashboard', ClientDashboardController::class);
    Route::resource('/aboutus', ClientAboutUsController::class);
    Route::resource('/support', ClientSupportController::class);

    // view specific client registered program
    Route::get('/dashboard/{id}/detail', [ClientProgramsController::class, 'index'])->name('client-program-detail');
    Route::get('/dashboard/{id}/announcement', [AnnouncementController::class, 'index'])->name('client-program-announcement');
    Route::get('/dashboard/{id}/announcement/{announcements}', [AnnouncementController::class, 'specific_announcement'])->name('client-program-specific-announcement');
    Route::get('/dashboard/{id}/material', [ClientProgramsController::class, 'material'])->name('client-program-material');
    Route::get('/dashboard/{id}/material/{material}', [ClientProgramsController::class, 'specific_material'])->name('client-program-specific-material');
    Route::get('/dashboard/{id}/feedback', [ClientProgramsController::class, 'feedback'])->name('client-program-feedback');

});

// staff route
Route::prefix('staff')->name('staff.')->middleware(['auth:sanctum', 'verified','admin'])->group(function () {

    Route::resource('/dashboard', StaffDashboardController::class);
    Route::resource('/program', StaffProgramsController::class);
    Route::get('/program/pending/{id}', [StaffProgramsController::class, 'pending']);
    Route::get('/program/pending/edit/{id}', [StaffProgramsController::class, 'edit']);
    Route::get('/program/approved/{id}', [StaffProgramsController::class, 'approved']);

    // view specific staff assigned program
    Route::get('/dashboard/{id}/detail', [StaffDashboardController::class, 'program_detail'])->name('staff-program-detail');
    Route::get('/dashboard/{id}/announcement', [AnnouncementController::class, 'index'])->name('staff-program-announcement');
    Route::get('/dashboard/{id}/announcement/{announcement}', [AnnouncementController::class, 'specific_announcement'])->name('staff-program-specific-announcement');
    Route::post('/dashboard/{id}/announcement/create', [AnnouncementController::class, 'create'])->name('staff-program-announcement');
    Route::post('/dashboard/{id}/announcement', [AnnouncementController::class, 'store'])->name('staff-program-announcement');
    Route::put('/dashboard/{id}/announcement', [AnnouncementController::class, 'update'])->name('staff-program-announcement');
    Route::delete('/dashboard/{id}/announcement', [AnnouncementController::class, 'delete'])->name('staff-program-announcement');
    Route::get('/dashboard/{id}/announcement/{announcements}', [AnnouncementController::class, 'index'])->name('staff-program-specific-announcement');
    Route::get('/dashboard/{id}/material', [StaffDashboardController::class, 'material'])->name('staff-program-material');
    Route::get('/dashboard/{id}/material/{material}', [StaffDashboardController::class, 'specific_material'])->name('staff-program-specific-material');
    Route::get('/dashboard/{id}/feedback', [StaffDashboardController::class, 'feedback'])->name('staff-program-feedback');

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
