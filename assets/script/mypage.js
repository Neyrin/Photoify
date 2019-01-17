'use strict'

fetch('./app/users/mypage.php')
.then(response => response.json())
.then(data => {
    const user = data.users[0];
    const posts = data.userPosts;
/*     console.log(user);
    console.log(posts); */

    const avatar = document.createElement('img');
    avatar.classList.add('my-avatar');
    setAvatar();

    const userName = document.createElement('p');
    userName.classList.add('user-name');
    userName.innerHTML = user.user_name;
    
    const name = document.createElement('p');
    name.classList.add('name');
    name.innerHTML = user.first_name + ' ' + user.last_name;
    
    const bio = document.createElement('p');
    bio.classList.add('bio');
    bio.innerHTML = user.bio;
    
    const userInfo = document.getElementById("user-info");
    userInfo.appendChild(avatar);
    userInfo.appendChild(userName);
    userInfo.appendChild(name);
    userInfo.appendChild(bio);


    posts.forEach(post => {
        const image = document.createElement('img');
        image.classList.add('post');
        image.setAttribute("src", `${post.image}`);

        const caption = document.createElement('p');
        caption.classList.add('caption');
        caption.innerHTML = post.caption;

        const userImages = document.getElementById("user-images");
        userImages.appendChild(image);
        userImages.appendChild(caption);    
    });

    function setAvatar() {
        if (user.avatar !== null) {
            avatar.setAttribute("src", `${user.avatar}`);
        } else {
            avatar.setAttribute("src", "/app/users/defaultUserImage.png");
        }
    };
});

document.getElementById("settings_btn").addEventListener("click", function(){
    window.location.pathname = 'settings.php'
    });
    
    
        
        
        




/* ;(async () => {
    const response = await fetch('./app/users/mypage.php')
    const data = await response.json()
    console.log(data)
  })()



/* window.addEventListener("load", () => {
 });
 */



