<?
session_start();
include "../board/rootDir.inc";
$boardDir = "../board";  //board 폴더
include "../board/lib.php"; 
include "../board/function.php";
include "../board/bbs_config.inc.php"; 

header('Content-type: text/html; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	MsgView("잘못된 접근입니다1",-1);
	exit;
}

foreach ($_POST as $key=>$val) {
	${$key} = clearxss($val, "");
}

$code		= clearxss($_POST['code'],"");
$url		= clearxss($_POST['doc_url'],"");
$input_ip	= clearxss($_POST['input_ip'],"");
$m2			= clearxss($_POST['m2'],"");

if(!chkPermission($code)) {
	MsgView('글을 쓸 수 있는 권한이 없습니다.', -1);
	exit;
}

if(empty($code)){
	MsgView('잘못된 접근입니다!3', -1);
	exit;
}
$DB_table_bbsdata = "tb_".$code;

if ($REMOTE_ADDR != $input_ip) {
	MsgView('잘못된 접근입니다.4', -1);
	exit;
}

//전달 받은 데이터 정리
$ref		= clearxss($_POST['ref'],"");
$re_step	= clearxss($_POST['re_step'],"");
$re_level	= clearxss($_POST['re_level'],"");
$bbsData	= $_POST['bbsData'] ;
$mvData		= $bbsData;


$title = clearxss($_POST['title'],"");
$name= clearxss($_POST['name'],"");
$pwd= clearxss($_POST['pwd'],"");
$homepage= clearxss($_POST['homepage'],"");
$email= clearxss($_POST['email'],"");
$content = clearxss($_POST['content'],$avata);
if(empty($content)) $content = clearxss($_POST['contents'],$avata);
$link1= clearxss($_POST['link1'],"");   //-->2006.02.10 수정
$link2= clearxss($_POST['link2'],"");   //-->2006.02.10 수정
$link3= clearxss($_POST['link3'],"");   //-->2006.02.10 수정
//비공개 게시판에서 사용 -- 2006.02.02
$secret = clearxss($_POST['secret'],"");
$size = clearxss($_POST['size1'],"")."|".clearxss($_POST['size2'],"");
$strdat = clearxss($_POST['strdat'],"");
$enddat = clearxss($_POST['enddat'],"");
$chk_go_url = clearxss($_POST['chk_go_url'],"");
$go_new = clearxss($_POST['go_new'],"");
$go_url = clearxss($_POST['go_url'],"");
$gubunx=clearxss($_POST['gubunx'],"");
$top=clearxss($_POST['top'],"");
$vebnam=clearxss($_POST['vebnam'],"");
$area=clearxss($_POST['area'],"");
$address=clearxss($_POST['address'],"");
$telnum = clearxss($_POST['telnum'],"");
$mobile = clearxss($_POST['mobile'],"");
$pumnam = clearxss($_POST['pumnam'],"");
$status = clearxss($_POST['status'],"");
$per_date = clearxss($_POST['per_date'],"");
$yiframe		= clearxss($_POST['yiframe'],"");
$useMain  = clearxss($_POST['useMain'],"");
$reg_date= clearxss($_POST['reg_date'],"");
for($i=1; $i<=10; $i++){
	${'col'.$i} = clearxss($_POST['col'.$i],"");
}

//리캡챠 
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

if(empty($name)){
	MsgView('잘못된 접근입니다!5', -1);
	exit;
}
if(empty($content) && $code != 'popup'){
	MsgView('잘못된 접근입니다!6', -1);
	exit;
}
if(empty($title)){
	MsgView('잘못된 접근입니다!7', -1);
	exit;
}

if($bbs_auth_row['aClosed'] == 1){
	if(empty($secret)) $secret=0 ;
}
if(empty($secret)) $secret=0 ;
if(!is_numeric($secret)) {
	MsgView("자료가 없습니다!8",-1);
	exit;
}

// 답변일 경우--------------------------------------------------------------------
if($ref) {
	$bbsData=MyDecode($bbsData);
	$idx	=	$bbsData['no'];

	$line="==============================================================<br />";
	$row=MyFetchArray("select name,pwd,secret,content from $DB_table_bbsdata where idx=$idx", $connect);
	$content .= "<br />";
	$content .= "<br /><font color=#0099CC>".$row['name']." 님의 글</font> ".$line."<br />";
	$content .= $row['content'];

	$up_sql="update $DB_table_bbsdata set re_step=re_step+1 where ref=$ref and re_step > $re_step";
	@sql_query($up_sql);

	if($row['secret'] == 1){
		$pwd    = $row['pwd']; //이전 작성자의 패스워드
		$secret = $row['secret']; //이전 작성자의 비밀글 설정값과 동일하게
	}
	$re_step++;
	$re_level++;

} else {

// 새글일 경우--------------------------------------------------------------------

	//참조(ref)값 설정
	$row=MyFetchArray("select max(ref) from $DB_table_bbsdata where code='$code'", $connect);

	$ref=$row[0]+1;
	$re_step=0;
	$re_level=0;
}

