<?
$rowx2 = MyFetchArray("select * from $DB_table_bbsdata where idx='$idx' ",  $connect);
$ref = $rowx2['ref'];

//비공개 게시판) --------------------------------
if(($OT_ID==$rowx2['id']) && (!empty($OT_ID)) )	{
}	else if((($bbsAuthRow['aClosed'] == 1)  && ($rowx2['secret'] == 1)) && ($OT_LEVELX > 2)){
	if(empty($_POST['sc'])) {
		MsgView("권한이 없습니다. 회원인증 후 사용하세요!",-1);
		exit;
	}
}


$gubunx = $rowx2['gubunx'];
$name	= $rowx2['name'];
$title	= $rowx2['title'];
$email	= $rowx2['email'];
$homepage	= $rowx2['homepage'];
$content	= $rowx2['content'];
$comment_cnt = $rowx2['comment_cnt'];
$registerDay = $rowx2['registerDay'];
$readCnt	= PriceFormat($rowx2['readCnt']);
$ref		= $rowx2['ref'];
$re_level	= $rowx2['re_level'];
$secret		= $rowx2['secret'];
$top		= $rowx2['top'];
$id			= $rowx2['id'];
$strdat		= $rowx2['strdat'];
$enddat		= $rowx2['enddat'];
$size		= $rowx2['size'];
$chk_go_url		= $rowx2['chk_go_url'];
$go_url		= $rowx2['go_url'];
$vebnam		= $rowx2['vebnam'];
$address	= $rowx2['address'];
$area		= $rowx2['area'];
$telnum		= $rowx2['telnum'];
$mobile		= $rowx2['mobile'];
$pumnam		= $rowx2['pumnam'];
$link1		= $rowx2['link1'];
$link2		= $rowx2['link2'];
$link3		= $rowx2['link3'];
$event_year		= $rowx2['event_year'];
$event_mon		= $rowx2['event_mon'];
$event_day		= $rowx2['event_day'];
$status		= $rowx2['status'];
$per_date		= $row['per_date'];
$yiframe		= htmlspecialchars_decode($rowx2['yiframe']); //유튜브 iframe 소스
$yiframe = str_replace("&#34;","\"",$yiframe);
for($i=1; $i<=10; $i++){
	${'col'.$i} = $rowx2['col'.$i];
}

$p_size = explode("|",$size);

//업로드 파일
$fileExistCnt = 0;
for($i=1; $i<=7; $i++){
	${'file'.$i} = $rowx2['file'.$i];
	${'fileName'.$i} = urldecode($rowx2['fileName'.$i]);
	if (${'file'.$i} != "") $fileExistCnt++;
}


//일정 게시판--------------------------------------
$eventDay = $event_year."년 ".$event_mon."월 ".$event_day."일";
//------------------------------------------------>


///본인 확인
if(empty($OT_ID)) {
	$sign_ok = "";
	$mx_levelx = "5";
} else if($rowx2['id'] == $OT_ID) {
	$sign_ok = "1";
	$mx_row=MyFetchArray("select * from tb_member where id='$OT_ID' ", $connect);
	$mx_levelx = $mx_row['levelx'];
} else if($rowx2['name'] == $sessionName) {
	$sign_ok = "1";
	$mx_levelx = "4";
} else if($OT_LEVELX <= 2) {
	$sign_ok = "1";
	$mx_levelx = "4";
} else {
	$sign_ok = "";
	$mx_levelx = "4";
}
$_SESSION['sign_ok'] = $sign_ok;
if(empty($mx_levelx)) $mx_levelx = "5";

//$registerDay=substr($registerDay,0,10);

//내용
$content = str_replace("&#34;","\"",$content);
$content = str_replace("&#39;","'",$content);
$content = htmlspecialchars_decode($content);

