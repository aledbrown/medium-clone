<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex flex-col sm:flex-row">
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold">{{ $user->name }}</h1>

                        <div class="mt-8 sm:pr-8">
                            @forelse($posts as $post)
                                <x-post-item :post="$post"/>
                            @empty
                                <p>No posts yet.</p>
                            @endforelse
                        </div>

                        @if($posts->hasPages())
                            {{ $posts->onEachSide(1)->links() }}
                        @endif

                    </div>
                    <x-follow-ctr :user="$user">
                        <div class="order-first sm:order-none mb-8 sm:mb-0 sm:w-[320px] border-1 px-8">
                            <x-user-avatar :user="$user" size="w-24 h-24" class="order-first sm:order-none mb-8 sm:mb-0 sm:w-[320px] border-1 px-8" />
                            <h3 class="mt-4 text-lg font-medium text-gray-900">{{ $user->name }}</h3>
                            {{--<p class="text-sm text-gray-500">{{ $user->followers()->count() }} {{ \Illuminate\Support\Str::plural($value = 'follower', $user->followers()->count()) }}</p>--}}
                            <p class="text-sm text-gray-500"><span x-text="followersCount"></span> <span x-text="followersText"></span></p>
                            <p class="mt-4 text-sm text-gray-500">{{ $user->bio }}</p>
                            @if(auth()->user() && auth()->user()->id !== $user->id)
                                <div class="mt-4">
                                    <button
                                        @click="follow()"
                                        class="block px-4 py-2 rounded-full text-sm font-semibold text-white text-center hover:bg-black/80 transition"
                                        x-text="following ? 'Unfollow': 'Follow'"
                                        :class="following ? 'bg-red-600':'bg-emerald-800'"
                                    />
                                </div>
                            @endif
                        </div>
                    </x-follow-ctr>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
