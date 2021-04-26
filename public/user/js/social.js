
(function(){
        var popuCenter = function(url,title,width,height){

        var popupWidth = width || 640;
        var popupHeight = height || 420;
        var WindowLeft =	window.screenLeft || window.screenX;
        var WindowTop =	window.screenTop || window.screenY;

        var windowWidth = window.innerWidth || document.documentElement.clientWidth;
        var windowHeight = window.innerHeight || document.documentElement.clientHeight;


        popupLeft = WindowLeft + windowWidth / 2 - popupWidth / 2;
        popupTop = WindowTop + windowHeight / 2 - popupHeight / 2;

        var popup = window.open(url, title , 'scrollbars=yes , width='+ popupWidth +' , height='+ popupHeight +' , top='+ popupTop +' , left='+ popupLeft +' ');
        popup.focus();
        return true;
    };


    document.querySelector('.share_twitter').addEventListener('click', function(e){
    e.preventDefault();
    var url = this.getAttribute('data-url');
    var sharUrl = "https://twitter.com/intent/tweet?text="+
    encodeURIComponent(document.title) + 
    "&via=Ousmane Diallo" + 
    "&url="+encodeURIComponent(url);
    popuCenter(sharUrl,"Partage sur Twitter");
    });

    document.querySelector('.share_facebook').addEventListener('click', function(e){
    e.preventDefault();
    var url = this.getAttribute('data-url');
    var sharUrl = "https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(url);
    popuCenter(sharUrl,"Partager sur facebook");
    });

    document.querySelector('.share_gplus').addEventListener('click', function(e){
    e.preventDefault();
    var url = this.getAttribute('data-url');
    var sharUrl = "https://plus.google.com/share?url="+encodeURIComponent(url);
    popuCenter(sharUrl,"Partager sur Google+");
    });

    document.querySelector('.share_linkedin').addEventListener('click', function(e){
    e.preventDefault();
    var url = this.getAttribute('data-url');
    var sharUrl = "https://www.linkedin.com/shareArticle?url="+encodeURIComponent(url);
    popuCenter(sharUrl,"Partager sur Linkdin");
    });

})()