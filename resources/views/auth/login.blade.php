<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="{{asset('/js/login.js')}}"></script>
  <title>媽媽購</title>
</head>
<style>
  #login {
    border: red solid 3px;
  }
</style>

<body>
  <div id="login" class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9  text-gray-900">Sign in to your account</h2>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <div>
          <label for="mobile" class="block text-sm font-medium leading-6 text-gray-900">mobile</label>
          <div class="mt-2">
            <input id="mobile" name="mobile" type="text" autocomplete="mobile" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-400 placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          </div>
          
          <div class="mt-2">
            <input id="password" name="password" type="password" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-400 placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
          </div>
        </div>

        <div>
          <button onclick="login()" type="submit" class="mt-4 w-full  rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500">Sign in</button>
        </div>
    </div>
  </div>

</body>

</html>