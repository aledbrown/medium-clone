<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-4 text-gray-900">
                    <h1 class="text-5xl font-bold">{{ $post->title }}</h1>

                    <!-- User info -->
                    <div class="flex gap-4 items-center mt-8">
                        <!-- User image -->
                        @if(!$post->user->image)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        @else
                            <img src="{{ $post->user->imageUrl() }}" class="w-12 h-12 rounded-full" alt="{{ $post->user->name }}" />
                        @endif
                        <!-- User info -->
                        <div class="">
                            <div class="flex gap-2 items-baseline">
                                <h3 class="text-lg font-light text-gray-600">{{ $post->user->name }}</h3>
                                &middot;
                                <a href="#" class="text-blue-500 hover:underline">Follow</a>
                            </div>
                            <p class="text-sm text-gray-600">
                                {{ $post->readTime() }} min read.
                                Updated {{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}
                            </p>
                        </div>
                    </div>

                    <!-- Clap Section -->
                    <x-clap-button />

                    <!-- Content -->
                    <div class="mt-4">
                        <img src="{{ $post->imageUrl() }}" class="w-full object-cover" alt="{{ $post->title }}" />
                        <div class="mt-6">
                            {{ $post->content }}
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="mt-8 ">
                        <span class="px-4 py-2 text-black bg-gray-200 rounded-full">{{ $post->category->name }}</span>
                    </div>

                    <!-- Clap Section -->
                    <x-clap-button />

                </div>
            </div>
        </div>
</x-app-layout>
