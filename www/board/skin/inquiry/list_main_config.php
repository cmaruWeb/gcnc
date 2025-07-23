<?php
if($top=='2')	{
	$not_ico  = "<span class='notice'>공지</span>";
} else if(!empty($gubunx)) {
	$not_ico  = "<span class='cate'>[".$gubunx."]</span>";

}	else {
	$not_ico  = "<span class='num'>".$listNo."</span>";
}

$arowImage="<img src='$boardURL/images/re.png'>";  // List 답변 화살표
$secret_ico="<img src='$boardURL/images/lock02.png' >";      //비공개 아이콘

//unix시간으로 값이 작으면 더 과거
$div=60*60*24*1;    //1 일 이내 new 이미지
if($writeday < $today - $div)  $new_gif = "";

//파일첨부여부
if(empty($file1) && empty($file2)&& empty($file3)&& empty($file4)&& empty($file5)) $ex_file = "&nbsp;";

//답변글에 대해서
if(!empty($level_w)) $level_img= $level_w.$arowImage."&nbsp;";
else $level_img="";

//$title = strcut_utf8($title, 25, false, '...');
$m2_row=MyFetchArray("select * from $MEMBER_TB where id='$id'", $connect);
if($m2_row['levelx'] != "1") {
	if($OT_LEVELX!=1){
		$name = substr($name,0,3)."**";
	}
}

//제목 링크 및 길이설정
if (((intval($aRead) >= intval($OT_LEVELX)) && (!empty($OT_ID))) || (intval($aRead) == 5)) {
	$show_title = "<a href='$_SELF?code=$code&amp;page=$page&amp;bbsData=$bbsData&amp;mode=view&amp;m2=$m2'>".$title."</a>";
	$show_go = "$_SELF?code=$code&amp;page=$page&amp;bbsData=$bbsData&amp;mode=view&amp;m2=$m2";
	if($secret==1){
	   if( (($id==$OT_ID) && (!empty($OT_ID))) || (($OT_ID==$status) && (!empty($OT_ID))) )	{
	   }	else	if((intval($OT_LEVELX) > 2) || (empty($OT_LEVELX)) ) {
			$show_title = "<a href='$_SELF?code=$code&amp;page=$page&amp;bbsData=$bbsData&amp;mode=view&amp;m2=$m2'>".$title."</a>";
			$show_go = "$_SELF?code=$code&amp;page=$page&amp;bbsData=$bbsData&amp;mode=check&amp;m2=$m2";
	   }
	}
}else {
	$show_title = $title;
	$show_go = "";
}




?>
