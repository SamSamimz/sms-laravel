@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="col-xl-12 col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add Courses</h6>
                <a href="{{route('courses.index')}}" class="btn btn-primary">All Courses</a>
            </div>
            <div class="card-body">
                <div class="col-8 mx-auto">
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <form action="{{route('courses.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Course Name :</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') border-danger @enderror">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="syllabus">Syllabus :</label>
                            <input type="text" name="syllabus" class="form-control @error('syllabus') border-danger @enderror">
                            @error('syllabus')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="duration">Course Duration :</label>
                            <input type="text" name="duration" class="form-control @error('duration') border-danger @enderror">
                            @error('duration')
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