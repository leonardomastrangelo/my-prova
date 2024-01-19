@extends('layouts.app')
@section('content')
    <section id="projects-show">
        <h1 class="display-1">{{$project->title}}</h1>
        <div id="project-prev">
            <img src="{{ asset('storage/uploads/' . $project->image) }}" alt="{{$project->title}}">
        </div>

        <div class="text-center py-4">
            <h2 class="fs-1 text-uppercase">
                Category
            </h2>
            <a href="{{route('admin.categories.show', $project->category->slug)}}" class="btn badge text-bg-primary">
                {{($project->category) ? $project->category->name : 'Uncategorized'}}
            </a>
        </div>

        <div class="text-center pt-4 w-50 mx-auto">
            <h2 class="fs-1 text-uppercase">
                Technologies
            </h2>
            @forelse ($project->technologies as $technology)
            <a href="{{route('admin.technologies.show', $technology->slug)}}" class="btn badge rounded-pill text-bg-success">
                {{ $technology->name }}
            </a>
            @empty
            <p>No Technologies</p>
            @endforelse
        </div>

        <div class="py-5 container text-center">
            <h2 class="fs-1 text-uppercase">Description</h2>
            <p>{{$project->description}}</p>
        </div>

        <div class="text-center mb-5">
            <h2 class="fs-1 text-uppercase">Operations</h2>
            <a class="btn btn-primary" href="{{route('admin.projects.edit', $project->slug)}}">Edit</a>
            <form class="d-inline-block" action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger text-center" type="submit" data-item-title="{{$project->title}}">
                    <i class="fa-solid fa-trash"></i>
                </button>

                {{-- modal_delete --}}
                @include('partials.modal_delete')
            </form>
        </div>
    </section>
@endsection