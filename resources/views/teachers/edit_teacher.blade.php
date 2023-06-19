@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="col-xl-12 col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Teacher</h6>
                <a href="{{route('teachers.index')}}" class="btn btn-primary">Cancel</a>
            </div>
            <div class="card-body">
                <div class="col-8 mx-auto">
                    <form action="{{route('teachers.update',$teacher)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name">Teacher Name :</label>
                            <input type="text" id="name" name="name" value="{{$teacher->name}}" class="form-control @error('name') border-danger @enderror">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email">Email :</label>
                            <input type="email" name="email" value="{{$teacher->email}}" class="form-control @error('email') border-danger @enderror">
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone :</label>
                            <input type="number" name="phone" value="{{$teacher->phone}}" class="form-control @error('phone') border-danger @enderror">
                            @error('phone')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address">Address :</label>
                            <input type="text" name="address" value="{{$teacher->address}}" class="form-control @error('address') border-danger @enderror">
                            @error('address')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image">Image :</label>
                            <input type="file" name="image" class="form-control @error('image') border-danger @enderror">
                            <img class="col-2" src="{{$teacher->image}}" alt="IMAGE">
                            @error('image')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection