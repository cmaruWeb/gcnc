<?
session_start();
include "../board/rootDir.inc";
$boardDir = "../board";  //board 폴더
include "../board/lib.php"; 
include "../board/function.php";
include "../board/bbs_config.inc.php"; 

header('Content-type: text/html; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	MsgView("잘못된 접근입니다",-1);
	exit;
}

foreach ($_POST as $key=>$val) {
	${$key} = clearxss($val, "");
}

$code = clearxss($_POST['code'],"");
$url = clearxss($_POST['doc_url'],"");
$m2 = clearxss($_POST['m2'],"");

if(empty($code)){
    MsgView("잘못된 접근입니다",-1);
    exit;
}
$DB_table_bbsdata = "tb_".$code;

//전달값
$bbsData = $_POST['bbsData'];

$title = clearxss($_POST['title'],"");
$name= clearxss($_POST['name'],"");
$pwd= clearxss($_POST['pwd'],"");
$homepage= clearxss($_POST['homepage'],"");
$email= clearxss($_POST['email'],"");
$content = clearxss($_POST['content'],$avata);
if(empty($content)) $content = clearxss($_POST['contents'],$avata) ;
$link1= clearxss($_POST['link1'],"");    //--->2006.02.10 수정
$link2= clearxss($_POST['link2'],"");    //--->2006.02.10 수정
$link3= clearxss($_POST['link3'],"");    //--->2006.02.10 수정
$size = clearxss($_POST['size1'],"")."|".clearxss($_POST['size2'],"");
$strdat = clearxss($_POST['strdat'],"");
$enddat = clearxss($_POST['enddat'],"");
$chk_go_url = clearxss($_POST['chk_go_url'],"");
$go_new = clearxss($_POST['go_new'],"");
$go_url = clearxss($_POST['go_url'],"");
$gubunx= clearxss($_POST['gubunx'],"");
$top= clearxss($_POST['top'],"");
$reg_date= clearxss($_POST['reg_date'],"");
$vebnam= clearxss($_POST['vebnam'],"");
$area= clearxss($_POST['area'],"");
$address= clearxss($_POST['address'],"");
$telnum = clearxss($_POST['telnum'],"");
$mobile = clearxss($_POST['mobile'],"");
$pumnam = clearxss($_POST['pumnam'],"");
$status = clearxss($_POST['status'],"");
$per_date = clearxss($_POST['per_date'],"");
$yiframe		= clearxss($_POST['yiframe'],"");
$useMain		= clearxss($_POST['useMain'],"");
for($i=1; $i<=10; $i++){
	${'col'.$i} = clearxss($_POST['col'.$i],"");
}

if (!empty($_POST['recaptcha_token'])) {

	$captcha = $_POST['recaptcha_token'];
	$ip = $_SERVER['REMOTE_ADDR'];

	$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . RECAPTCHA_V3_SECRET_KEY . "&response=" . $captcha . "&remoteip=" . $ip);
	$responseKeys = json_decode($response, true);

	if ($responseKeys["success"]) {
		// 리캡챠 통과
	} else {
		// 리캡챠 실패
		MsgView("인증에 실패하였습니다.", -1);
		exit;
	}
}


$enddat = str_replace(",","",$enddat);
//$homepage = str_replace("http://","",$homepage);

//비공개 게시판에서 사용 -- 2006.02.02
$secret = clearxss($_POST['secret'],"");


//해당게시물의 암호화 정보추출
$mvData		=	$bbsData;
$bbsData	=	MyDecode($bbsData);
$idx = clearxss($bbsData['no'],"");


//-->2006.02.02
if($bbs_auth_row['aClosed'] == 1){  //비공개 게시판일 경우
	if(empty($secret)) $secret=0 ;
	if(!is_numeric($secret)) {
		MsgView("자료가 없습니다!",-1);
		exit;
	}
}

//해당 게시물의 저장된 파일 정보를 가져온다
$row=MyFetchArray("select * from $DB_table_bbsdata where idx=$idx and code='$code'", $connect);
$removeFile = $row['file1'];
$removeFile2 = $row['file2'];
$removeFile3 = $row['file3'];
$removeFile4 = $row['file4'];
$removeFile5 = $row['file5'];
$removeFile6 = $row['file6'];
$removeFile7 = $row['file7'];
$re_step = $row['re_step'];

$file_dir = $_SERVER['DOCUMENT_ROOT']."/bbsDown/$code";

