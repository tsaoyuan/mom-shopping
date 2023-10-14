<!DOCTYPE html>
<html>

<head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>會員狀態</title>
</head>
<style>
  #title {
    width: 300px;
    background: #0f0;
    display: flex;
    justify-content: center;
  }

  .data-list {
    width: 300px;
    border: 1px solid #f00;
  }
</style>

<body>
  <div id="title">
    <span>Member status</span>
  </div>
  <ul id="data-list" class="data-list"></ul>
  <script src="{{ Vite::asset('resources/js/getStatus.js') }}"></script>

  <script>
    const mobile = '0956632444';
    getStatus(mobile);
  </script>

</body>

</html>