@extends('layout')

@section('content')
    <form class="space-y-8 divide-y divide-gray-200"
          method="POST"
          enctype="multipart/form-data"
          action="{{ route('characters.update', $character) }}">
        @csrf
        @method('PATCH')

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
                                   class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="mass" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Mass </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="number" name="mass" id="mass" autocomplete="mass"
                                   value="{{ $character->mass }}"
                                   class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="height" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Height </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="number" name="height" id="height" autocomplete="height"
                                   value="{{ $character->height }}"
                                   class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="gender" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Gender </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select id="gender" name="gender" autocomplete="gender"
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
                                <div class="flex items-center">
                                    <img class="w-32 h-32 flex-shrink-0 rounded-full uploaded-picture"
                                         src="{{ asset($character->picture) }}"
                                         alt="Profile picture">
                                    <div class="text-left">
                                        <input type="file" name="picture" />
                                        <input type="hidden" name="delete_old_picture" value="no" />
                                        <button type="button"
                                                onclick="resetImage()"
                                                class="mt-4 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 reset-picture">
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            @else
                                <input type="file" name="picture" />
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
                <button type="button"
                        onclick="history.go(-1)"
                        class="ml-3 bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </button>
                <button type="submit"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </div>
    </form>

    <form method="POST" action="{{ route('characters.destroy', $character) }}" id="delete-character">
        @csrf
        @method('DELETE')
    </form>
@endsection

@section('footer')
    <script>
        /*
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
        FilePond.create(document.querySelector('input[name="avatar"]')); */

        function resetImage() {
            document.getElementsByName('picture').value = '';
            document.getElementsByName('delete_old_picture').value = 'yes';
            document.querySelector('.uploaded-picture').remove();
            document.querySelector('.reset-picture').remove();
        }
    </script>
@endsection
