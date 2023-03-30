$(function(){
   $('.main_m>li').on('mouseover',function(){
       $('.sub_m').stop(true).slideDown(300);
       $('.sub_back').stop(true).slideDown(300);
   }).on('mouseout',function(){
      $('.sub_m').stop(true).slideUp(300);
       $('.sub_back').stop(true).slideUp(300);
   });
    
    var timer = 0;
    
    run();
    
    function run(){
        timer = window.setInterval(slide,2000);
    }
    
    function slide(){
        $('.slide').animate({top:'-100%'},400,function(){
           $(this).find('li:first-child').appendTo(this);
            $(this).css('top',0);
        });
    }
    
    $('.notice>li:first-child').click(function(){
        $('.popup').show();
    });
    $('.cl_bu').click(function(){
        $('.popup').hide();
    });

});