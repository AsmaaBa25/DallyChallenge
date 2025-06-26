<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap4/bootstrap.css">

    <title>@yield('title', 'DC25')</title>
</head>

<body class="container bg">
    <nav class="topnav navbar navbar-expand-lg navbar-dark ">
        <a class="navbar-brand" href="#">Dally Challenge</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link  {{ request()->is('/') ? 'active' : ''}}" href="/">Home</a>
                <a class="nav-item nav-link  {{ Str::contains(request()->url(), 'categories') ? 'active' : ''}}"
                    href="/categories">
                    Categories</a>
                <a class="nav-item nav-link {{ Str::contains(request()->url(), 'projects') ? 'active' : ''}}"
                    href="/projects">
                    Projects</a>
                <a class="nav-item nav-link {{ Str::contains(request()->url(), 'activities') ? 'active' : ''}}"
                    href="/activities">
                    activities</a>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle  {{ Str::contains(request()->url(), 'report') ? 'active' : ''}}"
                        data-toggle="dropdown" href="#" role="button" aria-expanded="false">Reports</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/reports/r1">Projects x Categories (pie)</a>
                        <a class="dropdown-item" href="/reports/r2">Projects x Categories (bar)</a>
                        <a class="dropdown-item" href="/reports/r3">Projects x Priority</a>
                        <a class="dropdown-item" href="/reports/r4">Activites x projects (pie)</a>
                        <a class="dropdown-item" href="/reports/r5">Activites x projects (Line)</a>
                        <a class="dropdown-item" href="/reports/r6">Activites duration x projects (Line)</a>
                        <a class="dropdown-item" href="/reports/r7">Categories,projects,Activites</a>
                    </div>
                </li>

                <a class="nav-item nav-link {{ Str::contains(request()->url(), 'about') ? 'active' : ''}}"
                    href="/about">About</a>
            </div>
        </div>
    </nav>


    @yield('content')

    <!--footer-->
    <div class="container">
        <footer class="py-5 my-5 text-white footer row row-cols-1 row-cols-sm-2 row-cols-md-5 border-top baraabg">

            <div class="mb-3 col">
                <h5>About us</h5>
                <p>Save your projects in the best way.</p>
                <p>Be confident and reassured.</p>
                <p>We give you comfort, safety and speed.</p>
            </div>

            <div class="mb-3 col">
                <h5>Contact Us</h5>
                <ul class="nav flex-column">
                    <li class="mb-2 nav-item"> <span class="p-0 nav-link text-body-secondary"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8z" />
                                <path fill-rule="evenodd"
                                    d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                            </svg> Damascuse</span>
                    </li>
                    <li class="mb-2 nav-item"> <span class="p-0 nav-link text-body-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                            </svg>
                            <a href=" tel:+96346173025"> +963
                                46173025 </a></span>
                    </li>
                    <li class="mb-2 nav-item"><span class="p-0 nav-link text-body-secondary"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-envelope" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                            </svg> <a href="mailto:dally@gmail.com">dally@gmail.com</a></span></li>
                </ul>
            </div>
            <div class="mb-3 col">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906q-1.168.486-4.666 2.01-.567.225-.595.442c-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294q.39.01.868-.32 3.269-2.206 3.374-2.23c.05-.012.12-.026.166.016s.042.12.037.141c-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8 8 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629q.14.092.27.187c.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.4 1.4 0 0 0-.013-.315.34.34 0 0 0-.114-.217.53.53 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09">
                </path>
                <script>
                    (function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="wo9-PcSAHxaWKkMr3P3Hg";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
                </script>
            </div>

        </footer>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/bootstrap4/jquery-3.2.1.slim.min.js"></script>
    <script src="/js/bootstrap4/popper.min.js"></script>
    <script src="/js/bootstrap4/bootstrap.min.js"></script>
</body>

</html>
