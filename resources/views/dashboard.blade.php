<x-app-layout>

    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <ul class="flex flex-wrap justify-center text-sm font-medium text-center text-gray-500">

                        <li class="me-2">
                            <a href="#" class="inline-block px-4 py-2 text-white bg-blue-600 rounded-lg active" aria-current="page">All</a>
                        </li>

                        @foreach($categories as $category)
                            <li class="me-2">
                                <a href="#"
                                   class="inline-block px-4 py-2 rounded-lg hover:text-gray-900 hover:bg-gray-200">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>

            <div class="mt-8 text-gray-900">
                @forelse($posts as $post)
                    <x-post-item :post="$post"/>
                @empty
                    <div>
                        <p class="py-16 text-center text-gray-900">No posts found.</p>
                    </div>
                @endforelse
            </div>

            @if($posts->hasMorePages())
                {{ $posts->onEachSide(1)->links() }}
            @endif

        </div>
    </div>
</x-app-layout>
