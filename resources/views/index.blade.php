@extends('layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <x-card name="Students" number="{{$student->count()}}" icon="fa-users"/>
        <x-card name="teachers" number="{{$teacher->count()}}" icon="fa-graduation-cap"/>
        <x-card name="courses" number="{{$course->count()}}" icon="fa-book"/>
        <x-card name="Batches" number="{{$batch->count()}}" icon="fa-file"/>
    </div>
    <!-- Content Row -->
</div>

@endsection

