$(document).ready(function(){
	(function(){
			var $window=$(window);
			var $body=$('body');			
			var $lnb=$('#d_lnb');
			var $gnb=$('#d_gnb');
			var $bg=$('#d_lnb_bg');
			var $li=$lnb.find('li');
			var $dd=$lnb.find('dd');
			var $sub=$lnb.find('.sub');
			var $lnb_btn=$('#d_lnb_btn , #d_gnb .close, #d_lnb_mask');
			var winWidth=$window.width();
			var current=0;
			var speed=300;
			var subHeight=0;
			var inflection=1200;
			var scrollTop=0;

			
			//scrollTop
			$(document).scroll(function(){
				
				scrollTop=$window.scrollTop();
				if(scrollTop>1){
					$body.addClass('scroll');
				}else{
					$body.removeClass('scroll');
				}
			})  

			//event
			$li.bind({
				//pc
				mouseenter:function(){
					if(winWidth>=inflection){
						$body.addClass('lnb_over');
						$(this).addClass('on');
                        subHeight=$sub.find('dl').height()+90;
						$sub.stop().animate({'height':subHeight},speed);
						$bg.stop().animate({'height':subHeight},speed);
					}

				},
				mouseleave:function(){
					if(winWidth>=inflection){
						$body.removeClass('lnb_over');
						$(this).removeClass('on');
						$sub.stop().animate({'height':0},speed);
						$bg.stop().animate({'height':0},speed);
					}
				},
				//
				click:function(){			
					if(winWidth<inflection){
						if(current!=$li.index($(this))){
							$li.removeClass('on');
						}
						current=$li.index($(this));				
						$(this).toggleClass('on');
					
					}
				}
			});
			$sub.bind('click',function(e){
				//e.stopPropagation();
			});

			$lnb_btn.bind('click',function(){
				$body.toggleClass('lnb_on');
				if($body.hasClass('lnb_on')){
					$lnb.css({'left':'-100%'}).stop().animate({'left':0},speed);
					$gnb.css({'left':'-100%'}).stop().animate({'left':0},speed);
				}else{
					$lnb.css({'left':'0'}).stop().animate({'left':'-100%'},speed);
					$gnb.css({'left':'0'}).stop().animate({'left':'-100%'},speed);
					$li.removeClass('on');

				}
			});
		 
			
			//body class
			function setBodyClass(_b){
				//jquery scroll
				
				winWidth=window.innerWidth;
				if(winWidth==null){
					winWidth=$window.innerWidth();
				}

					
				if(winWidth>=inflection){
					$body.addClass('pc');
					$body.removeClass('mo');
					//$lnb.height('auto');

				}else{
					$body.addClass('mo');
					$body.removeClass('pc');
					//$lnb.height($window.outerHeight()-$lnb.position().top+scrollTop);
				}
				//$li.removeClass('on')
				
				
			};
			setBodyClass();

			$window.resize(function(){
				setBodyClass();		
			});

			setTimeout(setBodyClass,1000);
	})();

});