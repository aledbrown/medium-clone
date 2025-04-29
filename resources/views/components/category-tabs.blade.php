<ul class="flex flex-wrap justify-center text-sm font-medium text-center text-gray-500">

    <li class="me-2">
        <a href="{{ route('dashboard') }}" class="inline-block px-4 py-2 text-white bg-blue-600 rounded-lg active" aria-current="page">All</a>
    </li>

    @forelse($categories as $category)
        <li class="me-2">
            <a href="{{ route('post.byCategory', $category->id) }}"
               class="inline-block px-4 py-2 rounded-lg hover:text-gray-900 hover:bg-gray-200">
                {{ $category->name }}
            </a>
        </li>
    @empty
        {{ $slot }}
    @endforelse

</ul>
