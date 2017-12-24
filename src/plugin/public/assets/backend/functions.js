    
function getYoutubeIdFromLink(url) {
    if(url.search('&')){
        var arr=url.split('&');
        url=arr[0];
    }
    
    
    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = url.match(regExp);

    if (match && match[2].length == 11) {
        return match[2];
    } else {
        return 'error';
    }
}

function getYoutubeEmbedCode(id,width,height){
    var myCode = '<div class="video-container"><iframe  src="//www.youtube.com/embed/' 
    + id + '" frameborder="0" allowfullscreen></iframe></div>';
    return myCode;
}

function getSoundCloudCode(url){
    var html;
    $.getJSON('http://soundcloud.com/oembed?callback=?',
    {format: 'js', url: url, iframe: true},
    function(data) {
        // Stick the html content returned in the object into the page
        html=data['html'];
    }
    );
    return html;
}

function getCoundcloudCode(link , cb){
    var html='';
    $.ajax({
    type: 'GET',
    url: 'http://soundcloud.com/oembed?format=js&url=' + link + '&iframe=true&callback=?',
    dataType: 'json',
    success: function(response) {
        html=response.html;
        // alert('->'+html) ;
         cb(html);
    },
        data: {},
        async: true
    });
}



