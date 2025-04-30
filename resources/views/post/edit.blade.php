<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-6 text-gray-900">
                        <h1 class="text-3xl">Update post: <span class="font-bold">{{ $post->title }}</span> </h1>

                        <!-- Image -->
                        @if($post->imageUrl('preview'))
                            <div class="flex items-center mt-4">
                                <img src="{{ $post->imageUrl('preview') }}" alt="Post Image" class="w-full rounded-lg object-cover">
                            </div>
                        @endif
                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Image')" />
                            <x-text-input id="image" class="block mt-1 w-full cursor-pointer border border-gray-300 rounded-lg" type="file" name="image" :value="old('image'), $post->image" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <!-- Category -->
                        <div class="mt-4">
                            <x-input-label for="category_id" :value="__('Category')" />
                            <select id="category_id" name="category_id" class="block mt-1 w-full border-gray-300 rounded-lg">
                                <option value="">Select category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @selected(old('category_id', $post->category_id) == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
                        </div>

                        <!-- Title -->
                        <div class="mt-4">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $post->title)" autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Content -->
                        <div class="mt-4">
                            <x-input-label for="content" :value="__('Content')" />
                            <x-input-textarea id="content" class="block mt-1 w-full" rows="10" type="text" name="content">
                                {{ old('content', $post->content) }}
                            </x-input-textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-3">
                                {{ __('Update Post') }}
                            </x-primary-button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
