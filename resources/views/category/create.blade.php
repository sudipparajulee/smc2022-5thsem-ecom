@extends('layouts.app')
@section('title', 'Create Category')
@section('content')
    <form action="{{route('category.store')}}" method="POST">
        @csrf
        <input type="text" name="priority" placeholder="Priority" class="border border-gray-300 p-2 rounded-lg w-full mb-4">
        <input type="text" name="name" placeholder="Category Name" class="border border-gray-300 p-2 rounded-lg w-full mb-4">
        <div class="flex justify-center gap-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Create Category</button>
            <a href="{{route('category.index')}}" class="bg-red-600 text-white px-4 py-2 rounded-lg">Cancel</a>
        </div>
    </form>
@endsection
