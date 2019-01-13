'use strict'

fetch('./app/users/feed2.php')
.then(response => response.json())
.then(data => { /* console.log(data)) */  
     data.forEach(post => { 
        const item = document.createElement('div');
        item.classList.add('item');

        const user = document.createElement('div');
        user.classList.add('user');

        const avatarContainer = document.createElement('div');
        avatarContainer.classList.add('avatar-container');

        const avatar = document.createElement('img');
        avatar.classList.add('avatar');
        setAvatar();

        const userName = document.createElement('p');
        userName.classList.add('user-name');
        userName.innerHTML = post.user_name;

        const imgContainer = document.createElement('div');
        imgContainer.classList.add('img-container');

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
        /* likeBtn.addEventListener("click", ifLiked); */

        const likes = document.createElement('p');
        likes.innerHTML = post.like;

        const editBtn = document.createElement('button');
        editBtn.setAttribute("name", "edit-btn");
        editBtn.classList.add('edit-btn');
        editBtn.innerHTML = '<i class="fa fa-pencil" aria-hidden="true"></i>';
        editBtn.addEventListener("click", function(){

                window.location.pathname = '/edit.php';
            });
        
        const caption = document.createElement('p');
        caption.classList.add('post-caption');
        caption.innerHTML = post.caption;
        
        const feed = document.getElementById('feed');
        feed.appendChild(item);

        item.appendChild(user);
        user.appendChild(avatarContainer)
        avatarContainer.appendChild(avatar);
        user.appendChild(userName);
        item.appendChild(imgContainer);
        imgContainer.appendChild(content);
        item.appendChild(actionsBar)
        actionsBar.appendChild(likeBtn);
        actionsBar.appendChild(editBtn);
        item.appendChild(caption); 

        function setAvatar() {
            if (post.avatar !== null) {
                avatar.setAttribute("src", `${post.avatar}`);
            } else {
                avatar.setAttribute("src", "/app/users/defaultUserImage.png");
            }
        };
    })
}); 

/*     function ifLiked() => {
        if (this === firstClick); {
            this.classList.add('liked-by-user');
            window.location.pathname = '/like.php';
        } elseif (this === secondClick); {
            this.classList.remove('liked-by-user');
            window.location.pathname = '/dislike.php';
        };
    } 
      document.getElementById('button').addEventListener('click', function () {
      this.active = !this.active;
      var step = (this.active ? 3 : 0);
      this.innerHTML = step;
  }, true);
    */