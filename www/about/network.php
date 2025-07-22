<?php
	$m1 = 1;
	$m2 = 5;
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
        <div class="network">
            <div class="text">
                <p class="t1">거산이에스는 당사 본사인 <span class="pEnter">천안 부품 및 서비스센터를 중심으로</span></p>
                <p class="t2">4개의 A/S 전문 대리점 통한 A/S망을 확보하여 <span class="pEnter">차별화된 서비스로 고객분들의 서비스 만족을 <span class="pEnter">향상시키고 있습니다.</span></span></p>
            </div>
            <div class="map">
                <ul class="mapList">
                    <li>
                        <strong>이천 유로물류</strong>
                        <i></i>
                    </li>
                    <li class="point">
                        <strong>천안공장</strong>
                        <i></i>
                    </li>
                    <li>
                        <strong>양산 명천 F.L.S</strong>
                        <i></i>
                    </li>
                    <li class="point">
                        <strong>거산이에스</strong>
                        <i></i>
                    </li>
                    <li>
                        <strong>우성물류</strong>
                        <i></i>
                    </li>
                </ul>
                <img src="/img/map.png" alt="거산이에스 네트워크">
            </div>
            <div class="tbBox">
                <table>
                    <colgroup>
                    </colgroup>
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>회사명</th>
                            <th>내용</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>(주)혜인 천안공장</td>
                            <td>천안 부품 & 서비스센터</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>이천 유로물류</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>양산 명천 F.L.S</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>우성물류</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>거산이에스</td>
                            <td>창원 본사</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
<!--subcon-->
</div>
<!--subwrap-->
<? include("../inc/footer.php" )?>