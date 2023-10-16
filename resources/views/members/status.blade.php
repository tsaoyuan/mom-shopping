<!DOCTYPE html>
<html>

<head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ Vite::asset('resources/js/getStatus.js') }}"></script>
  <title>會員狀態</title>
</head>
<style>
  .getStatus {
    width: 600px;
    margin-top: 1px;
    margin-bottom: 10px;
  }

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
  <div class="getStatus">
    <label for="mobile">手機號碼:</label>
    <input name="mobile" id="mobile" type="text">
    <button id="getStatus">查詢狀態</button>
  </div>

  <div id="title">
    <span>Member status</span>
  </div>
  <ul id="data-list" class="data-list"></ul>

  <script>
    const mobile = '0956632444';
    getStatus(mobile);
  </script>

</body>

</html>