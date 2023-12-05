
<div class="ex-profile-tab">
    <div class="delete_success">
        <div class="delete_success-popup">
            <h4>Post deleted successfully</h4>
            <button class="ok">Ok</button>
        </div>
    </div>
    <div class="container">
        <ul class="ex-profile-tab-links">
            <li>
                <button class="ex-profile-tab-links-link ex-profile-tab-links-link--active" data-tab="profile">Profile</button>
            </li>
            <li>
                <button class="ex-profile-tab-links-link" data-tab="published">Published</button>
            </li>
            <li>
                <button class="ex-profile-tab-links-link" data-tab="pending">Pending</button>
            </li>
            <li>
                <a href="{{ route('create.post') }}" class="ex-primary-button">
                    Create <i class="fa-regular fa-square-plus"></i>
                </a>
            </li>
        </ul>
        <div class="ex-profile-tab-content ex-profile-tab-content--active ex-profile-tab-content--profile" id="profile">
            <div class="ex-profile-tab-content-text">
                <div class="border p-5 rounded-lg">
                    <h3>About</h3>
                    <p class="text-gray-800 font-semibold mb-2">{{ $user->profile && $user->profile->about_title ? $user->profile->about_title : ''}}</p>
                    <p class="max-w-[800px]">{{ $user->profile && $user->profile->about_desc ? $user->profile->about_desc : ''}}</p>
                </div>
            </div>
            <div class="ex-profile-tab-content-stats">
                <div class="border p-5 rounded-lg">
                    <h4>Community Karma</h4>
                    <ul>
                        <li class="bg-blue-50 text-blue-900">
                            <div>
                                <i class="fa-regular fa-file"></i> Posts 
                            </div>
                            <span>{{ count($publishedPosts) }}</span>
                        </li>
                        <li class="bg-green-50 text-green-900">
                            <div>
                                <i class="fa-regular fa-comments"></i> Comments 
                            </div>
                            <span>{{ $comments }}</span>
                        </li>
                        <li class="bg-red-50 text-red-900">
                            <div>
                                <i class="fa-regular fa-heart"></i> Likes 
                            </div>
                            <span>{{ $likes }}</span>
                        </li>
                    </ul>
                </div>
                <div class=" ex-profile-tab-content-badges">
                    <h4>Badges</h4>
                    <ul>
                        @if (count($publishedPosts) >= 10)
                        <li>
                            <img src="{{ asset('images/badge-1.png')}}">
                        </li>
                        @endif
                        @if ($likes >= 10)
                        <li>
                            <img src="{{ asset('images/badge-2.png')}}">
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="ex-profile-tab-content" id="published">
            <div class="ex-profile-tab-content-post">
                @if ($publishedPosts && count($publishedPosts) > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Read Time</th>
                                <th>Category</th>
                                <th>Read</th>
                                <th>Edit & Delete</th>
                            </tr>
                        </thead>
                        @foreach ( $publishedPosts as $publishedPost)
                            <tr class="post">
                                <td>
                                    <img src="{{ asset('uploads/'. $publishedPost->thumbnail) }}">
                                </td>
                                <td>{{ Illuminate\Support\Str::words($publishedPost->title, $words = 5, $end = '...')}}</td>
                                <td>
                                    <span class="text-blue-900 bg-blue-50 px-4 py-1 rounded-full">Published</span>
                                </td>
                                <td>{{ $publishedPost->read_time }}</td>
                                <td>{{ $publishedPost->category->name }}</td>
                                <td>
                                    <a href="/posts/{{ $publishedPost->category->name }}/{{  $publishedPost->slug }}" class="read">
                                        Read<i class="fa-regular fa-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="flex gap-4">
                                        <a href="/edit/{{ $publishedPost->slug }}" class="edit">
                                            Edit <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a href="/delete/{{ $publishedPost->slug }}" class="delete"  id="deletePublishedBtn">
                                            Delete <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            
                        @endforeach
                        
                    </table>

                @else
                <p>No published posts available.</p>
                @endif
            </div>
        </div>
        <div class="ex-profile-tab-content" id="pending">
            <div class="ex-profile-tab-content-post">
                @if ($pendingPosts && count($pendingPosts) > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Read Time</th>
                            <th>Category</th>
                            <th>Read</th>
                            <th>Edit & Delete</th>
                        </tr>
                    </thead>
                    @foreach ( $pendingPosts as $pendingPost )
                        <tr class="post">
                            <td>
                                <img src="{{ asset('uploads/'. $pendingPost->thumbnail) }}">
                            </td>
                            <td>{{ Illuminate\Support\Str::words($pendingPost->title, $words = 5, $end = '...') }}</td>
                            <td>
                                <span class="text-pink-700 bg-pink-100  px-4 py-1 rounded-full">Pending</span>
                            </td>
                            <td>{{ $pendingPost->read_time }} min</td>
                            <td>{{ $pendingPost->category->name }}</td>
                            <td>
                                <a href="/pending/{{ $pendingPost->slug }}" class="read">
                                    Read<i class="fa-regular fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <div class="flex gap-4">
                                    <a href="/edit/{{$pendingPost->slug}}" class="edit">
                                        Edit <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="/delete/{{ $pendingPost->slug }}" class="delete" id="deletePendingBtn">
                                        Delete <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                @else
                <p>No Pending posts available.</p>
                @endif
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#deletePublishedBtn").on("click", function(e) {
            e.preventDefault();

            var deleteUrl = $(this).attr("href");
            var postElement = $(this).closest(".post");

            $.ajax({
                url: deleteUrl,
                type: "get",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.message) {
                        console.log(response.message); 

                        postElement.remove();
                        $('.delete_success').css('display','flex');
                        $('.ok').click(function(){
                            $('.delete_success').css('display','none');
                        });
                    } else {
                        console.error("Unexpected response format:", response);
                    }
                },
                error: function(error) {
                    console.error("Error deleting post:", error.responseText);
                    console.error("Status Code:", error.status);
                }
            });
        });
    
        $("#deletePendingBtn").on("click", function(e) {
            e.preventDefault();

            var deleteUrl = $(this).attr("href");
            var postElement = $(this).closest(".post");

            $.ajax({
                url: deleteUrl,
                type: "get",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.message) {
                        console.log(response.message); 

                        postElement.remove();
                        $('.delete_success').css('display','flex');
                        $('.ok').click(function(){
                            $('.delete_success').css('display','none');
                        });
                    } else {
                        console.error("Unexpected response format:", response);
                    }
                },
                error: function(error) {
                    console.error("Error deleting post:", error.responseText);
                    console.error("Status Code:", error.status);
                }
            });
        });
    });
</script>