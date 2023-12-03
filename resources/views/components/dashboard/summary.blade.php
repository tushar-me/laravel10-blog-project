<section class="ex-dashboard">
    <div class="ex-dashboard__head">
        <h3>Dash<span class="text-black">board</span></h3>
        <div class="ex-dashboard__head-profile flex items-center gap-3">

            <h4>Tushar Imran</h4>
            <div class="ex-dashboard__head-profile-img">
                <img src="{{ asset('images/author.jpg') }}">
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
                @if ($posts && count($posts) > 0)
                    @foreach ( $posts as $post)
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
                        <h3>30</h3>
                        <p>Total Articles</p>
                    </div>
                </div>
                <div class="ex-dashboard-post-info-right-items-item bg-green-200">
                    <div class="mt-1">
                        <i class="fa-brands fa-gratipay"></i>
                    </div>
                    <div>
                        <h3>40</h3>
                        <p>Total Article Likes</p>
                    </div>
                </div>
                <div class="ex-dashboard-post-info-right-items-item bg-blue-200">
                    <div class="mt-1">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div>
                        <h3>{{ $posts->count() }}</h3>
                        <p>Pending Articles</p>
                    </div>
                </div>
            </div>
            <div class="ex-dashboard-post-info-right-category">
                <div class="ex-dashboard-post-info-right-category-head">
                    <h4>All Category</h4>
                    <a href="#">Add New</a>
                </div>
                <div class="ex-dashboard-post-info-right-category-items">
                    @foreach ($categories as $category)
                        <h4>{{ $category->name }}</h4>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>