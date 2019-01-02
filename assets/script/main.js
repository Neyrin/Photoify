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

  document.getElementById("home_btn").addEventListener("click", function(){
    window.location.pathname = 'photoify/home.php'
  });
  document.getElementById("upload_btn").addEventListener("click", function(){
    window.location.pathname = 'photoify/upload.php'
  });
  document.getElementById("user_btn").addEventListener("click", function(){
    window.location.pathname = 'photoify/mypage.php'
  });