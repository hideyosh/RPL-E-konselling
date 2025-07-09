@extends('app')
@section('content')

@if(Auth::user()->role === 'admin')
<div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-4 sm:gap-6">
      <!-- Card -->
        <div class="flex items-center gap-5 bg-indigo-400 border border-gray-200 shadow-sm rounded-xl p-4 w-full">
          <div class="flex-shrink-0 ml-4">
            <i class="fa-solid fa-user text-2xl text-white text-shadow-lg"></i>
          </div>

          <div>
            <p class="text-sm font-semibold text-white text-shadow-lg">Guru</p>
            <h3 class="text-xl font-bold text-white text-shadow-lg">{{$gurus}}</h3>
          </div>
        </div>
      <!-- End Card -->

        <div class="flex items-center gap-5 bg-yellow-400 border border-gray-200 shadow-sm rounded-xl p-4 w-full">
          <div class="flex-shrink-0 ml-4">
            <i class="fa-solid fa-user text-2xl text-white text-shadow-lg"></i>
          </div>

          <div>
            <p class="text-sm font-semibold text-white text-shadow-lg">Siswa</p>
            <h3 class="text-xl font-bold text-white text-shadow-lg">{{$siswas}}</h3>
          </div>
        </div>
      <!-- End Card -->
    </div>
    <!-- End Grid -->

    <!-- Table -->
    <div class="flex flex-col bg-white">
        <div class="-m-1.5 overflow-x-auto">
          <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="p-3 border border-gray-200 rounded-lg overflow-hidden dark:border-neutral-700">
              <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                <thead>
                  <tr>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">No</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Email</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Role</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                  @foreach ($users as $user)
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $users->firstItem() + $loop->index }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $user->email }}</td>
                    <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $user->role }}</td>
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
@elseif(Auth::user()->role === 'guru')
<div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
    <div class="w-7/12">
         <img src="{{ asset('img/dashboard-guru.png') }}" alt="">
    </div>
</div>
@else
<div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
    <div class="w-7/12">
         <img src="{{ asset('img/dashboard-siswa.png') }}" alt="">
    </div>

</div>
@endif


@endsection
