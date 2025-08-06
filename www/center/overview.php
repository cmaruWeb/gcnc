<?php
	$m1 = 1;
	$m2 = 2;
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
		
        <div class="sub_overview">
            <div class="info01 mb20">
                <h5>경상남도<span class="col01">탄소중립지원센터</span></h5>
                <p>Gyeongsangnam-do Carbon Neutrality Support Center</p>
            </div>
            <div class="chart bmb">
                <ul class="dep01 mb20">
                    <li><img src="../img/center/overview_i0101.jpg"></li>
                    <li><img src="../img/center/overview_i0102.jpg"></li>
                </ul>
                <ul class="dep02 mb20">
                    <li><p>운영위원회</p></li>
                </ul>
                <ul class="dep03 mb20">
                    <li><img src="../img/logo.png"><p>(재)경상남도환경재단(지정기관)</p></li>
                </ul>
                <ul class="dep04">
                    <li><img src="../img/center/overview_i0201.jpg"><div class="txt"><em>비전</em><p>2050 탄소중립, Net zero 경남</p></div></li>
                </ul>
            </div>
            <div class="titbox bmb">
                <div class="tit"><p class="h_m">설립근거</p></div>
                <div class="con">
                    <ul class="box01 dot_li">
                        <li>기후위기 대응을 위한 탄소중립·녹색성장 기본법 제68조(탄소중립지원센터의 설립),</li>
                        <li>경상남도 기후위기 대응을 위한 탄소중립·녹색성장 기본 조례 제16조(탄소중립지원센터의 설립·지정·운영 등)</li>
                    </ul>
                </div>
            </div>
            <div class="titbox">
                <div class="tit"><p class="h_m">운영목표</p></div>
                <div class="con">
                    <ul class="info02">
                        <li><img src="../img/center/overview_ic0101.png"><p>경상남도 탄소중립 정책연구</p></li>
                        <li><img src="../img/center/overview_ic0102.png"><p>도정 탄소중립 업무 지원</p></li>
                        <li><img src="../img/center/overview_ic0103.png"><p>도정 탄소중립 인식 제고 교육 및 홍보</p></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
<!--subcon-->
</div>
<!--subwrap-->
<? include("../inc/footer.php" )?>