<x-app-layout>
    @auth
        <x-home.hero/>

        <x-home.latest-post/>
            
        <x-home.gadget-post/>
        
        <x-home.travel-post/>
        
        <x-home.create-blog/>
        
        <x-home.news-letter/>
    @else
        <x-home.guest-section/>
    @endauth
</x-app-layout>