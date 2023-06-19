@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="col-xl-12 col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Teachers List</h6>
                <a href="{{route('teachers.create')}}" class="btn btn-primary">Add Teachers</a>
            </div>
            <div class="card-body">
                @if (session()->has('delete'))
                    <div class="alert alert-success text-center">
                        {{session('delete')}}
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success text-center">
                        {{session('success')}}
                    </div>
                @endif
                <div class="table-responsive">
                    @if ($teachers->count() > 0)
                    <table class="table table-hover text-center">
                        <thead>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $index => $item)
                            <tr>
                                <th scope="row">{{++$index}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td><img height="50" width="60" src="http://localhost:8000/{{$item->image}}" alt="IMAGE"></td>
                                <td class="d-flex">
                                    <a href="#" class="btn btn-primary">View</a>
                                    <a href="{{route('teachers.edit',$item)}}" class="btn btn-info">Edit</a>
                                    <form action="{{route('teachers.destroy',$item)}}" method="POST">
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
                    <h5 class="text-danger text-center">No Teachers avaiable now!</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection