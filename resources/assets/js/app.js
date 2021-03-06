"use strict";

$(document).ready(function() {
    var url = window.location.pathname;
    var regUrl = new RegExp("\/leads\/[0-9]+$", "ig");

    if (url == '/lead-register') {
        $('#datetimepicker').datetimepicker({
            locale: 'ru',
            format: 'Y-MM-DD'
        });

        $('.amount').money_field({
            width: 100,
            symbol: '₽'
        });

        $('.selectpicker').selectpicker({
            style: 'btn-info',
            iconBase: 'fa'
        });
    } else if (url == '/login') {
        changeActiveLink(url, true);
    } else if (url == '/register') {
        changeActiveLink(url, true);
    } else if (url == '/') {
        url = window.location.hash;

        changeActiveLink(url);

        $('.list-group-item').on('click', function() {
            $('.fa', this)
              .toggleClass('fa fa-caret-right')
              .toggleClass('fa fa-caret-down');
         });

         $('.list-group-item').click(function() {
             $('.company-nav .list-group-item').removeClass('active');
             $(this).addClass('active');
         });
    } else if (url == '/settings') {
        var hrefLeads = $('.company-nav .list-group-item[href="#leads"]');

        changeActiveLink(url);
        hrefLeads.attr('href', '/');
        hrefLeads.find('i').remove();
        hrefLeads.removeAttr('data-toggle');
    } else if (url == '/debit') {
        var hrefLeads = $('.company-nav .list-group-item[href="#leads"]');

        changeActiveLink(url);
        hrefLeads.attr('href', '/');
        hrefLeads.find('i').remove();
        hrefLeads.removeAttr('data-toggle');
        
        $('.amount').money_field({
            width: 100,
            symbol: '₽'
        });
    } else if (!regUrl.test(url)) {
        $('#datetimepicker').datetimepicker({
            locale: 'ru',
            format: 'Y-MM-DD'
        });
        
        $('.amount').money_field({
            width: 100,
            symbol: '₽'
        });
    }
});

function changeActiveLink(url, auth = false) {
    $('.company-nav .list-group-item').removeClass('active');
    $('.company-nav .list-group-item[href="'+url+'"]').addClass('active');

    if (auth) {
        $('.navbar-nav>li>a[href="'+url+'"]').addClass('active');
    } else {
        $('.navbar-nav>li>a').not('.dropdown-toggle').addClass('active');
    }
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
