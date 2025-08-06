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
                <p>
                    <span class="label">주소</span><span class="txt">경남 김해시 진영읍 진영로265번길 330(화포천습지과학관)</span></p>
                <p>
                    <span class="label">전화</span><span class="txt">055-344-4251</span></p>
                <p>
                    <span class="label">팩스</span><span class="txt">055-322-4222</span></p>
            </div>

            <!-- * 카카오맵 - 지도퍼가기 -->
            <!-- 1. 지도 노드 -->
            <div
                id="daumRoughmapContainer1754289243217"
                class="root_daum_roughmap root_daum_roughmap_landing mapwrap"></div>

            <!-- 2. 설치 스크립트 * 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다. -->
            <script
                charset="UTF-8"
                class="daum_roughmap_loader_script"
                src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

            <!-- 3. 실행 스크립트 -->
            <script charset="UTF-8">
                new daum
                    .roughmap
                    .Lander({"timestamp": "1754289243217", "key": "6eunfyvb3yp", "mapHeight": "360"})
                    .render();
            </script>
        </div>

    </div>
</div>
<!--subcon-->
</div>
<!--subwrap-->
<? include("../inc/footer.php" )?>