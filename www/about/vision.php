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
        <div class="vm">
            <div class="box">
            <strong>Vision</strong>
            <p class="vision">고객에게 더 높은 가치를 제공하는 기업</p>
            </div><div class="box"><strong>Mission</strong>
            <ul class="mission">
                <li>
                    <i><img src="/img/ms_ic01.png" alt=""></i>
                    <b>Machines</b>
                </li>
                <li>
                <i><img src="/img/ms_ic02.png" alt=""></i>
                    <b> Values</b>
                </li>
                <li>
                <i><img src="/img/ms_ic03.png" alt=""></i>
                    <b> Ideas
                    </b>
                </li>
                <li>
                <i><img src="/img/ms_ic04.png" alt=""></i>
                    <b>Solutions</b>
                </li>
            </ul></div>
            
        </div>
    </div>
</div>

</div>
<!--subcon-->
</div>
<!--subwrap-->
<? include("../inc/footer.php" )?>