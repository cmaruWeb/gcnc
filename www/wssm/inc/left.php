<div class="leftcon">
	<nav id="sidemenu">
		<h2><?=$mTitle[$m1][0][0]?></h2>
		<ul class="submenu">

		<?if( $m1==1 ){?>

			<li class="smenu"><a href="<?=$mLink[1][1][1]?>" class="msub <? if($m2==1) { echo"on"; } ?>"><?=$mTitle[1][1][0]?></a>
				<ul class="sub <? if($m2==1) { echo"on"; } ?>">
					<li <? if($m3==1) { echo"class='select'"; } ?>><a href="<?=$mLink[1][1][1]?>"><?=$mTitle[1][1][1]?></a></li>
					<li <? if($m3==2) { echo"class='select'"; } ?>><a href="<?=$mLink[1][1][2]?>"><?=$mTitle[1][1][2]?></a></li>
					<li <? if($m3==3) { echo"class='select'"; } ?>><a href="<?=$mLink[1][1][3]?>"><?=$mTitle[1][1][3]?></a></li>
					<li <? if($m3==4) { echo"class='select'"; } ?>><a href="<?=$mLink[1][1][4]?>"><?=$mTitle[1][1][4]?></a></li>
				</ul>	
			</li>
			<!-- <li class="smenu"><a href="<?=$mLink[1][2][1]?>" class="msub <? if($m2==2) { echo"on"; } ?>"><?=$mTitle[1][2][0]?></a>
				<ul class="sub <? if($m2==2) { echo"on"; } ?>">
					<li <? if($m3==1) { echo"class='select'"; } ?>><a href="<?=$mLink[1][2][1]?>"><?=$mTitle[1][2][1]?></a></li>
					<li <? if($m3==2) { echo"class='select'"; } ?>><a href="<?=$mLink[1][2][2]?>"><?=$mTitle[1][2][2]?></a></li>
					<li <? if($m3==3) { echo"class='select'"; } ?>><a href="<?=$mLink[1][2][3]?>"><?=$mTitle[1][2][3]?></a></li>
					<li <? if($m3==4) { echo"class='select'"; } ?>><a href="<?=$mLink[1][2][4]?>"><?=$mTitle[1][2][4]?></a></li>
				</ul>	
			</li> -->

		<?}else if( $m1==2){?>
			<?php if ($OT_ID == "notice_master") { ?>
			<li class="smenu"><a href="/wssm/sub02/sub03_01.php?code=notice&m2=1" <? if($m2==1) { echo"class='on'"; } ?>>공지사항</a></li>
			<?php } else { ?>
			<li class="smenu"><a href="<?=$mLink[2][1][0]?>" <? if($m2==1) { echo"class='on'"; } ?>><?=$mTitle[2][1][0]?></a></li>
			<li class="smenu"><a href="<?=$mLink[2][2][0]?>" <? if($m2==2) { echo"class='on'"; } ?>><?=$mTitle[2][2][0]?></a></li>
			<?
				foreach($menu_array as $key=>$val) {
			?>
			<li class="smenu"><a href="<?=$mLink[2][$val][0]?>" <? if($m2==$val) { echo"class='on'"; } ?>><?=$mTitle[2][$val][0]?></a></li>
			<?
				}
			}
			?>

		<?}else if( $m1==3){?>

			<!--<li class="smenu"><a href="<?=$mLink[3][1][0]?>" class="msub <? if($m2==1) { echo"on"; } ?>"><?=$mTitle[3][1][0]?></a>
				<ul class="sub <? if($m2==1) { echo"on"; } ?>">
					<li <? if($m3==1) { echo"class='select'"; } ?>><a href="<?=$mLink[3][1][1]?>"><?=$mTitle[3][1][1]?></a></li>
					<li <? if($m3==2) { echo"class='select'"; } ?>><a href="<?=$mLink[3][1][2]?>"><?=$mTitle[3][1][2]?></a></li>
					<li <? if($m3==3) { echo"class='select'"; } ?>><a href="<?=$mLink[3][1][3]?>"><?=$mTitle[3][1][3]?></a></li>
					<li <? if($m3==4) { echo"class='select'"; } ?>><a href="<?=$mLink[3][1][4]?>"><?=$mTitle[3][1][4]?></a></li>
				</ul>
			</li>-->
			<!--<li class="smenu"><a href="<?=$mLink[3][2][0]?>" class="msub <? if($m2==2) { echo"on"; } ?>"><?=$mTitle[3][2][0]?></a>
				<ul class="sub <? if($m2==2) { echo"on"; } ?>">
					<li <? if($m3==1) { echo"class='select'"; } ?>><a href="<?=$mLink[3][2][1]?>"><?=$mTitle[3][2][1]?></a></li>
					<li <? if($m3==2) { echo"class='select'"; } ?>><a href="<?=$mLink[3][2][2]?>"><?=$mTitle[3][2][2]?></a></li>
				</ul>
			</li>

			<li class="smenu"><a href="<?=$mLink[3][3][0]?>" <? if($m2==3) { echo"class='on'"; } ?>><?=$mTitle[3][3][0]?></a></li>

			<li class="smenu"><a href="<?=$mLink[3][4][0]?>" class="msub <? if($m2==4) { echo"on"; } ?>"><?=$mTitle[3][4][0]?></a>
				<ul class="sub <? if($m2==4) { echo"on"; } ?>">
					<li <? if($m3==1) { echo"class='select'"; } ?>><a href="<?=$mLink[3][4][1]?>"><?=$mTitle[3][4][1]?></a></li>
					<li <? if($m3==2) { echo"class='select'"; } ?>><a href="<?=$mLink[3][4][2]?>"><?=$mTitle[3][4][2]?></a></li>
				</ul>
			</li>-->
			
			<!--<li class="smenu"><a href="<?=$mLink[3][9][0]?>" <? if($m2==9) { echo"class='on'"; } ?>><?=$mTitle[3][9][0]?></a></li>
			<li class="smenu"><a href="<?=$mLink[3][8][0]?>" <? if($m2==8) { echo"class='on'"; } ?>><?=$mTitle[3][8][0]?></a></li>-->
			<li class="smenu"><a href="<?=$mLink[3][10][0]?>" <? if($m2==10) { echo"class='on'"; } ?>><?=$mTitle[3][10][0]?></a></li>

		<?}else if( $m1==4){?>

			<li class="smenu"><a href="<?=$mLink[4][1][0]?>" <? if($m2==1) { echo"class='on'"; } ?>><?=$mTitle[4][1][0]?></a></li>
			<li class="smenu"><a href="<?=$mLink[4][2][0]?>" <? if($m2==2) { echo"class='on'"; } ?>><?=$mTitle[4][2][0]?></a></li>
			<li class="smenu"><a href="<?=$mLink[4][3][0]?>" <? if($m2==3) { echo"class='on'"; } ?>><?=$mTitle[4][3][0]?></a></li>
			<li class="smenu"><a href="<?=$mLink[4][5][0]?>" <? if($m2==5) { echo"class='on'"; } ?>><?=$mTitle[4][5][0]?></a></li>
			<li class="smenu"><a href="<?=$mLink[4][4][0]?>" <? if($m2==4) { echo"class='on'"; } ?>><?=$mTitle[4][4][0]?></a></li>
			<li class="smenu"><a href="<?=$mLink[4][6][0]?>" <? if($m2==6) { echo"class='on'"; } ?>><?=$mTitle[4][6][0]?></a></li>
			<li class="smenu"><a href="<?=$mLink[4][7][0]?>" <? if($m2==7) { echo"class='on'"; } ?>><?=$mTitle[4][7][0]?></a></li>

		<?}else if( $m1==5){?>

			<li class="smenu"><a href="<?=$mLink[5][1][0]?>" <? if($m2==1) { echo"class='on'"; } ?>><?=$mTitle[5][1][0]?></a></li>
			<li class="smenu"><a href="<?=$mLink[5][2][0]?>" <? if($m2==2) { echo"class='on'"; } ?>><?=$mTitle[5][2][0]?></a></li>
			<li class="smenu"><a href="<?=$mLink[5][3][0]?>" <? if($m2==3) { echo"class='on'"; } ?>><?=$mTitle[5][3][0]?></a></li>
			<li class="smenu"><a href="<?=$mLink[5][4][1]?>" class="msub <? if($m2==4) { echo"on"; } ?>"><?=$mTitle[5][4][0]?></a>
				<ul class="sub <? if($m2==4) { echo"on"; } ?>">
					<li <? if($m3==1) { echo"class='select'"; } ?>><a href="<?=$mLink[5][4][1]?>"><?=$mTitle[5][4][1]?></a></li>
					<li <? if($m3==2) { echo"class='select'"; } ?>><a href="<?=$mLink[5][4][2]?>"><?=$mTitle[5][4][2]?></a></li>
				</ul>	
			</li>		
			<li class="smenu"><a href="<?=$mLink[5][5][0]?>" <? if($m2==5) { echo"class='on'"; } ?>><?=$mTitle[5][5][0]?></a></li>
			<li class="smenu"><a href="<?=$mLink[5][6][0]?>" <? if($m2==6) { echo"class='on'"; } ?>><?=$mTitle[5][6][0]?></a></li>


		<?}else if( $m1==6){ ?>

			<li class="smenu"><a href="<?=$mLink[6][1][0]?>" <? if($m2==1) { echo"class='on'"; } ?>><?=$mTitle[6][1][0]?></a></li>
			<!--<li class="smenu"><a href="<?=$mLink[6][2][0]?>" <? if($m2==2) { echo"class='on'"; } ?>><?=$mTitle[6][2][0]?></a></li>-->

		<?}else if( $m1==7){?>
			<li class="smenu"><a href="<?=$mLink[7][1][0]?>" <? if($m2==1) { echo"class='on'"; } ?>><?=$mTitle[7][1][0]?></a></li>

		<?}?>
		
		</ul>

    </nav>
<script>
//서브 left_menu
$(document).ready(function(){		
	$(".msub").click(function(){		
		var tg = $(this).siblings(".sub");		
		var dis = tg.css("display");		
		if(dis == "block"){
			$(this).removeClass("on");
			tg.slideUp(300);
		}		
		if(dis == "none"){
			$(".msub").removeClass("on");
			$(this).addClass("on");
			$(".sub").slideUp(300);
			tg.slideDown(300);
		}
		return false;
	});
});
</script>

</div>