<nav class="navbar navbar-expand-lg {{set_fixed_top('index')}}">

    <a class="nav-brand" href="{{route('index')}}">PKM UNPAD</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{route('alur')}}" class="nav-link">Alur</a>
            </li>
            <li class="nav-item">
                <a href="{{route('table')}}" class="nav-link">Reviewer</a>
            </li>
            <li class="nav-item">
                <a href="{{route('berkas')}}" class="nav-link">Berkas</a>
            </li>

            @guest
            <li class="nav-item">
                <a class="auth-nav nav-link btn-auth" href="{{route('login')}}">Sign In</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item signup-nav">
                    <a class="auth-nav nav-link btn-auth" href="{{route('register')}}">Sign Up</a>
                </li>
            @endif
            @else
            <div class="dropdown show d-flex align-items-center">
                <a class="btn btn-dropdown dropdown-toggle nav-link profile-nav" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                </a>
            
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item"
                    @if (Auth::user()->role_id==4)
                            href="{{route('mahasiswa-profile')}}"
                        @endif
                        @if(Auth::user()->role_id==3)
                            href="{{route('dosen_pendamping-profile')}}"
                        @endif
                        @if(Auth::user()->role_id==2)
                            href="{{route('dosen_reviewer-profile')}}"
                        @endif
                        @if(Auth::user()->role_id==1)
                            href="{{route('kemahasiswaan-timeline')}}"
                        @endif
                    >
                    {{ Auth::user()->name }}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        @endguest

        </ul>
    </div>
</nav>


{{-- 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{route('alur')}}" class="nav-link">Alur</a>
            </li>
            <li class="nav-item">
                <a href="{{route('table')}}" class="nav-link">Reviewer</a>
            </li>
            <li class="nav-item">
                <a href="{{route('berkas')}}" class="nav-link">Berkas</a>
            </li>

            @guest
                <li class="nav-item">
                    <a class="auth-nav nav-link btn-auth" href="{{route('login')}}">Sign In</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item signup-nav">
                        <a class="auth-nav nav-link btn-auth" href="{{route('signup')}}">Sign Up</a>
                    </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Profile
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a id="username" class="dropdown-item" 
                            @if (Auth::user()->role_id==4)
                                href="{{route('mahasiswa-profile')}}"
                            @endif
                            @if(Auth::user()->role_id==3)
                                href="{{route('dosen_pendamping-profile')}}"
                            @endif
                            @if(Auth::user()->role_id==2)
                                href="{{route('dosen_reviewer-profile')}}"
                            @endif
                            @if(Auth::user()->role_id==1)
                                href="{{route('kemahasiswaan-timeline')}}"
                            @endif
                        >
                            {{ Auth::user()->name }}
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
    
                    </div>
                </li>
            @endguest
        </ul>
    </div>
    --}}