var heightTop;function heighter(heightTop){if(self.innerHeight){heightTop=self.innerHeight;}
else if(document.documentElement&&document.documentElement.clientHeight){heightTop=document.documentElement.clientHeight;}
else if(document.body){heightTop=document.body.clientHeight;}
$('#heighter').css("min-height",heightTop+'px');}
heighter();window.onresize=heighter;$(document).ready(function(){var owl;owl=$('.owl-carousel').owlCarousel({loop:true,margin:33,nav:false,animate:'ease',items:1,autoplay:false,autoplayTimeout:5000,});$("#carousel_next").click(function(){owl.trigger('next.owl.carousel');});$("#carousel_prev").click(function(){owl.trigger('prev.owl.carousel');});$('.p_box').hover(function(){$(this).find('.p_content').fadeTo(100,1);},function(){$(this).find('.p_content').fadeTo(100,0);});$('.p_box').each(function(){var data_img=$(this).data('img');$(this).css('background-image','url('+data_img+')');});$('.open_login').click(function(){$('.mobile_menu').removeClass('active');$('body').addClass('overflow-hide');$('.login_modal').fadeIn();});$('.close_login').click(function(){$('body').removeClass('overflow-hide');$('.login_modal').fadeOut();});$('.open_reg').click(function(){$('.login_modal').fadeOut();$('body').addClass('overflow-hide');$('.reg_modal').fadeIn();});$('.close_reg').click(function(){$('body').removeClass('overflow-hide');$('.reg_modal').fadeOut();});$('.open_menu').click(function(){$('body').addClass('overflow-hide');$('.mobile_menu').addClass('active');});$('.close_menu').click(function(){$('body').removeClass('overflow-hide');$('.mobile_menu').removeClass('active');});$('.si_description').click(function(){$('body').addClass('overflow-hide');$('.description_modal').fadeIn();});$('.close_dm').click(function(){$('body').removeClass('overflow-hide');$('.description_modal').fadeOut();});$('.pb_desc').click(function(){$('body').addClass('overflow-hide');$('.purchase_modal').fadeIn();});$('.close_pm').click(function(){$('body').removeClass('overflow-hide');$('.purchase_modal').fadeOut();});$('.pay_content button').click(function(){$('body').addClass('overflow-hide');$('.pay_modal').fadeIn();});$('.close_pb').click(function(){$('body').removeClass('overflow-hide');$('.pay_modal').fadeOut();});var dropdown=false;$('#sbc_dropdown').click(function(){if(!dropdown){$(this).addClass('rotate');$('.dropdown_list').slideDown();dropdown=true;}
else{$(this).removeClass('rotate');$('.dropdown_list').slideUp();dropdown=false;}});$('.goto_portfolio').click(function(){$('body').removeClass('overflow-hide');$('.mobile_menu').removeClass('active');$('html').animate({scrollTop:$('#portfolio').offset().top},500);});$('.goto_feedback').click(function(){$('body').removeClass('overflow-hide');$('.mobile_menu').removeClass('active');$('html').animate({scrollTop:$('#feedback').offset().top},500);});$('.goto_services').click(function(){$('body').removeClass('overflow-hide');$('.mobile_menu').removeClass('active');$('html').animate({scrollTop:$('#services').offset().top},500);});$('input').focus(function(){$(this).data('placeholder',$(this).attr('placeholder')).attr('placeholder','');}).blur(function(){$(this).attr('placeholder',$(this).data('placeholder'));});var page_now=1;var max_page=$('#max_page').data('page');var page_text=$('#page_text');for(var i=1;i<=max_page;i++){if(i>1){$('#page'+i).hide();}}
$('.prev_btn').click(function(){if(page_now>1){$('#page'+page_now).hide();page_now-=1;$('#page'+page_now).show();page_text.text(page_now+' из '+max_page);}});$('.next_btn').click(function(){if(page_now<max_page){$('#page'+page_now).hide();page_now+=1;$('#page'+page_now).show();page_text.text(page_now+' из '+max_page);}});});var moonstart=false;function MoonAlert(status,text,delay=3000){if(!moonstart){moonstart=true;var status_text,status_icon;switch(status){case 'error':{status_icon='<i class="fal fa-exclamation-triangle"></i>';status_text='Ошибка';break;}
case 'notify':{status_icon='<i class="fal fa-bell"></i>';status_text='Уведомление';break;}
case 'success':{status_icon='<img src="/assets/img/success_icon.svg">';status_text='Успех операции';break;}
default:{status_icon='<i class="fal fa-exclamation-triangle"></i>';status_text=status;break;}}
var alertcode='<div class="moon_alert">'+
'<div class="moon_box">'+
'<div class="moon_icon">'+
status_icon+
'</div>'+
'<div>'+
'<p class="ma_status">'+status_text+'</p>'+
'<p class="ma_text">'+text+'</p>'+
'</div>'+
'</div>'+
'</div>';$('section').append(alertcode);if($(window).width()<1199){$('.moon_alert').animate({"right":'20px'},1000);}
else{$('.moon_alert').animate({"right":'50px'},1000);}
setTimeout(function(){$('.moon_alert').animate({"right":'-333px'},1000);moonstart=false;},delay);}}

