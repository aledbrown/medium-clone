<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-4 text-gray-900">
                    <h1 class="text-4xl font-bold">{{ $post->title }}</h1>

                    <!-- User info -->
                    <div class="flex gap-4 items-center mt-8">
                        <!-- User image -->
                        <a href="{{ route('profile.show', $post->user) }}" class="cursor-pointer">
                            <x-user-avatar :user="$post->user" />
                        </a>
                        <!-- User info -->
                        <div>
                            <x-follow-ctr :user="$post->user" class="flex gap-2 items-baseline">
                                <a href="{{ route('profile.show', $post->user) }}" class="cursor-pointer hover:underline text-lg font-light text-gray-600">{{ $post->user->name }}</a>
                                @if(auth()->user() && auth()->user()->id !== $post->user_id)
                                    &middot;
                                <button
                                    @click="follow()"
                                    class="hover:underline font-bold"
                                    x-text="following ? 'Unfollow': 'Follow'"
                                    :class="following ? 'text-red-600':'text-emerald-600'"
                                />
                                @endif
                            </x-follow-ctr>
                            <p class="text-sm text-gray-600">
                                {{ $post->readTime() }} min read.
                                Updated {{ $post->created_at->diffForHumans() }} by <a href="{{ route('profile.show', $post->user) }}" class="text-blue-500 hover:underline">{{ $post->user->name }}</a>
                            </p>
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-t flex gap-4">
                        <a href="#"><x-primary-button>Edit Post</x-primary-button></a>
                        @if(auth()->user()->can('delete', $post))
                            ALLOWED TO DELETE
                        @endif
                        <form class="inline-block" action="{{ route('post.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-danger-button>Delete Post</x-danger-button>
                        </form>
                    </div>


                    <!-- Clap Section -->
                    <x-clap-button :post="$post" />

                    <!-- Content -->
                    <div class="mt-4">
                        <img src="{{ $post->imageUrl('large') }}" class="w-full object-cover" alt="{{ $post->title }}" />
                        <div class="mt-6">
                            {{ $post->content }}
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="mt-8 ">
                        <span class="px-4 py-2 text-black bg-gray-200 rounded-full">{{ $post->category->name }}</span>
                    </div>

                    <!-- Clap Section -->
                    <x-clap-button :post="$post" />

                </div>
            </div>
        </div>
</x-app-layout>
