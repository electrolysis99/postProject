<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Post') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                <form action="{{ route('posting.store') }}" method="POST">
                    @csrf
                    <div>
                        <x-jet-label for="title" value="{{ __('Post Title') }}" />
                        <x-jet-input name="title" id="title" type="text" class="mt-1 block w-full" autocomplete="title" placeholder="This post title.."/>
                        <x-jet-input-error for="title" class="mt-2" />
                        <span class="mt-2 text-xs text-gray-400">Maximum 200 characters</span>
                    </div>
                    <div class="mt-8">
                        <x-jet-label for="slug" value="{{ __('Slug') }}" />
                        <x-jet-input name="slug" id="slug" type="text" class="bg-gray-200 mt-1 block w-full" disabled/>
                        <x-jet-input-error for="slug" class="mt-2" />
                        <span class="mt-2 text-xs text-gray-400">Maximum 200 characters</span>
                    </div>
                    <div class="mt-8">
                        <x-jet-label for="content" value="{{ __('Content') }}" />
                        <textarea class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="content" id="content" cols="30" rows="5" placeholder="Content for this post"></textarea>
                        <x-jet-input-error for="content" class="mt-2" />
                        <span class="mt-2 text-xs text-gray-400">Maximum 200 characters</span>
                    </div>
                    <div class="mt-8">
                        <x-jet-label for="meta" value="{{ __('Meta Description') }}" />
                        {{-- <x-jet-input name="meta" id="meta" type="text" class="mt-1 block w-full" autocomplete="meta" placeholder="Meta description for this post.."/> --}}
                        <textarea class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="meta" id="meta" cols="30" rows="5" placeholder="Meta Description for this post"></textarea>
                        <x-jet-input-error for="meta" class="mt-2" />
                        <span class="mt-2 text-xs text-gray-400">Maximum 200 characters</span>
                    </div>
                    <x-jet-button class="mt-8">
                        {{ __('Add Post') }}
                    </x-jet-button>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>

