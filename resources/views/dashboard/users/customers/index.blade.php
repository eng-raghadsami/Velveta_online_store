@extends('dashboard.master')
@section('title','Customers | '. env('APP_NAME'))
@section('content')

{{-- @include('dashboard.search') --}}
<!-- Page Heading -->
  @if(session('msg'))
    <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
        {{ session('msg') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">

    <span aria-hidden="true">&times;</span>
  </button>
    </div>
@endif
<div class="d-flex justify-content-between">
        <h1 class="h3 mb-4 text-dark-800 ml-4">Customers</h1>

        </div>
             <div class="card">
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr style="background-color: #834703;color: white;">
                            <th>ID</th>

                            <th>Name</th>
                            <th>Email</th>
                            <th>Payments</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if ($customers->count()>0)
                        @foreach ($customers as $customer)
                        <tr>
                             <td>{{$customer->id}}</td>


                            <td>{{$customer->name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->payments->count()}}</td>
                            <td>{{$customer->created_at->format('M d Y')}}</td>

                            <td>

                        <a class="btn btn-sm btn-success" href="{{route('dashboard.customers.show', $customer->id)}}"><i class="fas fa-eye"></i></a>

                        <form class="d-inline" action="{{route('dashboard.customers.destroy', $customer->id)}}" method="POST">
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
                {{$customers->links()}}
            </div>
        </div>

@endsection
