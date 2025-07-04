<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
    <body class="bg-white min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md ">
    <h2 class="text-base font-semibold mb-2">Login</h2>
    <div class="p-8 border border-gray-300 rounded-xl shadow-sm">
        
        <div id="session-status" class="mb-4 text-sm text-green-600 hidden">
        </div>

        <form method="POST" action="/login">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="mb-6">
                <label for="email" class=" mt-4 block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" placeholder="example@gmail.com" required
                    class="block mt-1.5 p-2 w-full rounded-xl border border-gray-200 text-sm text-gray-500 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" />
                <p class="mt-2 text-sm text-red-500 hidden" id="email-error">Email is required.</p>
            </div>
            <div class="mb-6 relative">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" placeholder="••••••••" required
                    class="block mt-1.5 p-2 w-full pr-10 rounded-xl border border-gray-200 text-sm text-gray-500 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" />

                <span id="toggle-password" class="absolute top-1/2 translate-y-[2px] -translate-y-1/2 right-3 flex items-center cursor-pointer">
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
                <p class="mt-2 text-sm text-red-500 hidden" id="password-error">Password is required.</p>
            </div>
            <div class="mb-6">
                <button type="submit"
                class="block mx-auto w-[150px] bg-blue-500 text-white font-semibold py-2 rounded-xl hover:bg-blue-600 transition">
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
