<?php
	$m1 = 1;
	$m2 = 7;
	$m3 = 1;

	include("../inc/top.php" );
	include("../inc/sub_top.php" );
?>

<div class="pdinner">
    
    <div class="leftmenu">
        <?php include("../inc/menu.php" ); ?>
    </div>
    <div class="rightContent">
        <div class="subtop">
            <h3><?=$mTitle[$m1][$m2][0]?></h3>
        </div><section class="location-wrap">

  <div class="location-content">
    <div class="location-map">
      <iframe 
        src="https://www.google.com/maps?q=경상남도 창원시 의창구 차룡로 48번길 44 스마트업타워&output=embed" 
        width="100%" 
        height="100%" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy"
      ></iframe>
    </div>

    <div class="location-info">
      <ul>
        <li class="icon-address"><strong>주소</strong> 경상남도 창원시 의창구 차룡로 48번길 44, 스마트업타워 10층 1007호 (팔용동)</li>
        <li class="icon-phone"><strong>대표번호</strong> 055-275-4989</li>
        <li class="icon-fax"><strong>팩스</strong> 055-275-4990</li>
      </ul>
    </div>
  </div>
</section>

    </div>
</div>

</div>
<!--subcon-->
</div>
<!--subwrap-->
<? include("../inc/footer.php" )?>