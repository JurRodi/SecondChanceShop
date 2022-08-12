<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecondChanceShop</title>
    <!-- <link rel="icon" type="image/x-icon" href=""> -->
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    
    <nav class="mb-4 px-4 navbar-light bg-light">
        <div class="navbar navbar-expand-lg">
            <a class="navbar-brand ml-auto" href="/">SecondChanceShop</a>    
            <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                @if(url()->current() != url('/login') && url()->current() != url('/register'))
                    <form class="form-inline my-2 my-lg-0 w-25" autocomplete="off" method="">
                        <livewire:product-search />
                    </form>
                @endif
            </div>
            @if(\Illuminate\Support\Facades\Auth::check())
                <div class="navbar-nav ml-auto">
                    <div class="nav-item dropdown">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ \Illuminate\Support\Facades\Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="right: 0; left: auto;">
                            <li><a class="dropdown-item" href="/users/{{ \Auth::user()->id }}">Profile</a></li>
                            <li><a class="dropdown-item" href="/users/favorites/{{ \Auth::user()->id }}">favorites</a></li>
                            <li><a class="dropdown-item" href="/messages/{{ \Auth::user()->id }}">Messages</a></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
            @else
                <div class="navbar-nav ml-auto">
                    <a class="nav-link" href="/login">Login</a>
                    <a class="nav-link" href="/register">Register</a>
                </div>
            @endif
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    
    <script>
        document.querySelector('.dropdown-toggle').addEventListener('click', function() {
            document.querySelector('.dropdown-menu').classList.toggle('show');
        });
        document.addEventListener('click', function(e) {
            if (!e.target.matches('.dropdown-toggle')) {
                var dropdowns = document.querySelectorAll('.dropdown-menu');
                for (var i = 0; i < dropdowns.length; i++) {
                    dropdowns[i].classList.remove('show');
                }
            }
        });

    </script>
    @livewireScripts
</body>
</html>