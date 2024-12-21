<div class="preloader bg-main">
    <div class="preloader-wrapper">
        <div class="preloader-grid">
            <div class="preloader-grid-item preloader-grid-item-1"></div>
            <div class="preloader-grid-item preloader-grid-item-2"></div>
            <div class="preloader-grid-item preloader-grid-item-3"></div>
            <div class="preloader-grid-item preloader-grid-item-4"></div>
            <div class="preloader-grid-item preloader-grid-item-5"></div>
            <div class="preloader-grid-item preloader-grid-item-6"></div>
            <div class="preloader-grid-item preloader-grid-item-7"></div>
            <div class="preloader-grid-item preloader-grid-item-8"></div>
            <div class="preloader-grid-item preloader-grid-item-9"></div>
        </div>
    </div>
</div>

<div class="topbar bg-main">
    <div class="container">
        <div class="topbar-inner">
            <div class="topbar-item topbar-padding">
                <ul class="social-list social-list-white">
                    <li><a href="#"><i class="flaticon-facebook"></i></a></li>
                    <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                    <li><a href="#"><i class="flaticon-linkedin"></i></a></li>
                    <li><a href="#"><i class="flaticon-youtube"></i></a></li>
                    <li><a href="#"><i class="flaticon-instagram-1"></i></a></li>
                </ul>
            </div>
            <div class="topbar-item">
                <div
                    class="topbar-right d-flex flex-wrap topbar-right justify-content-center justify-content-md-start full-height">
                    <div class="topbar-right-item topbar-padding color-white">
                        <i class="flaticon-clock"></i>
                        dimanche fermer
                    </div>
                    <div class="topbar-right-item topbar-padding color-white">
                        <i class="flaticon-placeholder-1"></i>
                        8000 nabeul, nabeul.
                    </div>
                    <div class="topbar-right-item topbar-padding color-white">
                        <i class="flaticon-smartphone-call"></i>
                        <a href="tel:001-964-565-87652" class="color-white">+1 1111111111 </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<header>

    <div class="fixed-top">
        <div class="navbar-area navbar-area-two">

            <div class="mobile-nav">
                <a href="" class="mobile-brand">
                  
                    <img src="{{ asset('images/1.jfif') }}" alt="logo" class="rounded-lg mr-2" width="50" height="50">
                    
                </a>

                <div class="navbar-option d-flex align-items-center">
                    <div class="navbar-option-item navbar-option-dots mobile-hide">
                        <button class="dropdown-toggle" type="button" id="mobileOptionDropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon-menu-1"></i>
                        </button>
                        
                    </div>
                    <div class="navbar-option-item navbar-option-authentication">
                        <button class="navbar-authentication-button" type="button" id="auth2" data-bs-toggle="dropdown"
                            aria-haspopup="true"><i class="flaticon-add-user"></i></button>
                        <div class="authentication-box dropdown-menu" aria-labelledby="auth2">
                            <div class="authentication-close"><i class="flaticon-cancel"></i></div>
                            <div class="authentication-body">
                                <ul class="authentication-tab">
                                    <li class="authentication-tab-item active" data-authentication-tab="1">Log In</li>
                                    <li class="authentication-tab-item" data-authentication-tab="2">Sign Up</li>
                                </ul>
                                <div class="authentication-details">
                                    <div class="authentication-details-item active" data-authentication-details="1">
                                        <form>
                                            <div class="form-group mb-20">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="User Name" />
                                                </div>
                                            </div>
                                            <div class="form-group mb-20">
                                                <div class="input-group">
                                                    <input type="password" class="form-control"
                                                        placeholder="Password" />
                                                </div>
                                            </div>
                                            
                                         
                                        </form>
                                    </div>
                                    <div class="authentication-details-item" data-authentication-details="2">
                                        <form>
                                            <div class="form-group mb-20">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="User Name" />
                                                </div>
                                            </div>
                                            <div class="form-group mb-20">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Email" />
                                                </div>
                                            </div>
                                            <div class="form-group mb-20">
                                                <div class="input-group">
                                                    <input type="password" class="form-control"
                                                        placeholder="Password" />
                                                </div>
                                            </div>
                                            <div class="form-group mb-20">
                                                <div class="input-group">
                                                    <input type="password" class="form-control"
                                                        placeholder="Confirm Password" />
                                                </div>
                                            </div>
                                           
                                            <div class="authentication-btn">
                                                <button class="btn full-width btn-border mb-20">Log In</button>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-option-item navbar-option-search">
                        <button class="dropdown-toggle" type="button" id="search2" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon-loupe"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="search2">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <button><i class="flaticon-loupe"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                   
                </div>
            </div>

            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{ route('front.home') }}">
                            <img src="{{ asset('images/1.jfif') }}" alt="logo" class="logo logo1">
                            <img src="{{ asset('images/1.jfif') }}" alt="logo" class="logo2">
                        </a>

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                {{-- <li class="nav-item">
                                    <a href="{{ route('front.home') }}" class="nav-link"></a>
                                    
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{ route('front.acceuil') }}" class="nav-link">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('front.showfront') }}" class="nav-link">NOS Expert</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('front.apropos') }}" class="nav-link">A propos</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('front.historique') }}" class="nav-link">List Historique</a>
                                </li>
                               
                                

                                <li class="nav-item">
                                    <a href="" class="nav-link">CONTACT</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ url('/login') }}" class="nav-link">Connexion</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('inscription') }}" class="nav-link">Inscription</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ url('/logout') }}" class="nav-link">Deconnexion</a>
                                </li>
                            </ul>
                        </div>

                        
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>
