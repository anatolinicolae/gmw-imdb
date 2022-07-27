@extends('layout')

@section('content')
    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
        @foreach($characters as $character)
            <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
                <div class="flex-1 flex flex-col p-8">
                    @if(isset($character->picture))
                        <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full"
                             src="{{ asset($character->picture) }}"
                             alt="Profile picture">
                    @endif
                    <h3 class="mt-6 text-gray-900 text-sm font-medium">{{ $character->name }}</h3>
                    <dl class="mt-1 flex-grow flex flex-col justify-between">
                        @if(isset($character->height))
                            <dt class="sr-only">Height: {{ $character->height }}</dt>
                        @endif
                        @if(isset($character->mass))
                            <dd class="text-gray-500 text-sm">Mass: {{ $character->mass }}</dd>
                        @endif
                            @if(isset($character->gender))
                                <dt class="sr-only">Gender: {{ ucfirst($character->gender) }}</dt>
                            @endif
                            <dd class="mt-3">
                                <span
                                    class="px-2 py-1 text-green-800 text-xs font-medium bg-green-100 rounded-full">Movies: {{ count($character->movies()->get()) }}</span>
                            </dd>
                    </dl>
                </div>
                <div>
                    <div class="-mt-px flex divide-x divide-gray-200">
                        <form method="POST" class="w-0 flex-1 flex" action="{{ route('characters.destroy', $character) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                <span class="ml-3">Delete</span>
                            </button>
                        </form>
                        <div class="-ml-px w-0 flex-1 flex">
                            <a href="{{ route('characters.show', $character) }}"
                               class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                                <span class="ml-3">View</span>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

@endsection

