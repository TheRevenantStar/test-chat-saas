@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @guest
            <h3>Test Chat Saas Application</h3>
            <p>Please login, or request access from an admin, to continue.</p>
          @else
            You're logged in! <a href="/home">Click Here<a> to go to your chats.
          @endguest
        </div>
    </div>
</div>
@endsection
