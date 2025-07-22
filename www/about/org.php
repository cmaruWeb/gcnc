<?php
	$m1 = 1;
	$m2 = 3;
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
        <div class="org">
        <div class="org_wrap">
            <dl class="ceo">
                <dd>
                    <p>대표이사</p>
                </dd>
            </dl>
            <dl class="dep01">
                <dd>
                    <p>감사</p>
                </dd>
            </dl>
            <dl class="dep02">
                <dd>
                    <p>영업팀</p>
                    <ul>
                        <li>
                            <p>서울지사</p>
                        </li>
                    </ul>
                </dd>
                <dd>
                    <p>지원팀</p>
                </dd>
                <dd>
                    <p>생산팀</p>
                </dd>
                <dd>
                    <p>서비스팀</p>
                    <ul>
                        <li>
                            <p>(주)혜인 천안공장</p>
                        </li>
                        <li>
                            <p>경기도 이천 
                            유로물류</p>
                        </li>
                        <li>
                            <p>경남 양산 명천F.L.S</p>
                        </li>
                        <li>
                            <p>경기도 안성 원곡
                            (주)삼우</p>
                        </li>
                        <li>
                            <p>제주도 우성물류
                            </p>
                        </li>
                    </ul>
                </dd>
            </dl>
        </div></div>
    </div>
</div>

</div>
<!--subcon-->
</div>
<!--subwrap-->
<? include("../inc/footer.php" )?>