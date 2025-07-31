<?php
ini_set('gd.jpeg_ignore_warning', true);
ini_set('memory_limit','-1');
?>
<?    ////////////////////////////////////////////   Start of list    /////////////////////////////////////////////////////////////   ?>
<?
if($bbsData){
	$mvData		=	$bbsData;
	$bbsData	=	MyDecode($bbsData);
}

//관리자 class on 위한 변수
$m2 = $_REQUEST['m2'];

//총 개시물의 수 --------------------------------
$query = "SELECT count(*) FROM $DB_table_bbsdata";
$query .= " WHERE code='$code'";
if($s_gubunx) $query .= " and gubunx='$s_gubunx'";
if($searchstring) {
	if($search) {
		$query .= " and $search Like '%".$searchstring."%'";
	} else {
		$query .= " and ( (title Like '%".$searchstring."%') or (name Like '%".$searchstring."%') or (content Like '%".$searchstring."%') ) ";
	}
}
//echo $query."<br />";
// $result = myquery_error($query);
// $rowCnt = mysqli_fetch_row($result);

$rowCnt = MyFetchRow($query);
$total = $rowCnt[0];

//페이지 관련 변수 -------------------------------
//*$page - 현재 페이지번호
if(empty($page)) $page = 1;
$start = $listScale * ($page-1);  //데이터를 가져오기 위한 시작위치
$totalPage = ceil($total/$listScale); //총페이지

include $boardDir."/".$skinDir."/list_head.html";


//해당 페이지 리스트에 뿌려줄 데이터 가져옴 ---------
$query = "SELECT * FROM $DB_table_bbsdata ";
$query .= " WHERE code='$code'";
if($s_gubunx) $query .= " and gubunx='$s_gubunx'";
if($searchstring) {
	if($search) {
		$query .= " and $search Like '%".$searchstring."%'";
	} else {
		$query .= " and ( (title Like '%".$searchstring."%') or (name Like '%".$searchstring."%') or (content Like '%".$searchstring."%') ) ";
	}
}


//갤러리 스킨을 가진 게시판은 날짜 순으로 정렬
$blRow = MyFetchArray("SELECT skinDir FROM tb_bbs_list WHERE code='$code'",$connect);
if($blRow['skinDir']=="gallery" || $blRow['skinDir']=="infographic"){
$query .= " ORDER BY  top desc, registerDay desc LIMIT $start, $listScale";
}else{
$query .= " ORDER BY  top desc, ref desc, re_step, re_level LIMIT $start, $listScale";
}
$result = myquery_error($query);
//echo $query;
if($page>1) { $listNo = $total - $start; }
else { $listNo = $total; }

//new 아이콘을 보여주기 위한 현재 시간을 구함.(24시간이내의 게시물만 아이콘 보이도록)
$today=time();
$div=60*60*24*4;    //보여질 기한(4일)


