<section class="ex-hero">
    <div class="container">
        <div class="ex-hero__text">
            <h1>Welcome !</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia dolore .</p>
            <a href="{{ route('create.post') }}" class="bg-primary text-white py-2 px-5 mt-3 inline-block rounded-md">Create Your Blog</a>
        </div>
        <div class="ex-hero__items">
            <div class="ex-hero__items-item w-1/4">
                <div class="ex-hero__items-item-box">
                    <img src="{{ asset('images/post/thumbnail/t4.jpg') }}">
                </div>
            </div>
            <div class="ex-hero__items-item  w-1/4">
                <div class="ex-hero__items-item-box">
                    <img src="{{ asset('images/post/thumbnail/t3.jpg') }}">
                </div>
            </div>
            <div class="ex-hero__items-item w-1/2">
                <div class="ex-hero__items-item-box">
                    <img src="{{ asset('images/post/thumbnail/t2.jpg') }}">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ex-blog">
    <div class="container ex-blog__content">
        <div class="ex-blog__content-left">
            <h2>Choose the perfect design</h2>
            <p>Create a beautiful blog that fits your style. Choose from a selection of easy-to-use templates – all with flexible layouts and hundreds of background images – or design something new.</p>
        </div>
        <div class="ex-blog__content-right">
            <img src="{{ asset('images/blog.jpg') }}">
        </div>
    </div>
</section>
<section class="ex-memories">
    <div class="container ex-memories__content">
        <div class="ex-memories__content-left">
            <img src="{{ asset('images/gallery.jpg') }}">
        </div>
        <div class="ex-memories__content-right">
            <h2>Choose the perfect design</h2>
            <p>Create a beautiful blog that fits your style. Choose from a selection of easy-to-use templates – all with flexible layouts and hundreds of background images – or design something new.</p>
        </div>
    </div>
</section>
<section class="ex-join-others">
    <div class="container">
        <h2>Join millions of others</h2>
        <p>Whether sharing your expertise, breaking news, or whatever’s on your mind, you’re in good company on Blogger. Sign up to discover why millions of people have published their passions here.</p>
        <a href="{{ route('create.post') }}">CREATE YOUR BLOG</a>
    </div>
</section>