$file_dir = $_SERVER['DOCUMENT_ROOT']."/bbsDown/$code";

//upload(파일정보, 제한용량, 업로드할 디렉토리)
if($_FILES['userfile1']['size'] > 0) {
		$up_fileName = upload($_FILES['userfile1'], 1024*1024*50, $file_dir);
		$fileName = $_FILES['userfile1']['name'];
		$fileName =  str_replace(' ', '_', $fileName);

		$s_day = date(Ymd); 
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
		}

}

for($i=2; $i<=7; $i++) {
	if($_FILES['userfile'.$i]['size'] > 0) {
		${'up_fileName'.$i} = upload($_FILES['userfile'.$i], 1024*1024*50, $file_dir);
		${'fileName'.$i} = $_FILES['userfile'.$i]['name'];
		${'fileName'.$i} =  str_replace(' ', '_', ${'fileName'.$i});

	}
}

if(empty($top))	$top = '1';
if(empty($secret))	$secret = 0;
if (empty($useMain))	$useMain = 0;

$sql = "insert into $DB_table_bbsdata set ";
$sql.= "code='$code',";
$sql.= "id='$OT_ID',";
$sql.= "gubunx='$gubunx', ";
$sql.= "title='$title',";
$sql.= "name='$name',";
$sql.= "pwd='$pwd',";
$sql.= "email='$email',";
$sql.= "homepage='$homepage',";
$sql.= "readCnt=0,";
$sql.= "comment_cnt=0,";
if(empty($reg_date)){
$sql.= "registerDay=now(),";
}else{
$sql.= "registerDay='$reg_date',";
}
$sql.= "content='$content',";
$sql.= "ref=$ref,";
$sql.= "re_level=$re_level,";
$sql.= "re_step=$re_step,";
$sql.= "secret=$secret,";    //2006.02.02 비공개 추가
$sql.= "link1='$link1',";
$sql.= "link2='$link2',";
$sql.= "link3='$link3',";
$sql.= "file1='$up_fileName',";
$sql.= "fileName1='$fileName',";
$sql.= "file2='$up_fileName2',";
$sql.= "fileName2='$fileName2',";
$sql.= "file3='$up_fileName3',";
$sql.= "fileName3='$fileName3',";
$sql.= "file4='$up_fileName4',";
$sql.= "fileName4='$fileName4',";
$sql.= "file5='$up_fileName5',";
$sql.= "fileName5='$fileName5',";
$sql.= "file6='$up_fileName6',";
$sql.= "fileName6='$fileName6',";
$sql.= "file7='$up_fileName7',";
$sql.= "fileName7='$fileName7',";
$sql.= "s_file='$sss_name',";
$sql.= "top='$top' , ";
$sql.= "chk_go_url = '$chk_go_url', ";
$sql.= "go_new = '$go_new', ";
$sql.= "go_url = '$go_url', ";
$sql.= "size = '$size' ,";
$sql.= "strdat = '$strdat' ,";
$sql.= "enddat = '$enddat' , ";
if($bbs_auth_row['on_ip']=='1') {
	$sql.= "com_ip = '$REMOTE_ADDR', ";
}
$sql.= "vebnam = '$vebnam' ,";
$sql.= "address = '$address' ,";
$sql.= "area = '$area' ,";
$sql.= "telnum = '$telnum' ,";
$sql.= "yiframe = '$yiframe' ,";
$sql.= "useMain = $useMain, ";
for($i=1; $i<=10; $i++){
	$sql.= "col".$i." = '".${'col'.$i}."', ";
}

$sql.= "status = '$status', ";
$sql.= "mobile = '$mobile' ";
$sql.= " , pumnam = '$pumnam' ";
@sql_query($sql);
//echo $sql."<br />";
sql_close() or die("db종료 실패");

echo("<meta http-equiv='Refresh' content='0; URL=$url?Data=$mvData&mode=list&code=$code&m2=$m2'>");
exit;


//세션에 레벨 없을 시 레벨을 비회원으로 설정함
function chkPermission($code){
	$non_member_level = get_non_member_level();

	$OT_LEVELX = $_SESSION['OT_LEVELX'];
	if(empty($OT_LEVELX)) $OT_LEVELX = $non_member_level;

	$bbs_auth_row = MyFetchArray("select * from tb_bbs_list where code='$code'");
	$aWrite = $bbs_auth_row['aWrite'];
	if (($aWrite >= $OT_LEVELX)) return true;
	else return false;
}

function get_non_member_level(){
	$query = "select * from tb_level where level_name = '비회원'";
	$non_member = sql_fetch($query);
	if(!empty($non_member)) $non_member_level = $non_member['user_level'];
	else $non_member_level = 100;

	return $non_member_level;
}
?>
