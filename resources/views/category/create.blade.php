@extends('layouts.app')
@section('title', 'Create Category')
@section('content')
    <form action="{{route('category.store')}}" method="POST">
        @csrf
        <input type="text" name="priority" placeholder="Priority" class="border border-gray-300 p-2 rounded-lg w-full mb-4" value="{{old('priority')}}">
        @error('priority')
            <div class="text-red-500 text-sm mb-2 -mt-4">{{ $message }}</div>
        @enderror
        <input type="text" name="name" placeholder="Category Name" class="border border-gray-300 p-2 rounded-lg w-full mb-4" value="{{old('name')}}">
        @error('name')
            <div class="text-red-500 text-sm mb-2 -mt-4">{{ $message }}</div>
        @enderror
        <div class="flex justify-center gap-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Create Category</button>
            <a href="{{route('category.index')}}" class="bg-red-600 text-white px-4 py-2 rounded-lg">Cancel</a>
        </div>
    </form>
@endsection
