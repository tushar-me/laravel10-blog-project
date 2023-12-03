@if ($posts && count($posts) > 0)
    <section class="ex-latest-post">
        <div class="container">
            <h2 class="ex-latest-post__title ex-title-vector">Latest Post</h2>
            <div class="ex-latest-post__items">
                @foreach ( $posts as $post)
                    <a href="/posts/{{ $post->category->name }}/{{ $post->slug }}" class="ex-latest-post__items-item">
                        <div class="ex-latest-post__items-item-head">
                            <p>{{  $post->created_at->format('F j, Y') }}</p>
                            <p>{{ $post->read_time }}m read time</p>
                        </div>
                        <img src="{{ asset('uploads/' . $post->thumbnail) }}">
                        <h3 class="ex-latest-post__items-item-title">{{ Illuminate\Support\Str::words($post->title, $words = 6, $end = '...')}}</h3>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endif


