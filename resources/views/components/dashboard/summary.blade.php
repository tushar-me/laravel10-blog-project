<section class="ex-dashboard">
    <div class="ex-dashboard__head">
        <h3>Dash<span class="text-black">board</span></h3>
        <div class="ex-dashboard__head-profile flex items-center gap-3 cursor-pointer">
            <h4>{{ auth()->user()->name }}</h4>
            <div class="ex-dashboard__head-profile-img">
                <img src="{{ auth()->user()->profile && auth()->user()->profile->profile_pic ? asset('uploads/' . auth()->user()->profile->profile_pic) : asset('images/post/author/author.png') }}">
            </div>
            <div class="ex-dashboard__head-profile-popup">
                <a href="{{ route('home')}}"> <i class="fa-solid fa-house"></i> Explorer Home</a>
                <a href="{{ route('logout')}}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
            </div>
        </div>
    </div>
    <div class="ex-dashboard-post-info">
        <div class="ex-dashboard-post-info-left">
            <div class="ex-dashboard-post-info-left-content">
                <h3>Hello Tushar Imran!</h3>
                <p>Welcome to Dashboard</p>
            </div>
            <div class="ex-dashboard-post-info-left-post-items">
                <h3 class=" text-right">Pending Articles</h3>
                @if ($pendingPosts && count($pendingPosts) > 0)
                    @foreach ( $pendingPosts as $post)
                        <div class="ex-dashboard-post-info-left-post-items-item">
                            <div class="ex-dashboard-post-info-left-post-items-item-thumbnail">
                                <img src="{{ asset('uploads/' . $post->thumbnail) }}">
                            </div>
                            <div>
                                <p>{{ $post->title }}</p>
                                <div class="ex-dashboard-post-info-left-post-items-item-btns">
                                    <a href="/dashboard/pending/{{ $post->slug }}" class="bg-primary bg-opacity-20 text-primary">
                                        <i class="fa-regular fa-eye"></i>Read
                                    </a>
                                    <a href="/approve/{{ $post->slug }}" class="bg-green-200 text-green-800">
                                        <i class="fa-solid fa-circle-check"></i>Approve
                                    </a>
                                    <a href="/reject/{{ $post->slug }}" class="bg-orange-200 text-orange-800"><i class="fa-solid fa-circle-xmark"></i>Reject
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                <p>No Pending posts available.</p> 
                @endif
                
            </div>
        </div>
        <div class="ex-dashboard-post-info-right">
            <div class="ex-dashboard-post-info-right-items">
                <div class="ex-dashboard-post-info-right-items-item bg-purple-200">
                    <div class="mt-1">
                        <i class="fa-solid fa-globe"></i>
                    </div>
                    <div>
                        <h3>{{ $posts->count() }}</h3>
                        <p>Total Articles</p>
                    </div>
                </div>
                <div class="ex-dashboard-post-info-right-items-item bg-green-200">
                    <div class="mt-1">
                        <i class="fa-brands fa-gratipay"></i>
                    </div>
                    <div>
                        <h3>{{ $likes }}</h3>
                        <p>Total Article Likes</p>
                    </div>
                </div>
                <div class="ex-dashboard-post-info-right-items-item bg-blue-200">
                    <div class="mt-1">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div>
                        <h3>{{ $pendingPosts->count() }}</h3>
                        <p>Pending Articles</p>
                    </div>
                </div>
            </div>
            <div class="ex-dashboard-post-info-right-category">
                <div class="ex-dashboard-post-info-right-category-add-popup">
                    <div class="ex-dashboard-post-info-right-category-add-popup-form">
                        <button class="cancel">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                        <h3>Add New Category</h3>
                        <div class="bg-primary bg-opacity-20 border-2 border-cyan-200 rounded-md mx-8 text-left py-2 px-3 flex items-center gap-1 mb-6">
                            <i class="fa-solid fa-triangle-exclamation text-primary"></i>
                            <p class="text-primary">Category name must be Capitalize!</p>
                        </div>
                        <form action="/category/store" method="post">
                            @csrf
                            <div class="ex-dashboard-post-info-right-category-add-popup-form-input">
                                <input name="name" id="name" placeholder="Category Name" required>
                            </div>
                            <button type="submit" class="bg-primary py-2 px-4 rounded text-white mt-5">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="ex-dashboard-post-info-right-category-head">
                    <h4>All Category</h4>
                    <button class="add_category">Add New</button>
                </div>
                <div class="ex-dashboard-post-info-right-category-items">
                    @foreach ($categories as $category)
                        <h4>{{ $category->name }} <p>{{ $category->created_at ? $category->created_at->format('F j, Y') : 'N/A' }}
                        </p></h4>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>



<script>
    $(document).ready(function(){
        $('.ex-dashboard__head-profile').click(function(){
            $('.ex-dashboard__head-profile-popup').toggleClass('ex-dashboard__head-profile-popup--active');
        })
        $('.add_category').click(function(){
            $('.ex-dashboard-post-info-right-category-add-popup').css('display', 'flex');
        });


        $('.cancel').click(function(){
            $('.ex-dashboard-post-info-right-category-add-popup').css('display', 'none');
        });
    });
</script>