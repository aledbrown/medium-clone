<ul class="flex flex-wrap justify-center text-sm font-medium text-center text-gray-500">

    <li class="me-2">
        <a href="{{ route('dashboard') }}"
           class="
               {{ Route::currentRouteName() == 'dashboard' ? 'text-white bg-blue-600 hover:bg-blue-700':'text-gray-500 hover:text-gray-900 hover:bg-gray-200' }}
               inline-block px-4 py-2 rounded-lg"
            aria-current="page">All</a>
    </li>

    @forelse($categories as $category)
        <li class="me-2">
            <a href="{{ route('post.byCategory', $category->id) }}"
               class="
               {{ Route::currentRouteName() == 'post.byCategory' && request()->route('category')->id == $category->id ? 'text-white bg-blue-600 hover:bg-blue-700':'text-gray-500 hover:text-gray-900 hover:bg-gray-200' }}
               inline-block px-4 py-2 rounded-lg">
                {{ $category->name }}
            </a>
        </li>
    @empty
        {{ $slot }}
    @endforelse

</ul>
