<x-guest-layout>
    <x-profile.info :user="$user"/>
    <x-profile.tab :pendingPosts="$pendingPosts" :publishedPosts="$publishedPosts" :user="$user" :comments="$comments" :likes="$likes"/>
</x-guest-layout>