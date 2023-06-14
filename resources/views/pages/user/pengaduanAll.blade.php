@extends('layouts.user')

@section('title')
Data Pengaduan
@endsection
@section('content')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Data Pengaduan
    </h2>

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
              <th class="px-4 py-3">Foto</th>
              <th class="px-4 py-3">Tanggal</th>
              <th class="px-4 py-3">Tingkat Keparahan</th>
              <th class="px-4 py-3">Status</th>
              <th class="px-4 py-3">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @forelse ($pengaduan as $pengaduans)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex pengaduans-center text-sm">
                  <!-- Avatar with inset shadow -->
                  <div class="relative hidden mr-3  md:block">
                    <img class=" h-32 w-35 " src="{{ Storage::url($pengaduans->image) }}" alt="" loading="lazy" />
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $pengaduans->created_at->format('l, d F Y - H:i:s') }}
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $pengaduans->tingkatan->keterangan }}
              </td>
              @if($pengaduans->status =='Belum di Proses')
              <td class="px-4 py-3 text-xs">
                <span
                  class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700">
                  {{ $pengaduans->status }}
                </span>
              </td>
              @elseif ($pengaduans->status =='Sedang di Proses')
              <td class="px-4 py-3 text-xs">
                <span
                  class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600">
                  {{ $pengaduans->status }}
                </span>
              </td>
              @else
              <td class="px-4 py-3 text-xs">
                <span
                  class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100">
                  {{ $pengaduans->status }}
                </span>
              </td>

              @endif
              <td>
                <button style="background: #18762e; height: 30px; border-radius: 5px; padding: 5px; padding-bottom:10px">
                  <a href="{{ route('pengaduans.show', $pengaduans->id)}} "
                    class="flex pengaduans-center justify-between  text-sm font-medium leading-5 text-white rounded-lg dark:text-white-400 focus:outline-none focus:shadow-outline-gray"
                    aria-label="Detail">
                    Lihat
                    
                  </a>

                </button>
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
      </div>
    </div>

  </div>
</main>
@endsection
