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
            <div class="flex gap-3">
               <form method="GET" action="{{ route('siswa.konseling.index') }}"
                    <div class="hs-dropdown relative inline-flex">
                        <button id="hs-dropdown-with-icons" type="button" class="hs-dropdown-toggle py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            Status
                            <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                        </button>

                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 divide-y divide-gray-200 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-with-icons">
                            <div class="p-1 space-y-0.5">
                                <div class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800">
                                    <input type="checkbox" name="status[]" value="menunggu" {{ in_array('menunggu', request()->get('status', [])) ? 'checked' : '' }} onchange="this.form.submit()" class="shrink-0 mt-0.5 border-gray-200 rounded-sm text-blue-600 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="checkbox_belum">
                                    <label for="hs-default-checkbox" class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Menunggu</label>
                                </div>
                                <div class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800">
                                    <input type="checkbox" name="status[]" value="dikonfirmasi" {{ in_array('dikonfirmasi', request()->get('status', [])) ? 'checked' : '' }} onchange="this.form.submit()" class="shrink-0 mt-0.5 border-gray-200 rounded-sm text-blue-600 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="checkbox_belum">
                                    <label for="hs-default-checkbox" class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Dikonfirmasi</label>
                                </div>
                                <div class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800">
                                    <input type="checkbox" name="status[]" value="dijadwalkan ulang" {{ in_array('dijadwalkan ulang', request()->get('status', [])) ? 'checked' : '' }} onchange="this.form.submit()" class="shrink-0 mt-0.5 border-gray-200 rounded-sm text-blue-600 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-checked-checkbox">
                                    <label for="hs-checked-checkbox" class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Dijadwalkan Ulang</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                  <div x-data="{ open : false }">
                <!-- Tombol -->
                <div class="inline-flex gap-x-2">
                  <button @click="open = true" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path d="M5 12h14" />
                      <path d="M12 5v14" />
                    </svg>
                    Buat Janji Temu
                  </button>
                </div>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Popup -->
                <div x-show="open" x-transition
                class="fixed inset-0 flex items-center justify-center z-50" style="background-color: #8080804d; display: none">
                    <div class="bg-white p-8 rounded shadow-lg w-96">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-bold">Tambah Janji Temu</h2>
                             <!-- Tombol X -->
                            <button @click="open = false" class="block top-3 right-3 text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <form action="{{ route('siswa.konseling.store') }}" method="POST">
                            @csrf
                            <div class="mt-5 mb-5">
                                <label for="guru" class="block text-base font-medium mb-2 dark:text-white">Guru</label>
                                <select name="guru_id" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                <option selected="">Pilih guru penerima</option>
                                    @foreach ($gurus as $guru)
                                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-5 mb-5">
                               <label for="janji_temu" class="block text-sm font-medium mb-2 dark:text-white">Tanggal Konseling</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                    <input type="text" name="janji_temu" class="datePicker py-2.5 sm:py-3 pe-10 px-4 block w-full border-gray-300 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Pilih Tanggal">
                                </div>
                            </div>
                            <div>
                               <label for="topik_masalah" class="block text-sm font-medium mb-2 dark:text-white">Topik Masalah</label>
                               <div class="max-w-sm space-y-3">
                                    <textarea id="topik_masalah" name="topik_masalah" class="py-2 px-3 sm:py-3 sm:px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3" placeholder="Isi Topik Masalah"></textarea>
                               </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="py-2 px-6 mt-5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- End Popup -->
              </div>
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
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Guru</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Janji Temu</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Topik Masalah</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Status</th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                    @foreach ($konselings as $konseling)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $konselings->firstItem() + $loop->index }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200 hover:underline">{{ $konseling->guru->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200 hover:underline">{{ $konseling->janji_temu }}</td>
                        <td class="capitalize px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200 hover:underline">{{ $konseling->topik_masalah }}</td>
                        <td class="capitalize px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200 hover:underline">{{ $konseling->status }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex justify-end">
                               <!-- Tombol -->
                                <div x-data="{ open : false, editKonseling: {} }">
                                    <button @click="open = true; editKonseling = {{ json_encode($konseling) }}" class="inline-block p-2" >
                                        <i class="bi bi-pencil-fill text-blue-600 text-lg"></i>
                                    </button>

                                    <!-- Popup -->
                                    <div x-show="open" x-transition
                                        class="fixed inset-0 flex items-center justify-center z-50"
                                        style="background-color: rgba(128, 128, 128, 0.3); display: none">
                                        <div class="bg-white p-8 rounded shadow-lg w-96">
                                            <div class="flex justify-between items-center">
                                                <h2 class="text-xl font-bold">Edit User</h2>
                                                <!-- Tombol X -->
                                                <button @click="open = false" class="text-gray-500 hover:text-gray-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>

                                            <!-- Form -->
                                             <form :action="`/siswa/konseling/${editKonseling.id}`" method="POST">
                                                @csrf
                                                @method('PUT')
                                                 <div class="mt-5 mb-5">
                                                    <label for="guru" class="block text-base font-medium mb-2 dark:text-white">Guru</label>
                                                    <select name="guru_id" x-model="editKonseling.guru_id" class="capitalize font-normal py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                                        @foreach ($gurus as $guru)
                                                            <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mt-5 mb-5">
                                                <label for="janji_temu" class="block text-sm font-medium mb-2 dark:text-white">Tanggal Konseling</label>
                                                    <div class="relative">
                                                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                                            <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                                                <circle cx="12" cy="7" r="4"></circle>
                                                            </svg>
                                                        </div>
                                                        <input type="text" name="janji_temu" x-model="editKonseling.janji_temu" class="datePicker py-2.5 sm:py-3 pe-10 px-4 block w-full border-gray-300 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Pilih Tanggal">
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="topik_masalah" class="block text-sm font-medium mb-2 dark:text-white">Topik Masalah</label>
                                                    <div class="max-w-sm space-y-3">
                                                            <textarea id="topik_masalah" name="topik_masalah" x-model="editKonseling.topik_masalah" class="py-2 px-3 sm:py-3 sm:px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3" placeholder="Isi Topik Masalah"></textarea>
                                                    </div>
                                                </div>
                                                <div class="flex justify-end">
                                                    <button type="submit" class="py-2 px-6 mt-5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                                        Submit
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('siswa.konseling.destroy', $konseling->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button href="{{ route('logout')}}"  onclick="return confirm('Apakah anda yakin akan menghapus janji konseling ini?')" class="inline-block p-2">
                                        <i class="bi bi-trash-fill text-red-600 text-lg"></i>
                                    </button>
                                </form>
                            </div>
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
