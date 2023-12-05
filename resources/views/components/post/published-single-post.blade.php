{{-- @props(['post', 'recPosts']) --}}
@php
    $likes = DB::table('likes')
            ->where('post_id', $post->id)
            ->get();

    $user = DB::table('likes')
            ->where('post_id', $post->id)
            ->where('user_id', auth()->user()->id)
            ->first();        
@endphp 
<section class="ex-single-post">
    <div class="container ex-single-post__content">
        <div class="ex-single-post__content-left">
            <div class="ex-single-post__content-left-thumbnail-info">
                <span>{{ $post->category->name }}</span>
                <h2 class="ex-single-post__content-left-thumbnail-info-title">{{ $post->title}}</h2>
                <div class="ex-single-post__content-left-thumbnail-info-a_c">
                    <div class="ex-single-post__content-left-thumbnail-info-a_c-author">
                        <div>
                            <img src="{{ $post->user->profile && $post->user->profile->profile_pic ? asset('uploads/' . $post->user->profile->profile_pic) : asset('images/post/author/author.png') }}">
                        </div>
                        <p>{{ $post->user->name }} . {{ $post->created_at->format('F j, Y') }}</p>
                    </div>
                    <p class="ex-single-post__content-left-thumbnail-info-a_c-comment"><strong id="strongLikeCount">{{ $likes->count() }}</strong> Like . <strong>{{ $post->comments->count()}}</strong> COMMENT</p>
                </div>
            </div>
            <div class="ex-single-post__content-left-thumbnail">
                <img class="post-img" src="{{ asset('uploads/'. $post->thumbnail)}}">
            </div>
            <div class="ex-single-post__content-left-react">
                
                <a href="javascript:void(0);" onclick="toggleLike({{ $post->id }})">
                    @if ($user)
                    <i id="likeIcon" class="fa-solid fa-heart text-primary"></i>
                    @else
                    <i id="likeIcon" class="fa-regular fa-heart text-primary"></i>
                    @endif
                    <span id="likeCount">{{ $likes->count() }}</span>
                    Like
                </a>
                
                <a href="#comment">
                    <i class="fa-regular fa-comment"></i>Comment
                </a>
                <button class="share flex items-center gap-2 transition-all ease-in-out duration-300 text-gray-500" onclick="share()">
                    <i class="fa-solid fa-share"></i>Share
                </button>
                <div class="toggle_popup hidden">
                    <div class="share_popup">
                        <p id="post_link"></p>
                        <button id="copy"><i class="fa-regular fa-copy"></i></button>
                    </div>
                </div>
                <p class="copied">Link Copied !</p>
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
            @else
            
            @endif
            
            <div class="ex-single-post__content-left-comment">
                <h3 class="ex-single-post__content-left-comment-title"> Comments ( {{ $post->comments->count()}} )</h3>
                <div class="ex-single-post__content-left-comment-items">
                    @foreach ( $post->comments as $comment)
                        <div class="ex-single-post__content-left-comment-items-item">
                            <div class="ex-single-post__content-left-comment-items-item-author-img">
                                <img src="{{ $comment->user->profile && $comment->user->profile->profile_pic ? asset('uploads/' . $comment->user->profile->profile_pic) : asset('images/post/author/author.png') }}">
                            </div>
                            <div class="ex-single-post__content-left-comment-items-item-content">
                                <h4>{{ $comment->user->name }}</h4>
                                <p>{{ $comment->comment }}</p>
                                <span>{{ $comment->created_at->format('F j, Y') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="ex-single-post__content-left-add-comment" id="comment">
                <h3 class="ex-single-post__content-left-add-comment-title">Leave a Comment</h3>
                <div class="ex-single-post__content-left-add-comment-content">
                    <form id="commentForm" action="{{ route('comment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea name="comment" id="comment" required></textarea>
                        <button class="ex-single-post__content-left-add-comment-content-btn ex-primary-button">
                            Submit<i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @if ($recPosts && count($recPosts) > 0)
            <div class="ex-single-post__content-right">
                <h4 class="ex-travel__content-right-title">RECOMENDED</h4>
                <div class="ex-travel__content-right-items">
                    @foreach ( $recPosts as $recPost)
                        <a href="/posts/{{ $recPost->category->name }}/{{ $recPost->slug }}" class="ex-travel__content-right-items-item">
                            <div class="
                            ex-travel__content-right-items-item-thumbnail ex-travel__content-right-items-item-thumbnail--rec
                            ">
                                <img src="{{ asset('uploads/' . $recPost->thumbnail) }}">
                            </div>
                            <div class="ex-travel__content-right-items-item-text">
                                <h4>{{ $recPost->title }}</h4>
                                <p>{{ $recPost->created_at->format(" M j Y") }} . {{ $recPost->read_time}}m read time</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div> 
</section>



<script>
    // Like
    function toggleLike(postId) {
        $.ajax({
            type: 'POST',
            url: '{{ route('post.toggleLike', ['id' => 'postId']) }}'.replace('postId', postId),
            data: {
                postId: postId,
                _token: '{{ csrf_token() }}' 
            },
            success: function (response) {
                if (response.success) {
                    
                    $('#likeCount').text(response.likeCount);
                    $('#strongLikeCount').text(response.likeCount);

                    
                    if (response.isLiked) {
                        $('#likeIcon').removeClass('fa-regular fa-heart').addClass('fa-solid fa-heart');
                        $('#likeIcon').css('color', '#00CCFF');
                    } else {
                        $('#likeIcon').removeClass('fa-solid fa-heart').addClass('fa-regular fa-heart');
                        $('#likeIcon').css('color', ''); 
                    }
                }
            }
        });
    }


    // share
    function share() {
        let currentUrl = window.location.href;
        document.getElementById('post_link').innerText = currentUrl;

        $('.toggle_popup').toggleClass('hidden');
    }
    $(document).ready(function() {
        $('#copy').click(function() {
            var postLink = $('#post_link').text();

            var tempInput = $('<input>');
            $('body').append(tempInput);

            tempInput.val(postLink).select();

            document.execCommand('copy');

            tempInput.remove();
            $('.toggle_popup').addClass('hidden');

            $('.copied').fadeIn(400, function() {
                // Set a timeout to hide the text after 3 seconds
                setTimeout(function() {
                    $('.copied').fadeOut();
                }, 1000);
            });
        });
    });

    // Comment
    $(document).ready(function () {
        // Intercept the form submission
        $('#commentForm').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Get form data
            var formData = new FormData(this);

            // Make an Ajax request
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('#commentForm')[0].reset();
                        location.reload();
                },
                error: function (xhr, status, error) {
                    // Handle errors, e.g., show an error message
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>