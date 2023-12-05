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
            </div>
            <p class="ex-single-post__content-left-content">
                {{ $post->content }}
            </p>
            @if ($post->author_bio != null)
            <div class="ex-single-post__content-left-author">
                <div class="ex-single-post__content-left-author-head">
                    <div> 
                        <img src="{{ asset('images/post/author/author.png') }}">
                    </div>
                    <div class="ex-single-post__content-left-author-head-info">
                        <p>POSTED BY</p>
                        <h4>{{ $post->user->name }}</h4>
                    </div>
                </div>
                <p class="ex-single-post__content-left-author-desc">{{ $post->author_bio }}</p>
            </div>
            @endif
            <div class="flex items-center gap-5 p-5 rounded-md border-gray-100 bg-white mb-8 border" style="box-shadow: 0px 8px 13px -3px rgba(0, 0, 0, 0.07);">
                <a href="/approve/{{ $post->slug }}" class="flex items-center gap-2 bg-green-500 text-white px-5 py-2">Approve Article</a>
                <a href="/reject/{{ $post->slug }}" class="flex items-center gap-2 bg-red-500 text-white px-5 py-2">Reject Artcle</a>
            </div>
        </div>
    </div> 
</section>