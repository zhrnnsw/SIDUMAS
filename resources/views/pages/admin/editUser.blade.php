@extends('layouts.admin')

@section('title')
Edit User
@endsection

@section('content')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl text-center font-semibold text-gray-700 dark:text-gray-200">
      Edit User
    </h2>
    <form action="{{ route('user.update',$user->id)}} " method="POST" enctype="multipart/form-data">
    @method('PUT')
      @csrf
      
      <input type="hidden" name="user" value="{{ $user->id }} ">
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
          <h2 class="mt-4">NIK : {{ $user->nik }}</h2>
          <h2 class="mt-4">Username : {{ $user->username }}</h2>
          <h2 class="mt-4">Nama : {{ $user->name }}</h2>
          <h2 class="mt-4">Email : {{ $user->email }}</h2>
          <h2 class="mt-4">No Telepon : {{ $user->phone }}</h2>
        </label>
        
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Roles</span>

          <select
            class="block w-full text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
            name="roles" value="{{ $user->roles }}">
            <option value="0" {{ $user->roles == 0 ? 'selected' : '' }}>User</option>
            <option value="1" {{ $user->roles == 1 ? 'selected' : '' }}>Admin</option>
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