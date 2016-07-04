"use strict";

$(document).ready(function() {
    var url = window.location.pathname;

    changeActiveLink(url);

    if (url == '/settings') {

    }
});

function changeActiveLink(url) {
    $('.company-nav .list-group-item').removeClass('active');
    $('.company-nav .list-group-item[href="'+url+'"]').addClass('active');
}

function selectFile(element) {
    if (element.lastIndexOf('\\')){
        var i = element.lastIndexOf('\\')+1;
    }
    else{
        var i = element.lastIndexOf('/')+1;
    }
    var filename = element.slice(i);
    var uploaded = document.getElementById("changeAvatar");
    uploaded.innerHTML = filename;
}
