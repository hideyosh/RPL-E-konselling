@extends('app')
@section('content')
<div class="flex flex-col p-4">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-white border border-gray-200 rounded-xl shadow-2xs overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
          <!-- Header -->
          <div class="px-6 py-4 grid gap-3 md:flex  md:items-center border-b border-gray-200 dark:border-neutral-700">
            <div>
                <a href="{{ route('guru.pengaduan.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                    </svg>
                </a>
            </div>
            <div>
              <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                {{ $title }}
              </h2>
            </div>
          </div>
          <!-- End Header -->
          <div class="p-6">
          <form>
            <div>
              <label class="block text-sm font-medium mb-2 dark:text-white">Nama Siswa</label>
              <input disabled type="text" name="nama" class="capitalize py-2.5 px-4 w-full rounded-lg border border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400" placeholder="{{ $pengaduan->siswa->nama }}">
            </div>

            <div class="mt-6 pb-5">
                <label for="about" class="block text-sm/6 font-medium text-gray-900">Isi Pengaduan</label>
                <div class="mt-2">
                    <textarea disabled name="about" id="about" rows="3" class="capitalize block w-full rounded-md bg-white px-4 py-2.5 text-sm outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="{{ $pengaduan->isi_pengaduan }}"></textarea>
                </div>
            </div>
          </form>
        </div>

        </div>
      </div>
    </div>
  </div>
  <!-- End Card -->
@endsection
