@if ($gadgetPosts && count($gadgetPosts) > 3)
    <section class="ex-gadget">
        <div class="container">
            <h2 class="ex-gadget__title ex-title-vector">GADGET</h2>
            <div class="ex-gadget__items">
                @foreach ( $gadgetPosts as $gadgetPost)
                    <a href="/posts/{{ $gadgetPost->category->name }}/{{ $gadgetPost->slug }}" class="ex-gadget__items-item">
                        <img src="{{asset('uploads/'. $gadgetPost->thumbnail)}}">
                        <div class="ex-gadget__items-item-info">
                            <h4>{{ $gadgetPost->title }}</h4>
                            <p>{{ $gadgetPost->user->name }} . {{ $gadgetPost->created_at->format(" M j Y") }} . {{ $gadgetPost->read_time }}m read time</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endif








