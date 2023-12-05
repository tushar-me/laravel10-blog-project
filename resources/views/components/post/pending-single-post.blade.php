@props(['post'])
<section class="ex-single-post">
    <div class="container ex-single-post__content">
        <div class="ex-single-post__content-left mx-auto">
            <div class="ex-single-post__content-left-thumbnail-info">
                <span>{{ $post->category->name }}</span>
                <h2 class="ex-single-post__content-left-thumbnail-info-title">{{ $post->title }}</h2>
                <div class="ex-single-post__content-left-thumbnail-info-a_c">
                    <div class="ex-single-post__content-left-thumbnail-info-a_c-author">
                        <div>
                            <img src="{{ $post->user->profile && $post->user->profile->profile_pic ? asset('uploads/' . $post->user->profile->profile_pic) : asset('images/post/author/author.png') }}">
                        </div>
                        <p>{{ $post->user->name }} . {{ $post->created_at->format('F j, Y') }}</p>
                    </div>
                </div>
            </div>
            <div class="ex-single-post__content-left-thumbnail">
                <img class="post-img" src="{{ asset('uploads/'. $post->thumbnail) }}">
                {{-- <div class="ex-single-post__content-left-thumbnail-info">
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
                </div> --}}
            </div>
            <p class="ex-single-post__content-left-content">
                {{ $post->content }}
            </p>
            @if ($post->author_bio != null)
            <div class="ex-single-post__content-left-author">
                <div class="ex-single-post__content-left-author-head">
                    <div> 
                        <img src="{{ $post->user->profile && $post->user->profile->profile_pic ? asset('uploads/' . $post->user->profile->profile_pic) : asset('images/post/author/author.png') }}">
                    </div>
                    <div class="ex-single-post__content-left-author-head-info">
                        <p>POSTED BY</p>
                        <h4>{{ $post->user->name }}</h4>
                    </div>
                </div>
                <p class="ex-single-post__content-left-author-desc">{{ $post->author_bio }}</p>
            </div>
            @endif
        </div>
    </div> 
</section>