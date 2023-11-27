@props(['categories'])
@props(['post'])
<div class="ex-create-post">
    <div class="container">
        
        <div class="ex-create-post__content">
            <div class="ex-create-post__content-popup ex-create-post__content-popup--success">
                <div class="ex-create-post__content-popup-box">
                    <div class="ex-create-post__content-popup-box-icon">
                        <img src="{{ asset('images/success.png') }}">
                    </div>
                    <h3>Success!</h3>
                    <h4>Blog Post Update Successfully</h4>
                    <p>An admin needs to review your blog post</p>
                    <div class="ex-create-post__content-popup-box-btns">
                        <a href="{{ route('user.profile') }}">Profile</a>
                        <a href="{{ route('create.post') }}" class="add">Add More</a>
                    </div>
                </div>
            </div>
            <div class="ex-create-post__content-popup ex-create-post__content-popup--error">
                <div class="ex-create-post__content-popup-box">
                    <div class="ex-create-post__content-popup-box-icon">
                        <img src="{{ asset('images/error.png') }}">
                    </div>
                    <h3>Opps!</h3>
                    <h4></h4>
                    {{-- <p></p> --}}
                    <div class="ex-create-post__content-popup-box-btns">
                        <a href="">Ok</a>
                    </div>
                </div>
            </div>
            <div class="ex-create-post__content-detail">
                <p><span class="text-orange-700 mr-1 text-lg">*</span>Thank you for your interest in submitting a blog to our website (<span class="text-primary">www.explorer.org</span>). Before submitting a blog to the website, please review the guidelines and then fill out the form below. We accept blogs in English, Bangla and Spanish.</p>
                <p><span class="text-orange-700 mr-1 text-lg">*</span>Your blog should include the following items and you can enter each item in the fields below</p>
                <p><span class="text-orange-700 mr-1 text-lg">*</span>Please note that blogging can be a time intensive process. Once your blog post is completed, expect up to three rounds of back-and-forth editing before it is finalized. Keep this timeline in mind when preparing your post. If you have any issues with your submission, please contact: <span class="text-primary">support@explorer.org</span></p>
            </div>
            <h2>Update Blog</h2>
            {{-- Form --}}
            <form id="updatePost" action="{{ route('update.post', ['slug' => $post->slug ]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="ex-create-post__content-title">
                    <textarea name="title" id="title">{{ $post->title }}</textarea>
                    <div class="ex-create-post__content-title-detail">
                        <h4>Title</h4>
                        <p>Choose a title that engages readers and represents a major theme in the blog.</p>
                    </div>
                </div>
                <div class="ex-create-post__content-thumbnail">
                    <div class="ex-create-post__content-thumbnail-detail">
                        <h4>Thumbnail</h4>
                        <ul>
                            <li>One file only.</li>
                            <li>20 MB limit.</li>
                            <li>Allowed types: <span>gif </span>, <span> jpg</span>, <span>jpeg</span>, <span>png</span>.</li>
                        </ul>
                    </div>
                    <input id="file-upload" type="file" name="thumbnail" accept="image/*" />

                    <label for="file-upload" id="file-drag">
                        <img id="file-image" src="{{ asset('uploads/'. $post->thumbnail) }}" alt="Preview">
                        <div id="start" style="position: absolute; top:50%;left:50%;translate:-50% -50%;">
                            <i class="fa-solid fa-cloud-arrow-up" style="color: #fff;"></i>
                            <div style="color:#fff;">Select a file or drag here</div>
                            <div id="notimage" class="hidden">Please select an image</div>
                            <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                        </div>
                        <div id="response" class="hidden">
                            <div id="messages"></div>
                            {{-- <progress class="progress" id="file-progress" value="0">
                                <span>0</span>%
                            </progress> --}}
                        </div>
                    </label>
                </div>
                <div class="ex-create-post__content-text">
                    <textarea id="content" name="content">{{ $post->content }}</textarea>
                    <div class="ex-create-post__content-text-detail">
                        <h4>Body Text</h4>
                        <p>This is where you add the main content for the blog. Keep it short, the blog should be no more than 800-1000 words.</p>
                    </div>
                </div>
                <div class="ex-create-post__content-category">
                    <div class="border-2 border-gray-200 rounded-md p-5">
                        <h4>Category</h4>
                        <div class=" flex items-center justify-center gap-4">
                            <div class="select">
                                <select name="category" id="category">
                                    <option value="" disabled selected>Choose a Category</option>
                                    @foreach ( $categories as $category)
                                        {{-- <option value="{{ $category->id }}"> {{ $category->name }} </option> --}}
                                        <option value="{{ $category->id }}" {{ $post->category->id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ex-create-post__content-author">
                    <textarea id="author_bio" name="author_bio"> {{ $post->author_bio }}</textarea>
                    <div class="ex-create-post__content-author-detail">
                        <h4>Author Bio</h4>
                        <p>Please create a biography for the author that is no more than 100 words.</p>
                    </div>
                </div>
                <h5><span>*</span> We reserve the right, in our sole discretion, to edit or refuse to publish any submissions that are inappropriate or do not align with the criteria stated above.</h5>
                <div class="ex-create-post__content-btn">
                    <button type="submit" id="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $('#submit').on("click", function(event){

            event.preventDefault();
            let formData = new FormData($('#updatePost')[0]);
            let csrfToken = $('meta[name = "csrf-token"]').attr("content");

            $.ajaxSetup ({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $.ajax ({
                type: "POST",
                url: $("#updatePost").attr("action"),
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.status === 'success'){
                        $('.ex-create-post__content-popup--success').css('display', 'flex');
                        $('.add').click(function(){
                            location.reload(true);
                        });
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    if (xhr.status === 422) {
                        let errorsHtml = '<ul>';
                        let errors = xhr.responseJSON.errors;
                        for (let field in errors) {
                            errorsHtml += '<li>' + errors[field][0] + '</li>';
                        }
                        errorsHtml += '</ul>';
                        $('.ex-create-post__content-popup--error h4').html(errorsHtml);
                        $('.ex-create-post__content-popup--error').css('display', 'flex');
                        $('.ex-create-post__content-popup--error a').click(function(e){
                            e.preventDefault();
                            $('.ex-create-post__content-popup--error').css('display', 'none');
                        });
                    }
                }
            });
        });
    });
</script>