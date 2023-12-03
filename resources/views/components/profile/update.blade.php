<div class="ex-profile-update">
    <div class="container">
        <div class="ex-profile-update__content">
            <h2 class="mb-5">Update Profile</h2>
            <form action="/{{$user->username}}/update" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="ex-profile-update__content-cover-photo">
                    <div class="ex-profile-update__content-cover-photo-wrapper">
                        <img class="image" src="{{ $user->profile && $user->profile->cover_photo ? asset('uploads/' . $user->profile->cover_photo) : asset('images/cover-photo.jpg') }}">
                        <label for="cover_photo">            
                            <input type="file" name="cover_photo" id="cover_photo" class="file-input hidden">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </label>
                    </div>
                </div>
                <div class="ex-profile-update__content-profile-pic">
                    <div class="ex-profile-update__content-profile-pic-wrapper">
                        <img class="image" src="{{ $user->profile && $user->profile->profile_pic ? asset('uploads/' . $user->profile->profile_pic) : asset('images/post/author/author.png') }}">
                        <label for="profile_pic">            
                            <input type="file" name="profile_pic" id="profile_pic" class="file-input hidden">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </label>
                    </div>
                </div>
                <div class="ex-profile-update__content-name">
                    <h4>Update Your Name <span class="text-orange-600 font-normal text-xl">*</span></h4>
                    <input type="text" name="name" id="name" value="{{ $user->name }}">
                </div>
                <div class="ex-profile-update__content-name ex-profile-update__content-name--bio">
                    <h4>Update Your Bio <span class="text-orange-600 font-normal text-xl">*</span></h4>
                    <input type="text" name="bio" id="bio" value="{{ $user->profile ? $user->profile->bio : ''}}">
                </div>
                <div class="ex-profile-update__content-sub-title">
                    <h4>Give a title about your description<span class="text-orange-600 font-normal text-xl">*</span></h4>
                    <input type="text"  name="about_title" id="about_title" value=" {{ $user->profile ? $user->profile->about_title : ''}} ">
                </div>
                <div class="ex-profile-update__content-desc">
                    <h4>Add Description<span class="text-orange-600 font-normal text-xl">*</span></h4>
                    <textarea name="about_desc" id="about_desc"> {{ $user->profile ? $user->profile->about_desc : ''}} </textarea>
                </div>
                <div class="ex-profile-update__content-btn">
                    <button type="submit" class="ex-primary-button">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    $('.file-input').change(function() {
        var input = this;

        var container = $(input).closest('.ex-profile-update__content-cover-photo-wrapper, .ex-profile-update__content-profile-pic-wrapper');

        var curElement = container.find('.image');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            if (input.files[0].type.match(/^image\//)) {
                reader.onload = function (e) {
                    curElement.attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                console.error('Selected file is not an image.');
            }
        }
    });
</script>