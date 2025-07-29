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
	
        <div class="sub_org">
            <div class="chart bmb">
                <ul class="dep01">
                    <li><p>탄소중립지원센터</p></li>
                </ul>
                <ul class="dep02">
                    <li><p>센터장 (대표이사)</p></li>
                </ul>
                <ul class="dep02">
                    <li><p>팀장 (과장)</p></li>
                </ul>
                <ul class="dep03">
                    <li><p>대리</p></li>
                    <li><p>대리</p></li>
                    <li><p>사원</p></li>
                </ul>
            </div>

            <div class="titbox">
                <div class="tit"><p class="h_m">전담인력 현황</p></div>
                <div class="con">
                    <div class="tabbox">
                        <table class="tab01 tac wbu">
                            <colgroup>
                                <col width="20%"/>
                                <col width="40%"/>
                                <col width="20%"/>
                                <col width="20%"/>
                            </colgroup>
                            <tr><th>직위<br>(직급)</th><th>담당업무</th><th>전화번호</th><th>메일</th></tr>
                            <tr><td>센터장</td>
                                <td class="tal">경상남도환경재단 대표이사 겸직<br>경남 탄소중립지원센터 운영 총괄</td><td></td>
                                <td class="mail"></td></tr>
                            <tr><td>팀장<br>(과장)</td>
                                <td class="tal">경남 탄소중립지원센터 운영 사업 총괄 <br>
                                    경남 광역 단위 사업 추진 및 운영<br>
                                    경남 내 탄소중립 유관기관 협력 담당</td>
                                <td>055-344-4250</td><td>seokh135@gnen.or.kr</td></tr>
                            <tr><td>대리</td>
                                <td class="tal">경남 탄소중립지원센터 사업 운영<br>
                                    - 경남 탄소지도 제작<br>
                                    - 온실가스감축인지 예산 분석<br>
                                    - 경남 기후위기 적응대책 이행평가 지원</td>
                                <td>055-344-4252</td><td>sss2025@gnen.or.kr</td></tr>
                            <tr><td>대리</td>
                                <td class="tal">경남 탄소중립지원센터 사업 운영<br>
                                    - 경상남도 특화 정책사업 추진<br>
                                    - 온실가스감축인지 예산 분석<br>
                                    - 경남 기본계획 이행평가</td>
                                <td>055-344-4251</td><td>govlchl01030@gnen.or.kr</td></tr>
                            <tr><td>사원</td>
                                <td class="tal">경남 탄소중립지원센터 실무지원<br>
                                    - 행정 및 운영업무 지원<br>
                                    - 탄소중립/녹색성장 인식교육<br>
                                    - 탄소중립/녹색성장 행사</td>
                                <td>055-344-4253</td><td>rang12@gnen.or.kr</td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--subcon-->
</div>
<!--subwrap-->
<? include("../inc/footer.php" )?>