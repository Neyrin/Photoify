'use strict'

fetch('./app/users/feed.php')
.then(response => response.json())
.then(data => { /* console.log(data)) */;  
     data.forEach(post => {
        const item = document.createElement('div');
        item.classList.add('item');

        const content = document.createElement('img');
        content.classList.add('post-image');
        content.setAttribute("id", "post-image");
        content.setAttribute("src", `${post.image}`);

        const likeBtn = document.createElement('button');
        likeBtn.classList.add('like-btn');
        likeBtn.innerHTML = "Like";
        
        const caption = document.createElement('p');
        caption.classList.add('post-caption');
        caption.innerHTML = post.caption;
        
        const feed = document.getElementById("feed");
        feed.appendChild(item);

        item.appendChild(content);
        item.appendChild(caption); 
        item.appendChild(likeBtn);
    }); 
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