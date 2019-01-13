'use strict'

fetch('./app/users/feed.php')
.then(response => response.json())
.then(data => { /* console.log(data)) */;  
     data.forEach(post => {
        /* let id = post.post_id; */

        const item = document.createElement('div');
        item.classList.add('item');

        const content = document.createElement('img');
        content.classList.add('post-image');
        content.setAttribute("id", "post-image");
        content.setAttribute("src", `${post.image}`);

        const actionsBar = document.createElement('div');
        actionsBar.classList.add('actions-bar');

        const likeBtn = document.createElement('button');
        likeBtn.setAttribute("id", "like-btn");
        likeBtn.classList.add('like-btn');
        likeBtn.innerHTML = '<i class="fa fa-heart" aria-hidden="true"></i>';
        likeBtn.addEventListener("click", function(){
            window.location.pathname = ''
        });

        const editBtn = document.createElement('button');
        editBtn.setAttribute("name", "edit-btn");
        editBtn.classList.add('edit-btn');
        editBtn.innerHTML = '<i class="fa fa-pencil" aria-hidden="true"></i>';
        editBtn.addEventListener("click", function(){
            window.location.pathname = '/edit.php'// +'?id=' + post.post_id;
            //Add id to query string here if user is logged in
        });
        
        const caption = document.createElement('p');
        caption.classList.add('post-caption');
        caption.innerHTML = post.caption;
        
        const feed = document.getElementById('feed');
        feed.appendChild(item);

        item.appendChild(content);
        item.appendChild(actionsBar)
        actionsBar.appendChild(likeBtn);
        actionsBar.appendChild(editBtn);
        item.appendChild(caption); 
    }); 
    
/*     document.getElementsByName("edit-btn").addEventListener("click", function(){
        window.location.pathname = '/edit.php'
    });
    document.getElementById("like-btn").addEventListener("click", function(){
        window.location.pathname = ''
    });
       */
}); 


  


/* let count = 0;
const images = document.querySelectorAll('.post-image');
images.forEach(image => {
    image.addEventListener('dblclick', likeCounter)
});
    function likeCounter() {
        count += 1;
        const likes = document.createElement('p');
        likes.innerHTML = "Likes: " + count; 

    };*/
/* function like() {
    images.forEach(image => image.addEventListener('dblclick', likeCounter));
} 
var button = document.getElementById("clickme"),
  count = 0;
button.onclick = function() {
  count += 1;
  button.innerHTML = "Click me: " + count;
};
*/