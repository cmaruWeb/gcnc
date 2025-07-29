<?
if($bbsData){
	$mvData  = $bbsData;
	$bbsData = MyDecode($bbsData);
	$idx     = clearxss($bbsData['no'],"");
}
if(!is_numeric($idx)) {
	MsgView("자료가 없습니다!",-1);
	exit;
}

$bbsRow = MyFetchArray("select * from $DB_table_bbsdata where idx='$idx' ", $connect);

$gubunx = $bbsRow['gubunx'];
$name	= $bbsRow['name'];
$title	= $bbsRow['title'];
$email	= $bbsRow['email'];
$homepage	= $bbsRow['homepage'];
$content	= $bbsRow['content'];
$comment_cnt = $bbsRow['comment_cnt'];
$registerDay = $bbsRow['registerDay'];
$readCnt	= PriceFormat($bbsRow['readCnt']);
$ref		= $bbsRow['ref'];
$re_level	= $bbsRow['re_level'];
$secret		= $bbsRow['secret'];
$top		= $bbsRow['top'];
$id			= $bbsRow['id'];
$strdat		= $bbsRow['strdat'];
$enddat		= $bbsRow['enddat'];
$size		= $bbsRow['size'];
$chk_go_url		= $bbsRow['chk_go_url'];
$go_url		= $bbsRow['go_url'];
$go_new		= $bbsRow['go_new'];
$vebnam		= $bbsRow['vebnam'];
$address	= $bbsRow['address'];
$area		= $bbsRow['area'];
$telnum		= $bbsRow['telnum'];
$mobile		= $bbsRow['mobile'];
$pumnam		= $bbsRow['pumnam'];
$link1		= $bbsRow['link1'];
$link2		= $bbsRow['link2'];
$link3		= $bbsRow['link3'];
$event_year		= $bbsRow['event_year'];
$event_mon		= $bbsRow['event_mon'];
$event_day		= $bbsRow['event_day'];
$status		= $bbsRow['status'];
$per_date		= $row['per_date'];
$yiframe		= $bbsRow['yiframe'];
$useMain  = $bbsRow['useMain'];
for($i=1; $i<=10; $i++){
	${'col'.$i} = $bbsRow['col'.$i];
}

$p_size = explode("|",$size);
$mailexp=explode("@", $mail);

if(empty($name)) $name = $_SESSION['OT_NAME'];

for($i=1; $i<=7; $i++){
		${'file'.$i} = urldecode($bbsRow['file'.$i]);
		${'fileName'.$i} = urldecode($bbsRow['fileName'.$i]);

		//업로드 파일이 있는 경우 파일정보 보여줌
		if(${'file'.$i})  {
			${'show_fileName'.$i}	= "&nbsp;${'fileName'.$i}&nbsp;&nbsp;&nbsp;";
			${'fileData'.$i}		= "no=$idx&sd=/bbsDown/$code&fn=$i"; 
		}
}


//일정게시판 행사일 추출-----------------------
$event_year	= $bbsRow['event_year'];
$event_mon = $bbsRow['event_mon'];
$event_day	= $bbsRow['event_day'];
//--------------------------------------------->

//내용
$content = str_replace("&#34;","\"",$content);
$content = str_replace("&#39;","'",$content);
$content = htmlspecialchars_decode($content);

// 게시판 기타 내용
$etcContList = array();
$etcContSql = "SELECT * FROM " . TB_BBS_ETC_CONTENT . " WHERE bbs_idx = $idx AND bbs_code = '$code' ";
$etcContResult = sql_query($etcContSql);
while ($etcContRow = sql_fetch_array($etcContResult)) {
	$etcContList[] = $etcContRow;
}

$etc_content1 = $etc_content2 = $etc_cotent3 = "";
foreach ($etcContList as $key=>$val) {
	if ($val['cont_key'] != "") {
		${$val['cont_key']} = $val['content'];
		// ${$val['cont_key']} = str_replace("&#34;","\"", $val['content']);
		// ${$val['cont_key']} = str_replace("&#39;","'",${$val['cont_key']});
		// ${$val['cont_key']} = htmlspecialchars_decode(${$val['cont_key']});
		// ${$val['cont_key']} = nl2br(${$val['cont_key']});
	}
}

include $boardDir."/".$skinDir."/edit.html";

?>
