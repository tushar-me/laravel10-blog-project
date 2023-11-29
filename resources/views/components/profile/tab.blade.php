@props(['pendingPosts'])
@props(['publishedPosts'])
<div class="ex-profile-tab">
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
                    <p>Hi, i am tushar</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, odit dolorum sint maiores animi assumenda deleniti eligendi, placeat optio voluptatem, fugit neque id dicta accusantium sed facere commodi ex dolorem.</p>
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
                                <i class="fa-regular fa-comments"></i> Replies 
                            </div>
                            <span>0</span>
                        </li>
                        <li class="bg-red-50 text-red-900">
                            <div>
                                <i class="fa-regular fa-heart"></i> Likes 
                            </div>
                            <span>0</span>
                        </li>
                    </ul>
                </div>
                <div class=" ex-profile-tab-content-badges">
                    <h4>Badges</h4>
                    <ul>
                        <li>
                            <img src="{{ asset('images/badge-1.png')}}">
                        </li>
                        <li>
                            <img src="{{ asset('images/badge-2.png')}}">
                        </li>
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
                            <tr>
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
                                        <a href="#" class="delete">
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
                        <tr>
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
                                    <a href="#" class="delete">
                                        Delete <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>