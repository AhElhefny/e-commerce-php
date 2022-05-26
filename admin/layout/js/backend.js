$(function () {

    'use strict';

    $('.toggle-info').click(function () {
        console.log($(this),"uy")
       $(this).toggleClass('selected').parent().next('.panel-body').fadeToggle(100);
       if($(this).hasClass('selected')){
           $(this).html('<i class="fa fa-minus fa-lg"></i>');
       }else {
           $(this).html('<i class="fa fa-plus fa-lg"></i>');
       }
    });



    $('input').each(function () {
        if($(this).attr('required')==='required'){
            $(this).after('<span class="ast">*</span>');
        }
    });

    var passfiled=$('.pass');

    $('.show_password').hover(function () {
        passfiled.attr('type','text');
    },function () {
        passfiled.attr('type','password');
    });
});