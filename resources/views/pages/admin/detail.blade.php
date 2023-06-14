@extends('layouts.user')

@section('title')
Dashboard
@endsection

@section('content')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
      Detail Pengaduan
    </h2>


    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        
        <div
          class="text-gray-800 text-sm font-semibold px-4 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400 ">

          <h2>Nama : {{ $user->name }}</h2>
          <h2 class="mt-4">NIK : {{ $user->nik }}</h2>
          <h2 class="mt-4">No Telepon : {{ $user->phone }}</h2>
          <h2 class="mt-4">Tanggal : {{ $pengaduan->created_at->format('l, d F Y - H:i:s') }}</h2>
          <h2 class="mt-4">Tingkat Keparahan : {{ $pengaduan->tingkatan->keterangan }}</h2>
          <h2 class="mt-4">Status :
            @if($pengaduan->status =='Belum di Proses')
            <span
                  class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700">
                  {{ $pengaduan->status }}
            </span>
            @elseif ($pengaduan->status =='Sedang di Proses')
            <span
                  class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600">
                  {{ $pengaduan->status }}
            </span>
            @else
            <span
                  class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100">
                  {{ $pengaduan->status }}
                </span>
            @endif
          </h2>
          @if ($pengaduan->status !='Belum di Proses')
          <h2 class="mt-4">Ditindaklanjuti oleh : {{ $pengaduan->bidang->nama_bidang }}</h2>
          @endif
        </div>

        <div class="px-4 py-3 mb-8 flex text-gray-800 bg-white rounded-lg shadow-md dark:bg-gray-800">
          <div class="relative hidden mr-3  md:block ">
            <h1 class="text-center mb-8 font-semibold">Foto</h1>
            <img class=" h-32 w-35 " src="{{ Storage::url($pengaduan->image) }}" alt="" loading="lazy" />
          </div>
          <div class="text-center flex-1 dark:text-gray-400">
            <h1 class="mb-8 font-semibold">Keterangan</h1>
            <p class="text-gray-800 dark:text-gray-400">
              {{ $pengaduan->description}}
            </p>
          </div>
        </div>
        </div>
      <div class="flex justify-center my-4">
        <a href="{{ url('admin/pengaduan/cetak', $pengaduan->id)}}"
          class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
          Export ke PDF
        </a>
      </div>
      <div class="flex justify-center my-6">
        <a href="{{ route('pengaduan.edit', $pengaduan->id)}}"
          class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
          Ubah Status
        </a>
      </div>
      </div>
    </div>

</main>
@endsection
