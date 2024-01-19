@extends('layouts.app')
@section('content')
    <section id="projects-create" class="container py-5">
        <div class="text-center">
            <h3 class="fs-5">You are editing :</h3>
            <h1 class="display-1 p-0">{{$project->title}}</h1>
        </div>
        <form action="{{route('admin.projects.update', $project->slug)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group w-50">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required maxlength="200" minlength="3" value="{{old('title', $project->title)}}">
            </div>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-group w-25">
                <label for="logo">Logo</label>
                <input type="text" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" placeholder="logo.png" maxlength="255" minlength="3" value="{{old('logo', $project->logo)}}">
            </div>
            @error('logo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-group w-50">
                <label for="github">Github</label>
                <input type="url" class="form-control @error('github') is-invalid @enderror" id="github" name="github" maxlength="255" minlength="3" value="{{old('github', $project->github)}}">
            </div>
            @error('github')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-group w-25">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option {{$project->status == 0 ? 'selected' : ''}} value="0">In Progress</option>
                    <option {{$project->status == 1 ? 'selected' : ''}} value="1">Completed</option>
                </select>
            </div>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-group w-25">
                <label for="logo">Category</label>
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    <option value="">
                        Select Category
                    </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $project->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-group w-25">
                <label for="image">Image</label>
                <div>
                    <img class="w-100" src="{{asset('storage/uploads/' . $project->image)}}" alt="{{$project->title}}">
                </div>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            </div>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-group w-25 d-flex flex-wrap">
                <label class="m-auto pb-2" for="logo">Technologies</label>
                @foreach ($technologies as $technology)
                <div class="form-check w-50 @error('technologies') is invalid @enderror">
                    <input type="checkbox" class="form-check-input" name="technologies[]" value="{{$technology->id}}" 
                    {{$project->technologies->contains($technology->id) ? 'checked' : ''}}>
                    <div class="form-check-label fs-5">
                        {{$technology->name}}
                    </div>
                </div>
                @endforeach
            </div>
            @error('technologies')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="10">
                    {{old('description', $project->description)}}
                </textarea>
            </div>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </section>
@endsection
