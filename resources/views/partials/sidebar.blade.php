<!-- Sidebar -->
<div id="hs-application-sidebar" class="hs-overlay  [--auto-close:lg]
hs-overlay-open:translate-x-0
-translate-x-full transition-all duration-300 transform
w-65 h-full
hidden
fixed inset-y-0 start-0 z-60
bg-white border-e border-gray-200
lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
dark:bg-neutral-800 dark:border-neutral-700" role="dialog" tabindex="-1" aria-label="Sidebar">
<div class="relative flex flex-col h-full max-h-full">
  <div class="px-6 pt-4 flex items-center justify-center pb-4">
    <!-- Logo + Title Horizontal -->
    <a href="#" aria-label="Preline" class="flex items-center gap-3">
        <img class="w-12 h-12  object-cover" src="{{ asset('img/logo.jpg') }}" alt="Logo SMKN 46">
        <h1 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-white">
            SMKN 46 - Jakarta Timur
        </h1>
    </a>
    <!-- End Logo + Title -->
  </div>


  <!-- Content -->
  @if(Auth::user()->role == 'admin')
  <div class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
   <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
    <ul class="flex flex-col space-y-1">
        <li>
        <a class="flex items-center gap-x-3.5 py-2 px-2.5 rounded-lg text-sm
                    {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-400 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-neutral-700' }}"
            href="{{ route('admin.dashboard') }}">
            <i class="fa-solid fa-house"></i>
            Dashboard
        </a>
        </li>
        <li class="hs-accordion" id="projects-accordion">
            <button type="button"
                    class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg
                            {{ request()->routeIs('admin.guru.*') || request()->routeIs('admin.siswa.*')
                                ? 'bg-indigo-300 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-neutral-700' }}"
                    aria-expanded="true"
                    aria-controls="projects-accordion-child">
                <i class="fa-solid fa-users-gear"></i>
                User Management
                <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m18 15-6-6-6 6" />
                </svg>
                <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 9 6 6 6-6" />
                </svg>
            </button>
            <div id="projects-accordion-child" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300
                {{ request()->routeIs('admin.guru.*') || request()->routeIs('admin.siswa.*') ? '' : 'hidden' }}" role="region" aria-labelledby="projects-accordion">
                <ul class="ps-8 pt-1 space-y-1">
                <li>
                    <a href="{{ route('admin.guru.index') }}"
                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg
                            {{ request()->routeIs('admin.guru.*') ? 'bg-indigo-400 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-neutral-700' }}">
                    Guru
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.siswa.index') }}"
                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg
                            {{ request()->routeIs('admin.siswa.*') ? 'bg-indigo-400 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-neutral-700' }}">
                    Siswa
                    </a>
                </li>
                </ul>
            </div>
        </li>
    </ul>
   </nav>

  </div>
  @elseif(Auth::user()->role ==  'siswa')
  <div class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
    <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
        <ul class="flex flex-col space-y-1">
            <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 rounded-lg text-sm
                    {{ request()->routeIs('siswa.dashboard') ? 'bg-indigo-400 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-neutral-700' }}" href="{{ route('siswa.dashboard') }}">
                  <i class="fa-solid fa-house"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 rounded-lg text-sm
                    {{ request()->routeIs('siswa.pengaduan.*') ? 'bg-indigo-400 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-neutral-700' }}" href="{{ route('siswa.pengaduan.index') }}">
                    <i class="fa-solid fa-comments"></i>
                    Pengaduan
                </a>
            </li>
           <li class="hs-accordion" id="projects-accordion">
            <button type="button"
                    class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg
                            {{ request()->routeIs('siswa.konseling.*') || request()->routeIs('siswa.laporan.*')
                                ? 'bg-indigo-300 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-neutral-700' }}"
                    aria-expanded="true"
                    aria-controls="projects-accordion-child">
                <i class="fa-solid fa-people-arrows"></i>
                Konseling
                <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m18 15-6-6-6 6" />
                </svg>
                <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 9 6 6 6-6" />
                </svg>
            </button>
            <div id="projects-accordion-child" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300
                {{ request()->routeIs('siswa.konseling.*') || request()->routeIs('siswa.laporan.*') ? '' : 'hidden' }}" role="region" aria-labelledby="projects-accordion">
                <ul class="ps-8 pt-1 space-y-1">
                <li>
                    <a href="{{ route('siswa.konseling.index') }}"
                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg
                            {{ request()->routeIs('siswa.konseling.*') ? 'bg-indigo-400 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-neutral-700' }}">
                    Janji Temu
                    </a>
                </li>
                <li>
                    <a href="{{ route('siswa.laporan.index') }}"
                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg
                            {{ request()->routeIs('siswa.laporan.*') ? 'bg-indigo-400 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-neutral-700' }}">
                    Laporan
                    </a>
                </li>
                </ul>
            </div>
        </li>
        </ul>
    </nav>
  </div>
  @else
  <div class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
    <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
    <ul class="flex flex-col space-y-1">
        <li>
        <a class="flex items-center gap-x-3.5 py-2 px-2.5 rounded-lg text-sm
                    {{ request()->routeIs('guru.dashboard') ? 'bg-indigo-400 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-neutral-700' }}" href="{{ route('guru.dashboard') }}">
            <i class="fa-solid fa-house"></i>
            Dashboard
        </a>
        </li>
        <li>
        <a class="flex items-center gap-x-3.5 py-2 px-2.5 rounded-lg text-sm
                    {{ request()->routeIs('guru.pengaduan.*') ? 'bg-indigo-400 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-neutral-700' }}" href="{{ route('guru.pengaduan.index') }}">
            <i class="fa-solid fa-comments"></i>
            Pengaduan
        </a>
        </li>
        <li class="hs-accordion" id="projects-accordion">
            <button type="button"
                    class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg
                            {{ request()->routeIs('guru.konseling.*') || request()->routeIs('guru.laporan.*')
                                ? 'bg-indigo-400 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-neutral-700' }}"
                    aria-expanded="true"
                    aria-controls="projects-accordion-child">
                <i class="fa-solid fa-people-arrows"></i>
                Konseling
                <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m18 15-6-6-6 6" />
                </svg>
                <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 9 6 6 6-6" />
                </svg>
            </button>
            <div id="projects-accordion-child" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden" role="region" aria-labelledby="projects-accordion">
            <ul class="ps-8 pt-1 space-y-1">
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg
                            {{ request()->routeIs('guru.konseling.*') ? 'bg-indigo-400 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-neutral-700' }}" href="{{ route('guru.konseling.index') }}">
                        Janji Temu
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg
                            {{ request()->routeIs('guru.laporan.*') ? 'bg-indigo-400 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-neutral-700' }}" href="{{ route('guru.laporan.index') }}">
                        Laporan
                    </a>
                </li>
            </ul>
            </div>
        </li>
    </ul>
    </nav>
  </div>
  @endif
  <!-- End Content -->
</div>
</div>
<!-- End Sidebar -->
