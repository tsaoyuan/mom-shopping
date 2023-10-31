function login() {
  const mobile = document.getElementById('login-mobile').value;
  const password = document.getElementById('password').value;

  getToken(mobile, password);
}

function getToken(mobile, password) {
  const url = "/v1/members/login";

  fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({

      // mobile: "0956632444",
      // password: "kkkkoooo"
      mobile: mobile,
      password: password
    }),
  })
  .then(response => {
    if (!response.ok) {
      console.log('未完成');
      // response.status === 400 do ..
      // 判斷 status 是 參數錯誤 || 帳密錯誤
      // 若是 參數錯誤 > do.. 
      // 若是 帳密錯誤 > do.. 
      
    } 
    // else{
    //   // 其他未定義的 status 暫時用下列訊息取代
    //   throw new Error('Network response was not ok');
    // }
    
    return response.json();
  })
  .then(data => {
    // 登入成功
    // 開啟主畫面
    // 關閉登入畫面
    // console.log("oooooo");
    const innerData = data.data.token;
    console.log(innerData);

  })
  .catch(error => {
    // 處理錯誤情況
    console.error('Fetch error:', error);
  });
  
}