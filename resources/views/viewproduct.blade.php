@extends('layouts.master')
@section('content')
    <div class="grid px-20 py-10 grid-cols-4 gap-2">
        <div>
            <img src="{{asset('images/'.$product->photopath)}}" alt="" class="w-full h-64 object-cover rounded-lg">
        </div>
        <div class="col-span-2 border-x px-2">
            <h1 class="font-bold text-2xl">{{$product->name}}</h1>
            <div class="text-yellow-600">
                @if($product->discounted_price != '')
                <span class="text-sm line-through text-gray-500">Rs. {{$product->price}}</span>
                Rs. {{$product->discounted_price}}
                @else
                Rs. {{$product->price}}
                @endif
            </div>
            <p class="py-2">In stock: {{$product->stock}}</p>
            <div class="py-2 flex items-center">
                <button onclick="decrement()" class="bg-gray-100 p-2 w-10 rounded">-</button>
                <input id="quantity" type="number" value="1" class=" border-none bg-gray-200 px-0 pl-2 py-2 w-10 text-center rounded" readonly>
                <button onclick="increment()" class="bg-gray-100 p-2 w-10 rounded">+</button>
            </div>
            <button class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow">Add to Cart</button>

            <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
            <input type="hidden" id="amount" name="amount" value="{{$product->discounted_price == '' ? $product->price : $product->discounted_price}}" required>
            <input type="hidden" id="tax_amount" name="tax_amount" value ="0" required>
            <input type="hidden" id="total_amount" name="total_amount" value="{{$product->discounted_price == '' ? $product->price : $product->discounted_price}}" required>
            <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="" required>
            <input type="hidden" id="product_code" name="product_code" value ="EPAYTEST" required>
            <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
            <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
            <input type="hidden" id="success_url" name="success_url" value="https://developer.esewa.com.np/success" required>
            <input type="hidden" id="failure_url" name="failure_url" value="https://developer.esewa.com.np/failure" required>
            <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
            <input type="hidden" id="signature" name="signature" value="i94zsd3oXF6ZsSr/kGqT4sSzYQzjj1W/waxjWyRwaME=" required>
            <input class="px-2 py-1 bg-green-500 mt-4 text-white rounded cursor-pointer" value="Pay with eSewa" type="submit">
            </form>

        </div>
        <div class="text-gray-500">
            <p>7 Days Delivery</p>
            <p>Cash on Delivery</p>
            <p>Easy Return</p>
        </div>
    </div>
    <div class="px-20 py-10">
        <h1 class="font-bold text-xl">Product Description</h1>
        <p class="text-gray-500 py-2">{{$product->description}}</p>
    </div>

    @php
        $totalprice = $product->discounted_price == '' ? $product->price : $product->discounted_price;
        $transaction_uuid = time();
        $secret_key = '8gBm/:&EnhH.1/q';
        $message = "total_amount=$totalprice,transaction_uuid=$transaction_uuid,product_code=EPAYTEST";
        $sign = hash_hmac('sha256', $message, $secret_key, true);
        $signature = base64_encode($sign);
    @endphp
    <script>
        document.getElementById('transaction_uuid').value = '{{$transaction_uuid}}';
        document.getElementById('signature').value = '{{$signature}}';
    </script>
    <script>
        let stock = {{$product->stock}};
        function increment() {
            let quantity = document.getElementById('quantity');
            if(quantity.value < stock) {
                quantity.value = parseInt(quantity.value) + 1;
            }
        }
        function decrement() {
            let quantity = document.getElementById('quantity');
            if(quantity.value > 1) {
                quantity.value = parseInt(quantity.value) - 1;
            }
        }
    </script>
@endsection
