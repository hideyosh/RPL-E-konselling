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
          <form action="{{ route('guru.laporan.update', $laporan->id) }}" class="grid grid-cols-1 md:grid-cols-2 md:grid-rows-3 gap-7" method="POST">
            @csrf
            @method('PATCH')
            <div class="">
                <label class="block text-sm font-medium mb-2 dark:text-white">Siswa</label>
                <input id="topik_masalah" readonly type="text" readonly class="py-2.5 px-4 w-full rounded-lg border border-gray-200 text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400" placeholder="{{ $laporan->konseling->siswa->nama }}">
            </div>
            <div class="row-span-3">
                <label class="block text-sm font-medium mb-2 dark:text-white">Ringkasan Konseling</label>
                <textarea name="ringkasan" rows="11" class="py-2 px-4 w-full border border-gray-300 rounded-lg text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">{{ old('ringkasan', $laporan->ringkasan) }}</textarea>
            </div>
            <div class="">
                <label class="block text-sm font-medium mb-2 dark:text-white">Tanggal Konseling</label>
                <input id="topik_masalah" type="text" readonly class="py-2.5 px-4 w-full rounded-lg border border-gray-200 text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400" placeholder="{{ $laporan->konseling->janji_temu }}">
            </div>
            <input type="hidden" name="konseling_id" value="{{ $laporan->konseling->id }}">
            <div class="">
                <label class="block text-sm font-medium mb-2 dark:text-white">Topik Masalah</label>
                <input id="topik_masalah" type="text" readonly class="py-2.5 px-4 w-full rounded-lg border border-gray-200 text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400" placeholder="{{ $laporan->konseling->topik_masalah }}">
            </div>
            <div class=" col-span-2">
                <label class="block text-sm font-medium mb-2 dark:text-white">Catatan Guru</label>
                <textarea name="catatan_guru" rows="3" class="py-2 px-4 w-full border border-gray-300 rounded-lg text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">{{ old('catatan_guru', $laporan->catatan_guru) }}</textarea>
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
