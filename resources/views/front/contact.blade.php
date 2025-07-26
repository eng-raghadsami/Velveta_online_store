@extends('layouts.master')
@section('title','Home Page | '. env('APP_NAME'))

@section('content')

<main class="contact-section">
      @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <h1>Contact Us</h1>

 <form class="contact-form" action="{{ route('front.contact') }}" method="POST">
    @csrf
 @method('POST')
<x-input name="name" placeholder="Your Name" required />
<x-input name="email" placeholder="Your Email" required />
<x-textarea name="message" placeholder="Your Message" required />


    <x-button>Send Message</x-button>
</form>

</main>
@endsection
