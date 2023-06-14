@extends('layouts.admin')

@section('title')
Tanggapan
@endsection

@section('content')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl text-center font-semibold text-gray-700 dark:text-gray-200">
      Ubah Status
    </h2>
    <form action="{{ route('pengaduan.update',$pengaduan->id)}} " method="POST" enctype="multipart/form-data">
    @method('PUT')
      @csrf
      
      <input type="hidden" name="pengaduan" value="{{ $pengaduan->id }} ">
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
          <h2>Nama : {{ $user->name }}</h2>
          <h2 class="mt-4">NIK : {{ $user->nik }}</h2>
          <h2 class="mt-4">No Telepon : {{ $user->phone }}</h2>
          <h2 class="mt-4">Tanggal : {{ $pengaduan->created_at->format('l, d F Y - H:i:s') }}</h2>
          <h2 class="mt-4">Tingkat Keparahan : {{ $pengaduan->tingkatan->keterangan }}</h2>
        </label>
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
        
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Status</span>

          <select
            class="block w-full text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
            name="status" value="{{ $pengaduan->status }}">
            <option value="Belum di Proses" {{ $pengaduan->status == 'Belum di Proses' ? 'selected' : '' }}>Belum di Proses</option>
            <option value="Sedang di Proses" {{ $pengaduan->status == 'Sedang di Proses' ? 'selected' : '' }}>Sedang di Proses</option>
            <option value="Selesai" {{ $pengaduan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>

          </select>
        </label>
        
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Ditindaklanjuti oleh</span>

          <select
            class="block w-full text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
            name="bidang_id">
            <option value="" {{ $pengaduan->bidang_id == null ? 'selected' : '' }}>-</option>
            <option value="1" {{ $pengaduan->bidang_id == 1 ? 'selected' : '' }}>Bidang Bina Marga</option>
            <option value="2"{{ $pengaduan->bidang_id == 2 ? 'selected' : '' }}>Bidang Cipta Karya</option>
            

          </select>
        </label>


        <button type="submit"
          class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
          Simpan
        </button>
      </div>
    </form>
  </div>
</main>
@endsection