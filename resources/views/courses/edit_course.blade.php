@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="col-xl-12 col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Courses</h6>
                <a href="{{route('courses.index')}}" class="btn btn-primary">Cancel</a>
            </div>
            <div class="card-body">
                <div class="col-8 mx-auto">
                    <form action="{{route('courses.update',$course)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name">Course Name :</label>
                            <input type="text" id="name" name="name" value="{{$course->name}}" class="form-control @error('name') border-danger @enderror">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="syllabus">Syllabus :</label>
                            <input type="text" name="syllabus" value="{{$course->syllabus}}"" class="form-control @error('syllabus') border-danger @enderror">
                            @error('syllabus')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="duration">Course Duration :</label>
                            <input type="text" name="duration" value="{{$course->duration}}" class="form-control @error('duration') border-danger @enderror">
                            @error('duration')
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