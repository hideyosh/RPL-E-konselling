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
        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="{{ route('pengaduan.create') }}">
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14" />
            <path d="M12 5v14" />
          </svg>
          Tambah Pengaduan
        </a>
      </div>
    </div>
</div>
<div class="flex flex-col overflow-hidden">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="overflow-hidden">
          <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
            <thead>
              <tr>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">No</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Pengaduan</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Guru</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Status</th>
                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
              @foreach ($pengaduans as $pengaduan)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{  Str::limit($pengaduan->isi_pengaduan, 50) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $pengaduan->guru->nama }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $pengaduan->status }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                        <a href="#" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Show</a>
                        <a href="{{ route('pengaduan.edit', $pengaduan->id) }}" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Edit</a>
                        <form action="{{ route('pengaduan.destroy', $pengaduan->id) }}" method="POST" class="nline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Apakah anda yakin akan menghapus pengaduan ini?')"
                            class="text-sm text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection
