/* let _PREVIEW_URL;

document.querySelector("select-btn").addEventListener('click', function() {
    document.querySelector("#image").click();
});

document.querySelector("image").addEventListener('change', function(){
    let file = this.files[0];
    let mime_types = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
    if(mime_types.indexOf(file.type) == -1) {
        alert('Error : Incoorrect file-type');
    }
    if(file.size > 2*1024*1024) {
        alert('Error : Exceeded size 2MB');
        return; 
    }
    document.querySelector("#select-btn").style.display = 'none';

    _PREVIEW_URL = URL.createObjectURL(file);

    document.querySelector("#preview").setAttribute('src', _PREVIEW_URL);
    document.querySelector("#preview").style.display = 'inline-block';
})
 */
