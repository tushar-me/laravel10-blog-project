<div class="ex-profile-update">
    <div class="container">
        <div class="ex-profile-update__content">
            <h2 class="mb-5">Update Profile</h2>
            <div class="ex-profile-update__content-cover-photo">
                <div class="ex-profile-update__content-cover-photo-wrapper">
                    <img class="image" src="{{ asset('images/cover-photo.jpg') }}">
                    <label for="cover_photo">            
                        <input type="file" name="cover_photo" id="cover_photo" class="file-input hidden">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </label>
                </div>
            </div>
            <div class="ex-profile-update__content-profile-pic">
                <div class="ex-profile-update__content-profile-pic-wrapper">
                    <img class="image" src="{{ asset('images/tushar.jpeg') }}">
                    <label for="profile_pic">            
                        <input type="file" name="profile_pic" id="profile_pic" class="file-input hidden">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </label>
                </div>
            </div>
            <div class="ex-profile-update__content-name">
                <h4>Update Your Name <span class="text-orange-600 font-normal text-xl">*</span></h4>
                <input type="text" name="name" id="name" value="Tushar Imran">
            </div>
            <div class="ex-profile-update__content-sub-title">
                <h4>Give a title about your description<span class="text-orange-600 font-normal text-xl">*</span></h4>
                <input type="text"  name="title" id="title" value="Hi, I'm Tushar">
            </div>
            <div class="ex-profile-update__content-desc">
                <h4>Add Description<span class="text-orange-600 font-normal text-xl">*</span></h4>
                <textarea name="desc" id="desc">I'm a professional Web Developer...</textarea>
            </div>
            <div class="ex-profile-update__content-btn">
                <button type="submit" class="ex-primary-button">Save Changes</button>
            </div>
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