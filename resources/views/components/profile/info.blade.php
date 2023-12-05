<div class="ex-profile">
    <div class="container">
        <div class="ex-profile__content">
            <div class="ex-profile__content-topbar">
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
                <div class="flex items-center gap-4">
                    <button class="ex-profile__content-topbar-notification">
                        <span>0</span>
                        <i class="fa-regular fa-bell"></i>
                    </button>
                    <div class="ex-profile__content-topbar-profile">
                        <div class="ex-profile__content-topbar-profile-img">
                            <img src="{{ $user->profile && $user->profile->profile_pic ? asset('uploads/' . $user->profile->profile_pic) : asset('images/post/author/author.png') }}">
                        </div>
                        <div class="ex-profile__content-topbar-profile-toggle">
                            <ul>
                                <li>
                                    @if(auth()->check() && auth()->user()->type == 'admin')
                                        <a href="/dashboard" class="ex__nav__items-profile-popup-item">
                                            Dashboard<i class="fa-solid fa-border-all"></i>
                                        </a>
                                    @endif
                                    <a href="/{{ $user->username}}/edit">
                                        Edit Profile <i class="fa-solid fa-gear"></i>
                                    </a>
                                    <a href="{{ route('logout') }}">
                                        Logout <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ex-profile__content-cover-photo">
                <img src="{{ $user->profile && $user->profile->cover_photo ? asset('uploads/' . $user->profile->cover_photo) : asset('images/cover-photo.jpg') }}">
            </div>
            <div class="ex-profile__content-profile-pic">
                <img src="{{ $user->profile && $user->profile->profile_pic ? asset('uploads/' . $user->profile->profile_pic) : asset('images/post/author/author.png') }}">
            </div>
            <h4 class="ex-profile__content-name relative">{{ $user->name }}
                @if ($user->type === 'admin')
                    <span class="bg-primary
                                bg-opacity-20
                                text-primary
                                text-sm
                                py-[2px]
                                px-2
                                rounded-full
                                absolute
                                top-2
                                ml-2" style="font-family: 'Open Sans', serif;">admin
                    </span>
                @endif
            </h4>
            <p class="ex-profile__content-bio">{{ $user->profile && $user->profile->bio ? $user->profile->bio : '' }}</p>
            <p><span>@</span>{{ $user->username }} . {{ $user->created_at->format('F j, Y') }}</p>
        </div>
    </div>
</div>