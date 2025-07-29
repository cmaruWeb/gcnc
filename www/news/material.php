<?php
$m1 = 4;
$m2 = 2;
$m3 = 1;

include("../inc/top.php");
include("../inc/sub_top.php");

$code = "material";
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
        <div class="sub_difi pdr50">
            <?php
            switch ($mode) {
                case "view":
                    include "$boardDir/view.php";
                    break;
                case "write":
                    include "$boardDir/write.php";
                    break;
                case "list":
                    include "$boardDir/list.php";
                    break;
                case "list_dal":
                    include "$boardDir/list_dal.php";
                    break;
                case "edit":
                    include "$boardDir/edit.php";
                    break;
                case "check":   //비공개 게시판 사용시 
                    include "$boardDir/bbs_check.php";
                    break;
            }
            ?>
        </div>
    </div>
</div>
<!--subcon-->
</div>
<!--subwrap-->
<? include("../inc/footer.php") ?>