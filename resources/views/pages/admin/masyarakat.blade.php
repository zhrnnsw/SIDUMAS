@extends('layouts.admin')

@section('title')
Data Masyarakat
@endsection

@section('content')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Data Masyarakat
    </h2>

    <form class="form-left my-2" method="get" action="{{ route('search') }}">
            <div class="form-group w-70 mb-3">
                <input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="Masukkan Username">
                <button type="submit" class="btn btn-primary mb-1" style="background: #e42424;">Cari</button>
            </div>
        </form>

    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }} </li>
            @endforeach
          </ul>
        </div>
        @endif
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Nama</th>
              <th class="px-4 py-3">Username</th>
              <th class="px-4 py-3">NIK</th>
              <th class="px-4 py-3">No. Hp</th>
              <th class="px-4 py-3">Email</th>
              <th class="px-4 py-3">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @forelse ($data as $masyarakat)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3 text-sm">
                {{ $masyarakat->name }}
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $masyarakat->username }}
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $masyarakat->nik }}
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $masyarakat->phone }}
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $masyarakat->email }}
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                  <button style="background: #e42424; height: 30px; border-radius: 5px; padding: 5px; padding-bottom:10px">
                    <a href ="{{ route('user.edit', $masyarakat->id)}} "
                    class="flex items-center justify-between  text-sm font-medium leading-5 text-white rounded-lg  focus:outline-none "
                    aria-label="Detail">
                    Edit
                    </a>
                  </button>
                  
                  <form action="{{ route('user.destroy', $masyarakat->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="flex items-center justify-between  text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete" onclick="return confirm('Are you sure you want to delete {{$masyarakat->username}}?')">
                      <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                          clip-rule="evenodd"></path>
                      </svg>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            
            @empty
            <tr>
              <td colspan="7" class="text-center text-gray-400">
                Data Kosong
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
        {!! $data->withQueryString()->links('pagination::bootstrap-5') !!}
      </div>

    </div>

  </div>
  
</main>
@endsection