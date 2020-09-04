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
            <li class="nav-item">
                <a class="auth-nav nav-link btn-auth" href="{{route('login')}}">Sign In</a>
            </li>
            <li class="nav-item signup-nav">
                <a class="auth-nav nav-link btn-auth" href="{{route('signup')}}">Sign Up</a>
            </li>
        </ul>
    </div>
</nav>