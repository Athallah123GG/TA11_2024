<nav class="navbar navbar-expand-lg bg-color py-3 navbarfond ">

    <style>
        .navbarfond {
            font-family: "Lexend", sans-serif;
        }

        .bg-color{
            background-color: #9DB2BF;
        }

    </style>

    <div class="container">
        <div>
            <a class="navbar-brand fs-4 mx-2" href="{{ route('welcome') }}">
                <img src="{{asset('image/logo/LOGI.png') }}" alt="" class=" my-2" style="max-width: 10%">

                <span>NusantaraDev</span>
            </a>


        </div>

        <div class="fs-5 container">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard')  }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('indexdata')  }}">Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard')  }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard')  }}">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard')  }}">Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard')  }}">Table</a>
                    </li>
                </ul>
            </div>
        </div>





        <div class="">


            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    @auth

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user-tie fs-4 mx-2"></i>{{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a type="text" href="{{route('unauthenticate')  }}" class="mx-2 nav-link">Logout</a></li>
                          <li><a type="text" href="" class="mx-2 nav-link">Profile</a></li>

                        </ul>
                      </li>

                    @else

                    <a type="button" href="{{route('login')  }}" class="mx-2 btn btn-primary">Login</a>

                    <a type="button" href={{ route('register') }} class="btn btn-outline-primary">Register</a>

                    @endauth


                </ul>
            </div>
        </div>

    </div>
</nav>
