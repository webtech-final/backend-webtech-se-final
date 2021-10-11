@extends('layouts.main')
@section('content')
    <div class="text-6xl font-serif">
        Add New item
    </div>
    <form action="{{ route('items.store') }} " method="post" enctype="multipart/form-data">
        {{-- <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data"> --}}
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="name">
        </div>
        <div>
            <label for="type">Type</label>
            <select name="type" id="type" class="round hover:bg-gray-200">
                @foreach ($list as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="Point">Point</label>
            <input type="text" name="point" placeholder="point">
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" name="selectedImage[]" class="w-full" multiple="multiple">
        </div>
        @error('selectedImage')
            <div>
                <span>{{ $message }}</span>
            </div>
        @enderror
        <div>
            <button type="submit">Add</button>
        </div>
    </form>
@endsection