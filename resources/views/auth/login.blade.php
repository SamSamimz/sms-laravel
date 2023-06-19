@extends('layouts.guest')

@section('content')
  <div class="container">
    <div class="col-12">
        <div class="col-5 m-auto mt-5">
            <div class="bg-light rounded">
                <div class="py-3 px-4">
                    <h3 class="text-center py-2">Admin Login</h3>
                    <hr>
                    @if (session()->has('invalid'))
                        <div class="alert alert-danger text-center">{{session('invalid')}}</div>
                    @endif
                    <form action="{{route('login.post')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="form-label" for="email">Email :</div>
                            <input type="email" name="email" id="email" class="form-control @error('email') border-danger @enderror" />
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                             @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-label" for="password">Password :</div>
                            <input type="password" name="password" id="password" class="form-control @error('password') border-danger @enderror">
                            @error('password')
                            <p class="text-danger">{{$message}}</p>
                             @enderror
                        </div>
                        <button class="btn btn-info col-12">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

