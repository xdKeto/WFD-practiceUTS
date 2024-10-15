@extends('base.index')

@section('content')

  

  <div class="container mt-6 px-4 mx-auto text-3xl font-bold">
    Tickets
  </div>

  @if (session('success'))
    <div class="bg-green-100 text-green-800 border border-green-400 px-4 py-3 rounded relative" role="alert">
      <span class="block sm:inline">{{ session('success') }}</span>
    </div>
  @endif

  @if ($errors->any())
    <div class="bg-red-100 text-red-800 border border-red-400 px-4 py-3 rounded relative" role="alert">
      @foreach ($errors->all() as $error)
        <span class="block sm:inline">{{ $error }}</span>
      @endforeach
    </div>
  @endif

  <div class="container mt-4 px-4 mx-auto">
    <table class="border border-black table-auto border-collapse text-left text-sm text-gray-800">
      <thead class="bg-green-600 text-white">
        <tr>
          <th class="px-4 py-2 border-b">ID</th>
          <th class="px-4 py-2 border-b">Movie Title</th>
          <th class="px-4 py-2 border-b">Customer Name</th>
          <th class="px-4 py-2 border-b">Seat Number</th>
          <td class="px-4 py-2 border-b">Checked In</td>
          <td class="px-4 py-2 border-b">Checked In Time</td>
          <td class="px-4 py-2 border-b">Check</td>
          <td class="px-4 py-2 border-b">Delete</td>

        </tr>
      </thead>
      <tbody>
        @foreach ($tickets as $ticket)
          <tr class="hover:bg-green-100 clickable-row">

            <td class="px-4 py-6 border-b">{{ $ticket['id'] }}</td>
            <td class="px-4 py-6 border-b">{{ $movie->movie_title }}</td>
            <td class="px-4 py-6 border-b">{{ $ticket['customer_name'] }}</td>
            <td class="px-4 py-6 border-b">{{ $ticket['seat_number'] }}</td>
            <td class="px-4 py-6 border-b">{{ $ticket['is_checked_in'] }}</td>
            <td class="px-4 py-6 border-b">{{ $ticket['check_in_time'] }}</td>
            <td class="px-4 py-6 border-b">
              @if ($ticket['is_checked_in'] == 0)
                <form action="{{ route('ticket.update', $ticket['id']) }}" data-value="{{ $ticket['id'] }}"
                      method="POST">
                  @csrf
                  @method('PUT')
                  <button type="submit" class="p-2 ps-4 pe-4 bg-green-100 border border-black font-bold">Check
                    In</button>
                </form>
              @endif
            </td>

            <td class="px-4 py-6 border-b">
              @if ($ticket['is_checked_in'] == 0)
                <form action="{{ route('ticket.destroy', $ticket['id']) }}" data-value="{{ $ticket['id'] }}"
                      method="POST" onsubmit="return confirm('you sure?');">

                  @csrf
                  @method('DELETE')
                  <button type="submit" class="p-2 ps-4 pe-4 bg-green-100 border border-black font-bold">Delete</button>
                </form>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
