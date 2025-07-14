<div id="footer">
    <div class="bottom_li_wrap">
        <div class="bottom_li">
            <ul class="pdinner">
                <li>
                    <a href="<?=$mLink[10][1][0]?>"><?=$mTitle[10][1][0]?></a>
                </li>
                <li class="cor">
                    <a href="<?=$mLink[10][2][0]?>"><?=$mTitle[10][2][0]?></a>
                </li>
                <li>
                    <a href="<?=$mLink[1][3][0]?>"><?=$mTitle[1][3][0]?></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="pdinner">
        <h5>
            경상남도탄소중립지원센터
        </h5>
        <ul class="f_info">
            <li>
                경남 김해시 전하로208번길 7-13 1층 ~ 2층</li>
            <li>
                <span>TEL :</span>
                055-344-4251
            </li>
            <li>
                <span>FAX :</span>
                055-344-4251
        </ul>
        <p>Copyright ⓒ
            <b>
            2025 경상남도탄소중립지원센터</b>. All Rights Reserved.<span class="mEnter"></span>
            Designed by
            <a href="http://cmaru.com" target="_blank">크리에이티브마루</a>
        </p>

    </div>
</div>

<div id="pageup">
    <ul>
        <li class="page_up"></li>
    </ul>
</div>
<script type="text/javascript">
    $(".page_up").pageup();
</script>

<!-- litebox -->
<script src="../plugin/litebox/jquery-ui.min.js"></script>
<link rel="stylesheet" media="all" href="../plugin/litebox/litebox.css"/>
<script type="text/javascript" src="../plugin/litebox/litebox.js"></script>
<script type="text/javascript" src="../plugin/litebox/backbone.js"></script>
<script type="text/javascript" src="../plugin/litebox/images-loaded.min.js"></script>
<script type="text/javascript">
    $('.litebox').liteBox();
</script>
<!-- litebox -->

<script type="text/javascript" src="../plugin/share/wow.js"></script>
<link rel="stylesheet" media="all" href="../plugin/share/animate.css">
<script>
    wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 100,
        callback: function (box) {
            console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
    });
    wow.init();
</script>

<script>
    const defaultElem = document.querySelector('#default')
    if (typeof defaultElem != 'undefined' && defaultElem != null) {
        defaultElem.click()
    }
   
    function openTab(evt, tabName) {
        var i,
            tabcontent,
            tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i]
                .className
                .replace(" on", "");
        }
        document
            .getElementById(tabName)
            .style
            .display = "block";
        evt.currentTarget.className += " on";
    }
</script>