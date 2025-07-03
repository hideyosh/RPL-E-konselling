@extends('app')
@section('content')
<!-- Card -->
<div class="flex flex-col p-4">
  <div class="overflow-x-auto rounded-xl">
    <div class="min-w-full">
      <div class="bg-white border border-gray-200 rounded-xl shadow-md dark:bg-neutral-800 dark:border-neutral-700">

        <!-- Header -->
        <div class="px-6 py-4 flex justify-between items-center border-b border-gray-200 dark:border-neutral-700">
          <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
            {{ $title }}
          </h2>
        </div>
        <!-- End Header -->

        <div class="p-6">
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
          <form action="{{ route('guru.datadiri.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            @method('PATCH')
            <div>
              <label class="block text-sm font-medium mb-2 dark:text-white">Nama Lengkap</label>
              <input type="text" name="nama" class="py-2.5 px-4 w-full rounded-lg border border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400" placeholder="Isi nama lengkap anda">
            </div>

            <div>
              <label class="block text-sm font-medium mb-2 dark:text-white">NIP</label>
              <input type="text" name="nip" class="py-2.5 px-4 w-full rounded-lg border border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400" placeholder="Nomor Induk Pegawai ">
            </div>

            <div>
              <label class="block text-sm font-medium mb-2 dark:text-white">Nomor Telepon</label>
              <input type="text" name="telpon" class="py-2.5 px-4 w-full rounded-lg border border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400" placeholder="Isi nomor lengkap">
            </div>

            <div>
              <label class="block text-sm font-medium mb-2 dark:text-white">Jenis Kelamin</label>
              <select name="jenis_kelamin" class="py-2.5 px-4 w-full rounded-lg border border-gray-200 text-sm text-gray-500 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                <option hidden>Pilih Jenis Kelamin</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
            </div>

            <div class="md:col-span-2 flex justify-end">
              <button type="submit" class="py-2.5 px-12 text-sm font-medium rounded-2xl bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Submit
              </button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
