@extends('dashboard.master')
@section('title','Edit Bracelet | '. env('APP_NAME'))
@section('content')

<div class="d-flex justify-content-between">
    <h1 class="h3 mb-4 text-dark-800 ml-4">Edit Bracelet</h1>
    <a href="{{ route('dashboard.bracelets.index') }}" class="btn mb-4 mr-3" style="background-color: #834703;color: white;">All Bracelets</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('dashboard.bracelets.update', $bracelet->id) }}" method="POST" enctype="multipart/form-data">
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
                :value="old('name', $bracelet->name)"
            />

            <x-input
                label="Image"
                name="image"
                type="file"
            />
            {{-- لو بدك تعرضي الصورة القديمة مثلاً --}}
            @if($bracelet->image)
                <div class="mb-3">
                    <img src="{{ asset($bracelet->image)}}" alt="Current Image" width="150">
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
                :value="old('price', $bracelet->price)"
            />

            <x-input
                label="Sale Price"
                placeholder="Sale Price.."
                name="sale_price"
                type="number"
                step="0.01"
                :value="old('sale_price', $bracelet->sale_price)"
            />

          <x-text-area
    label="Description"
    name="description"
    placeholder="description.."
    :value="old('description', $bracelet->description)"
/>


            <div class="d-flex mt-4 mb-4">
                <button class="btn px-4 ms-auto me-5" style="background-color: #834703;color: white;" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection
