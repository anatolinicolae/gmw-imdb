@extends('layout')

@section('content')
    <div class="space-y-8 divide-y divide-gray-200">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $movie->name }}</h3>

                <ul role="list" class="divide-y divide-gray-200">
                    @foreach($movie->characters()->get() as $character)
                        <a href="{{ route('characters.show', $character) }}" class="block">
                            <li class="py-4 flex">
                                @if(isset($character->picture))
                                    <img class="h-10 w-10 rounded-full"
                                         src="{{ asset($character->picture) }}"
                                         alt="{{ $character->name }}">
                                @else
                                    <svg class="h-10 w-10 rounded-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                @endif
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $character->name }}</p>
                                    <p class="text-sm text-gray-500">{{ ucfirst($character->gender) }}</p>
                                </div>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

