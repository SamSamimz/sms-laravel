@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="col-xl-12 col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Courses List</h6>
                <a href="{{route('courses.create')}}" class="btn btn-primary">Add Course</a>
            </div>
            <div class="card-body">
                @if (session()->has('delete'))
                    <div class="alert alert-success text-center">
                        {{session('delete')}}
                    </div>
                @endif
                @if (session()->has('update'))
                    <div class="alert alert-success text-center">
                        {{session('update')}}
                    </div>
                @endif
                <div class="table-responsive">
                    @if ($course->count() > 0)
                    <table class="table table-hover text-center">
                            
             
                        <thead>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Syllabus</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Author</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($course as  $index=>$item)
                            <tr>
                                <th scope="row">{{++$index}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->syllabus}}</td>
                                <td>{{$item->duration}}</td>
                                <td>{{$item->user->name}}</td>
                                <td class="d-flex">
                                    <a href="#" class="btn btn-primary">View</a>
                                    <a href="{{route('courses.edit',$item)}}" class="btn btn-info">Edit</a>
                                    <form action="{{route('courses.destroy',$item)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h5 class="text-center text-danger">No Course avaiable for now!</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection