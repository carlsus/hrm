<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('dist/css/landing.css') }}">
        <title>Intech Networks</title>
    </head>
    <body>
        <header>
            <div class="navbar">
                <img src="{{ asset('dist/img/logo.png') }}">
                <!-- Admin Login -->
                <a href="{{ route('login') }}" class="action-btn">Admin Login</a>
                <div class="toggle-btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>

            <div class="dropdown_menu">
                <!-- Admin Login -->
                <li><a href="#" class="action-btn">Admin Login</a></li>
            </div>
        </header>

        <main>
            <section id="hero">
                <h1>InTech Networks</h1>
                <i class="fa-brands fa-square-facebook"><a href="https://www.facebook.com/INTECHNetworks"> facebook.com/INTECHNetworks</a></i>
                <p>Let's get IT done</p>
                <!-- Emplyee Login -->
                <a href="{{ url('login/portal') }}" class="action-btn1">Login</a>
            </section>
        </main>

        <script>
            const toggleBtn = document.querySelector('.toggle-btn')
            const toggleBtnIcon = document.querySelector('.toggle-btn i')
            const dropDown_Menu = document.querySelector('.dropdown_menu')

            toggleBtn.onclick = function (){
                dropDown_Menu.classList.toggle('open')
                const isOpen = dropDown_Menu.classList.contains('open')

                toggleBtnIcon.classList = isOpen
                    ? 'fa-solid fa-xmark'
                    : 'fa-solid fa-bars'
            }
        </script>

    </body>
</html>
