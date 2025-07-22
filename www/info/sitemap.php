<?php
	$m1 = 10;
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
		
        <div class="sub_sitemap">
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
            </ul>
        </div>

    </div>
</div>
<!--subcon-->
</div>
<!--subwrap-->
<? include("../inc/footer.php" )?>