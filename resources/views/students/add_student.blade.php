@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="col-xl-12 col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add Student</h6>
                <a href="{{route('students.index')}}" class="btn btn-primary">All Student</a>
            </div>
            <div class="card-body">
                <div class="col-8 mx-auto">
                    @if (session()->has('success'))
                        <div class="alert alert-success text-center">{{session('success')}}</div>
                    @endif
                    <form action="{{route('students.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Student Name :</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') border-danger @enderror">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email">Email :</label>
                            <input type="email" name="email" class="form-control @error('email') border-danger @enderror">
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="course">Select Course :</label>
                            <select class="form-control @error('course') border-danger @enderror" name="course" id="course" >
                                <option selected disabled>--Select Course--</option>
                                @foreach ($courses as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('course')
                            <p class="text-danger">{{$message}}</p>
                            @enderror                        
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone :</label>
                            <input type="number" name="phone" class="form-control @error('phone') border-danger @enderror">
                            @error('phone')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address">Address :</label>
                            <input type="text" name="address" class="form-control @error('address') border-danger @enderror">
                            @error('address')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image">Image :</label>
                            <input type="file" name="image" class="form-control @error('image') border-danger @enderror">
                            @error('image')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection