<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <p
                name="message"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            > message : {{ $chirp->message}}</p>
            <p
                name="description"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >description : {{ $chirp->description }}</p>
            <div class="mt-4 space-x-2">
                <a href="{{ route('chirps.index') }}">{{ __('Back') }}</a>
            </div>

    </div>
</x-app-layout>