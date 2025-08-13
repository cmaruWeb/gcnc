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
                <div class="tit"><p class="h_m">2025년 온실가스감축인지예산 분석 개요   </p></div>
                <div class="con">
                    <div class="info01 mb20"><em>목적</em><p>예산이 온실가스 감축에 미치는 영향 분석 및 제도 개선·보완</p></div>
                    <div class="info01"><em>대상</em><p>2025년도 당초예산 12조 4,727억원 (일반회계+특별회계)</p></div>
                </div>
            </div>
            
            <div class="titbox bmb">
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
                </div>
            </div>

            <div class="titbox bmb">
                <div class="tit"><p class="h_m">온실가스감축인지예산 분석</p></div>
                <div class="con">
                    <p class="h_s fwb col01 mb20">2025년도 온실가스감축인지예산 분석결과</p>
                    <p class="tar fss mb10">(단위:개수, 천원)</p>
                    <div class="tabbox">
                        <table class="tab01 tac">
                            <caption>2022년도 온실가스감축인지예산 분석결과</caption>
                            <colgroup>
                                <col>
                                <col style="width:14.5%">
                                <col style="width:14.5%">
                                <col style="width:14.5%">
                                <col style="width:14.5%">
                                <col style="width:14.5%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th scope="col">구분</th>
                                <th scope="col">합계</th>
                                <th scope="col">기후 친화</th>
                                <th scope="col">기후 부정</th>
                                <th scope="col">기후 잠재</th>
                                <th scope="col">기후 중립</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">사업수</th>
                                <td>2,810</td>
                                <td>361</td>
                                <td>144</td>
                                <td>51</td>
                                <td>2,254</td>
                            </tr>
                            <tr>
                                <th scope="row">예산액</th>
                                <td>6,194,923,255</td>
                                <td>1,720,112,741</td>
                                <td>475,335,303</td>
                                <td>169,851,258</td>
                                <td>3,829,623,953</td>
                            </tr>
                            <tr>
                                <th scope="row">비율</th>
                                <td>100%</td>
                                <td>28%</td>
                                <td>7%</td>
                                <td>3%</td>
                                <td>62%</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="mb20">* 비율 : 각 구분별 예산액/전체예산액</p>
                    <img src="../img/gn/inven_chart01.jpg" class="mb">

                    <p class="h_s fwb col01 mb20">'25년 경상남도 당초예산(일반회계+특별회계) 12조 4,727억원 중 행정운영경비, 재무활동비를 제외한 6조 1,949억원(2,810)개를 대상으로 분석</p>
                    <div class="box01 mb">
                        <ul class="dot_li">
                            <li>(분석기간) '24. 8. ~ '25. 2.</li>
                            <li>(분석대상) '25년 당초예산 일반회계 및 특별회계<br>
                            - '25년 당초예산 12,472,720,764천원 중 6,194,923,255천원(49%) 대상<br>
                            - 분석단위는 '25년 당초예산 중 세부사업(부기사업)<br>
                            ※ 행정운영경비(사무관리비, 공공운영비 등), 재무활동비 등 기후에 미치는 영향을 판단하기 모호한 소모성 경비 예산 제외</li>
                        </ul>
                    </div>

                    <p class="h_s fwb col01 mb20">분석절차</p>
                    <div class="info03 mb">
                        <ul>
                            <li><h4>예산요구서 작성·제출</h4><h5>예산담당관</h5><p>8월</p></li>
                            <li><h4>온실가스감축일지 예산 분류 실시</h4><h5>기후대기과</h5><p>8~12월</p></li>
                            <li><h4>예산(안) 확정</h4><h5>예산담당과</h5><p>12월</p></li>
                            <li><h4>온실가스감축일지 예산 분류결과 환류 및 검증</h4><h5>해당 사업부서, 전문기관</h5><p>'24.12월~'25.2월</p></li>
                            <li><h4>온실가스감축일지 예산 최종 검토</h4><h5>기후대기과, 전문기관</h5><p>'25.2월</p></li>
                        </ul>
                    </div>
                    
                    <p class="h_s fwb col01 mb20">2025년도 온실가스감축인지예산 분석결과</p>
                    <p class="tar fss mb10">(단위:개수, 천원)</p>
                    <div class="tabbox mb20">
                        <table class="tab01 tac">
                            <caption>2024년 당초예산과 비교</caption>
                            <colgroup>
                                <col style="width:14.2%">
                                <col style="width:14.2%">
                                <col style="width:14.2%">
                                <col style="width:11.2%">
                                <col style="width:14.2%">
                                <col style="width:14.2%">
                                <col style="width:14.2%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th rowspan="2" scope="col">분 류</th>
                                <th colspan="3" scope="col">사업수</th>
                                <th colspan="3" scope="col">예산</th>
                            </tr>
                            <tr>
                                <th scope="col">2024(비율)</th>
                                <th scope="col">2025(비율)</th>
                                <th scope="col">증감</th>
                                <th scope="col">2024</th>
                                <th scope="col">2025</th>
                                <th scope="col">증감</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">합계</th>
                                <td>2,722(100%)</td>
                                <td>2,810(100%)</td>
                                <td>88</td>
                                <td>6,463,849,552(100%)</td>
                                <td>6,194,923,255(100%)</td>
                                <td>△268,926,297</td>
                            </tr>
                            <tr>
                                <th scope="row">기후친화</th>
                                <td>370(13%)</td>
                                <td>361(13%)</td>
                                <td>△9</td>
                                <td>1,665,544,988(25%)</td>
                                <td>1,720,112,741(28%)</td>
                                <td>54,567,753</td>
                            </tr>
                            <tr>
                                <th scope="row">기후부정</th>
                                <td>180(7%)</td>
                                <td>144(5%)</td>
                                <td>△38</td>
                                <td>555,956,181(9%)</td>
                                <td>475,335,303(7%)</td>
                                <td>△80,620,878</td>
                            </tr>
                            <tr>
                                <th scope="row">기후중립</th>
                                <td>2,126(78%)</td>
                                <td>2,254(80%)</td>
                                <td>128</td>
                                <td>4,050,773,216(63%)</td>
                                <td>3,829,623,953(62%)</td>
                                <td>△221,149,263</td>
                            </tr>
                            <tr>
                                <th scope="row">기후잠재</th>
                                <td>46(2%)</td>
                                <td>51(2%)</td>
                                <td>5</td>
                                <td>191,575,167(3%)</td>
                                <td>169,851,258(23%)</td>
                                <td>△21,723,909</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <img src="../img/gn/inven_chart02.jpg" class="mb20">
                    <div class="box01 mb">
                        <ul class="dot_li">
                            <li>2024년과 비교하면, 2025년 대상 사업의 수가 88개 증가하였으나, 예산액은 2,689억원이 감소함에 따라 2024년 대비 2025년의 개별 세부 사업의 규모가 커졌음.</li>
                            <li>기후친화사업은 사업 수가 감소하였음에도 불구하고 예산액이 증가한 것으로 보아 기후친화적인 사업의 종류가 줄어든 대신 특정 세부 사업에 대한 예산 배정이 더 집중되었음을 의미함.</li>
                            <li>기후잠재영향사업과 기후중립사업의 사업 수는 증가하였으나 예산액은 감소하였으며, 온실가스 배출에 해당하는 기후부정영향 사업은 사업 수와 예산액 모두 감소함.</li>
                        </ul>
                    </div>
                    
                    <p class="h_m mb20">세부분석결과</p>
                    <p class="h_s fwb col01 mb10">기후 친화사업 예산</p>
                    <p class="mb20">분야별 기후친화사업을 사업 수 기준으로 보면, 총 361개 사업 중, 농림해양수산 분야가 190개(52.6%)로 가장 많으며, 환경 분야 81개(22.4%), 산업･중소기업및에너지 분야 32개(8.9%) 순으로 나타남</p>
                    <p class="tar fss mb10">(단위:개수, 천원)</p>
                    <div class="tabbox mb">
                        <table class="tab01 tac">
                            <caption>기후 친화사업 부문별 예산 규모</caption>
                            <colgroup>
                                <col style="width:30%">
                                <col style="width:15%">
                                <col style="width:15%">
                                <col style="width:20%">
                                <col style="width:20%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th scope="col" rowspan="2">분야구분</th>
                                <th scope="col" colspan="2">사업 수</th>
                                <th scope="col" colspan="2">예산</th>
                            </tr>
                            <tr>
                                <th>N</th>                        
                                <th>R</th>                        
                                <th>N</th>                        
                                <th>R</th>                        
                            </tr>
                            </thead>
                            <tbody>
                        <tr>
                                <td>합계</td>
                                <td>361</td>
                                <td>100%</td>
                                <td>1,720,112,741</td>
                                <td>100%</td>
                            </tr>
                            <tr>
                                <td>농림해양수산</td>
                                <td>190</td>
                                <td>52.6%</td>
                                <td>340,895,706</td>
                                <td>19.8%</td>
                            </tr>
                            <tr>
                                <td>환경</td>
                                <td>81</td>
                                <td>22.4%</td>
                                <td>704,249,929</td>
                                <td>40.9%</td>
                            </tr>
                            <tr>
                                <td>산업·중소기업 및 에너지</td>
                                <td>32</td>
                                <td>8.9%</td>
                                <td>92,221,600</td>
                                <td>5.4%</td>
                            </tr>
                            <tr>
                                <td>교통 및 물류</td>
                                <td>22</td>
                                <td>6.1%</td>
                                <td>118,473,830</td>
                                <td>6.9%</td>
                            </tr>
                            <tr>
                                <td>국토및지역개발</td>
                                <td>19</td>
                                <td>5.3%</td>
                                <td>199,559,226</td>
                                <td>11.6%</td>
                            </tr>
                            <tr>
                                <td>공공질서 및 안전</td>
                                <td>10</td>
                                <td>2.8%</td>
                                <td>264,444,350</td>
                                <td>15.4%</td>
                            </tr>
                        
                            <tr>
                                <td>문화 및 관광</td>
                                <td>4</td>
                                <td>1.1%</td>
                                <td>200,100</td>
                                <td>0%</td>
                            </tr>
                            <tr>
                                <td>일반공공행정</td>
                                <td>3</td>
                                <td>0.8%</td>
                                <td>68,000</td>
                                <td>0%</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <p class="h_s fwb col01 mb10">기후 부정영향사업 예산</p>
                    <p class="mb20">사업 수 기준으로 총 144개 사업 중, 교통및물류 분야와 농림해양수산 분야가 34개(23.6%)로 가장 많으며, 문화및관광 분야 24개(16.6%) 순으로 나타남</p>
                    <p class="tar fss mb10">(단위:개수, 천원)</p>
                    <div class="tabbox mb">
                        <table class="tab01 tac">
                            <caption>기후 친화사업 부문별 예산 규모</caption>
                            <colgroup>
                                <col style="width:30%">
                                <col style="width:15%">
                                <col style="width:15%">
                                <col style="width:20%">
                                <col style="width:20%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th scope="col" rowspan="2">분야구분</th>
                                <th scope="col" colspan="2">사업 수</th>
                                <th scope="col" colspan="2">예산</th>
                            </tr>
                            <tr>
                                <th>N</th>                        
                                <th>R</th>                        
                                <th>N</th>                        
                                <th>R</th>                        
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>합계</td>
                                <td>144</td>
                                <td>100%</td>
                                <td>475,335,303</td>
                                <td>100%</td>
                            </tr>
                                
                            <tr>
                                <td>교통 및 물류</td>
                                <td>34</td>
                                <td>23.6%</td>
                                <td>183,171,000</td>
                                <td>38.5%</td>
                            </tr>
                            <tr>
                                <td>농림해양수산</td>
                                <td>34</td>
                                <td>23.6%</td>
                                <td>86,189,563</td>
                                <td>18.1%</td>
                            </tr>
                            <tr>
                                <td>문화 및 관광</td>
                                <td>24</td>
                                <td>16.6%</td>
                                <td>72,089,300</td>
                                <td>15.2%</td>
                            </tr>
                            
                        
                            <tr>
                                <td>국토및지역개발</td>
                                <td>21</td>
                                <td>14.6%</td>
                                <td>36,211,000</td>
                                <td>7.6%</td>
                            </tr>
                            <tr>
                                <td>공공질서 및 안전</td>
                                <td>12</td>
                                <td>8.3%</td>
                                <td>10,410,932</td>
                                <td>2.2%</td>
                            </tr>
                        
                        
                            <tr>
                                <td>사회복지</td>
                                <td>8</td>
                                <td>5.6%</td>
                                <td>26,693,508</td>
                                <td>5.6%</td>
                            </tr>
                            
                            <tr>
                                <td>산업·중소기업 및 에너지</td>
                                <td>8</td>
                                <td>5.6%</td>
                                <td>25,197,000</td>
                                <td>5.3%</td>
                            </tr>
                            
                            <tr>
                                <td>환경</td>
                                <td>3</td>
                                <td>2.1%</td>
                                <td>35,373,000</td>
                                <td>7.5%</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <p class="h_s fwb col01 mb10">기후 잠재영향사업 예산</p>
                    <p class="mb20">사업수 기준으로 총 51개 사업 중, 사회복지 분야가 24개(47.1%) 사업으로 가장 많고, 문화및관광 분야 11개(21.6%), 농림해양수산 분야 7개(13.7%) 순으로 나타남</p>
                    <p class="tar fss mb10">(단위:개수, 천원)</p>
                    <div class="tabbox mb">
                        <table class="tab01 tac">
                            <caption>기후 잠재영향사업 부문별 예산 규모</caption>
                            <colgroup>
                                <col style="width:30%">
                                <col style="width:15%">
                                <col style="width:15%">
                                <col style="width:20%">
                                <col style="width:20%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th scope="col" rowspan="2">분야구분</th>
                                <th scope="col" colspan="2">사업 수</th>
                                <th scope="col" colspan="2">예산</th>
                            </tr>
                            <tr>
                                <th>N</th>                        
                                <th>R</th>                        
                                <th>N</th>                        
                                <th>R</th>                        
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>합계</td>
                                <td>51</td>
                                <td>100%</td>
                                <td>169,851,258</td>
                                <td>100%</td>
                            </tr>
                            <tr>
                                <td>사회복지</td>
                                <td>24</td>
                                <td>47.1%</td>
                                <td>8,024,161</td>
                                <td>4.7%</td>
                            </tr>
                            <tr>
                                <td>문화 및 관광</td>
                                <td>11</td>
                                <td>21.6%</td>
                                <td>15,555,800</td>
                                <td>9.2%</td>
                            </tr>
                            
                            <tr>
                                <td>농림해양수산</td>
                                <td>7</td>
                                <td>13.7%</td>
                                <td>92,446,656</td>
                                <td>54.4%</td>
                            </tr>
                            <tr>
                                <td>국토 및 지역개발</td>
                                <td>4</td>
                                <td>7.8%</td>
                                <td>42,592,200</td>
                                <td>25.1%</td>
                            </tr>
                            
                            <tr>
                                <td>산업·중소기업 및 에너지</td>
                                <td>2</td>
                                <td>3.9%</td>
                                <td>6,488,100</td>
                                <td>3.8%</td>
                            </tr>
                            <tr>
                                <td>교통 및 물류</td>
                                <td>2</td>
                                <td>3.9%</td>
                                <td>3,630,000</td>
                                <td>2.1%</td>
                            </tr>
                            <tr>
                                <td>공공질서 및 안전</td>
                                <td>1</td>
                                <td>2.0%</td>
                                <td>1,114,341</td>
                                <td>0.7%</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="btnbox">
                        <a href="../file/gn/inven_2025_01.hwp" download="2025년도 온실가스감축인지예산서(친화)">2025년도 온실가스감축인지예산서(친화)</a>
                        <a href="../file/gn/inven_2025_02.hwp" download="2025년도 온실가스감축인지예산서(부정)">2025년도 온실가스감축인지예산서(부정)</a>
                        <a href="../file/gn/inven_2025_03.hwp" download="2025년도 온실가스감축인지예산서(잠재)">2025년도 온실가스감축인지예산서(잠재)</a>
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