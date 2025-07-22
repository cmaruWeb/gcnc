<?php
	$m1 = 1;
	$m2 = 4;
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
        </div>
		
        <div class="sub_map">
            <div class="info01 mb">
                <p><span class="label">주소</span><span class="txt">경상남도 김해시 전하동 515-3<br><em>2025년 9월 이후 사무실 이사 예정 (이사 예정지 : 경상남도 김해시 진영로265번길 330 화포천습지보전관리센터)</em></span></p>
                <p><span class="label">전화</span><span class="txt">055-344-4200</span></p>
                <p><span class="label">팩스</span><span class="txt">055-322-4222</span></p>
            </div>

            <div id="daumRoughmapContainer1752814423148" class="root_daum_roughmap root_daum_roughmap_landing mapwrap"></div>
            <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>
            <script charset="UTF-8">
                new daum.roughmap.Lander({
                    "timestamp" : "1752814423148",
                    "key" : "5tnzqp4vcvu",
                    "mapHeight" : "360"
                }).render();
            </script>
        </div>

    </div>
</div>
<!--subcon-->
</div>
<!--subwrap-->
<? include("../inc/footer.php" )?>