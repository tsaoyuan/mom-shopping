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

  <script>
    fetch('/v1/members/get-status?mobile=0956632444', {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
          // 根據需要添加其他 Request headers 
        },
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json(); // 將 response 解析為 JSON
      })
      .then(data => {
        // 處理 response 的數據 
        console.log(data);

        const outputElement = document.getElementById('data-list');

        const dataElement = document.createElement('li');
        dataElement.textContent = JSON.stringify(data);
        outputElement.appendChild(dataElement);

      })
      .catch(error => {
        // 處理錯誤情況
        console.error('Fetch error:', error);
      });
  </script>


</body>

</html>