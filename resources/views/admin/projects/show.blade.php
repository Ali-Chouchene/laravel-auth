@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mt-4">{{$project->name}}</h1>
    <div class=" d-flex  justify-content-center">
        <div class="card d-flex flex-column align-items-center my-3 p-5 text-center" style="width: 80%;">
            <div>
                <img src="{{$project->image}}" class="card-img-top float-start mx-2" alt="{{$project->name}}" style="width: 60%; height: 30rem;">
                <p class="card-text my-4">{{$project->description}}</p>
                <a href="{{route('admin.projects.index', $project->id)}}" class="btn btn-secondary px-4"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
            </div>
        </div>
    </div>

</div>

@endsection