'use strict'

fetch('./app/users/feed.php')
.then(response => response.json())
.then(data => { /* console.log(data)) */  
     data.forEach(post => { 
         //Main item div containing the whole post
        const item = document.createElement('div');
        item.classList.add('item');

        //User info
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

        //Image container with posted image
        const imgContainer = document.createElement('div');
        imgContainer.classList.add('img-container');

        const content = document.createElement('img');
        content.classList.add('post-image');
        content.setAttribute("id", "post-image");
        content.setAttribute("src", `${post.image}`);
        
        //Action bar containing edit/like buttons
        const actionsBar = document.createElement('div');
        actionsBar.classList.add('actions-bar');
        
        //Form to like post, in the shape of a button
        const likeForm = document.createElement('form');
        likeForm.classList.add('like-form')
        likeForm.setAttribute("action", "app/posts/like.php");
        likeForm.setAttribute("method", "post");

        const likeInput = document.createElement('input');
        likeInput.setAttribute("type", "hidden");
        likeInput.setAttribute("name", "post-id");
        likeInput.setAttribute("value", post.post_id);

        const likerInfo = document.createElement('input');
        likerInfo.setAttribute("type", "hidden");
        likerInfo.setAttribute("name", "liker-id");
        likerInfo.setAttribute("value", "<?php $user_id ?>");

        const likeBtn = document.createElement('button');
        likeBtn.setAttribute("id", "like-btn");
        likeBtn.classList.add('like-btn');
        likeBtn.innerHTML = '<i class="fa fa-heart" aria-hidden="true"></i>';
        likeBtn.addEventListener("click", function(){
            likeBtn.classList.add('liked');
        });

        //Display number of likes
        const likes = document.createElement('p');
        likes.innerHTML = post.like;

        //Form to edit post, in the shape of a button
        const editForm = document.createElement('form')
        editForm.classList.add('edit-form');
        editForm.setAttribute("action", "edit.php");
        editForm.setAttribute("method", "post");

        const editInput = document.createElement('input');
        editInput.setAttribute("type", "hidden");
        editInput.setAttribute("name", "post-id");
        editInput.setAttribute("value", post.post_id);

        const userInfo = document.createElement('input');
        userInfo.setAttribute("type", "hidden");
        userInfo.setAttribute("name", "post-user-id");
        userInfo.setAttribute("value", post.user_id);

        const editBtn = document.createElement('button');
        editBtn.setAttribute("name", "edit-btn");
        editBtn.classList.add('edit-btn');
        editBtn.innerHTML = '<i class="fa fa-pencil" aria-hidden="true"></i>';
        
        //Caption to post
        const caption = document.createElement('p');
        caption.classList.add('post-caption');
        caption.innerHTML = post.caption;
        
        //Get feed div from html and then append all objects created in JS
        const feed = document.getElementById('feed');
        feed.appendChild(item);

        item.appendChild(user);
        user.appendChild(avatarContainer)
        avatarContainer.appendChild(avatar);
        user.appendChild(userName);
        item.appendChild(imgContainer);
        imgContainer.appendChild(content);
        item.appendChild(actionsBar);
        actionsBar.appendChild(likeForm);
        likeForm.appendChild(likeInput);
        likeForm.appendChild(likerInfo);
        likeForm.appendChild(likeBtn);
        actionsBar.appendChild(editForm);
        editForm.appendChild(editInput);
        editForm.appendChild(userInfo);
        editForm.appendChild(editBtn);
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