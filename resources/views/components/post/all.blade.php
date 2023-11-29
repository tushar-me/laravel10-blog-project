<div class="ex-all-post">
    <div class="container">
        <div class="ex-all-post__banner">
            <h2>All Post</h2>
        </div>
        <div class="ex-all-post__items">
            @foreach ( $posts as $post)
                <div class="ex-all-post__items-item">
                    <a href="/posts/{{ $post->category->name }}/{{ $post->slug }}" class="ex-all-post__items-item-box">
                        <div class="ex-all-post__items-item-box-thumbnail">
                            <img src="{{ asset('uploads/' . $post->thumbnail)}}">
                        </div>
                        <div class="ex-all-post__items-item-box-content">
                            <h3 class="ex-all-post__items-item-box-content-title">{{ Illuminate\Support\Str::words($post->title, $word = 6, $end = '...') }}</h3>
                            <div class="ex-all-post__items-item-box-content-info">
                                <div class="ex-all-post__items-item-box-content-info-author">
                                    <img src="{{ asset('images/author.jpg') }}">
                                    <p>{{ $post->user->name }}</p>
                                </div>
                                <p class="ex-all-post__items-item-box-content-info-date">{{  $post->read_time }}m read time</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>