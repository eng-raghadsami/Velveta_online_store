@extends('dashboard.master')
@section('title','Add Bracelet | '. env('APP_NAME'))
@section('content')

   <div class="d-flex justify-content-between">
         <h1 class="h3 mb-4 text-dark-800 ml-4"> Add New Bracelet</h1>
        <a href="{{route('dashboard.bracelets.index')}}" class="btn  mb-4 mr-3"style="background-color: #834703;color: white;">All Bracelets</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('dashboard.bracelets.store')}}" method="POST" enctype="multipart/form-data">
                                     @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    @csrf

                <x-input label="Name" placeholder="name.."  name='name'/>

                <x-input label="Image"  name='image' type='file'/>
                <input type="hidden" name="category_id" value="{{ $categoryId }}">
                <x-input label="Sale" placeholder="Sale.."  name='price'/>
                <x-input label="Sale Price" placeholder="sale price.."  name='sale_price'/>

                <x-textarea label="Description" name='description' placeholder="description.."/>



  <div class="d-flex mt-4 mb-4">
    <button class="btn  px-4 ms-auto me-5"style="background-color: #834703;color: white;" type="submit">Create</button>
</div>

    </form>
        </div>
  </div>

@endsection
