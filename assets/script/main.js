'use strict';
/* fetch('app/posts/posts.php')
  .then(response => response.json())
  .then(posts => {
    actors.forEach(actor => {
      const anchor = document.createElement('a');
      anchor.href = actor.tmdb_url;
      anchor.textContent = actor.name;
      document.body.appendChild(anchor);
    });
  }); */

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
  