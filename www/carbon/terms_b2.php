<?php
	$m1 = 2;
	$m2 = 2;
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

        <div class="dictionary sub_difi">
            <div class="search-box">
                <input type="text" placeholder="용어를 입력하세요. 예: 기후변화">
                <button type="button">검색</button>
            </div>
            <table class="mb">
            <colgroup>
                <col style="width: 20%;"> <!-- 용어명 열 -->
                <col style="width: 80%;"> <!-- 뜻 열 -->
            </colgroup>
                
                <thead>
                    <tr>
                        <th>용어명</th>
                        <th>뜻</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="용어명">기후변화</td>
                        <td data-label="뜻">사람의 활동으로 인하여 온실가스의 농도가 변함으로써 상당 기간 관찰되어 온 자연적인 기후변동에 추가적으로 일어나는 기후체계의 변화를 말한다.</td>
                    </tr>
                    <tr>
                        <td data-label="용어명">기후위기</td>
                        <td data-label="뜻">기후변화가 극단적인 날씨뿐만 아니라 물 부족, 식량 부족, 해양산성화, 해수면 상승, 생태계 붕괴 등 인류 문명에 회복할 수 없는 위험을 초래하여 획기적인 온실가스 감축이 필요한 상태를 말한다.</td>
                    </tr>
                    <tr>
                        <td data-label="용어명">탄소중립</td>
                        <td data-label="뜻">대기 중에 배출ㆍ방출 또는 누출되는 온실가스의 양에서 온실가스 흡수의 양을 상쇄한 순배출량이 영(零)이 되는 상태를 말한다.</td>
                    </tr>
                    <tr>
                        <td data-label="용어명">탄소중립 사회</td>
                        <td data-label="뜻">화석연료에 대한 의존도를 낮추거나 없애고 기후위기 적응 및 정의로운 전환을 위한 재정ㆍ기술ㆍ제도 등의 기반을 구축함으로써 탄소중립을 원활히 달성하고 그 과정에서 발생하는 피해와 부작용을 예방 및 최소화할 수 있도록 하는 사회를 말한다.</td>
                    </tr>
                    <tr>
                        <td data-label="용어명">온실가스</td>
                        <td data-label="뜻">적외선 복사열을 흡수하거나 재방출하여 온실효과를 유발하는 대기 중의 가스 상태의 물질로서 이산화탄소(CO2), 메탄(CH4), 아산화질소(N2O), 수소불화탄소(HFCs), 과불화탄소(PFCs), 육불화황(SF6) 및 그 밖에 대통령령으로 정하는 물질을 말한다.</td>
                    </tr>
                    <tr>
                        <td data-label="용어명">온실가스 배출</td>
                        <td data-label="뜻">사람의 활동에 수반하여 발생하는 온실가스를 대기 중에 배출ㆍ방출 또는 누출시키는 직접배출과 다른 사람으로부터 공급된 전기 또는 열(연료 또는 전기를 열원으로 하는 것만 해당한다)을 사용함으로써 온실가스가 배출되도록 하는 간접배출을 말한다.</td>
                    </tr>
                    <tr>
                        <td data-label="용어명">온실가스 감축</td>
                        <td data-label="뜻">기후변화를 완화 또는 지연시키기 위하여 온실가스 배출량을 줄이거나 흡수하는 모든 활동을 말한다.</td>
                    </tr>
                    <tr>
                        <td data-label="용어명">신·재생에너지</td>
                        <td data-label="뜻">「신에너지 및 재생에너지 개발ㆍ이용ㆍ보급 촉진법」 제2조제1호 및 제2호에 따른 신에너지 및 재생에너지를 말한다.</td>
                    </tr>
                    <tr>
                        <td data-label="용어명">에너지 전환</td>
                        <td data-label="뜻">에너지의 생산, 전달, 소비에 이르는 시스템 전반을 기후위기 대응(온실가스 감축, 기후위기 적응 및 관련 기반의 구축 등 기후위기에 대응하기 위한 일련의 활동을 말한다. 이하 같다)과 환경성ㆍ안전성ㆍ에너지안보ㆍ지속가능성을 추구하도록 전환하는 것을 말한다.</td>
                    </tr>
                    <tr>
                        <td data-label="용어명">정의로운 전환</td>
                        <td data-label="뜻">탄소중립 사회로 이행하는 과정에서 직ㆍ간접적 피해를 입을 수 있는 지역이나 산업의 노동자, 농민, 중소상공인 등을 보호하여 이행 과정에서 발생하는 부담을 사회적으로 분담하고 취약계층의 피해를 최소화하는 정책방향을 말한다.
</td>
                    </tr>
                </tbody>
            </table>
        </div>

   <div class="bbPageList">
		<span><a href="?code=press&amp;page=1&amp;bbsData=bm89Njg=||&amp;search=&amp;searchstring=&amp;gubunx=" class="on">1</a></span><span><a href="?code=press&amp;page=2&amp;bbsData=bm89Njg=||&amp;search=&amp;searchstring=&amp;gubunx=">2</a></span><span><a href="?code=press&amp;page=3&amp;bbsData=bm89Njg=||&amp;search=&amp;searchstring=&amp;gubunx=">3</a></span><span><a href="?code=press&amp;page=4&amp;bbsData=bm89Njg=||&amp;search=&amp;searchstring=&amp;gubunx=">4</a></span><span><a href="?code=press&amp;page=5&amp;bbsData=bm89Njg=||&amp;search=&amp;searchstring=&amp;gubunx=">5</a></span><span><a href="?code=press&amp;page=6&amp;bbsData=bm89Njg=||&amp;search=&amp;searchstring=&amp;gubunx=">6</a></span><span><a href="?code=press&amp;page=7&amp;bbsData=bm89Njg=||&amp;search=&amp;searchstring=&amp;gubunx=">7</a></span><span><a href="?code=press&amp;page=8&amp;bbsData=bm89Njg=||&amp;search=&amp;searchstring=&amp;gubunx=">8</a></span><span><a href="?code=press&amp;page=9&amp;bbsData=bm89Njg=||&amp;search=&amp;searchstring=&amp;gubunx=">9</a></span><span><a href="?code=press&amp;page=10&amp;bbsData=bm89Njg=||&amp;search=&amp;searchstring=&amp;gubunx=">10</a></span><span class="btn btn_next"><a href="?code=press&amp;page=2&amp;bbsData=bm89Njg=||&amp;search=&amp;searchstring=&amp;gubunx="><img src="/board/images/btn_paginr.jpg" alt="뒤로"></a></span>	</div>

    </div>
</div>
<!--subcon-->
</div>
<!--subwrap-->
<? include("../inc/footer.php" )?>