<?php
	$m1 = 3;
	$m2 = 1;
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
        
        <div class="sub_emis">
            
                    <div class="scroll-box">
                        <table class="tab01 type01 tac">
                            <thead>
                                <tr>
                                    <th rowspan="2">구분</th>
                                    <th colspan="7">연도</th>
                                </tr>
                                <tr>
                                    <th>2016</th>
                                    <th>2017</th>
                                    <th>2018</th>
                                    <th>2019</th>
                                    <th>2020</th>
                                    <th>2021</th>
                                    <th>2022</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>총배출합계</strong>
                                    </td>
                                    <td>14,780.8</td>
                                    <td>15,588.2</td>
                                    <td>16,100.1</td>
                                    <td>15,691.7</td>
                                    <td>15,570.4</td>
                                    <td>15,298.7</td>
                                    <td>15,078.7</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>순배출합계</strong>
                                    </td>
                                    <td>20,267.6</td>
                                    <td>20,494.8</td>
                                    <td>20,767.4</td>
                                    <td>20,042.9</td>
                                    <td>19,939.2</td>
                                    <td>19,674.3</td>
                                    <td>19,616.2</td>
                                </tr>
                                <tr>
                                    <td><strong>도시건물</strong></td>
                                    <td>9,498.9</td>
                                    <td>9,781.4</td>
                                    <td>10,321.8</td>
                                    <td>9,532.4</td>
                                    <td>9,532.4</td>
                                    <td>9,098.4</td>
                                    <td>9,101.6</td>
                                </tr>
                                <tr>
                                    <td><strong>수송/교통</strong></td>
                                    <td>7,189.1</td>
                                    <td>7,098.4</td>
                                    <td>7,009.5</td>
                                    <td>7,141.8</td>
                                    <td>7,058.9</td>
                                    <td>7,267.7</td>
                                    <td>7,261.1</td>
                                </tr>
                                <tr>
                                    <td><strong>농축수산</strong></td>
                                    <td>2,217.9</td>
                                    <td>2,180.9</td>
                                    <td>2,131.7</td>
                                    <td>2,132.7</td>
                                    <td>2,085.4</td>
                                    <td>2,092.7</td>
                                    <td>2,051.7</td>
                                </tr>
                                <tr>
                                    <td><strong>폐기물</strong></td>
                                    <td>1,361.7</td>
                                    <td>1,434.2</td>
                                    <td>1,304.4</td>
                                    <td>1,235.9</td>
                                    <td>1,262.5</td>
                                    <td>1,215.5</td>
                                    <td>1,201.8</td>
                                </tr>
                                <tr>
                                    <td class="tb-bg"><strong>산림녹지환경</strong></td>
                                    <td class="tb-bg">-5,486.8</td>
                                    <td class="tb-bg">-4,906.6</td>
                                    <td class="tb-bg">-4,667.3</td>
                                    <td class="tb-bg">-4,351.2</td>
                                    <td class="tb-bg">-4,368.8</td>
                                    <td class="tb-bg">-4,375.7</td>
                                    <td class="tb-bg">-4,537.5</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
        </div>

    </div>
</div>
<!--subcon-->
</div>
<!--subwrap-->
<? include("../inc/footer.php" )?>