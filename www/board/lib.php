<?
session_start();

$db_host    = "localhost";
$db_id      = "gcnc";
$db_pass    = "gcnc2025!@#";
$db_name    = "gcnc";

################################################################################
// 전역변수
################################################################################
$REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
$g_now_time     = time();
$g_now_date     = date("Y-m-d[H:i:s]",$g_now_time);
$g_now_date2     = date("Y-m-d",$g_now_time);
$g_now_date3     = date("Y-m",$g_now_time);
$g_now_timex     = date("H:i:s",$g_now_time);
$g_now_today  = date("Ymd",$g_now_time);
$g_now_today2  = date("Y년 m월 d일",$g_now_time);
$g_user_ip      = getenv("REMOTE_ADDR");
$today=mktime(0,0,0,date("m"),date("d"),date("Y"));

if( empty($yearx) ){    $yearx = date("Y");  }     
if( empty($monthx) ){    $monthx  = date("n");  }
if( empty($dayx) ){     $dayx = date("d");   }
if (strlen($monthx)==1) { $monthx='0'.$monthx;	}
if( empty($timex) ) { $timex = date("H:i"); }
$date05 = $yearx."-".$monthx."-".$dayx;
$datex = $date06 = $yearx."-".$monthx;
$n_date = mktime(0,0,0,$monthx,$dayx,$yearx);
$youle = date("D",$n_date);
$nw_year = $yearx;
$xx_yearx = date("Y");

$rent_min_day = date("Y-m-d", strtotime("$date05 + 3 days"));
$rent_max_day = date("Y-m-d", strtotime("$date05 + 14 days"));
$next_day = date("Y-m-d", strtotime("$date05 + 1 days"));
$next20_day = date("Y-m-d", strtotime("$date05 + 20 days"));


$MEMBER_TB = "tb_member";   //회원테이블
$PHP_SELF = $_SERVER['PHP_SELF'];

//세션값 정리
$OT_ID = $_SESSION['OT_ID'];
$OT_NAME = $_SESSION['OT_NAME'];
$OT_LEVELX = $_SESSION['OT_LEVELX'];
$OT_GUBUNX = $_SESSION['OT_GUBUNX'];

$avata = "br,img,span,p,font,strong,table,td,tr,th,tbody,b,ul,li,ol,u,div,v:stroke,v:f,v:shapetype,iframe,style, span style,font color,h5,label,h2,!--,colgroup,col,a,input,h3";

################################################################################
// 에러처리 기본함수
################################################################################
function error_msg($str, $url="") {
    if ($url == "") {
        $url = "history.go(-1)";
    }
    elseif ($url == "close") {
        $url = "window.close()";
    }
    else {
        $url = "document.location.href = '$url'";
    }

    if ($str != "") { echo "<script language='javascript'>alert('$str');$url;</script>"; }
    else { echo "<script language='javascript'>$url;</script>"; }
    exit;
}

function msg($str) {
    echo "<script language='javascript'>alert('$str');</script>";
}
function move_page($str) {  //페이지이동

    echo "<script language='javascript'>document.location.replace('$str');</script>";
    exit;
}


################################################################################
// 데이터베이스 연결함수
################################################################################

$connect = @sql_connect($db_host,$db_id,$db_pass);
@sql_select_db($connect, $db_name);

@sql_set_charset("utf8mb4", $connect);
function myquery_error($query) {
    global $connect;

    if(function_exists('mysqli_query')){
        $result = @mysqli_query($connect, $query) or die("<font size='2'> Mysql Error</font>");    
    }else{
        $result = @mysql_query($query, $connect) or die("<font size='2'> Mysql Error</font>");
    }
    
	return $result;
}

$csql = "SELECT * FROM tb_config";
$cresult = sql_query($csql);
$crow = sql_fetch_array($cresult);

// DB 연결
function sql_connect($host, $user, $pass)
{
    if(function_exists('mysqli_connect')) {
        $link = @mysqli_connect($host, $user, $pass);
    } else {
        $link = @mysql_connect($host, $user, $pass);
    }

    return $link;
}


// // DB 선택
function sql_select_db($connect, $db)
{
    if(function_exists('mysqli_select_db'))
        return @mysqli_select_db($connect, $db);
    else
        return @mysql_select_db($db, $connect);
}


function sql_set_charset($charset, $link=null)
{
    $link = dbNullChk($link);

    if(function_exists('mysqli_set_charset'))
        @mysqli_set_charset($link, $charset);
    else
        @mysql_query(" set names {$charset} ", $link);
}

function dbNullChk($db){
    global $connect;
    if(!$db) $db = $connect;

    return $db;
}

// 결과값에서 한행 연관배열(이름으로)로 얻는다.
function sql_fetch_array($result)
{
    if(function_exists('mysqli_fetch_assoc'))
        $row = @mysqli_fetch_assoc($result);
    else
        $row = @mysql_fetch_assoc($result);

    return $row;
}

