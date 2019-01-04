'use strict'

fetch('./app/users/mypage.php')
.then(response => response.json())
.then(data => { /* console.log(data)); */ 
     data.forEach(user => {
        const avatar = document.createElement('img');
        avatar.classList.add('avatar');
        avatar.setAttribute("src", `${user.avatar}`);
        
        const userName = document.createElement('p');
        userName.classList.add('user-name');
        userName.innerHTML = user.user_name;
        
        const name = document.createElement('p');
        name.classList.add('name');
        name.innerHTML = user.first_name + ' ' + user.last_name;
        
        const userInfo = document.getElementById("user-info");
            userInfo.appendChild(avatar);
            userInfo.appendChild(userName);
            userInfo.appendChild(name); 
        });
    });
        
        
        
        
        
        




/* ;(async () => {
    const response = await fetch('./app/users/mypage.php')
    const data = await response.json()
    console.log(data)
  })()



/* window.addEventListener("load", () => {
 });
 */