//페이지 링크
if($link1){
	//$show_sitelink1= "<a href='$link1' target='_blank' title='관련링크[새창]'>관련링크1</a>";
	$show_sitelink1= "<a href='$link1' target='_blank' title='관련링크[새창]'>".$link1."</a>";
}
if($link2){
	//$show_sitelink2= "<a href='$link2' target='_blank' title='관련링크[새창]'>관련링크2</a>";
	$show_sitelink2= "<a href='$link2' target='_blank' title='관련링크[새창]'>".$link2."</a>";
}
if($link3){
	//$show_sitelink3= "<a href='$link3' target='_blank' title='관련링크[새창]'>관련링크3</a>";
	$show_sitelink3= "<a href='$link3' target='_blank' title='관련링크[새창]'>".$link3."</a>";
}

//업로드파일
for($i=1; $i<=7; $i++){
	if(!empty(${'file'.$i}))   { 
	//이미지.$i
		if(preg_match("/(\.jpg|\.jpeg|\.gif|\.bmp|\.png)$/", ${'file'.$i})){  //이미지파일일경우 2006.02.13 수정
			
			${'imageFile'.$i} = "http://".$file_url."/".${'file'.$i};

			${'Image'.$i}="<img src='".${'imageFile'.$i}."'  alt='첨부이미지' />";

			${'show_Image'.$i} = "<div>${'Image'.$i}</div>";
			${'show_Imagex'.$i} = "${'Image'.$i}";
		}

	} else {
		${'show_Image'.$i} = "";
	}
 }

 //######### 이전글/다음글 #####################
$post_idx = get_post_idx($code, $DB_table_bbsdata, $ref);
$next_idx = get_next_idx($code, $DB_table_bbsdata, $ref);

if($post_idx){ 
	 $query = "select * from $DB_table_bbsdata where idx='$post_idx' ";
	 $postRow  =MyFetchArray($query,  $connect);
	
}

if($next_idx){ 
	 $query = "select * from $DB_table_bbsdata where idx='$next_idx' ";
	 $nextRow  =MyFetchArray($query,  $connect);
	 
}


//######### 이전글/다음글 끝 #####################

// 동영상 추출
if (!empty($yiframe)) {
	// 1. 플랫폼 판단
	$moviePlatform = "";
	if (preg_match('/youtube/', $yiframe, $urlCheckMatchs)) {
		if (preg_match('/shorts/', $yiframe, $urlCheckMatchs)) {
			$moviePlatform = "youtube_shorts";
		} else {
			$moviePlatform = "youtube";
		}
	} else if (preg_match('/tv.naver/', $yiframe, $urlCheckMatchs)) {
		$moviePlatform = "naver";
	} else {
		$moviePlatform = "";
	}

	// 2. 플랫폼에 따라 s_img 처리
	switch ($moviePlatform) {
		case "youtube": 
			if (preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $yiframe, $y_matches)){
				$y_id = $y_matches[1]; 
			}
			$movieIframeLink = "https://www.youtube.com/embed/";
			if (!empty($y_id)){
				$s_img = "https://img.youtube.com/vi/".$y_id."/mqdefault.jpg";
			}
			break;
		case "youtube_shorts": 
			if (preg_match('/[\\/\\&]shorts([^\\?\\&]+)/', $yiframe, $y_matches)){
				$y_id = str_replace("/", "", $y_matches[1]); 
			}
			
			$movieIframeLink = "https://www.youtube.com/embed/";
			if (!empty($y_id)){
				$s_img = "https://img.youtube.com/vi/".$y_id."/mqdefault.jpg";
			}
			break;
		case "naver":
			if (preg_match('/[\\/\\&]v([^\\?\\&]+)/', $yiframe, $y_matches)){
				$y_id = str_replace("/", "", $y_matches[1]); 
			}
			$movieIframeLink = "https://tv.naver.com/embed/";
			if (!empty($y_id)){
				$s_img = getNaverTV_thumbImg_url($y_id);
			}
			break;
		default: 
			$y_id = "";
			$s_img = "/img/no_img.jpg";
	}

	$movieIframeLink = $movieIframeLink.$y_id;
	if (empty($y_id)) $s_img = "/img/no_img.jpg";
}

include $boardDir."/".$skinDir."/view.html";

?>
