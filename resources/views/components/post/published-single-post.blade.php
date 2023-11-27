{{-- @props(['post'])
<section class="ex-single-post">
    <div class="container ex-single-post__content">
        <div class="ex-single-post__content-left">
            <div class="ex-single-post__content-left-thumbnail">
                <img class="post-img" src="{{ asset('uploads/'. $post->thumbnail)}}">
                <div class="ex-single-post__content-left-thumbnail-info">
                    <span>{{ $post->category->name }}</span>
                    <h2 class="ex-single-post__content-left-thumbnail-info-title">{{ $post->title}}</h2>
                    <div class="ex-single-post__content-left-thumbnail-info-a_c">
                        <div class="ex-single-post__content-left-thumbnail-info-a_c-author">
                            <div>
                                <img src="{{ asset('images/post/author/author.png') }}">
                            </div>
                            <p>{{ $post->user->name }} . {{ $post->created_at->format('F j, Y') }}</p>
                        </div>
                        <p class="ex-single-post__content-left-thumbnail-info-a_c-comment">0 VIEW . 0 COMMENTS</p>
                    </div>
                </div>
            </div>
            <p class="ex-single-post__content-left-content">
                {{ $post->content }}
            </p>
            @if ($post->author_bio)
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
            @else
            
            @endif
            
            <div class="ex-single-post__content-left-comment">
                <h3 class="ex-single-post__content-left-comment-title"> Comments ( 3 )</h3>
                <div class="ex-single-post__content-left-comment-items">
                    <div class="ex-single-post__content-left-comment-items-item">
                        <div class="ex-single-post__content-left-comment-items-item-author-img">
                            <img src="{{ asset('images/post/author/author.png') }}">
                        </div>
                        <div class="ex-single-post__content-left-comment-items-item-content">
                            <h4>JHON DOE</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi aperiam sint, optio rem quo error.</p>
                            <span>March 25, 2021</span>
                        </div>
                    </div>
                    <div class="ex-single-post__content-left-comment-items-item">
                        <div class="ex-single-post__content-left-comment-items-item-author-img">
                            <img src="{{ asset('images/post/author/author.png') }}">
                        </div>
                        <div class="ex-single-post__content-left-comment-items-item-content">
                            <h4>JHON DOE</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum aliquid ipsa, suscipit quam porro tempore dolore quae. Exercitationem, aperiam voluptas.</p>
                            <span>March 25, 2021</span>
                        </div>
                    </div>
                    <div class="ex-single-post__content-left-comment-items-item">
                        <div class="ex-single-post__content-left-comment-items-item-author-img">
                            <img src="{{ asset('images/post/author/author.png') }}">
                        </div>
                        <div class="ex-single-post__content-left-comment-items-item-content">
                            <h4>JHON DOE</h4>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam, quo!</p>
                            <span>March 25, 2021</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ex-single-post__content-left-add-comment">
                <h3 class="ex-single-post__content-left-add-comment-title">Leave a Comment</h3>
                <div class="ex-single-post__content-left-add-comment-content">
                    <textarea name="comment" id="comment"></textarea>
                    <button class="ex-single-post__content-left-add-comment-content-btn ex-primary-button">
                        Submit<i class="fa-solid fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="ex-single-post__content-right">
            <h4 class="ex-travel__content-right-title">RECOMENDED</h4>
            <div class="ex-travel__content-right-items">
                <a href="#" class="ex-travel__content-right-items-item">
                    <div class="ex-travel__content-right-items-item-thumbnail">
                        <img src="{{ asset('images/post/thumbnail/t14.jpg') }}">
                    </div>
                    <div class="ex-travel__content-right-items-item-text">
                        <h4>Top 10 beautiful Place in Bangladesh</h4>
                        <p>March 25, 2021 . 4 min read</p>
                    </div>
                </a>
                <a href="#" class="ex-travel__content-right-items-item">
                    <div class="ex-travel__content-right-items-item-thumbnail">
                        <img src="{{ asset('images/post/thumbnail/t15.jpg') }}">
                    </div>
                    <div class="ex-travel__content-right-items-item-text">
                        <h4>Top 10 beautiful Place in Bangladesh</h4>
                        <p>March 25, 2021 . 4 min read</p>
                    </div>
                </a>
                <a href="#" class="ex-travel__content-right-items-item">
                    <div class="ex-travel__content-right-items-item-thumbnail">
                        <img src="{{ asset('images/post/thumbnail/t16.jpg') }}">
                    </div>
                    <div class="ex-travel__content-right-items-item-text">
                        <h4>Top 10 beautiful Place in Bangladesh</h4>
                        <p>March 25, 2021 . 4 min read</p>
                    </div>
                </a>
                <a href="#" class="ex-travel__content-right-items-item">
                    <div class="ex-travel__content-right-items-item-thumbnail">
                        <img src="{{ asset('images/post/thumbnail/t18.jpg') }}">
                    </div>
                    <div class="ex-travel__content-right-items-item-text">
                        <h4>Top 10 beautiful Place in Bangladesh</h4>
                        <p>March 25, 2021 . 4 min read</p>
                    </div>
                </a>
                <a href="#" class="ex-travel__content-right-items-item">
                    <div class="ex-travel__content-right-items-item-thumbnail">
                        <img src="{{ asset('images/post/thumbnail/t14.jpg') }}">
                    </div>
                    <div class="ex-travel__content-right-items-item-text">
                        <h4>Top 10 beautiful Place in Bangladesh</h4>
                        <p>March 25, 2021 . 4 min read</p>
                    </div>
                </a>
                <a href="#" class="ex-travel__content-right-items-item">
                    <div class="ex-travel__content-right-items-item-thumbnail">
                        <img src="{{ asset('images/post/thumbnail/t15.jpg') }}">
                    </div>
                    <div class="ex-travel__content-right-items-item-text">
                        <h4>Top 10 beautiful Place in Bangladesh</h4>
                        <p>March 25, 2021 . 4 min read</p>
                    </div>
                </a>
            </div>
        </div>
    </div> 
</section> --}}