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
                    <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">No</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Janji Temu</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Topik Masalah</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Guru</th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Info Laporan</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                    @foreach ($konselings as $konseling)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $konselings->firstItem() + $loop->index }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200w">{{ $konseling->janji_temu }}</td>
                        <td class="capitalize px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200w">{{ $konseling->topik_masalah }}</td>
                        <td class="capitalize px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200w">{{ $konseling->guru->nama }}</td>
                        <td class="px-6 py-4 flex justify-end whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200w">
                            @foreach ($hasilKonseling as $laporan)
                                @if($hasilKonseling->isNotEmpty())
                                    <div x-data="{ open : false, showLaporan: {} }">
                                        <!--Tombol -->
                                        <button @click="open = true; showLaporan = {{ json_encode($laporan) }}" class="py-2 px-3 gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                            Laporan
                                        </button>
                                        <!-- Popup Overlay -->
                                        <div x-show="open" x-transition
                                            class="fixed inset-0 z-50 flex items-center justify-center bg-black/30"
                                            @click.self="open = false">

                                            <!-- Popup Box -->
                                            <div class="bg-white w-full max-w-md p-6 rounded-xl shadow-lg">
                                                <!-- Header -->
                                                <div class="flex justify-between items-center pb-2 mb-4">
                                                    <h2 class="text-xl font-semibold text-gray-800">Laporan Hasil Konseling</h2>
                                                    <button @click="open = false" class="text-gray-500 hover:text-gray-700">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </button>
                                                </div>

                                                <!-- Content -->
                                                <div class="space-y-3 text-sm text-gray-700">
                                                    <div>
                                                        <span class="font-medium">Topik Masalah:</span><br>
                                                        <span class="capitalize">{{ $laporan->konseling->topik_masalah }}</span>
                                                    </div>

                                                    <div>
                                                        <span class="font-medium">Tanggal Konseling:</span><br>
                                                        {{ $laporan->konseling->janji_temu }}
                                                    </div>

                                                    <div>
                                                        <span class="font-medium">Guru BK:</span><br>
                                                        {{ $laporan->konseling->guru->nama }}
                                                    </div>

                                                    <div>
                                                        <span class="font-medium">Ringkasan:</span><br>
                                                        {{ ucfirst($laporan->ringkasan) }}
                                                    </div>

                                                    <div>
                                                        <span class="font-medium">Catatan Guru:</span><br>
                                                        {{ ucfirst($laporan->catatan_guru) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @else
                                <h1>Laporan tidak ada</h1>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
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
