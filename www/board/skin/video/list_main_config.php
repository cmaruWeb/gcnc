<?php
if($top=='2')	{
	$not_ico  = "<span class='notice'>공지</span>";
} else if(!empty($gubunx)) {
	$not_ico  = "<span class='cate'>".$gubunx."</span>";

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
	//$show_title = "<a href='$_SELF?code=$code&amp;page=$page&amp;bbsData=$bbsData&amp;mode=view&amp;m2=$m2'>".$title."</a>";
	$show_title = $title;
	$show_go = "$_SELF?code=$code&amp;page=$page&amp;bbsData=$bbsData&amp;mode=view&amp;m2=$m2";
}else {
	$show_title = $title;
	$show_go = "";
}

// 동영상 추출
if (!empty($yiframe)) {
	// 1. 플랫폼 판단
	$moviePlatform = $y_id = "";
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

?>