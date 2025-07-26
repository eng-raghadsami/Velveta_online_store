@extends('dashboard.master')
@section('title','Bracelets | '. env('APP_NAME'))
@section('content')

       <div class="d-flex justify-content-between">
        <h1 class="h3 mb-4 text-dark-800 ml-4">Bracelets</h1>

        <a href="{{route('dashboard.bracelets.create')}}" class="btn  mb-4 mr-3"style="background-color: #834703;color: white;"><i class="fas fa-plus "></i>Add New bracelet</a>
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
                      @if ($bracelets->count()>0)
                        @foreach ($bracelets as $bracelet)
                        <tr>
                             <td>{{$bracelet->id}}</td>

                            <td><img  src="{{ asset($bracelet->image)}}" alt="" style="width: 60px; height:60px; object-fit;"></td>
                            <td>{{$bracelet->name}}</td>
                            <td>{{$bracelet->price}}</td>
                            <td>{{$bracelet->sale_price}}</td>

                            <td>{{$bracelet->created_at->format('M d Y')}}</td>
                            <td>{{$bracelet->updated_at->format('M d Y')}}</td>

                            <td>
                        <a class="btn btn-sm btn-info" href="{{route('dashboard.bracelets.edit',$bracelet->id)}}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{route('dashboard.bracelets.destroy', $bracelet->id)}}" method="POST">
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
                {{$bracelets->links()}}
            </div>
        </div>


@endsection
