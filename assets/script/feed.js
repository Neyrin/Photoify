'use strict'

fetch('./app/users/feed.php')
.then(response => response.json())
.then(data => { /* console.log(posts)); */  
    data.forEach(post => {
        const content = document.createElement('img');
        content.classList.add('post-image');
        content.setAttribute("src", `${post.image}`);
        
        const caption = document.createElement('p');
        caption.classList.add('post-caption');
        caption.innerHTML = post.caption;
        
        const feed = document.getElementById("feed");
            feed.appendChild(content);
            feed.appendChild(caption); 
        });
    }); 