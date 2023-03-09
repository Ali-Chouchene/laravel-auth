@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mt-4">{{$project->name}}</h1>
    <div class=" d-flex  justify-content-center">
        <div class="card d-flex flex-column align-items-center my-3 p-5 text-center" style="width: 80%;">
            <div>
                <img src="{{asset('storage/' . $project->image)}}" class="card-img-top img-fluid float-start mx-2" alt="{{$project->name}}" style="width: 60%; height: 30rem;">
                <p class="card-text my-4">{{$project->description}}</p>
                <div class="d-flex justify-content-around align-items-bottom">
                    <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-warning text-light px-4"><i class="fa-solid fa-pen-to-square fa-xl me-2"></i>Edit</a>
                    <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger  px-4"><i class="fa-solid fa-trash fa-xl  me-2"></i>Delete</button>
                    </form>
                    <a href="{{route('admin.projects.index', $project->id)}}" class="btn btn-secondary px-4 "><i class="fa-solid fa-arrow-left fa-xl  me-2"></i>Return</a>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection