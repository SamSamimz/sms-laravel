@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="col-xl-12 col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Batches List</h6>
                <a href="{{route('batches.create')}}" class="btn btn-primary">Add Batch</a>
            </div>
            <div class="card-body">
                @if (session()->has('update'))
                    <div class="alert alert-success text-center">{{session('update')}}</div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success text-center">{{session('success')}}</div>
                @endif
                @if (session()->has('delete'))
                    <div class="alert alert-danger text-center">{{session('delete')}}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Course</th>
                            <th scope="col">Schedule</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($batches as $index => $item)
                            <tr>
                                <th scope="row">{{++$index}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->course->name}}</td>
                                <td>{{$item->start}} - {{$item->end}}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{route('batches.edit',$item)}}" class="btn btn-info">Edit</a>
                                    <form action="{{route('batches.destroy',$item)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection