@extends('base.index')

@section('content')
  <div class="container mt-6 px-4 mx-auto">
    <h1 class="text-xl font-semibold">Movie Information</h1>
    @isset($movieData)
      <h1 class="text-5xl font-bold">{{ $movieData->movie_title }}</h1>
      <p class="text-2xl font-semibold mt-2">Release Date: <span class="font-normal">
          @if ($movieData->release_date)
            {{ $movieData->release_date->format('D, M d Y') }}
          @else
            Release Date: Not Available
          @endif
        </span></p>
      <p class="text-2xl font-semibold mt-2">Duration: <span class="font-normal">{{ $movieData->duration }} Minutes</span></p>
    @endisset

    <div class="container justify-center items-center mt-8   mx-auto px-4">
      <h1 class="text-xl font-semibold">Add Ticket</h1>
      <form action="{{ route('ticket.store') }}" method="POST">

        <input type="hidden" name="movie_id" value="{{ $movieData->id }}">

        @csrf
        <label class="form-control w-full max-w-xs">
          <div class="label">
            <span class="label-text text-lg font-semibold">Customer Name</span>
          </div>
          <div class="bg-white rounded-lg">
            <div class="relative bg-inherit">
              <input required type="text" name="customer_name"
                     class="text-black peer bg-transparent h-10 w-72 rounded-lg  placeholder-transparent ring-2 px-2 ring-gray-500"
                     placeholder="Type inside me" />

            </div>
          </div>

          <div class="label mt-2">
            <span class="label-text text-lg font-semibold">Seat</span>
          </div>
          <div class="bg-white rounded-lg">
            <div class="relative bg-inherit">
              <input required type="text" name="seat_number"
                     class="peer bg-transparent h-10 w-72 rounded-lg text-black placeholder-transparent ring-2 px-2 ring-gray-500"
                     placeholder="Type inside me" />

            </div>
          </div>

        </label>
        <button class="mt-2 middle none center rounded-lg bg-blue-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                data-ripple-light="true"> Order </button>
                <a href="{{route('movies/index')}}"
                class="middle none center rounded-lg bg-amber-400 py-3 px-6 font-sans text-xs font-bold uppercase text-black">Back</a>
      </form>
    </div>
  </div>
@endsection
