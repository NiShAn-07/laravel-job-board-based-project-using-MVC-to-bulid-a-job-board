<x-layout-simple :title="$title">

    <form method="POST" action="/login" class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
        @csrf

        <h2 class="text-2xl font-bold mb-6 text-center">login with your account</h2>



        <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-2">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" autocomplete="email" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        @if ($errors->has('email'))
        <p class="text-red-500 text-sm mb-4">{{ $errors->first('email') }}</p>
        @endif

        <div class="mb-6">
            <label for="password" class="block text-gray-700 mb-2">Password</label>
            <input type="password" id="password" name="password"  autocomplete="password" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        @if ($errors->has('password'))
        <p class="text-red-500 text-sm mb-4">{{ $errors->first('password') }}</p>
        @endif

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">login</button>
    </form>


</x-layout-simple>