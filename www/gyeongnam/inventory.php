<?php
	$m1 = 3;
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
		
        <div class="sub_inven">
            <div class="titbox bmb">
                <div class="tit"><p class="h_m">2025년 온실가스감축인지예산 분석</p></div>
                <div class="con">
                    <div class="info01 mb20"><em>목적</em><p>예산이 온실가스 감축에 미치는 영향 분석 및 제도 개선·보완</p></div>
                    <div class="info01"><em>대상</em><p>2025년도 당초예산 12조 4,727억원 (일반회계+특별회계)</p></div>
                </div>
            </div>
            
            <div class="titbox">
                <div class="tit"><p class="h_m">온실가스감축인지예산 분류 기준</p></div>
                <div class="con">
                    <div class="info02">
                        <div class="item">
                            <div class="tit">
                                <p class="t01">기후 친화 사업</p>
                                <p class="t02">직·간접적인 온실가스 감축효과가 있는 사업 및 환경목표 달성을 위한 사업</p>
                            </div>
                            <div class="detail">
                                <h5>기후정책사업</h5>
                                <p>경상남도 기후 및 환경목표 달성을 위해 추진하는 사업</p>
                                <h5>부분감축사업</h5>
                                <p>예산의 목표가 온실가스 감축은 아니지만 온실가스 감축에 기여하는 사업</p>
                            </div>
                            <ul>
                                <li>온실가스 감축효과가 있는 사업 (신재생에너지발전 등)</li>
                                <li>인프라 구축사업이지만 사업 효과로 온실가스 감축효과가 있는 사업 (자전거도로, 로컬푸드 센터 건립 등)</li>
                                <li>탄소흡수원의 훼손 예방 사업 (산불예방사업)</li>
                                <li>환경 보호 등의 효과가 있는 사업</li>
                            </ul>
                        </div>
                        <div class="item">
                            <div class="tit">
                                <p class="t01">기후 부정영향사업</p>
                                <p class="t02">사업시행의 효과로 온실가스 배출량이 증가하는 사업</p>
                            </div>
                            <ul>
                                <li>인프라 구축 사업효과로 온실가스 배출량이 증가하는 사업 (도로건설, 주차장 건설 등)</li>
                            </ul>
                        </div>
                        <div class="item">
                            <div class="tit">
                                <p class="t01">기후 잠재영향사업</p>
                                <p class="t02">구체적인 기술 적용과 사업 방향 등에 따라 온실가스 감축 혹은 배출영향이 있을 수 있는 사업</p>
                            </div>
                            <ul>
                                <li>리모델링, 공간개선 사업</li>
                                <li>차량교체 지원 (사용 에너지원을 규정하지 않았을 때)</li>
                                <li>냉난방기 교체</li>
                            </ul>
                        </div>
                        <div class="item">
                            <div class="tit">
                                <p class="t01">기후 중립사업</p>
                                <p class="t02">온실가스 감축 및 배출의 영향이 거의 없는 사업 혹은 기후 영향을 정확히 파악하기 어려운 사업</p>
                            </div>
                            <ul>
                                <li>사업특성상 기후 영향을 정확히 파악하기 어려운 사업 (관광사업 중 둘레길 조성 등)</li>
                                <li>온실가스 감축 및 배출의 영향이 거의 없는 사업 (주거급여, 생계급여 등)</li>
                            </ul>
                        </div>
                    </div>
                    <!--
                    <div class="tabbox">
                        <table class="tab01">
                            <colgroup>
                                <col width="15%" />
                                <col width="15%" />
                                <col width="20%" />
                                <col width="20%" />
                                <col width="30%" />
                            </colgroup>
                            <tr>
                                <th colspan="2">사업분류</th>
                                <th colspan="2">분류기준</th>
                                <th>내용</th>
                            </tr>
                            <tr>
                                <th rowspan="2">기후 친화 사업</th>
                                <th>기후정책사업</th>
                                <td rowspan="2">직·간접적인 온실가스 감축효과가 있는 사업 및 환경목표 달성을 위한 사업</td>
                                <td>경상남도 기후 및 환경목표 달성을 위해 추진하는 사업</td>
                                <td rowspan="2">
                                    <ul class="dot_li">
                                        <li>온실가스 감축효과가 있는 사업 (신재생에너지발전 등)</li>
                                        <li>인프라 구축사업이지만 사업 효과로 온실가스 감축효과가 있는 사업 (자전거도로, 로컬푸드 센터 건립 등)</li>
                                        <li>탄소흡수원의 훼손 예방 사업 (산불예방사업)</li>
                                        <li>환경 보호 등의 효과가 있는 사업</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>부분감축사업</th>
                                <td class="bdr">예산의 목표가 온실가스 감축은 아니지만 온실가스 감축에 기여하는 사업</td>
                            </tr>
                            <tr>
                                <th colspan="2">기후 부정영향사업</th>
                                <td colspan="2">사업시행의 효과로 온실가스 배출량이 증가하는 사업</td>
                                <td>
                                    <ul class="dot_li">
                                        <li>인프라 구축 사업효과로 온실가스 배출량이 증가하는 사업 (도로건설, 주차장 건설 등)</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">기후 잠재영향사업</th>
                                <td colspan="2">구체적인 기술 적용과 사업 방향 등에 따라 온실가스 감축 혹은 배출영향이 있을 수 있는 사업</td>
                                <td>
                                    <ul class="dot_li">
                                        <li>리모델링, 공간개선 사업</li>
                                        <li>차량교체 지원 (사용 에너지원을 규정하지 않았을 때)</li>
                                        <li>냉난방기 교체</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">기후 중립사업</th>
                                <td colspan="2">온실가스 감축 및 배출의 영향이 거의 없는 사업 혹은 기후 영향을 정확히 파악하기 어려운 사업</td>
                                <td>
                                    <ul class="dot_li">
                                        <li>사업특성상 기후 영향을 정확히 파악하기 어려운 사업 (관광사업 중 둘레길 조성 등)</li>
                                        <li>온실가스 감축 및 배출의 영향이 거의 없는 사업 (주거급여, 생계급여 등)</li>
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </div>
                    -->
                </div>
            </div>

        </div>

    </div>
</div>
<!--subcon-->
</div>
<!--subwrap-->
<? include("../inc/footer.php" )?>