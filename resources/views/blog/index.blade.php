<x-app-layout>
</x-app-layout>
@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

    <form method="POST" action="{{ route('blog.store') }}">
        @csrf
        <textarea
            name="message"
            placeholder="{{ __('Secció de comentaris') }}"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        >{{ old('message') }}</textarea>
        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Publicar') }}</x-primary-button>
    </form>

 @foreach ($comments as $comment)
                <div class="p-6 flex space-x-2">
                    <div class="caja">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                      </svg>
                    <div class="flex-1">
                    <div class="flex justify-between items-center ">
                        <div >
                             <span class="h-4 w-4 text-gray-700">{{$comment->user_id}}</span>
                            <span class="ml-2 text-sm text-gray-500">{{$comment->created_at->format('j M Y,g:i a')}}</span>
                            @unless ($comment->created_at->eq($comment->updated_at))
                                <small class="text-sm text-gray-600">&middot;{{__('edited')}}</small>
                            @endunless
                        </div>
                    </div>
                </div>
                <p class="mt-4 text-lg text-gray-900 ">{{$comment->message}}</p>

                </div>
            </div>
                @endforeach
</div>
