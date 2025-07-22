<!-- 2차메뉴_S -->
<div class="menu_wrap">
    <div class="inner">

        <div id="sub_drop">
            <!-- 홈 버튼 -->
            <div class="dropdown home">
                <a href="../main/main.php"><img src="../img/home.png" alt="메인으로"/></a>
            </div>

            <!-- 1차 드롭다운 메뉴 -->
            <div class="dropdown deph01">
                <a onclick="myFunction2()" class="dropbtn"><?=$mTitle[$m1][0][0]?></a>
                <div id="dropdown2" class="dropmenu">
                    <ul>
                        <li><a href="<?=$mLink[1][1][0]?>"><?=$mTitle[1][0][0]?></a></li> 
                        <li><a href="<?=$mLink[2][1][0]?>"><?=$mTitle[2][0][0]?></a></li> 
                        <li><a href="<?=$mLink[3][1][0]?>"><?=$mTitle[3][0][0]?></a></li> 
                        <li><a href="<?=$mLink[4][1][0]?>"><?=$mTitle[4][0][0]?></a></li> 
                        <li><a href="<?=$mLink[10][1][0]?>"><?=$mTitle[10][0][0]?></a></li>
                    </ul>
                </div>
            </div>

            <!-- 2차 드롭다운 메뉴 -->
            <div class="dropdown deph02">
                <a onclick="myFunction3()" class="dropbtn"><?=$mTitle[$m1][$m2][0]?></a>
                <div id="dropdown3" class="dropmenu">
                    <?php if ($m1 == 1) { ?> 
                        <ul>
                            <?php for ($i = 1; $i <= 5; $i++) { ?>
                                <li><a href="<?=$mLink[1][$i][0]?>"><?=$mTitle[1][$i][0]?></a></li>
                            <?php } ?>
                        </ul>
                    <?php } else if ($m1 == 2) { ?> 
                        <ul>
                            <?php for ($i = 1; $i <= 4; $i++) { ?>
                                <li><a href="<?=$mLink[2][$i][0]?>"><?=$mTitle[2][$i][0]?></a></li>
                            <?php } ?>
                        </ul>
                    <?php } else if ($m1 == 3) { ?> 
                        <ul>
                            <?php for ($i = 1; $i <= 5; $i++) { ?>
                                <li><a href="<?=$mLink[3][$i][0]?>"><?=$mTitle[3][$i][0]?></a></li>
                            <?php } ?>
                        </ul>
                    <?php } else if ($m1 == 4) { ?> 
                        <ul>
                            <?php for ($i = 1; $i <= 4; $i++) { ?>
                                <li><a href="<?=$mLink[4][$i][0]?>"><?=$mTitle[4][$i][0]?></a></li>
                            <?php } ?>
                        </ul>
                    <?php } else if ($m1 == 10) { ?> <!-- 홈페이지 안내 -->
                        <ul>
                            <?php for ($i = 1; $i <= 3; $i++) { ?>
                                <li><a href="<?=$mLink[10][$i][0]?>"><?=$mTitle[10][$i][0]?></a></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- 2차메뉴_E -->
