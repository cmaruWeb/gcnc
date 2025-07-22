<?php
	$m1 = 10;
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

		<div class="sub_noemail">
            <div class="box">
                <h1 class="mb20"><span class="col01">이메일 무단 수집</span>을 거부합니다.</h1>
                <p class="mb20">게시된 이메일 주소가 전자우편 수집 프로그램이나 <span class="pEnter"></span>그 밖의 기술적 장치를 이용하여 <span class="fwb">무단으로 수집되는 것을 거부</span>하며, <span class="pEnter"></span>이를 위반 시 정보통신망법에 의해 형사 처벌됨을 유념하시기 바랍니다.</p>
                <p>게시일 : 2025년 8월 1일</p>
            </div>
        </div>

    </div>
</div>
<!--subcon-->
</div>
<!--subwrap-->
<? include("../inc/footer.php" )?>