//게시물 출력 While문 ---------------------------------------
$Index=0;
if($total>0){
	while($row = sql_fetch_array($result)) {
		//data 정리

		$Index++;    //갤러리 게시판에서 행을 나눌때 사용됨.
		$idx	= $row['idx'];
		$gubunx = $row['gubunx'];
		$name	= $row['name'];
		$title	= $row['title'];
		$email	= $row['email'];
		$homepage	= $row['homepage'];
		$content	= $row['content'];
		$comment_cnt = $row['comment_cnt'];
		$registerDay = $row['registerDay'];
		$readCnt	= PriceFormat($row['readCnt']);
		$ref		= $row['ref'];
		$re_level	= $row['re_level'];
		$secret		= $row['secret'];
		$top		= $row['top'];
		$id			= $row['id'];
		$strdat		= $row['strdat'];
		$enddat		= $row['enddat'];
		$size		= $row['size'];
		$chk_go_url		= $row['chk_go_url'];
		$go_url		= $row['go_url'];
		$vebnam		= $row['vebnam'];
		$address	= $row['address'];
		$area		= $row['area'];
		$telnum		= $row['telnum'];
		$mobile		= $row['mobile'];
		$pumnam		= $row['pumnam'];
		$link1		= $row['link1'];
		$link2		= $row['link2'];
		$link3		= $row['link3'];
		$event_year		= $row['event_year'];
		$event_mon		= $row['event_mon'];
		$event_day		= $row['event_day'];
		$status		= $row['status'];
		$per_date		= $row['per_date'];
		$yiframe		= htmlspecialchars_decode($row['yiframe']); //유튜브 iframe 소스
		$yiframe = str_replace("&#34;","\"",$yiframe);
		for($i=1; $i<=10; $i++){
			${'col'.$i} = $row['col'.$i];
		}


		preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $content, $out5);
		//$tmp_image1 = str_replace("../bbsDown/editor_up/","",$out5[1][0]);
		$tmp_image1 = $out5[0][0];
		if(empty($tmp_image1)) {
			preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $content, $out5);
			$tmp_image2 = str_replace("/file/","",$out5[1][0]);
		}

		//업로드 파일
		for($i=1; $i<=7; $i++){
				${'file'.$i} = $row['file'.$i];
				${'fileName'.$i} = urldecode($row['fileName'.$i]);
		}

		$s_file = $row['s_file'];

		//210720 파일확장자체크
		$file1_info = pathinfo($file1);
		$file1_ext = $file1_info['extension'];

		if(empty($s_file)) {
			//if($file1) {
			if($file1 && ($file1_ext=="jpg" || $file1_ext=="gif" || $file1_ext=="png")) {
				$s_day = date(Ymd); 
				//중복방지를 위해서
				$check = create_cmid();

				$temp_name=explode(".",$file1); 
				$ext_index = sizeof($temp_name) - 1;   //--->2006.02.10 추가
				$ext = strtolower($temp_name[$ext_index]);
				if(($ext=='jpg') || ($ext=='gif') || ($ext=='png'))	{
					$wn_fileName  = $file_dir."/".$file1;
					$sss_name = $s_day.$check."_s.".$ext;
					$ss_fileName  = $file_dir."/".$sss_name;
					$s_img  = "../bbsDown/".$code."/".$sss_name;
					$mt_width = "319";
					$mt_height = "199";
					if (thumbnail($file1, $file_dir, $file_dir, $mt_width, $mt_height)) {
						//$sql= "update $DB_table_bbsdata set s_file='$sss_name' where idx='$idx' ";
						//@mysql_query($sql, $connect);
					} else {
						$sql= "update $DB_table_bbsdata set s_file='$file1' where idx='$idx' ";
						@sql_query($sql);
					}
					/*if (make_thumbnail($wn_fileName, $mt_width, $mt_height, $ss_fileName)) {
						$sql= "update $DB_table_bbsdata set s_file='$sss_name' where idx='$idx' ";
						@mysql_query($sql, $connect);
					} else {
						$sql= "update $DB_table_bbsdata set s_file='$file1' where idx='$idx' ";
						@mysql_query($sql, $connect);
					}*/

				}
			} else {
				$tmp_img = $tmp_image1;
				$tmp_img = str_replace("/file","file",$tmp_img);
				$tmp_img = str_replace("&#34;","",$tmp_img);
				$tmp_img = str_replace(" alt=image","",$tmp_img);
				if($tmp_img) {
					//$s_img = "../bbsDown/editor_up/".$tmp_img;
					$s_img = "".$tmp_img;
					//에디터 이미지 따로 썸네일
					preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $s_img, $matches);
					$s_img = $matches[1];
					$s_img = explode(" ",$s_img[0]); //타이틀을 제외한 
					$s_img = $s_img[0];
					$_s_img = $s_img;

					$e_file_dir = $_SERVER['DOCUMENT_ROOT']."/bbsDown/editor_up/";
					/*$s_img = explode("/",$s_img);
					$e_file_name = $s_img[4]; //파일명
					if($e_file_name=="editor_up"){//임시방편
						$e_file_name = $s_img[5];
					}*/
					
					//210720 $e_file_name 추출과정 아래로 수정
					$_s_img = mb_stristr($_s_img,"/editor_up/");
					$_s_img = explode("/",$_s_img);
					$e_file_name = $_s_img[2];
				
					$mt_width = "500";
					//$mt_height = "199";
					$s_img = thumbnail($e_file_name, $e_file_dir, $e_file_dir, $mt_width, $mt_height);
				} else if($tmp_image2) {
					$tmp_image2 = str_replace("/file","file",$tmp_image2);
					$s_img = $tmp_image2;
				} else $s_img = "";
				
			}
		} else {
			$s_img  = "/bbsDown/$code/$s_file";
		}

		if($s_img == "") $s_img = "/img/no_img.jpg";

		if (empty($name)) $name="empty";      // 이름
		if (empty($title))$title="제목없음";     // 제목

		if($top=='2')	{
			$headxx   = "<img src='$boardURL/images/icon_noti.gif' align=absmiddle alt='공지'>";
			$not_ico  = "<span class='notice'>공지</span>";
			$not_cack = "class='board_notice'";
		}	else {
			$headxx   = "";
			$not_ico  = "";
			$not_cack = "";
		}

		$w_year = substr($registerDay,0,4);
		$w_mon=substr($registerDay,5,2);
		$w_day=substr($registerDay,8,2);
		$w_hour=substr($registerDay,11,2);

		$writeday=mktime($w_hour,0,0,$w_mon,$w_day,$w_year);
		$registerDay=$w_year."-".$w_mon."-".$w_day;

		$rep_row =  MyFetchArray("select count(idx) from $DB_table_bbsdata where ref='$ref' and re_level > 0 ", $connect);
		$re_levelxxx = $rep_row[0];

		if($Index%2)
			$bgColor="#FFFFEE";
		else
			$bgColor="#FFFFFF";
		// 마우스 오버 색상
		$mouseColor="#EFEFEF";

		$show_img1="<img src='/bbsDown/$code/$file1' style='max-width:290px; ' border='0' alt='첨부이미지'>";

		//답변글일겨우 레벨이미지
		if($re_level > 0){
			$wid = 6 * $re_level;
			$level_w="<img src=$boardURL/images/level.gif width=".$wid." height=8 border='0' alt='레벨'>";
		} else $level_w="";

		$bbsData=MyEncrypt("no=$idx");
		$bbsData.="&search=$search&searchstring=$searchstring&gubunx=".urlencode($s_gubunx);
		$show_title = "<a href='$_SELF?page=$page&bbsData=$bbsData&mode=view&m2=$m2'>".$title."</a>";

		include $boardDir."/".$skinDir."/list_main_config.php";
		include $boardDir."/".$skinDir."/list_main.html";
		


		$listNo--;
	}
}

//End 게시물 출력 While문 ---------------------------------------


include $boardDir."/".$skinDir."/list_foot.html";

?>
