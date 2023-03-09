@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        <h1 class="my-5">Edit Project</h1>
    </div>
    <form class="w-50" action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Project Name</label>
            <input required type="text" maxlength="60" class="form-control" id="name" aria-describedby="name" name="name" value="{{ old('name', $project->name) }}">
            <div id="name" class="form-text">Here you can wrigth the project name</div>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <div class="form-text">Here you can add the project image</div>
            <div class="d-flex pt-3 justify-content-center">
                <img id="output_img" src="{{$project->image ? asset('storage/' . $project->image) : asset('storage/' . 'project/AfqRHPmTchC3tIJmSb634zwjXuVFQQKqRBXR7e31.png') }}" class="img-fluid square" alt="">
            </div>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input required type="text" class="form-control" id="link" name="link" value="{{ old('link', $project->link) }}">
            <div id="link" class="form-text">Here you can wrigth the project link</div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea required minlength="30" class="form-control" id="description" rows="5" name="description">{{old('description', $project->description)}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

@endsection

<script>
    const placeholder = 'project/AfqRHPmTchC3tIJmSb634zwjXuVFQQKqRBXR7e31.png';

    const imageInput = document.getElementById("image");
    const imageOutput = document.getElementById('output_img');

    imageInput.addEventListener('change', () => {
        if (imageInput.files && imageInput.files[0]) {
            const reader = new FileReader();
            reader.readAsDataURL(imageInput.files[0]);
            reader.onload = e => {
                imageOutput.setAttribute('src', e.target.result);
            }
        } else imageOutput.src = placeholder;
    });
</script>