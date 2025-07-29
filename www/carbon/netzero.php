<?php
$m1 = 2;
$m2 = 3;
$m3 = 1;

include("../inc/top.php");
include("../inc/sub_top.php");

$code = "netzero";
include $boardDir . "/bbs_config.inc.php";
include $boardDir . "/_header.php";
?>

<div class="pdinner">
    <div class="leftmenu">
        <?php include("../inc/menu.php"); ?>
    </div>
    <div class="rightContent">
        <div class="subtop">
            <h3><?= $mTitle[$m1][$m2][0] ?></h3>
        </div>
        <div class="sub_difi">
            <div class="netzero lay">
                <p class="top-txt">가정, 기업, 학교
                    <b>탄소중립 생활 실천 안내서</b>
                </p>
                <ul class="list">
                    <li>
                        <a href="/bbsDown/netzero/2025072537857079945.pdf" target="_blank">
                            <p>
                                가정의 탄생
                            </p>
                            <em>자세히보기</em>
                            <img src="/bbsDown/netzero/2025072509989056894_s.png">
                        </a>
                    </li>
                    <li>
                        <a href="/bbsDown/netzero/2025072575535450109.pdf" target="_blank">
                            <p>
                                기업의 탄생
                            </p>
                            <em>자세히보기</em>
                            <img src="/bbsDown/netzero/2025072524058013678_s.png">
                        </a>
                    </li>
                    <li>
                        <a href="/bbsDown/netzero/2025072518375797920.pdf" target="_blank">
                            <p>
                                학교의 탄생
                            </p>
                            <em>자세히보기</em>
                            <img src="/bbsDown/netzero/2025072580297796043_s.png">
                        </a>
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