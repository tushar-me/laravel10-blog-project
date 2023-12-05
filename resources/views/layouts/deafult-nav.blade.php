<nav class="ex__nav">
    <div class="container">
        <div class="ex__nav__items">
            <a href="{{ route('home') }}" class="ex__nav__items-logo">
                <img src="{{ asset('images/logo.png') }}">
            </a>
            @auth
                <ul class="ex__nav__items-links">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('all.post') }}">Posts</a>
                    </li>
                    <li>
                        <a href="">About Us</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            @endauth
            <div class="flex items-center justify-between gap-5">
                @auth
                    <div class="ex__nav__items-search">
                        <input type="text" name="search" id="search" placeholder="Search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="ex__nav__items-profile">
                        <div class="ex__nav__items-profile-img">
                            <img src="{{ auth()->user()->profile && auth()->user()->profile->profile_pic ? asset('uploads/' . auth()->user()->profile->profile_pic) : asset('images/post/author/author.png') }}">
                            <p>{{ auth()->user()->username }}</p>
                        </div>
                        <ul class="ex__nav__items-profile-popup">
                            <li>
                                <a href="/{{ auth()->user()->username }}" class="ex__nav__items-profile-popup-item"> 
                                    <i class="fa-regular fa-address-card"></i>Profile
                                </a>
                            </li>
                            @if(auth()->check() && auth()->user()->type == 'admin')
                                <li>
                                    <a href="/dashboard" class="ex__nav__items-profile-popup-item">
                                        <i class="fa-solid fa-border-all"></i>Dashboard
                                    </a>
                                </li>
                            @endif
                            
                            <li>
                                <a href="{{ route('logout') }}" class="ex__nav__items-profile-popup-item">
                                    <i class="fa-solid fa-right-from-bracket"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="ex__nav__items-btns">
                        <a href="{{ route('login') }}">Sing In</a>
                        <a href="{{ route('register') }}">Sing Up</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>