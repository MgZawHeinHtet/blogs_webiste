
<x-layout>
    <x-hero></x-hero>
    <x-blog-section :selectedCategory="$selectedCategory??null" :blogs="$blogs" :categories="$categories"></x-blog-section>
    <x-subscribe></x-subscribe>
</x-layout>