// 쿼리를 실행한 후 결과값에서 한행을 얻는다.
function sql_fetch($sql)
{
    $result = sql_query($sql);
    $row = sql_fetch_array($result);
    return $row;
}

function sql_num_rows($result)
{
    if(function_exists('mysqli_num_rows'))
        return mysqli_num_rows($result);
    else
        return mysql_num_rows($result);
}

// mysqli_query 와 mysqli_error 를 한꺼번에 처리
// mysql connect resource 지정 - 명랑폐인님 제안
function sql_query($sql)
{
    global $connect;

    $link = $connect;

    if(function_exists('mysqli_query')) {
            $result = @mysqli_query($link, $sql);
    } else {
            $result = @mysql_query($sql, $link);
    }

    return $result;
}

function sql_error()
{
    global $connect;

    $link = $connect;

    if(function_exists('mysqli_error')) {
            $result = mysqli_error($link);
    } else {
            $result = mysql_error();
    }

    return $result;
}

function sql_insert_id()
{
    global $connect;

    if(function_exists('mysqli_insert_id'))
        return mysqli_insert_id($connect);
    else
        return mysql_insert_id($connect);
}

// mysqli_real_escape_string 의 alias 기능을 한다.
function sql_real_escape_string($str, $link=null)
{
    global $connect;

    $link = $connect;
    
    if(function_exists('mysqli_connect')) {
        return mysqli_real_escape_string($link, $str);
    }

    return mysql_real_escape_string($str, $link);
}

function sql_close()
{
    global $connect;

    $link = $connect;   

    if(function_exists('mysqli_close')) {
            return mysqli_close($link);
    } else {
            return mysql_close();
    }
}

/*
*******************
** PDO DB lib **
*******************
*/

function pdo_sql_connect($host, $user, $pass, $dbname = null, $charset = 'utf8mb4')
{
    try {
        $dsn = "mysql:host={$host}";
        if ($dbname) {
            $dsn .= ";dbname={$dbname}";
        }
        $dsn .= ";charset={$charset}";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // 예외 발생
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        return new PDO($dsn, $user, $pass, $options);

    } catch (PDOException $e) {
        // 에러 로그로 기록 (예: log 파일에 남기기)
        // error_log("DB 연결 실패: " . $e->getMessage());

        // 실패 시 null 반환 (웹페이지는 계속 실행됨)
        return null;
    }
}

function pdo_sql_set_charset($charset, $pdo = null)
{
    if (!$pdo instanceof PDO) {
        return false; // 유효하지 않은 PDO 객체
    }

    try {
        // 명시적으로 SET NAMES 실행
        $pdo->exec("SET NAMES " . $pdo->quote($charset));
        return true;
    } catch (PDOException $e) {
        // error_log("문자셋 설정 실패: " . $e->getMessage());
        return false;
    }
}

function pdo_sql_close(&$pdo)
{
    $pdo = null;
}

/*
*******************
**사이트 기본설정**
*******************
*/
define('SITE_TITLE',$crow['site_title']); //사이트제목
define('USE_MAIN_POPUP',$crow['use_main_popup']); //메인팝업존 사용여부(메인화면에 프로그램 따로 넣어야함)
define('USE_MAIN_BANNER',$crow['use_main_banner']); //메인배너존 사용여부(메인화면에 프로그램 따로 넣어야함)
define('POPUP_IMG_WIDTH_PC',$crow['popup_img_width_pc']); //메인팝업 이미지 width(pc)
define('POPUP_IMG_HEIGHT_PC',$crow['popup_img_height_pc']); //메인팝업 이미지 height(pc)
define('POPUP_IMG_WIDTH_MO',$crow['popup_img_width_mo']); //메인팝업 이미지 width(mobile)
define('POPUP_IMG_HEIGHT_MO',$crow['popup_img_height_mo']); //메인팝업 이미지 height(mobile)
define('BANNER_IMG_WIDTH_PC',$crow['banner_img_width_pc']); //메인배너 이미지 width(pc)
define('BANNER_IMG_HEIGHT_PC',$crow['banner_img_height_pc']); //메인배너 이미지 height(pc)
define('BANNER_IMG_WIDTH_MO',$crow['banner_img_width_mo']); //메인배너 이미지 width(mobile)
define('BANNER_IMG_HEIGHT_MO',$crow['banner_img_height_mo']); //메인배너 이미지 height(mobile)
define('RECAPTCHA_V3_SITE_KEY',$crow['recaptcha_v3_site_key']); //reCAPTCHA v3 사이트 키
define('RECAPTCHA_V3_SECRET_KEY',$crow['recaptcha_v3_secret_key']); //reCAPTCHA v3 비밀 키

/*
*******************
** 커스텀 테이블 **
*******************
*/
define('TB_UPLOAD_FILE_LIST', "upload_file_list"); // 첨부파일 리스트
define('TB_BBS_ETC_CONTENT', "tb_bbs_etc_content"); // 게시판 기타 내용
?>
