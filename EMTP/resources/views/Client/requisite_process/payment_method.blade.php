<x-app-layout title="payment method">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg text-center">
                {{-- put your content here --}}
                <h1 class="text-3xl">Payment method</h1>
                <p>Please select your payment method:</p>
                <form class="mt-3 mb-5 text-center">
                    <div>
                        <input type="radio" id="credit_card" name="payment_method" value="credit_card">
                        <label for="credit_card">Credit Card</label><br>
                        <input type="radio" id="paypal" name="payment_method" value="paypal">
                        <label for="paypal">PayPal</label><br>  
                        <input type="radio" id="pay_at_counter" name="payment_method" value="pay_at_counter">
                        <label for="pay_at_counter">Pay at Counter</label><br><br>
                    </div>
                    <button class="bg-white text-gray-800 font-bold text-center rounded border-2 border-red-500 hover:border-red-600 hover:bg-red-500 hover:text-white shadow-md py-4 px-6 mx-2 my-2">
                        Cancel
                    </button>
                    <button class="bg-white text-gray-800 font-bold text-center rounded border-2 border-blue-500 hover:border-blue-600 hover:bg-blue-500 hover:text-white shadow-md py-4 px-6 mx-2 my-2">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
