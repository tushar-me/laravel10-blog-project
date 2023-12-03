<x-app-layout>
    @auth
        <x-home.hero/>

        <x-home.latest-post :posts="$posts"/>
            
        <x-home.gadget-post :gadgetPosts="$gadgetPosts"/>
        
        <x-home.travel-post :travelPosts="$travelPosts" :travelLatest="$travelLatest"/>
        
        <x-home.create-blog/>
        
        <x-home.news-letter/>
    @else    
        <x-home.guest-section/>
    @endauth
</x-app-layout>