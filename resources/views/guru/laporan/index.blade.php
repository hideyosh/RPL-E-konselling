@extends('app')
@section('content')
<!-- Card -->
<div class="flex flex-col p-4">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-white border border-gray-200 rounded-xl shadow-2xs overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
          <!-- Header -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
            <div>
              <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                {{ $title }}
              </h2>
            </div>
          </div>
          <!-- End Header -->

          <!-- Table -->
          <div class="flex flex-col bg-white">
            <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="p-3 overflow-hidden dark:border-neutral-700">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    @foreach ($konselings as $konseling)
                    <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">No</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Siswa</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Janji Temu</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Topik Masalah</th>
                        <th scope="col" class="px-6 py-3 {{ $konseling->hasilKonseling ? 'text-start' : 'text-end' }} text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Info Laporan</th>
                        @if ($konseling->hasilKonseling)
                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $konselings->firstItem() + $loop->index }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200w">{{ $konseling->siswa->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200w">{{ $konseling->janji_temu }}</td>
                        <td class="capitalize px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200w">{{ $konseling->topik_masalah }}</td>
                        <td class="px-6 py-4 {{ $konseling->hasilKonseling ? 'text-start' : 'text-end' }} whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200w">
                            @if($konseling->hasilKonseling)
                            <a href="#"  class="py-2 px-3 gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                Laporan
                            </a>
                            {{-- <form action="" method="GET">
                                <button class="py-2 px-3 gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Laporan
                                </button>
                            </form> --}}
                            @else
                                <a href="{{ route('guru.laporan.create', $konseling->id) }}" class="py-2 px-3 gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Buat Laporan Konseling
                                </a>
                            @endif
                        </td>

                        @if($konseling->hasilKonseling)
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex justify-end">
                                <a href="{{ route('guru.laporan.edit', $konseling->hasilKonseling) }}" class="inline-block mx-2 py-1 px-2 bg-yellow-400 border-2 border-yellow-400 rounded hover:bg-yellow-600 hover:border-yellow-600 hover:py-1 hover:px-2">
                                      <i class="bi bi-pencil-fill text-white text-lg"></i>
                                </a>
                                <form action="{{ route('guru.laporan.delete', $konseling->hasilKonseling) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button href="{{ route('logout')}}"  onclick="return confirm('Apakah anda yakin akan menghapus laporan ini?')" class="inline-block py-1 px-2 bg-red-600 border-2 border-red-600 rounded hover:bg-red-800 hover:border-red-800 hover:py-1 hover:px-2">
                                    <i class="bi bi-trash-fill text-white text-lg"></i>
                                </button>
                            </form>
                            </div>
                        </td>
                        @endif
                    </tr>
                    </tbody>
                    @endforeach
                </table>
                <div class="py-1 px-4">
                    <nav class="flex items-center justify-center space-x-1" aria-label="Pagination">
                    <button type="button" class="p-2.5 min-w-10 inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button type="button" class="min-w-10 flex justify-center items-center text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:focus:bg-neutral-700 dark:hover:bg-neutral-700" aria-current="page">1</button>
                    <button type="button" class="min-w-10 flex justify-center items-center text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:focus:bg-neutral-700 dark:hover:bg-neutral-700">2</button>
                    <button type="button" class="min-w-10 flex justify-center items-center text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:focus:bg-neutral-700 dark:hover:bg-neutral-700">3</button>
                    <button type="button" class="p-2.5 min-w-10 inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-label="Next">
                        <span class="sr-only">Next</span>
                        <span aria-hidden="true">»</span>
                    </button>
                    </nav>
                </div>
                </div>
            </div>
            </div>
          </div>
          <!-- End Table -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Card -->
  @endsection
