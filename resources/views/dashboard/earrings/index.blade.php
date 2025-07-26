@extends('dashboard.master')
@section('title','Earrings | '. env('APP_NAME'))
@section('content')

       <div class="d-flex justify-content-between">
        <h1 class="h3 mb-4 text-dark-800 ml-4">Earrings</h1>

        <a href="{{route('dashboard.earrings.create')}}" class="btn  mb-4 mr-3"style="background-color: #834703;color: white;"><i class="fas fa-plus "></i>Add New Earring</a>
        </div>
        @if(session('msg'))
    <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
        {{ session('msg') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </div>
@endif
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
<tr style="background-color: #834703;color: white;">


                            <th>ID</th>
                            <th>Image</th>
                             <th>Name</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>Created At	</th>
                            <th>Updated At</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                      @if ($earrings->count()>0)
                        @foreach ($earrings as $earring)
                        <tr>
                             <td>{{$earring->id}}</td>

                            <td><img  src="{{ asset($earring->image)}}" alt="" style="width: 60px; height:60px; object-fit;"></td>
                            <td>{{$earring->name}}</td>
                            <td>{{$earring->price}}</td>
                            <td>{{$earring->sale_price}}</td>

                            <td>{{$earring->created_at->format('M d Y')}}</td>
                            <td>{{$earring->updated_at->format('M d Y')}}</td>

                            <td>
                        <a class="btn btn-sm btn-info" href="{{route('dashboard.earrings.edit',$earring->id)}}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{route('dashboard.earrings.destroy', $earring->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                        <button  onclick="return  confirm('Are you sure ?!')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="8" class="text-center">No Data Available</td>
                        </tr>
                      @endif
                    </tbody>
                </table>
                {{$earrings->links()}}
            </div>
        </div>


@endsection
