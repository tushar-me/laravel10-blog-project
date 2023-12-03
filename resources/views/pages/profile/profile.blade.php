<x-guest-layout>
    <x-profile.info :user="$user"/>
    <x-profile.tab :pendingPosts="$pendingPosts" :publishedPosts="$publishedPosts" :user="$user"/>
</x-guest-layout>