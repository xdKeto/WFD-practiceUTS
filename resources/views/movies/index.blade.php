@extends('base.index')

@section('content')
  <div class="container mt-6 px-4 mx-auto text-3xl font-bold">
    Movies Playing
  </div>

  <div class="container mt-4 px-4 mx-auto">
    <div class="grid grid-cols-3 gap-4">
      @foreach ($movieData as $movie)
        <div class="relative flex flex-col mt-6 bg-white shadow-sm border border-slate-500 rounded-lg w-96">
          <figure>
            <img class="w-full" src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                 alt="default" />
          </figure>
          <div class="p-4">
            <h5 class="mb-2 text-slate-800 text-xl font-semibold">
              {{ $movie->movie_title }}
            </h5>
            <p class="text-slate-600 font-normal">
              @if ($movie->release_date)
                {{ $movie->release_date->format('D, M d Y') }}
              @else
                Release Date: Not Available
              @endif
            </p>
            <p class="text-slate-600 font-normal">
              Duration: {{ $movie->duration }} Menit
            </p>
          </div>
          <div class="p-6 pt-0 flex justify-evenly ">
            <a href="{{ route('movies/book', $movie->id) }}"
               class="select-none rounded-lg bg-pink-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
               type="button" data-ripple-light="true">
              Order Ticket
            </a>
            <a href="{{ route('movies/view', $movie->id) }}"
               class="select-none rounded-lg bg-pink-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
               type="button" data-ripple-light="true">
              View Ticket
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
