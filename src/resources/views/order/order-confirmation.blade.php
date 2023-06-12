<!DOCTYPE html>
<html lang="en">

@include('head');

<body>
<div class="py-4 bg-slate-500 text-white">
        <p class="flex justify-center text-2xl items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
            </svg>
            Order Summary
        </p>
    </div>
<table class="min-w-full bg-white border border-gray-300 rounded-lg">
    <thead>
        <tr>
            <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Item</th>
            <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cartItems as $item)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $item->sku }}</td>
                <td class="px-6 py-4 whitespace-nowrap">£{{ $item->price }}</td>
            </tr>
        @endforeach
        <tr>
            <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Total Price:</th>
            <td class="px-6 py-3 bg-gray-100 text-left text-lg font-bold text-gray-600 tracking-wider">£{{ $totalPrice}}</td>
        </tr>
    </tbody>
</table>

<form class="mt-8 ml-8" method="POST" action="{{ route('order.placeOrder') }}">
    @csrf

    <label for="delivery_address" class="block text-sm font-medium text-gray-700">Delivery Address:</label>
    <input type="text" id="delivery_address" name="delivery_address" placeholder="Enter your delivery address" required class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-1/2">

    <input type="hidden" id="totalPrice" name="totalPrice" value="{{ $totalPrice }}">

    <button type="submit" class="mt-4 px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Place Order</button>
    <div class="flex justify-center mt-3">
        <a href="/" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
            </svg>
            Back to Shop
        </a>
    </div>
</form>


</body>

</html>


