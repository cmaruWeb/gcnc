<?php
$m1 = 2;
$m2 = 3;
$m3 = 1;

include("../inc/top.php");
include("../inc/sub_top.php");

?>

<div class="pdinner">
    <div class="leftmenu">
        <?php include("../inc/menu.php"); ?>
    </div>
    <div class="rightContent">
        <div class="subtop">
            <h3><?= $mTitle[$m1][$m2][0] ?></h3>
        </div>
        <div class="sub_difi sub_box01 pdr50">
            <div class="net00">
                <p class="tit01 mb10">에너지</p>
                <ul class="list">
                    <li>
                        <img src="/img/zero_img01.png">
                        <b>난방온도 2℃ 낮추고 냉방온도 2℃ 높이기</b>
                    </li>
                    <li>
                        <img src="/img/zero_img02.png">
                        <b>전기밥솥 보온기능 사용 줄이기</b>
                    </li>
                    <li>
                        <img src="/img/zero_img03.png">
                        <b>냉장고 적정용량 유지하기</b>
                    </li>
                    <li>
                        <img src="/img/zero_img04.png">
                        <b>비데 절전기능 사용하기</b>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--subcon-->
</div>
<!--subwrap-->
<? include("../inc/footer.php") ?>