//upload(파일정보, 제한용량, 업로드할 디렉토리)
if($_FILES['userfile1']['size'] > 0) {
	$up_fileName = upload($_FILES['userfile1'], 1024*1024*50, $file_dir);
	$fileName = $_FILES['userfile1']['name'];
	$fileName =  str_replace(' ', '_', $fileName);

	$up_fileName = addslashes($up_fileName);
	$fileName = addslashes($fileName);

	if(!empty($up_fileName)){   //이전의 업로드 되었던 파일 삭제
		$set_sql = "file1='$up_fileName',fileName1='$fileName'";
		$temp=MyResult("update $DB_table_bbsdata set $set_sql where idx=$idx and code='$code'", $connect);
		if($temp==1){
			@unlink("$file_dir/$removeFile");
		}
	}

	$s_day = date("Ymd"); 
	//중복방지를 위해서
	$check = create_cmid();

	$temp_name=explode(".",$up_fileName); 
	$ext_index = sizeof($temp_name) - 1;   //--->2006.02.10 추가
	$ext = strtolower($temp_name[$ext_index]);
	if(($ext=='jpg') || ($ext=='gif') || ($ext=='png'))	{
		$wn_fileName  = "../bbsDown/$code/".$up_fileName;
		//$sss_name = $s_day.$check."_s.".$ext;
		$sss_name = $up_fileName."_s.".$ext;
		$ss_fileName  = "../bbsDown/$code/".$sss_name;
		$file_dir = "../bbsDown/".$code."/";
		$mt_width = "500";
		//$mt_height = "199";
		//make_thumbnail($wn_fileName, 500, 500, $ss_fileName);
		//make_thumbnail($wn_fileName, $mt_width, $mt_height, $ss_fileName);
		$sss_name = thumbnail($up_fileName, $file_dir, $file_dir, $mt_width, $mt_height);
		$sql= "update $DB_table_bbsdata set s_file='$sss_name' where idx=$idx ";
		MyResult($sql, $connect);
	}

}

for($i=2; $i<=7; $i++) {
	if($_FILES['userfile'.$i]['size'] > 0) {
		${'up_fileName'.$i} = upload($_FILES['userfile'.$i], 1024*1024*50, $file_dir);
		${'fileName'.$i} = $_FILES['userfile'.$i]['name'];
		${'fileName'.$i} =  str_replace(' ', '_', ${'fileName'.$i});

		${'up_fileName' . $i} = addslashes(${'up_fileName' . $i});
		${'fileName' . $i} = addslashes(${'fileName' . $i});

		$set_sql = "file".$i."='".${'up_fileName'.$i}."',fileName".$i."='".${'fileName'.$i}."'";
		$temp=MyResult("update $DB_table_bbsdata set $set_sql where idx=$idx and code='$code'", $connect);
		if($temp==1){
			@unlink("$file_dir/".${'removeFile'.$i});
		}
	}
}

if(empty($top))	$top = '1';
if(!is_numeric($top)) {
	MsgView("자료가 없습니다!",-1);
	exit;
}

if(empty($secret))	$secret = 0;
if (empty($useMain))	$useMain = 0;

$sql = "update $DB_table_bbsdata set ";
$sql.= "code='$code',";
$sql.= "title='$title', name='$name', ";
$sql.= "homepage='$homepage', ";
$sql.= "gubunx='$gubunx', ";
$sql.= "content='$content', ";
$sql.= "secret='$secret',";    //2006.02.02 비공개 추가
$sql.= "link1='$link1',";
$sql.= "link2='$link2',";
$sql.= "link3='$link3',";
$sql.= "top='$top', ";
$sql.= "chk_go_url = '$chk_go_url', ";
$sql.= "go_new = '$go_new', ";
$sql.= "go_url = '$go_url', ";
$sql.= "strdat = '$strdat' ,";
$sql.= "enddat = '$enddat' ,";
$sql.= "size = '$size' ,";
if(($OT_LEVELX <='2') && ($reg_date)) {
	$sql.= "registerDay = '$reg_date' ,";
}
$sql.= "address = '$address' ,";
$sql.= "area = '$area' ,";
$sql.= "email = '$email' ,";
$sql.= "vebnam = '$vebnam' ,";
$sql.= "telnum = '$telnum' ,";
$sql.= "mobile = '$mobile' ,";
$sql.= "pumnam = '$pumnam' ,";
$sql.= "status = '$status' ,";
$sql.= "yiframe = '$yiframe' ,";
$sql.= "useMain = '$useMain' ,";
for($i=1; $i<=10; $i++){
	$sql.= "col".$i." = '".${'col'.$i}."', ";
}
$sql.= "com_ip = '$REMOTE_ADDR' ";
$sql.= "where idx='$idx' ";

@sql_query($sql);


if($bbs_auth_row['aClosed'] == 1){  //비공개 게시판일 경우(답글의 최상위이 설정값으로 답변의 설정값이 모두 바뀌도록)
	$query = "update  $DB_table_bbsdata set secret='$secret' where ref='".$row['ref']."' and re_level>0";
	MyResult($query, $connect);
}
//echo $sql;

// 기타 contents 입력
if ($etc_content1 != "" || $etc_content2 != "" || $etc_content3 != "") {
	for ($i=1; $i<=3; $i++) {
		$insertTxt = "";
		${'etc_content' . $i} = addslashes(${'etc_content' . $i});
		if (${'etc_content' . $i} != "") {
			$row2 = sql_fetch("SELECT idx FROM ". TB_BBS_ETC_CONTENT. " 
				WHERE cont_key = 'etc_content$i' AND bbs_idx = $idx AND bbs_code = '$code' ");
			$etcIdx = $row2['idx'];
			$updateTxt = " SET cont_key = 'etc_content$i', content = '" . ${'etc_content' . $i} . "' ";
			$sql2 = "UPDATE " . TB_BBS_ETC_CONTENT . " 
				$updateTxt
				WHERE idx = $etcIdx 
			";
			// echo $sql2 . "<br>";
			$result2 = sql_query($sql2);
		}
	}
}

sql_close() or die("db종료 실패");

echo("<meta http-equiv='Refresh' content='0; URL=$url?bbsData=$mvData&gubunx=$gubunx&mode=list&m2=$m2&code=$code'>");
exit;

?>
