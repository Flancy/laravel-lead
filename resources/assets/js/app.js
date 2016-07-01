"use strict";

$(document).ready(function() {
    var url = window.location.pathname;

    changeActiveLink(url);

});

function changeActiveLink(url) {
    $('.company-nav .list-group-item').removeClass('active');
    $('.company-nav .list-group-item[href="'+url+'"]').addClass('active');
}
