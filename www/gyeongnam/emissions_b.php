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
            <div class="tit01 mb20"><p>직접</p></div>
            <div class="info01 mb20"><em>CO₂eq</em><span>(단위 : Gg CO₂eq)</span></div>
            <div class="tabbox bmb">
                <table class="tab01 type01 tac">
                    <tr>
                        <th>06KRF</th>
                        <th colspan="2">지자체</th>
                        <th colspan="13">배출연도</th>
                    </tr>
                    <tr>
                        <th>구분</th>
                        <th>광역</th>
                        <th>기초</th>
                        <th>2010</th><th>2011</th><th>2012</th><th>2013</th><th>2014</th><th>2015</th><th>2016</th>
                        <th>2017</th><th>2018</th><th>2019</th><th>2020</th><th>2021</th><th>2022</th>
                    </tr>
                    <tr>
                        <th>총배출량</th><td>경남</td><td>광역</td><td>75,740.10</td><td>76,994.52</td><td>76,611.74</td><td>75,535.04</td><td>71,639.31</td><td>71,433.09</td><td>71,459.58</td><td>67,386.71</td><td>64,448.60</td><td>59,203.23</td><td>46,022.85</td><td>52,905.43</td><td>58,624.67</td>
                    </tr>
                    <tr>
                        <th>순배출량</th><td>경남</td><td>광역</td><td>63,577.44</td><td>64,880.59</td><td>65,350.05</td><td>70,117.47</td><td>66,260.22</td><td>65,938.95</td><td>65,972.78</td><td>62,480.09</td><td>59,781.28</td><td>54,852.07</td><td>41,654.09</td><td>48,529.75</td><td>54,087.15</td>
                    </tr>
                    <tr>
                        <th>에너지</th><td>경남</td><td>광역</td><td>71,499.47</td><td>72,688.67</td><td>72,373.03</td><td>71,416.98</td><td>67,549.96</td><td>67,368.84</td><td>67,374.98</td><td>63,295.74</td><td>60,738.89</td><td>55,478.92</td><td>42,411.80</td><td>49,259.38</td><td>55,081.91</td>
                    </tr>
                    <tr>
                        <th>A. 연료연소</th><td>경남</td><td>광역</td><td>71,319.57</td><td>72,500.45</td><td>72,173.74</td><td>71,220.19</td><td>67,378.24</td><td>67,238.78</td><td>67,234.49</td><td>63,150.91</td><td>60,571.00</td><td>55,322.41</td><td>42,255.80</td><td>49,092.55</td><td>54,903.40</td>
                    </tr>
                    <tr>
                        <th>B. 탈루</th><td>경남</td><td>광역</td><td>179.90</td><td>188.22</td><td>199.29</td><td>196.79</td><td>171.72</td><td>130.06</td><td>140.49</td><td>144.83</td><td>167.89</td><td>156.51</td><td>155.99</td><td>166.82</td><td>178.52</td>
                    </tr>
                    <tr>
                        <th>산업공정 및 제품 생산</th><td>경남</td><td>광역</td><td>560.56</td><td>486.72</td><td>492.73</td><td>492.58</td><td>509.52</td><td>483.83</td><td>511.92</td><td>490.58</td><td>423.53</td><td>505.64</td><td>425.74</td><td>478.60</td><td>442.48</td>
                    </tr>
                    <tr>
                        <th>농업</th><td>경남</td><td>광역</td><td>2,526.82</td><td>2,472.17</td><td>2,484.12</td><td>2,346.75</td><td>2,295.98</td><td>2,267.73</td><td>2,220.30</td><td>2,183.16</td><td>2,134.32</td><td>2,135.48</td><td>2,088.33</td><td>2,095.42</td><td>2,053.68</td>
                    </tr>
                    <tr>
                        <th>LULUCF</th><td>경남</td><td>광역</td><td>-12,162.66</td><td>-12,113.93</td><td>-11,261.70</td><td>-8,417.58</td><td>-5,379.08</td><td>-5,494.13</td><td>-5,486.80</td><td>-4,906.62</td><td>-4,667.32</td><td>-4,351.16</td><td>-4,368.76</td><td>-4,375.68</td><td>-4,537.52</td>
                    </tr>
                    <tr>
                        <th>폐기물</th><td>경남</td><td>광역</td><td>1,153.26</td><td>1,346.97</td><td>1,261.87</td><td>1,283.84</td><td>1,312.68</td><td>1,352.37</td><td>1,357.27</td><td>1,417.24</td><td>1,151.86</td><td>1,083.19</td><td>1,096.99</td><td>1,072.03</td><td>1,046.60</td>
                    </tr>
                </table>
            </div>
            
            <div class="tit01 mb20"><p>간접</p></div>
            <div class="info01 mb20"><em>CO₂eq</em><span>(단위 : Gg CO₂eq)</span></div>
            <div class="tabbox">
                <table class="tab01 type01 tac">
                    <tr>
                        <th>06 KRF</th>
                        <th colspan="2">지자체</th>
                        <th colspan="13">배출연도</th>
                    </tr>
                    <tr>
                        <th>구분</th>
                        <th>광역</th>
                        <th>기초</th>
                        <th>2010</th><th>2011</th><th>2012</th><th>2013</th><th>2014</th><th>2015</th><th>2016</th>
                        <th>2017</th><th>2018</th><th>2019</th><th>2020</th><th>2021</th><th>2022</th>
                    </tr>
                    <tr>
                        <th>간접배출량 합계</th><td>경남</td><td>광역</td><td>20,178.67</td><td>21,089.39</td><td>20,678.58</td><td>21,155.02</td><td>20,090.78</td><td>20,094.44</td><td>20,463.74</td><td>20,690.92</td><td>21,095.53</td><td>19,397.90</td><td>17,495.69</td><td>18,600.06</td><td>18,065.17</td>
                    </tr>
                    <tr>
                        <th>간접(전력, 열) 합계</th><td>경남</td><td>광역</td><td>18,829.29</td><td>19,593.04</td><td>19,256.02</td><td>19,610.56</td><td>18,609.26</td><td>18,621.26</td><td>19,102.09</td><td>19,256.72</td><td>19,791.12</td><td>18,161.97</td><td>16,233.16</td><td>17,384.55</td><td>16,863.35</td>
                    </tr>
                    <tr>
                        <th>전력</th><td>경남</td><td>광역</td><td>18,605.65</td><td>19,412.87</td><td>19,102.67</td><td>19,458.27</td><td>18,464.72</td><td>18,469.78</td><td>18,950.81</td><td>19,125.91</td><td>19,648.80</td><td>18,039.04</td><td>16,106.36</td><td>17,258.54</td><td>16,739.92</td>
                    </tr>
                    <tr>
                        <th>A.연료연소</td><td>경남</td><td>광역</td><td>18,605.65</td><td>19,412.87</td><td>19,102.67</td><td>19,458.27</td><td>18,464.72</td><td>18,469.78</td><td>18,950.81</td><td>19,125.91</td><td>19,648.80</td><td>18,039.04</td><td>16,106.36</td><td>17,258.54</td><td>16,739.92</td>
                    </tr>
                    <tr>
                        <th>열</th><td>경남</td><td>광역</td><td>223.64</td><td>180.16</td><td>153.34</td><td>153.23</td><td>144.54</td><td>151.48</td><td>151.28</td><td>130.82</td><td>142.32</td><td>122.93</td><td>126.80</td><td>126.01</td><td>123.43</td>
                    </tr>
                    <tr>
                        <th>A.연료연소</th><td>경남</td><td>광역</td><td>223.64</td><td>180.16</td><td>153.34</td><td>153.23</td><td>144.54</td><td>151.48</td><td>151.28</td><td>130.82</td><td>142.32</td><td>122.93</td><td>126.80</td><td>126.01</td><td>123.43</td>
                    </tr>
                    <tr>
                        <th>폐기물</th><td>경남</td><td>광역</td><td>1,349.38</td><td>1,496.35</td><td>1,422.56</td><td>1,535.52</td><td>1,481.52</td><td>1,473.17</td><td>1,361.65</td><td>1,434.19</td><td>1,304.41</td><td>1,235.93</td><td>1,262.52</td><td>1,215.51</td><td>1,201.83</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</div>
<!--subcon-->
</div>
<!--subwrap-->
<? include("../inc/footer.php" )?>