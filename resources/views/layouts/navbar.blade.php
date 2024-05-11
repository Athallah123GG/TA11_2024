<nav class="navbar navbar-expand-lg bg-color py-3 navbarfond ">

    <style>


        .navbarfond {
            font-family: "Lexend", sans-serif;
        }

        .bg-color{
            background-color: #9DB2BF;
        }

        /* .btn{
            border-radius: 30px;
        } */
        .rds{
            border-radius: 30px;
        }



    </style>

    <div class="container ">
        <div>
            <a class="navbar-brand fs-4 mx-2" href="{{ route('welcome') }}">
                <img src="{{asset('image/logo/LOGI.png') }}" alt="" class=" my-2" style="max-width: 10%">

                <span>DarjoDev</span>
            </a>


        </div>

        <div class="fs-5 container">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('welcome')  }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('daerah')  }}">Daerah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('profile')  }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('food.index')  }}">Makanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('drink.index')  }}">Minuman</a>
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
                            <i class="fa-solid fa-user-tie fs-4 mx-2"></i> Hai {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a type="text" href="{{route('unauthenticate')  }}" class="mx-2 nav-link">Logout</a></li>


                        </ul>
                      </li>

                    @else

                    <a type="button" href="{{route('login')  }}" class="mx-2 btn rds btn-dark">Login</a>

                    <a type="button" href={{ route('register') }} class="btn rds btn-outline-dark">Register</a>

                    @endauth


                </ul>
            </div>
        </div>

    </div>
</nav>
