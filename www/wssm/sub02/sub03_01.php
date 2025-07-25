<?
$code = $_GET['code'];
$m2 = $_GET['m2'];

$m1 = 2;
$m2 = $m2;
$m3 = 1;
include("../inc/top.php" );
include("../inc/sub_top.php" );

$code = $code;
$boardDir = $_SERVER['DOCUMENT_ROOT']."/board";
include $_SERVER['DOCUMENT_ROOT']."/board/bbs_config.inc.php"; 
include $_SERVER['DOCUMENT_ROOT']."/board/_header.php";
?>
<div class="dictionary">
<!--<link rel="stylesheet" media="all" href="/wssm/css/old_board.css">-->
<!----- 게시판  ------------------------------------------------------>
<? 

    switch($mode)
    {
        case "view" :
            include "$boardDir/view.php";
            //include "$boardDir/list.php";
            break;
        case "write" :
            include "$boardDir/write.php";
            break;
        case "list" :
            include "$boardDir/list.php";
            break;
		case "list_dal" :
            include "$boardDir/list_dal.php";
            break;
        case "edit" :
            include "$boardDir/edit.php";
            break;
        case "check" :   //비공개 게시판 사용시 
            include "$boardDir/bbs_check.php";
            break;
    }

?></div>

<!----- //게시판  ---------------------------------------------------->






		</div><!--con-->
	</div><!--subcon-->





	<? include "../inc/footer.php"; ?>