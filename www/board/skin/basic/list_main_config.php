<?php
if($top=='2')	{
	$not_ico  = "<span class='notice'>공지</span>";
} else if(!empty($gubunx)) {
	$not_ico  = "<span class='cate'>[".$gubunx."]</span>";

}	else {
	$not_ico  = "<span class='num'>".$listNo."</span>";
}


//unix시간으로 값이 작으면 더 과거
$div=60*60*24*1;    //1 일 이내 new 이미지
if($writeday < $today - $div)  $new_gif = "";

//파일첨부여부
if(empty($file1) && empty($file2)&& empty($file3)&& empty($file4)&& empty($file5)) $ex_file = "&nbsp;";

//답변글에 대해서
if(!empty($level_w)) $level_img= $level_w.$arowImage."&nbsp;";
else $level_img="";


//제목 링크 및 길이설정
if ((($aRead >= $OT_LEVELX) AND (!empty($OT_ID))) OR ($aRead == '5')) {
	$show_title = "<a href='$_SELF?code=$code&amp;page=$page&amp;bbsData=$bbsData&amp;mode=view&amp;m2=$m2'>".$title."</a>";
	$show_go = "$_SELF?code=$code&amp;page=$page&amp;bbsData=$bbsData&amp;mode=view&amp;m2=$m2";
}else {
	$show_title = $title;
	$show_go = "";
}





?>
