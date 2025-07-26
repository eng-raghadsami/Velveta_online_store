@extends('dashboard.master')
@section('title','Edit Necklaces | '. env('APP_NAME'))
@section('content')

<div class="d-flex justify-content-between">
    <h1 class="h3 mb-4 text-dark-800 ml-4">Edit Necklaces</h1>
    <a href="{{ route('dashboard.necklaces.index') }}" class="btn mb-4 mr-3" style="background-color: #834703;color: white;">All Necklaces</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('dashboard.necklaces.update', $necklace->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <x-input
                label="Name"
                placeholder="name.."
                name="name"
                :value="old('name', $necklace->name)"
            />

            <x-input
                label="Image"
                name="image"
                type="file"
            />
            {{-- لو بدك تعرضي الصورة القديمة مثلاً --}}
            @if($necklace->image)
                <div class="mb-3">
                    <img src="{{ asset($necklace->image)}}" alt="Current Image" width="150">
                </div>
            @endif

            {{-- حقل مخفي لتمرير category_id --}}
            <input type="hidden" name="category_id" value="{{ $categoryId }}">

            <x-input
                label="Price"
                placeholder="Price.."
                name="price"
                type="number"
                step="0.01"
                :value="old('price', $necklace->price)"
            />

            <x-input
                label="Sale Price"
                placeholder="Sale Price.."
                name="sale_price"
                type="number"
                step="0.01"
                :value="old('sale_price', $necklace->sale_price)"
            />

          <x-text-area
    label="Description"
    name="description"
    placeholder="description.."
    :value="old('description', $necklace->description)"
/>


            <div class="d-flex mt-4 mb-4">
                <button class="btn px-4 ms-auto me-5" style="background-color: #834703;color: white;" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection
