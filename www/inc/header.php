<? include("../inc/menu_link.php"); ?>
<?php
$menuCount = [
    1 => 5, 
    2 => 4, 
    3 => 5, 
    4 => 4  
];
?>
<div id="header">
    <div class="bg">
    </div>

    <div id="hs1">
        <div class="d_container">
            <div id="d_gnb">
                <a href="/">경상남도 탄소중립지원센터</a>
                <div class="close">
                    <span></span>
                </div>
            </div>
        </div>
    </div>


    <div id="hs2">
        <div class="d_container">
            <div id="d_lnb_btn">
                <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
            </div>
            <h1 class="logo"><a href="../main/main.php">경상남도 탄소중립지원센터</a></h1>
            <div id="d_lnb">
                <div id="d_lnb_bg">
                    <div class="d_container">
                    </div>
                </div>
                <ul>
                                        <?php
                    foreach ($menuCount as $mainIdx => $subCount) {
                        echo "<li class='d{$mainIdx}'><a href='#'>{$mTitle[$mainIdx][0][0]}</a>\n";
                        echo "<div class='sub'><dl>\n";
                        for ($i = 1; $i <= $subCount; $i++) {
                            echo "<dd><a href='{$mLink[$mainIdx][$i][0]}'>{$mTitle[$mainIdx][$i][0]}</a></dd>\n";
                        }
                        echo "</dl></div></li>\n";
                    }
                    ?>
                    <li class="tail">
                        <a href="<?= $mLink[10][3][0] ?>" class="sitemap"><span></span><span></span><span></span></a>
                    </li>
                </ul>
            </div>

        </div>
        <div id="d_lnb_mask">
        </div>
    </div>
</div>

<div class="d_clear">
</div>