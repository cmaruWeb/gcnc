<?
session_start();
include $_SERVER['DOCUMENT_ROOT']."/board/lib.php"; 
include $_SERVER['DOCUMENT_ROOT']."/board/function.php";

header('Content-type: text/html; charset=utf-8');

$id = trim($_POST['admin_id']);
$pw = Trim($_POST['admin_pass']);
$loginOK = Trim($_POST['loginOK']);

$id = clearxss($id,"");
$pw = clearxss($pw,"");
$loginOK = clearxss($loginOK,"");


if($loginOK==1) {
	//login
	$pw = md5(md5($pw));

		
	//login
	$member=MyFetchArray("Select * from tb_member where id='$id' and pw='$pw' and (levelx>='1' and levelx<='2')  ", $connect);
	if($member['id']==$id) {
		$OT_IDX=$member['idx'];
		$OT_ID=$member['id'];
		$OT_NAME=$member['name'];
		$OT_LEVELX = $member['levelx'];
		$OT_MODE = "admin";
		$OT_FAVORITE = $member['favorite'];

		$_SESSION['OT_IDX'] = $OT_IDX;
		$_SESSION['OT_ID'] = $OT_ID;
		$_SESSION['OT_NAME'] = $OT_NAME;
		$_SESSION['OT_LEVELX'] = $OT_LEVELX;
		$_SESSION['OT_MODE'] = $OT_MODE;
		$_SESSION['OT_FAVORITE'] = $OT_FAVORITE;

		MyResult("UPDATE tb_member SET connectCnt=connectCnt+1, connectDay=now() WHERE id='$OT_ID'", $connect);

		//로그저장
		$prg_name = "로그인 이름:".$OT_NAME." 아이디:".$OT_ID;
		$result_txt = "로그인 성공";
		save_sys_log($OT_ID,"관리자 로그인",$result_txt,$REMOTE_ADDR);
		
		echo("<meta http-equiv='Refresh' content='0; URL=../index.php'>");
	} else {
		MsgView("입력하신 정보가 틀리거나 관리자 권한이 아닙니다.", -1);
		exit;
	}
	
} else {
	MsgView("입력하신 정보가 틀리거나 관리자 권한이 아닙니다.", -1);
	exit;
}
?>
