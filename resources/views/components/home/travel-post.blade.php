@if ($travelLatest)
    <section class="ex-travel">
        <div class="container">
            <h2 class="ex-travel__title ex-title-vector">TRAVEL</h2>
            <div class="ex-travel__content">
                <div class="ex-travel__content-left">
                    <a href="/posts/{{ $travelLatest->category->name }}/{{ $travelLatest->slug }}" class="ex-travel__content-left-item">
                        <div class="ex-travel__content-left-item-thumbnail">
                            <img src="{{ asset('uploads/'. $travelLatest->thumbnail) }}">
                        </div>
                        <div class="ex-travel__content-left-item-text">
                            <span>{{ $travelLatest->category->name }}</span>
                            <h3>{{ $travelLatest->title }}</h3>
                            <p>{{ $travelLatest->created_at->format(" M j Y") }} . {{ $travelLatest->read_time }}m read time</p>
                            <div class="ex-travel__content-left-item-text-btn">
                                <a href="/posts/{{ $travelLatest->category->name }}/{{ $travelLatest->slug }}">Read Article <i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="ex-travel__content-right">
                    @if ($travelPosts && count($travelPosts) > 0)
                        <h4 class="ex-travel__content-right-title">LATEST</h4>
                        <div class="ex-travel__content-right-items">
                            @foreach ( $travelPosts as $travelPost )
                                <a href="#" class="ex-travel__content-right-items-item">
                                    <div class="ex-travel__content-right-items-item-thumbnail">
                                        <img src="{{ asset('uploads/'. $travelPost->thumbnail ) }}">
                                    </div>
                                    <div class="ex-travel__content-right-items-item-text">
                                        <h4>{{ $travelPost->title }}</h4>
                                        <p>{{ $travelPost->created_at->format(" M j Y") }} . {{ $travelPost->read_time }} read time</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif
