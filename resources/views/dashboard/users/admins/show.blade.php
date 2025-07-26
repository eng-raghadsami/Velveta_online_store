@extends('dashboard.layouts.app')
@section('title','Blogs | '. env('APP_NAME'))
@section('content')

<!-- Page Heading -->
<div class="d-flex justify-content-between">
   <h1 class="h3 mb-4 text-dark-800">{{ __('websit.navbar.user') }} : <span class="text-danger">{{$user->trans_name}}</span>  </h1>
   <a href="{{route('dashboard.users.index')}}" class="btn btn-danger mb-4 ">{{ __('websit.navbar.allusers') }}</a>
           </div>

   <hr>
 <h1 class="h3 mb-4 text-dark-800">{{ __('websit.navbar.payments') }}</h1>
         <div class="card">
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr class="bg-danger text-white">
                            <th>{{ __('websit.table.trans') }}</th>
                            <th>{{ __('websit.table.part') }}</th>
                            <th>{{ __('websit.table.price') }}</th>
                            <th>{{ __('websit.table.status') }}</th>
                            <th>{{ __('websit.table.created_at') }}</th>

                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($user->payments as $payment)
                        <tr>
                            <td>{{$payment->transaction_id}}</td>
                            <td>{{$payment->part->trans_name}}</td>
                            <td>{{$payment->price}}</td>
                            <td>{{$payment->status}}</td>
                            <td>{{$payment->created_at->format('M d Y')}}</td>


                        </tr>

                        @empty
                        <tr>
                            <td colspan="6" class="text-center">{{ __('websit.no_data') }}</td>
                        </tr>
                           @endforelse

                    </tbody>
                </table>

            </div>
        </div>

  <hr>
 <h1 class="h3 mb-4 text-dark-800">{{ __('websit.navbar.reviews') }}</h1>
         <div class="card">
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr class="bg-danger text-white">
                            <th>{{ __('websit.table.id') }}</th>
                            <th>{{ __('websit.table.part') }}</th>
                            <th>{{ __('websit.table.review') }}</th>

                            <th>{{ __('websit.table.created_at') }}</th>

                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($user->reviews as $review)
                        <tr>
                            <td>{{$review->id}}</td>
                            <td>{{$review->part->trans_name}}</td>
                            <td>{{$review->review}}</td>

                            <td>{{$review->created_at->format('M d Y')}}</td>


                        </tr>

                        @empty
                        <tr>
                            <td colspan="4" class="text-center">{{ __('websit.no_data') }}</td>
                        </tr>
                           @endforelse

                    </tbody>
                </table>

            </div>
        </div>

@endsection
