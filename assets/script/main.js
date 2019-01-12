'use strict';

  if(document.getElementById("home_btn")){
    document.getElementById("home_btn").addEventListener("click", function(){
      window.location.pathname = '/index.php'
    });
  }
  
  if(document.getElementById("upload_btn")){
    document.getElementById("upload_btn").addEventListener("click", function(){
      window.location.pathname = '/upload.php'
    });
  }
  
  if(document.getElementById("user_btn")){
    document.getElementById("user_btn").addEventListener("click", function(){
      window.location.pathname = '/mypage.php'
    });
  }

  if(document.getElementById("delete-account-btn")){
    document.getElementById("delete-account-btn").addEventListener("click", function(){
      window.location.pathname = '/delete-account.php'
    });
  }
