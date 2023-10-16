function getStatus() {
  
  const mobile = document.getElementById('mobile').value;
  const dataList = document.getElementById('data-list');
  dataList.innerHTML = ''; // 清空内容
  // console.log(mobile);
  memberStatus(mobile);
}

function memberStatus(mobile) {

  const url = `/v1/members/get-status?mobile=${mobile}`;
  
  fetch(url, {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json',
        // 根據需要添加其他 Request headers 
      },
    })
    .then(response => {
      // HTTP status code 在 300 及以上  
      if (!response.ok) {
        // 參數錯誤 > response status = 400 do.. 
        if (response.status === 400) {
          // 用 response.json() 取得 status = 400 的 response
          // console.log(response.json());

          // errorData 是 response.json()，errorData 並不是關鍵字 
          return response.json().then(errorData => {
            // 自定義 response 的錯誤訊息在 key = errors 裏面
            const errorsMsg = errorData.errors;
            const outputElement = document.getElementById('data-list');

            // 渲染錯誤訊息到瀏覽器上
            for (const key in errorsMsg) {
              if (errorsMsg.hasOwnProperty(key)) {
                const listItem = document.createElement('li');
                listItem.textContent = `"${key}": ${errorsMsg[key]}`;
                outputElement.appendChild(listItem);
              }
            }
          });
        } else {
          // 其他未定義的 status 暫時用下列訊息取代
          throw new Error('Network response was not ok');
        }
      }
      // HTTP status code 在 200 到 299 之間
      // 將 response 解析為 JSON
      return response.json();
    })
    .then(data => {
      // 輸出資訊容器
      const outputElement = document.getElementById('data-list');
      // 輸出資訊 data 內的 data 
      const innerData = data.data;

      // JS 取出物件的 key 方法: Object.keys()
      const keys = Object.keys(innerData);
      // JS 取出物件的 value 方法
      // console.log(innerData[keys]);

      // 放置 輸出資訊 data 容器
      const msgItem = document.createElement('p');
      // 處理 response 的數據 
      // 使用者不存在
      // status === NOT_EXIST 時: 
      if (innerData['status'] === 'NOT_EXIST') {

        msgItem.textContent = "使用者不存在";
        outputElement.appendChild(msgItem);
      }

      // JS 迴圈的另類用法 `for...in` 類似 PHP 的 foreach ($data as $key => $value) 
      // JS 的 const key 的變數 key 如同 PHP 的 $key
      if (innerData['status'] === 'EXIST') {
        for (let i = 1; i < keys.length; i++) {
          const key = keys[i];
          const value = innerData[key];

          const listItem = document.createElement('li');
          listItem.textContent = `"${key}": ${value}`;
          outputElement.appendChild(listItem);
        }
      }
    })
    .catch(error => {
      // 處理錯誤情況
      console.error('Fetch error:', error);
    });
}