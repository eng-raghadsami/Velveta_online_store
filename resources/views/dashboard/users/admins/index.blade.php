@extends('dashboard.master')
@section('title','Admins | '. env('APP_NAME'))
@section('content')
{{-- @include('dashboard.search') --}}
@if(session('msg'))
    <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
        {{ session('msg') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">

    <span aria-hidden="true">&times;</span>
  </button>
    </div>
@endif
<!-- Page Heading -->
<div class="d-flex justify-content-between">
        <h1 class="h3 mb-4 text-dark-800 ml-4">Admins</h1>
      <a href="{{route('dashboard.admins.create')}}" class="btn  mb-4 mr-3"style="background-color: #834703;color: white;"><i class="fas fa-plus "></i>Add New Admin</a>

        </div>
         <div class="card">
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
<tr style="background-color: #834703;color: white;">
              <th>ID</th>

                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if ($admins->count()>0)
                        @foreach ($admins as $admin)
                        <tr>
                             <td>{{$admin->id}}</td>


                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>

                            <td>{{$admin->created_at->format('M d Y')}}</td>

                            <td>



                        <form class="d-inline" action="{{route('dashboard.admins.destroy', $admin->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                        <button  onclick="return  confirm('Are you sure ?!')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6" class="text-center">{{ __('websit.no_data') }}</td>
                        </tr>
                      @endif
                    </tbody>
                </table>
                {{$admins->links()}}
            </div>
        </div>

@endsection
