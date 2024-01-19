@extends('layouts.app')
@section('content')
    <section id="projects-create" class="container">
        <h1 class="display-1">Insert a Project</h1>
        <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group w-50">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required maxlength="200" minlength="3" value="{{old('title')}}">
            </div>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-group w-25">
                <label for="logo">Logo</label>
                <input type="text" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" placeholder="logo.png" maxlength="255" minlength="3" value="{{old('logo')}}">
            </div>
            @error('logo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-group w-50">
                <label for="github">Github</label>
                <input type="url" class="form-control @error('github') is-invalid @enderror" id="github" name="github" maxlength="255" minlength="3" value="{{old('github')}}">
            </div>
            @error('github')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-group w-25">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="0">In Progress</option>
                    <option value="1">Completed</option>
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
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-group w-25 d-flex flex-wrap">
                <label class="m-auto pb-2" for="logo">Technologies</label>
                @foreach ($technologies as $technology)
                <div class="form-check w-50 @error('technologies') is invalid @enderror">
                    <input type="checkbox" class="form-check-input" name="technologies[]" value="{{$technology->id}}" 
                    {{in_array($technology->id, old('technologies',[])) ? 'checked' : ''}}>
                    <div for="technologies[]" class="form-check-label fs-5">
                        {{$technology->name}}
                    </div>
                </div>
                @endforeach
            </div>
            @error('technologies')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-group w-50">
                <label for="image">Image</label>
                <div class="rectangle">
                    <img id="uploadPreview" src="https://fakeimg.pl/300x157" alt="preview">
                </div>
                <input type="file" class="form-control w-50 m-auto @error('image') is-invalid @enderror" id="image" name="image">
            </div>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="10">
                    {{old('description')}}
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
