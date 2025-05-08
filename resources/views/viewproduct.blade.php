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
