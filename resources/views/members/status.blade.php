<!DOCTYPE html>
<html>

<head>
  <title>API Data to Notification</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
  #title{
    width: 300px;
    background: #0f0;
    display: flex;
    justify-content: center;
  }
  .data-list{
    width: 300px;
    border: 1px solid #f00;
  }
</style>
<body>
  <div id="title">
    <span>jquery ajax</span>
  </div>
  <ul class="data-list"></ul>

  <script>
    $.ajax({
      url: 'http://localhost:8083/v1/members/get-status?mobile=0900123123',
      method: 'GET',
      dataType: 'json',

      success: function(response) {
        console.log(response)
        const data = [];
        data.push(response);
        createDomElement(data);
      },
      error: function(err) {
        console.log(err)
      },
    });

    function createDomElement(data) {
    const domElements = data.map( item => {
      return `
    <li>
        <p class="timestamp">時間戳：${item.timestamp}</p>
    </li>
    <li>
        <p class="status">狀態：${item.status}</p>
    </li>
    <li>
        <p class="message">訊息：${item.message}</p>
     </li>
     <li>
        <p class="data">資料：${item.data}</p>
    </li>
  `;
    }).join("");

    const dataList = document.querySelector('.data-list');
    dataList.innerHTML = domElements;
  }
  </script>


</body>

</html>