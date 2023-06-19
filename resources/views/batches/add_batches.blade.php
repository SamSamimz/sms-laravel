@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="col-xl-12 col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add Batches</h6>
                <a href="{{route('batches.index')}}" class="btn btn-primary">All Batches</a>
            </div>
            <div class="card-body">
                <div class="col-8 mx-auto">
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <form action="{{route('batches.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Batch Name :</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') border-danger @enderror">
                            @error('name')
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
                            <label for="start">Start In :</label>
                            <select class="form-control @error('start') border-danger @enderror" name="start" id="start" >
                                <option selected disabled>--Start Month--</option>
                                @foreach($month as $m)
                                    <option value="{{$m}}">{{$m}}</option>
                                @endforeach
                            </select>
                            @error('start')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="end">End In :</label>
                            <select class="form-control @error('end') border-danger @enderror" name="end" id="end" >
                                <option selected disabled>--End Month--</option>
                                @foreach($month as $m)
                                    <option value="{{$m}}">{{$m}}</option>
                                @endforeach
                            </select>
                            @error('start')
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