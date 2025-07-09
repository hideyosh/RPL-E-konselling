<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
    <body class="bg-white min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md ">
    <div class="p-8 border border-gray-300 rounded-xl shadow-sm">

        <div id="session-status" class="mb-4 text-sm text-green-600 hidden">
        </div>

        <form method="POST" action="/login">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="flex justify-center">
                <img src="{{ asset('img/SMKNLOGO.png') }}" class="size-5/12" alt="login-logo">
            </div>

            <div class="flex justify-center mt-2 mb-7">
                <h1 class="text-xl text-center font-bold">Selamat Datang di Website Bimbingan Konseling SMKN 46 Jakarta</h1>
            </div>
            <div class="mb-6">
                <label for="email" class=" mt-4 block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" placeholder="Masukan email anda" required
                    class="block mt-1.5 px-4 py-2 w-full rounded-xl border border-gray-200 text-sm text-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" />
            </div>

            <div class="mb-6 relative">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" placeholder="Masukan password anda" required
                    class="block mt-1.5 px-4 py-2 w-full pr-10 rounded-xl border border-gray-200 text-sm text-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" />

                <span id="toggle-password" class="absolute top-1/2 translate-y-[2px]  right-3 flex items-center cursor-pointer">
                        <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.056 10.056 0 012.345-4.093M6.228 6.228A9.965 9.965 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.056 10.056 0 01-4.442 5.202M3 3l18 18" />
                        </svg>
                </span>
            </div>
            <div class="mb-6">
                <button type="submit"
                class="block mx-auto w-full bg-indigo-500 text-white font-semibold py-2 rounded-xl hover:bg-indigo-700 transition">
                Submit
                </button>
            </div>
        </form>
    </div>
    </div>

    <script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeOpen = document.getElementById('eye-open');
        const eyeClosed = document.getElementById('eye-closed');

        const isPassword = passwordInput.type === 'password';
        passwordInput.type = isPassword ? 'text' : 'password';

        eyeOpen.classList.toggle('hidden', !isPassword);
        eyeClosed.classList.toggle('hidden', isPassword);
    }
    document.getElementById('toggle-password').addEventListener('click', togglePassword);
</script>
</body>
</html>
