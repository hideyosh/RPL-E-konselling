@extends('app')
@section('content')
<div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
    <div>
      <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
        {{ $title }}
      </h2>
    </div>
    <div>
      <div class="inline-flex gap-x-2 ">
        <a class="py-2 px-3 hidden items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
          View all
        </a>
      </div>
    </div>
</div>
<div class="p-8">
    <div class="max-w-sm space-y-3">
        <select class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
            <option selected="">Anitri Sulastri</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
          </select>

          <div class="max-w-sm space-y-3">
            <textarea class="py-2 px-3 sm:py-3 sm:px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3" placeholder="Tulis isi pengaduan disini..."></textarea>
          </div>
          <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Edit Pengaduan
          </button>
    </div>
</div>
@endsection