$(function (){
    $('.open-popup').click(function (){
        $('.popup-bg').addClass('opened')
        $('body').addClass('lock')
    });
    $('.close-popup').click(function (){
        $('.popup-bg').removeClass('opened')
        $('body').removeClass('lock')
    });
});

$(function (){
    $('.item1').click(function (){
        $('.popup-bg-item1').addClass('opened')
        $('body').addClass('lock')
    });
    $('.close-popup').click(function (){
        $('.popup-bg-item1').removeClass('opened')
        $('body').removeClass('lock')
    });
});

$(function (){
    $('.item2').click(function (){
        $('.popup-bg-item2').addClass('opened')
        $('body').addClass('lock')
    });
    $('.close-popup').click(function (){
        $('.popup-bg-item2').removeClass('opened')
        $('body').removeClass('lock')
    });
});
$(function (){
    $('.item3').click(function (){
        $('.popup-bg-item3').addClass('opened')
        $('body').addClass('lock')
    });
    $('.close-popup').click(function (){
        $('.popup-bg-item3').removeClass('opened')
        $('body').removeClass('lock')
    });
});
$(function (){
    $('.item4').click(function (){
        $('.popup-bg-item4').addClass('opened')
        $('body').addClass('lock')
    });
    $('.close-popup').click(function (){
        $('.popup-bg-item4').removeClass('opened')
        $('body').removeClass('lock')
    });
});
$(function (){
    $('.item5').click(function (){
        $('.popup-bg-item5').addClass('opened')
        $('body').addClass('lock')
    });
    $('.close-popup').click(function (){
        $('.popup-bg-item5').removeClass('opened')
        $('body').removeClass('lock')
    });
});
$(function (){
    $('.item6').click(function (){
        $('.popup-bg-item6').addClass('opened')
        $('body').addClass('lock')
    });
    $('.close-popup').click(function (){
        $('.popup-bg-item6').removeClass('opened')
        $('body').removeClass('lock')
    });
});
$(function (){
    $('.item7').click(function (){
        $('.popup-bg-item7').addClass('opened')
        $('body').addClass('lock')
    });
    $('.close-popup').click(function (){
        $('.popup-bg-item7').removeClass('opened')
        $('body').removeClass('lock')
    });
});
$(function (){
    $('.item8').click(function (){
        $('.popup-bg-item8').addClass('opened')
        $('body').addClass('lock')
    });
    $('.close-popup').click(function (){
        $('.popup-bg-item8').removeClass('opened')
        $('body').removeClass('lock')
    });
});

$( function() {
    $( "#accordion" ).accordion({
        collapsible: true,
        active: false,
        heightStyle: "content"
    });

} );

var particleCount = 3000;
var particleMax   = 5000;
var sky           = document.querySelector('.sky');
var canvas        = document.createElement('canvas');
var ctx           = canvas.getContext('2d');
var width         = sky.clientWidth;
var height        = sky.clientHeight;
var i             = 0;
var active        = false;
var snowflakes    = [];
var snowflake;

canvas.style.position = 'absolute';
canvas.style.left = canvas.style.top = '0';

var Snowflake = function () {
  this.x = 0;
  this.y = 0;
  this.vy = 0;
  this.vx = 0;
  this.r = 0;

  this.reset();
};

Snowflake.prototype.reset = function() {
  this.x = Math.random() * width;
  this.y = Math.random() * -height;
  this.vy = 1 + Math.random() * 3;
  this.vx = 0.5 - Math.random();
  this.r = 1 + Math.random() * 2;
  this.o = 0.5 + Math.random() * 0.5;
};

function generateSnowFlakes() {
  snowflakes = [];
  for (i = 0; i < particleMax; i++) {
    snowflake = new Snowflake();
    snowflake.reset();
    snowflakes.push(snowflake);
  }
}

generateSnowFlakes();

function update() {
  ctx.clearRect(0, 0, width, height);

  if (!active) {      
    return;
  }

  for (i = 0; i < particleCount; i++) {
    snowflake = snowflakes[i];
    snowflake.y += snowflake.vy;
    snowflake.x += snowflake.vx;

    ctx.globalAlpha = snowflake.o;
    ctx.beginPath();
    ctx.arc(snowflake.x, snowflake.y, snowflake.r, 0, Math.PI * 2, false);
    ctx.closePath();
    ctx.fill();

    if (snowflake.y > height) {
      snowflake.reset();
    }
  }

  requestAnimFrame(update);
}

function onResize() {
  width = sky.clientWidth;
  height = sky.clientHeight;
  canvas.width = width;
  canvas.height = height;
  ctx.fillStyle = '#D9B2EE';

  var wasActive = active;
  active = width > 0;

  if (!wasActive && active) {
    requestAnimFrame(update);
  }
}

// shim layer with setTimeout fallback
window.requestAnimFrame = (function() {
  return  window.requestAnimationFrame       ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame    ||
          function( callback ){
            window.setTimeout(callback, 10000 / 600);
          };
})();

onResize();
window.addEventListener('resize', onResize, false);

sky.appendChild(canvas);

var gui = new dat.GUI();
gui.add(window, 'particleCount').min(1).max(particleMax).step(1).name('Particles count').onFinishChange(function() {
  requestAnimFrame(update);
});



