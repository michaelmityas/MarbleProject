'use strict';
$(function(){

    $('[placeholder]').focus(function(){
        $(this).attr('data-text', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
    }).blur(function(){
        $(this).attr('placeholder', $(this).attr('data-text'));
    });
    
    $('.show-pass').hover(function(){
        $('.password').attr('type','text');
    },function(){
        $('.password').attr('type','password');
    });
    
    $('.confirmation').click(function(){
        return confirm("Are You Sure ?");
    });
    

});


