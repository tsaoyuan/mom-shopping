<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="{{asset('/js/getStatus.js') }}"></script>
  <script src="{{asset('/js/login.js')}}"></script>
  <title>媽媽購</title>
</head>

<body>
  <!-- login -->
  <div id="login" class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9  text-gray-900">Sign in to your account</h2>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <div>
        <label for="login-mobile" class="block text-sm font-medium leading-6 text-gray-900">mobile</label>
        <div class="mt-2">
          <input id="login-mobile" name="login-mobile" type="text" autocomplete="mobile" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-400 placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
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
        <button onclick="login()" class="mt-4 w-full  rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500">Sign in</button>
      </div>
    </div>
  </div>

  <!-- getStatus -->
  <div id="getStatus" class="ml-6 mt-6 flex flex-wrap max-w-4xl gap-x-4" style="display: none;">
    <div class="max-w-3xl">
      <label for="get-status-mobile" class="text-xl font-medium align-middle">mobile:</label>
      <input id="get-status-mobile" name="get-status-mobile" type="text" autocomplete="mobile" required class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" placeholder="Enter your mobile">

      <button onclick="getStatus()" class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">查詢狀態</button>
    </div>
    <div class="max-w-xl">
      <ul id="data-list">
      </ul>
    </div>
  </div>

  <!-- 登入後的主畫面 -->
  <div id="home" class="container mx-auto p-4" style="display: none;">
        <div class="text-center">
          <p class="text-lg font-semibold mb-4">歡迎 XXX</p>
          <!-- 歡迎訊息 -->
            <div class="space-x-4">
              <a id="btn-products" href="#" class="btn-orders text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">產品</a>

                <a id="btn-cart" href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">購物車</a>

                <a id="btn-orders" href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">訂單</a>

                <a id="btn-logout" href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">登出</a>
            </div>
        </div>
    </div>

</body>

</html>