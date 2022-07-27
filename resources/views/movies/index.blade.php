@extends('layout')

@section('content')
    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
        @foreach($movies as $movie)
            <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
                <div class="flex-1 flex flex-col p-8">
                    <h3 class="mt-6 text-gray-900 text-sm font-medium">{{ $movie->name }}</h3>
                </div>
                <div>
                    <div class="-mt-px flex">
                        <div class="-ml-px w-0 flex-1 flex">
                            <a href="{{ route('movies.show', $movie) }}"
                               class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
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

