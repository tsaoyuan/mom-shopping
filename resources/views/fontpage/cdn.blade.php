<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登入</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <h1 id="title" class="max-w-0">hello</h1>
  <p><span id="jquery">jquery</span></p>
  <p class="text-blue-500 font-bold">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut sequi ad aspernatur ea saepe quas culpa obcaecati ullam ex at? Dolorum esse accusamus inventore assumenda minus recusandae totam asperiores repellendus?</p>

  <h2 class="text-3xl font-bold underline text-red-400">
    Hello world!
  </h2>
</body>

<script>
  $('#jquery').on('click', toggleText)
  // function big() {
  //   $('#jquery').text('JQUERY')
  // }
  function toggleText() {
    var element = $('#jquery');
    if(element.text() === 'jquery'){
      element.text('JQUERY') 
    }else{
      $('#jquery').text('jquery') 
    }
    
  }
</script>

</html>