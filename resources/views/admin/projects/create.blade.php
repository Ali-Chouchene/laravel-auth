@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        <h1 class="my-5">Create New Project</h1>
    </div>
    <form class="w-50" action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Project Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="name" name="name">
            <div id="name" class="form-text">Here you can wrigth the project name</div>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image" name="image">
            <div id="image" class="form-text">Here you can wrigth the project image</div>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control" id="link" name="link">
            <div id="link" class="form-text">Here you can wrigth the project link</div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="5" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection