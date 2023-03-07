@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mt-4">My Projects</h1>
    @foreach($projects as $project)
    <div class=" d-flex flex-column align-items-center">
        <div class="card d-flex flex-column align-items-center my-3 p-5 text-center" style="width: 60%;">
            <img src="{{$project->image}}" class="card-img-top" alt="{{$project->name}}" style="width: 90%; height: 30rem;">
            <div class="card-body">
                <h5 class="card-title">{{$project->name}}</h5>
                <!-- <p class="card-text">{{$project->description}}</p> -->
                <a href="{{route('admin.projects.show', $project->id)}}" class="btn btn-primary my-3 px-4"><i class="fa-solid fa-eye fa-xl"></i></a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection