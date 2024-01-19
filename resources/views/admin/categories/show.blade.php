@extends('layouts.app')
@section('content')
    <section id="projects-show">
        <h1 class="display-1">{{$category->name}}</h1>

        <div class="text-center mb-5">
            <h2 class="fs-1 text-uppercase">Operations</h2>
            <div>
        </div>
            <form class="d-inline-block" action="{{route('admin.categories.destroy', $category->slug)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger text-center" type="submit" data-item-title="{{$category->name}}">
                    <i class="fa-solid fa-trash"></i>
                </button>

                {{-- modal_delete --}}
                @include('partials.modal_delete')
            </form>
        </div>
        
        <h4 class="display-3 text-center ">
            Projects 
        </h4>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Logo</th>
                    <th scope="col">Category</th>
                    <th scope="col">Title</th>
                    <th scope="col">Technologies</th>
                    <th scope="col">Github</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($category->projects as $project)
                <tr>
                    <th scope="row">
                        <div class="logo-container">
                            <img
                            src="{{asset('storage/logos/'. $project->logo)}}"
                            alt="{{$project->title}}">
                        </div>
                    </th>
                    <td>
                        @if ($project->category)
                            <a class="btn badge text-bg-primary" href="{{route('admin.categories.show', $project->category->slug)}}">
                                {{$project->category->name}}
                            </a>
                           @else 
                           <span class="text-muted">No category</span>
                        @endif
                    </td>
                    <td>{{$project->title}}</td>
                    <td>
                        @if ($project->technologies()->count() > 0)
                            @foreach ($project->technologies as $technology)
                            <a class="btn badge rounded-pill text-bg-success" href="{{route('admin.technologies.show', $technology->slug)}}">
                                {{$technology->name}}
                            </a>
                            @endforeach
                        @else 
                            <span class="text-black">No technologies</span>
                        @endif
                    </td>
                    <td>{{$project->github}}</td>
                    <td class="desc">{{substr($project->description, 0, 350) . '...' }}</td>
                    <td>{{$project->status == 0 ? 'In Progress' : 'Completed'}}</td>
                    <td> {{-- OPERATIONS --}}
                        <a class="btn btn-info" href="{{route('admin.projects.show', $project->slug)}}">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a class="btn btn-warning" href="{{route('admin.projects.edit', $project->slug)}}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger text-center" type="submit" data-item-title="{{$project->title}}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            {{-- modal_delete --}}
                            @include('partials.modal_delete')
                        </form>
                    </td>
                </tr>
                @empty
                <h3 class="text-center fw-bold display-4 py-4">No records founded</h3>
                @endforelse
            </tbody>
            </table>
        
    </section>
@endsection