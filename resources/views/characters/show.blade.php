@extends('layout')

@section('content')
    <form class="space-y-8 divide-y divide-gray-200" method="POST"
          action="{{ route('characters.update', $character) }}">
        @csrf

        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Profile</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly.</p>
                </div>
                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Full
                            name</label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" name="name" id="name" autocomplete="name"
                                   value="{{ $character->name }}"
                                   readonly
                                   disabled
                                   class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="mass" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Mass </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="number" name="mass" id="mass" autocomplete="mass"
                                   value="{{ $character->mass }}"
                                   readonly
                                   disabled
                                   class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="height" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Height </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="number" name="height" id="height" autocomplete="height"
                                   value="{{ $character->height }}"
                                   readonly
                                   disabled
                                   class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="gender" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Gender </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select id="gender" name="gender" autocomplete="gender"
                                    disabled
                                    class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                @foreach(['male', 'female', 'n/a', 'none', 'hermaphrodite'] as $option)
                                    <option value="{{ $option }}"
                                            @if($character->gender === $option) selected @endif>{{ ucfirst($option) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="picture" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Profile Picture </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            @if(isset($character->picture))
                                <img class="w-32 h-32 flex-shrink-0 rounded-full uploaded-picture"
                                     src="{{ asset($character->picture) }}"
                                     alt="Profile picture">
                            @else
                                <svg class="h-10 w-10 rounded-full text-gray-300" fill="currentColor"
                                     viewBox="0 0 24 24">
                                    <path
                                        d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <button type="button"
                        onclick="document.getElementById('delete-character').submit()"
                        class="bg-red-100 py-2 px-4 border border-red-300 rounded-md shadow-sm text-sm font-medium text-red-700 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Delete
                </button>
                <a href="{{ route('characters.edit', $character) }}"
                   class="ml-3 inline-flexbg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Edit
                </a>
            </div>
        </div>

        <h3 class="text-lg leading-6 font-medium text-gray-900">Appears in</h3>

        <ul role="list" class="divide-y divide-gray-200">
            @foreach($character->movies()->get() as $movie)
                <a href="{{ route('movies.show', $movie) }}" class="block">
                    <li class="py-4 flex">
                        <p class="text-sm font-medium text-gray-900">{{ $movie->name }}</p>
                    </li>
                </a>
            @endforeach
        </ul>
    </form>

    <form method="POST" action="{{ route('characters.destroy', $character) }}" id="delete-character">
        @csrf
        @method('DELETE')
    </form>
@endsection

@section('footer')
    <!--script>
        // Set default FilePond options
        FilePond.setOptions({
            server: {
                url: "{{ config('filepond.server.url') }}",
                headers: {
                    'X-CSRF-TOKEN': "{{ @csrf_token() }}",
                }
            }
        });

        // Create the FilePond instance
        FilePond.create(document.querySelector('input[name="avatar"]'));
    </script-->
@endsection
