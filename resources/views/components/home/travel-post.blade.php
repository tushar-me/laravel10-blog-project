@props(['travelPosts'])
<section class="ex-travel">
    <div class="container">
        @if ($travelPosts)
            <h2 class="ex-travel__title ex-title-vector">TRAVEL</h2>
            <div class="ex-travel__content">
                <div class="ex-travel__content-left">
                    <a href="#" class="ex-travel__content-left-item">
                        <div class="ex-travel__content-left-item-thumbnail">
                            <img src="{{ asset('images/post/thumbnail/t20.jpg') }}">
                        </div>
                        <div class="ex-travel__content-left-item-text">
                            <span>Travel</span>
                            <h3>Top 10 beautiful Place in Bangladesh</h3>
                            <p>March 25, 2021 . 4 min read</p>
                            <div class="ex-travel__content-left-item-text-btn">
                                <a href="#">Read Article <i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="ex-travel__content-right">
                    <h4 class="ex-travel__content-right-title">LATEST</h4>
                    <div class="ex-travel__content-right-items">
                        @foreach ( $travelPosts as $travelPost )
                            <a href="#" class="ex-travel__content-right-items-item">
                                <div class="ex-travel__content-right-items-item-thumbnail">
                                    <img src="{{ asset('uploads/'. $travelPost->thumbnail ) }}">
                                </div>
                                <div class="ex-travel__content-right-items-item-text">
                                    <h4>{{ $travelPost->title }}</h4>
                                    <p>{{ $travelPost->created_at }} . {{ $travelPost->read_time }} read time</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>