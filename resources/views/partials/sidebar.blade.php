<section id="sidebar" class="wd-10 container-fluid">
    <div>
        @auth  
        <h2>
            {{ auth()->user()->name }}
        </h2>
        @endauth
        @guest
        <h2>
            Guest
        </h2>
        @endguest
    </div>

    <div>
        <ul>
            <li>
                <a href="{{route('home')}}">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.dashboard')}}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.projects.index')}}">
                    <i class="fas fa-users"></i>
                    <span>Projects</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.categories.index')}}">
                   <i class="fa-solid fa-layer-group"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.technologies.index')}}">
                   <i class="fa-solid fa-microchip"></i>
                    <span>Technologies</span>
                </a>
            </li>
        </ul>
    </div>

    @auth
    <div>
        <a href="{{route('admin.projects.create')}}" class="btn btn-primary">
            Add a Project
        </a>
    </div>
    @endauth
</section>