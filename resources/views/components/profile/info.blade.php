<div class="ex-profile">
    <div class="container">
        <div class="ex-profile__content">
            <div class="ex-profile__content-topbar">
                <button class="ex-profile__content-topbar-notification">
                    <span>0</span>
                    <i class="fa-regular fa-bell"></i>
                </button>
                <div class="ex-profile__content-topbar-profile">
                    <div class="ex-profile__content-topbar-profile-img">
                        <img src="{{ asset('images/tushar.jpeg')}}">
                    </div>
                    <div class="ex-profile__content-topbar-profile-toggle">
                        <ul>
                            <li>
                                <a href="{{ route('logout') }}">Logout <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                                <a href="#">Settings <i class="fa-solid fa-gear"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="ex-profile__content-cover-photo">
                <img src="{{asset('images/cover-photo.jpg')}}">
            </div>
            <div class="ex-profile__content-profile-pic">
                <img src="{{ asset('images/tushar.jpeg')}}">
            </div>
            <h4 class="ex-profile__content-name">Tushar Imran</h4>
            <p class="ex-profile__content-bio">https://www.facebook.com/tusharimran.online</p>
            <p>@tusharimran . joined june 2020</p>
        </div>
    </div>
</div>