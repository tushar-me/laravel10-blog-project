@props(['post'])
<section class="ex-single-post">
    <div class="container ex-single-post__content">
        <div class="ex-single-post__content-left mx-auto">
            <div class="ex-single-post__content-left-thumbnail">
                <img class="post-img" src="{{ asset('uploads/'. $post->thumbnail) }}">
                <div class="ex-single-post__content-left-thumbnail-info">
                    <span>{{ $post->category->name }}</span>
                    <h2 class="ex-single-post__content-left-thumbnail-info-title">{{ $post->title }}</h2>
                    <div class="ex-single-post__content-left-thumbnail-info-a_c">
                        <div class="ex-single-post__content-left-thumbnail-info-a_c-author">
                            <div>
                                <img src="">
                            </div>
                            <p>{{ $post->user->name }} . {{ $post->created_at->format('F j, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <p class="ex-single-post__content-left-content">
                {{ $post->content }}
            </p>
            <div class="ex-single-post__content-left-author">
                <div class="ex-single-post__content-left-author-head">
                    <div> 
                        <img src="{{ asset('images/post/author/author.png') }}">
                    </div>
                    <div class="ex-single-post__content-left-author-head-info">
                        <p>POSTED BY</p>
                        <h4>JHON DOE</h4>
                    </div>
                </div>
                <p class="ex-single-post__content-left-author-desc">I have a personal philosophy in life: If somebody else can do something that I’m doing, they should do it. And what I want to do is find things that would represent a unique contribution to the world</p>
            </div>
        </div>
    </div> 
</section>