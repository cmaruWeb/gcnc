<?
/**********************************************************************
* 데이터 변환
***********************************************************************/
function MyEncrypt($data){
	//return base64_encode($data)."||";
    $encryptData = base64_encode($data)."||";  //2006.02.08 추가
    $returnData = str_replace("+","[]", $encryptData); //2006.02.08 추가
    return $returnData; //2006.02.08 추가

}

function MyDecode($data){
    $data = str_replace("[]","+", $data); //2006.02.08 추가
	$vars=explode("&",base64_decode(str_replace("||","",$data)));
	$vars_num=count($vars);
	for($i=0;$i<$vars_num;$i++){
		$elements=explode("=",$vars[$i]);
		$var[$elements[0]]=$elements[1];
	}
	return $var;
}


/**********************************************************************
* db 관련 함수
***********************************************************************/

function MyFetchArray($data, $db=null)
{
	$db = dbNullChk($db);

	if(function_exists('mysqli_query')){
		$MyResult=@mysqli_query($db, $data)or die("Query Error");
		$MyRow=mysqli_fetch_array($MyResult);
	}else{
		$MyResult=@mysql_query($data, $db)or die("Query Error");
		$MyRow=mysql_fetch_array($MyResult);
	}	
	return $MyRow;
}

function MyFetchRow($data, $db=null)
{
	$db = dbNullChk($db);

	if(function_exists('mysqli_query')){
		$MyResult=@mysqli_query($db, $data)or die("Query Error");
		$MyRow=mysqli_fetch_row($MyResult);	
	}else{
		$MyResult=@mysql_query($data, $db)or die("Query Error");
		$MyRow=mysql_fetch_row($MyResult);		
	}
	return $MyRow;
}

function MyResult($data, $db=null)
{
	$db = dbNullChk($db);

	if(function_exists('mysqli_query')){
		$MyResult=@mysqli_query($db, $data)or die("Query Error");
	}else{
		$MyResult=@mysql_query($data, $db)or die("Query Error");
	}
	return $MyResult;
}

function MyNumRows($data, $db=null)
{	
	$db = dbNullChk($db);

	if(function_exists('mysqli_query')){
		$MyResult=@mysqli_query($db, $data)or die("Query Error"); //211223 김과장
		$Count=@mysqli_num_rows($MyResult);	
	}else{
		$MyResult=@mysql_query($data, $db)or die("Query Error"); //211223 김과장
		$Count=@mysql_num_rows($MyResult);
	}
	return $Count;
}

/**********************************************************************
* 스크립트관련
***********************************************************************/
function Status($str)
{
	echo" onMouseOver=\"javascript:window.status='$str';return true;\"";
}

/*    JAVA SCRIPT ALERT FUCNTION       */
function MsgView($Msg,$go)
{
	  echo"
		  <script language='javascript'>
		     alert('$Msg');
	         history.go($go);
		  </script>
		  ";
		  return true;
}
function OnlyMsgView($Msg)
{
	  echo"
		  <script language='javascript'>
		     alert('$Msg');
		  </script>
		  ";
}
function MsgViewParent($Msg,$href)
{
	echo"
		<script language='javascript'>
		   alert('$msg');
	       parent.location.href='$href';
		</script>
		";
		return true;
}
function MsgViewHref($Msg,$href)
{
	  echo"
		  <script language='javascript'>
		     alert('$Msg');
	         location.href='$href';
          </script>
		   ";
		  return true;
}
function MsgViewClose($Msg)
{
	  echo"
		  <script language='javascript'>
		     alert('$Msg');
	         window.close();
          </script>
		   ";
}


/**********************************************************************
*  문자열 관련
***********************************************************************/
/*
2byte 문자를 깨끗하게 잘라주는 함수 
인자- 자를 문자열($str), 자를길이($len), 말줄임표($tail)(보통 ... 을 사용) 
2byte문자이면(127보다크면) 자를 문자열의 길이를 2를 증가시키고 그렇지않으면 1을 증가시킴.
*/ 
/*   STRING CUTTING FUNCTION    */
function StringCut($str,$len,$tail)  //$n : Cutting String Number
{
	
	$StringLen = strlen($str);
	$EffectLen = $len - strlen($tail); 
	
	if ( $StringLen < $len ) return $str;
	
	for ($i = 0; $i <= $EffectLen; $i++) { 
		$asc=ord(substr($str,$i,1));
		if ( $asc > 127 ) $i++; // 2바이트문자라고 생각되면 $i를 1을 더 증가
	}
	
	$newstring = substr($str, 0, $i); // 위에서 구한 문자열의 길이만큼으로 자름
	return $newstring .= $tail; // 말줄임문자를 붙여서 리턴 
	
} 

function strcut_utf8($str, $len, $checkmb=false, $tail='...') {
    preg_match_all('/[\xEA-\xED][\x80-\xFF]{2}|./', $str, $match);

    $m    = $match[0];
    $slen = strlen($str);  // length of source string
    $tlen = strlen($tail); // length of tail string
    $mlen = count($m); // length of matched characters

    if ($slen <= $len) return $str;
    if (!$checkmb && $mlen <= $len) return $str;

    $ret   = array();
    $count = 0;

    for ($i=0; $i < $len; $i++) {
        $count += ($checkmb && strlen($m[$i]) > 1)?2:1;

        if ($count + $tlen > $len) break;
        $ret[] = $m[$i];
    }

    return join('', $ret).$tail;
}

function html_cut_by_length($str, $len, $tail='...') {
	$str = strip_tags($str);
	$str = strcut_utf8($str, $len, true, $tail);
	return $str;
}

function PriceFormat($price)
{
	$price = str_replace(",","",$price);

	if($price==0) {
		return "";
	} else if($price=="") {
		return "";
	} else if($price==" ") {
		return "";
	} else {
		if(strstr($price,".")) {
			return number_format($price,1);
		} else {
			return number_format($price);
		}
	}
}

function TimeValue($Date)
{
	$time_list=getdate();
	switch($Date)
	{
		case 'year':
			return $time_list["year"];
	   	case 'mon':
			return $time_list["mon"];
	   	case 'mday':
		   	return $time_list["mday"];
	   	case 'hours':
		   	return $time_list["hours"];
	   	case 'minutes':
		   	return $time_list["minutes"];
	   	case 'seconds':
		   	return $time_list["seconds"];
	}
}



//################################################################################
// 파일 Upload /Download
//################################################################################

// 썸네일 생성
function make_thumbnail($source_file, $_width, $_height, $object_file){
    list($img_width,$img_height, $type) = getimagesize($source_file);
    if ($type==1) $img_sour = imagecreatefromgif($source_file);
    else if ($type==2 ) $img_sour = imagecreatefromjpeg($source_file);
    else if ($type==3 ) $img_sour = imagecreatefrompng($source_file);
    else if ($type==15) $img_sour = imagecreatefromwbmp($source_file);
    else return false;
    if ($img_width > $img_height) {
        $width = round($_height*$img_width/$img_height);
        $height = $_height;
    } else {
        $width = $_width;
        $height = round($_width*$img_height/$img_width);
    }
    if ($width < $_width) {
        $width = round(($height + $_width - $width)*$img_width/$img_height);
        $height = round(($width + $_width - $width)*$img_height/$img_width);
    } else if ($height < $_height) {
        $height = round(($width + $_height - $height)*$img_height/$img_width);
        $width = round(($height + $_height - $height)*$img_width/$img_height);
    }
    $x_last = round(($width-$_width)/2);
    $y_last = round(($height-$_height)/2);
    if ($img_width < $_width || $img_height < $_height) {
        $img_last = imagecreatetruecolor($_width, $_height); 
        $x_last = round(($_width - $img_width)/2);
        $y_last = round(($_height - $img_height)/2);

        imagecopy($img_last,$img_sour,$x_last,$y_last,0,0,$width,$height);
        imagedestroy($img_sour);
        $white = imagecolorallocate($img_last,255,255,255);
        imagefill($img_last, 0, 0, $white);
    } else {
        $img_dest = imagecreatetruecolor($width,$height); 
        imagecopyresampled($img_dest, $img_sour,0,0,0,0,$width,$height,$img_width,$img_height); 
        $img_last = imagecreatetruecolor($_width,$_height); 
        imagecopy($img_last,$img_dest,0,0,$x_last,$y_last,$width,$height);
        imagedestroy($img_dest);
    }
    if ($object_file) {
        if ($type==1) imagegif($img_last, $object_file, 100);
        else if ($type==2 ) imagejpeg($img_last, $object_file, 100);
        else if ($type==3 ) imagepng($img_last, $object_file);
        else if ($type==15) imagebmp($img_last, $object_file, 100);
    } else {
        if ($type==1) imagegif($img_last);
        else if ($type==2 ) imagejpeg($img_last);
        else if ($type==3 ) imagepng($img_last);
        else if ($type==15) imagebmp($img_last);
    }
    imagedestroy($img_last);
    return true;
}

function MsgBox($msg)
{
	echo"<script> alert('$msg'); history.back(); </script>";
	exit;
}


/* 전달받은 값 -- 단위에 맞게 값 변환*/
function get_change_size($size) {
    if(!$size) return "0 Byte";

    if($size >= 1073741824) { 
        $size = sprintf("%0.3f GB",$size / 1073741824); 
    } elseif($size >= 1048576) {
		$size = sprintf("%0.2f MB",$size / 1048576); 
    } elseif($size >= 1024)  {
		$size = sprintf("%0.1f KB",$size / 1024); 
    } else {
        $size = $size." Byte"; 
    }

    return $size;
}


// $destination : 이미지가 저장될 경로 
// $departure : 원본 이미지 경로 
// $size : _getimagesize() 의 return 값을 넣을 것 
// $quality : JPG 퀄리티 
// $ratio : 비율 강제설정 

function resize_image($destination, $departure, $size, $quality='100', $ratio='false'){ 

    if($size[2] == 1)    //-- GIF 
        $src = imageCreateFromGIF($departure); 
    elseif($size[2] == 2) //-- JPG 
        $src = imageCreateFromJPEG($departure); 
    else    //-- $size[2] == 3, PNG 
        $src = imageCreateFromPNG($departure); 

    $dst = imagecreatetruecolor($size['w'], $size['h']); 


    $dstX = 0; 
    $dstY = 0; 
    $dstW = $size['w']; 
    $dstH = $size['h']; 

    if($ratio != 'false' && $size['w']/$size['h'] <= $size[0]/$size[1]){ 
        $srcX = ceil(($size[0]-$size[1]*($size['w']/$size['h']))/2); 
        $srcY = 0; 
        $srcW = $size[1]*($size['w']/$size['h']); 
        $srcH = $size[1]; 
    }elseif($ratio != 'false'){ 
        $srcX = 0; 
        $srcY = ceil(($size[1]-$size[0]*($size['h']/$size['w']))/2); 
        $srcW = $size[0]; 
        $srcH = $size[0]*($size['h']/$size['w']); 
    }else{ 
        $srcX = 0; 
        $srcY = 0; 
        $srcW = $size[0]; 
        $srcH = $size[1]; 
    } 

    @imagecopyresampled($dst, $src, $dstX, $dstY, $srcX, $srcY, $dstW, $dstH, $srcW, $srcH); 
    @imagejpeg($dst, $destination, $quality); 
    @imagedestroy($src); 
    @imagedestroy($dst); 

    return TRUE; 
} 

// $img : 원본이미지 
// $m : 목표크기 pixel 
// $ratio : 비율 강제설정 
function _getimagesize($img, $m, $ratio='false'){ 

    $v = @getImageSize($img); 

    if($v === FALSE || $v[2] < 1 || $v[2] > 3) 
        return FALSE; 

    $m = intval($m); 

    if($m > $v[0] && $m > $v[1]) 
        return array_merge($v, array("w"=>$v[0], "h"=>$v[1])); 

    if($ratio != 'false'){ 
        $xy = explode(':',$ratio); 
        return array_merge($v, array("w"=>$m, "h"=>ceil($m*intval(trim($xy[1]))/intval(trim($xy[0]))))); 
    }elseif($v[0] > $v[1]){ 
        $t = $v[0]/$m; 
        $s = floor($v[1]/$t); 
        $m = ($m > 0) ? $m : 1; 
        $s = ($s > 0) ? $s : 1; 
        return array_merge($v, array("w"=>$m, "h"=>$s)); 
    } else { 
        $t = $v[1]/intval($m); 
        $s = floor($v[0]/$t); 
        $m = ($m > 0) ? $m : 1; 
        $s = ($s > 0) ? $s : 1; 
        return array_merge($v, array("w"=>$s, "h"=>$m)); 
    } 
} 

/* 파일 업로드 -- upload(파일정보, 최대 파일사이즈, 업로드시 저장되는 위치) */
function upload(&$file, $limit_file_size, $up_dir)
{

	//업로드 파일크기 확인
	if($file['size'] > $limit_file_size)
	{
		$file_size = get_change_size($limit_file_size);
		MsgBox("업로드파일 크기 제한 : $file_size");
	}


	//금지할 확장자
	$ban_ext = array('php','php3','html','htm','cgi','inc','pl','PHP','PHP3','HTML','HTM','CGI','PL','INC','ini');
	//업로드 파일의 확장자 추출하고 업로드 할 있는 확장자인지 검사
	$temp_name=explode(".",$file['name']); 
    $ext_index = sizeof($temp_name) - 1;   //--->2006.02.10 추가
	$ext = strtolower($temp_name[$ext_index]);     //--->2006.02.10 변경 (변경 전 :$ext = $temp_name[1];) 
	if(in_array($ext, $ban_ext)){
		MsgBox("업로드 할 수 없는 확장자 입니다");
		exit;
	}

	//업로드 파일명 생성(중복안되도록)
	$s_day = date(Ymd); 
	//중복방지를 위해서
	$check = create_cmid();

	//실제 저장되는 파일 이름
	$s_fileName = $s_day.$check.".".$ext;


	//업로드 폴더에 저장
	if(move_uploaded_file($file['tmp_name'],$up_dir."/".$s_fileName))
	{
		@unlink($file['tmp_name']);
		return $s_fileName;
	} else {
		@unlink($file['tmp_name']);
		MsgBox("업로드 과정에서 에러가 발생하였습니다");
		exit;
	}

}

function upload3($file, $limit_file_size, $up_dir) {

	//업로드 파일크기 확인
	if($file['size'] > $limit_file_size)	{
		$file_size = get_change_size($limit_file_size);
		MsgBox("업로드파일 크기 제한 : $file_size");
	}

	//금지할 확장자
	$ban_ext = array('jpg','jpeg','png','gif');
	//업로드 파일의 확장자 추출하고 업로드 할 있는 확장자인지 검사
	$temp_name=explode(".",$file['name']); 
    $ext_index = sizeof($temp_name) - 1;   //--->2006.02.10 추가
	$ext = strtolower($temp_name[$ext_index]);     //--->2006.02.10 변경 (변경 전 :$ext = $temp_name[1];) 
	if(!in_array($ext, $ban_ext)){
		MsgBox("업로드 할 수 없는 확장자 입니다");
		exit;
	}

	//업로드 파일명 생성(중복안되도록)
	$s_day = date("Ymd",time()); 
	//중복방지를 위해서
	$check = create_cmid();

	//실제 저장되는 파일 이름
	//$rfilename = $s_day.$check. '_s.jpg';
	$rfilename = $s_day.$check. '_s.'.$ext;
	$s_fileName = $s_day.$check.".".$ext;
	$path =  $up_dir."/" .$s_fileName;


	//업로드 폴더에 저장
	if(move_uploaded_file($file['tmp_name'],$up_dir."/".$s_fileName))	{
		//MsgBox("테스트");
		//exit;
		$thumb_path = $up_dir."/" . $rfilename;

		// 업로드된 이미지파일 정보를 가져옵니다
		  $file = getimagesize($path);

		  // 저용량 jpg 파일을 생성합니다
		  if ($file['mime'] == 'image/png'){
			$image = imagecreatefrompng($path);
			
			//투명도 처리
			//$image = imagecreatetruecolor($file['width'], $file['height']);
			imagealphablending($image, false);
			imagesavealpha($image, true);
			imagepng($image, $thumb_path, 8);
		  }else if ($file['mime'] == 'image/gif'){
			$image = imagecreatefromgif($path);
			imagegif($image, $thumb_path);
		  }else{
			$image = imagecreatefromjpeg($path);
			imagejpeg($image, $thumb_path, 100);
		  }

		  imagedestroy($image);
              
		
		@unlink($file['tmp_name']);
		@unlink($path);
		return $rfilename;
	} else {
		@unlink($file['tmp_name']);
		MsgBox("업로드 과정에서 에러가 발생하였습니다");
		exit;
	}

}

/* 다운로드 -- download(파일저장위치, 보여줄 파일명, 첨부유형) */
function mb_basename($path) { return end(explode('/',$path)); } 
function utf2euc($str) { return iconv("UTF-8","cp949//IGNORE", $str); }
function is_ie() {
	if(!isset($_SERVER['HTTP_USER_AGENT']))return false;
	if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false) return true; // IE8
	if(strpos($_SERVER['HTTP_USER_AGENT'], 'Windows NT 6.1') !== false) return true; // IE11
	if(strpos($_SERVER['HTTP_USER_AGENT'], 'Windows NT 10.0') !== false) return true; // IE11
	return false;
}

function download($s_file_path, $n_fileName, $dn) {

	if (is_file($s_file_path)){
		$fileinfo = pathinfo($s_file_path);
		$filename = $n_fileName;

		$filesize = filesize($filepath);

		if( is_ie() ) $filename = utf2euc($filename);

		header("Pragma: public");
		header("Expires: 0");
		header("Content-Type: application/octet-stream; charset=utf-8");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: $filesize");

		readfile($filepath);

	} else {
		MsgBox("해당 파일이나 경로가 존재하지 않습니다.");
	}

}

/* 다운로드 -- download(파일저장위치, 보여줄 파일명, 첨부유형) */
function download2($s_file_path, $n_fileName, $dn)
{

	//--------브라우져에 따른 header문 뿌려주기--------------
	// $dn 이 1 이면 다운 0 이면 브라우져가 인식하면 화면에 출력 
	if($dn =='') $dn = "0";
	$dn_yn = ($dn) ? "attachment" : "inline"; 

	$filename = $n_fileName;
	if( is_ie() ) $filename = utf2euc($filename);

	if (is_file($s_file_path)){

        if(strstr($HTTP_USER_AGENT, "MSIE 6")){
			Header("Content-type: application/octet-stream; charset=utf-8"); 
			Header("Content-Length: ".filesize("$s_file_path")); // 이부분을 넣어 주어야지 다운로드 진행 상태가 표시 됩니다. 
			Header("Content-Disposition: $dn_yn; filename=\"$filename\"");
			Header("Content-Transfer-Encoding: binary"); 
			Header("Pragma: no-cache"); 
			Header("Expires: 0"); 
		} else if(strstr($HTTP_USER_AGENT, "MSIE 5.5")) {
			header("Content-Type: doesn/matter; charset=utf-8");
			Header("Content-Length: ".filesize("$s_file_path")); 
			Header("Content-Disposition: $dn_yn; filename=\"$filename\"");
			header("Content-Transfer-Encoding: binary");
			header("Pragma: no-cache");
			header("Expires: 0");
		} else{
			Header("Content-type: file/unknown; charset=utf-8"); 
			Header("Content-Length: ".filesize("$s_file_path")); 
			Header("Content-Disposition: $dn_yn; filename=\"$filename\""); 
			Header("Content-Description: PHP3 Generated Data"); 
			Header("Pragma: no-cache"); 
			Header("Expires: 0"); 
		}
		$fp = fopen($s_file_path, r); 
		if (!fpassthru($fp)) fclose($fp); 

	}else
	{
		MsgBox("해당 파일이나 경로가 존재하지 않습니다.");
	}

}


//업로드된 파일만 삭제
function rm_upfile($fileName, $up_dir)
{
    $file = $up_dir."/".$fileName;
    if(file_exists($file)){
        @unlink($file);
        return true;
    }else{
        return false;
    }

}


################################################################################
// 페이지 URL
################################################################################
function pageing_list($current_page="1", $totalPage="0", $pageScale="10", $url, $post_page="[이전]", $post_start="[이전 10개]", $next_page="..",$next_start="[다음 10개]", $code, $bbsData) 
{
    $paging_str ="";

    //페이지 group설정
    $pageGroup = ceil($current_page/$pageScale);
    $pageStart = ($pageScale*($pageGroup-1)) +1;
    $pageEnd = $pageStart + $pageScale -1;

    /*if($pageGroup >1){
        $pre_groupStart = 1;
        $paging_str .= "<a href='$_SELF?code=$code&page=$pre_groupStart&bbsData=$bbsData'><img src='/board/images/btn_paginWl.jpg' alt='맨앞으로' /></a> &nbsp;";
    }*/
    if($current_page-1){
        $prePage = $current_page -1;
        $paging_str .= "<span class='btn btn_prev'><a href='$_SELF?code=$code&page=$prePage&bbsData=$bbsData'><img src='/board/images/btn_paginl.jpg' alt='앞으로' /></a></span>";
    }

    for($i=$pageStart; $i <= $pageEnd; $i++){

        if($totalPage < $i ) break;
        if($current_page == $i) $paging_str .= "<span><a href='$_SELF?code=$code&page=$i&bbsData=$bbsData' class='on'>$i</a></span>";
        else $paging_str .= "<span><a href='$_SELF?code=$code&page=$i&bbsData=$bbsData'>$i</a></span>";
    }


    if( $current_page < $totalPage){
        $nextPage = $current_page +1;
        $paging_str .= "<span class='btn btn_next'><a href='$_SELF?code=$code&page=$nextPage&bbsData=$bbsData'><img src='/board/images/btn_paginr.jpg' alt='뒤로' /></a></span>";
    }

    /*if($pageEnd < $totalPage){
        $next_groupStart = $totalPage;
        $paging_str .= "<a href='$_SELF?code=$code&page=$next_groupStart&bbsData=$bbsData'><img src='/board/images/btn_paginWr.jpg' alt='맨뒤로' /></a>";
    }*/

    return $paging_str;

}


function pageing_list2($current_page="1", $totalPage="0", $pageScale="10", $url, $post_page="[이전]", $post_start="[이전 10개]", $next_page="..",$next_start="[다음 10개]", $code, $bbsData) 
{
    $paging_str ="";


    //페이지 group설정
    $pageGroup = ceil($current_page/$pageScale);
    $pageStart = ($pageScale*($pageGroup-1)) +1;
    $pageEnd = $pageStart + $pageScale -1;

    if($pageGroup >1){
        //이전목록의 시작 페이지번호 설정
        //$paging_str .= "<a href='$_SELF?page=1&bbsData=$bbsData'>[1] </a>";
        $pre_groupStart = $pageStart - $pageScale;
        $paging_str .= "<a href='$_SELF?code=$code&page=$pre_groupStart&bbsData=$bbsData' class='prevEnd'>$post_start </a> &nbsp;";
    }
    if($current_page-1){
        $prePage = $current_page -1;
        $paging_str .= "<a href='$_SELF?code=$code&page=$prePage&bbsData=$bbsData' class='prev'>$post_page </a>";
    }

    for($i=$pageStart; $i <= $pageEnd; $i++){

        if($totalPage < $i ) break;
        if($current_page == $i) $paging_str .= " <span class=thisPage>$i</span>";
        else $paging_str .= " [<a href='$_SELF?code=$code&page=$i&bbsData=$bbsData'>$i</a>]";
    }


    if( $current_page < $totalPage){
        $nextPage = $current_page +1;
        $paging_str .= "<a href='$_SELF?code=$code&page=$nextPage&bbsData=$bbsData' class='next'> $next_page</a>";
    }

    if($pageEnd < $totalPage){
        $next_groupStart = $pageStart +10;
		if($next_groupStart > $totalPage) $next_groupStart = $totalPage;
        $paging_str .= " &nbsp;<a href='$_SELF?code=$code&page=$next_groupStart&bbsData=$bbsData' class='nextEnd'>$next_start</a>";
        //$paging_str .= "<a href='$_SELF?page=$totalPage&bbsData=$bbsData'>[$totalPage] </a>";
    }


    return $paging_str;

}


function pageing_list3($current_page="1", $totalPage="0", $pageScale="10", $url, $post_page="[이전]", $post_start="[이전 10개]", $next_page="..",$next_start="[다음 10개]", $code, $bbsData) 
{
    $paging_str ="";


    //페이지 group설정
    $pageGroup = ceil($current_page/$pageScale);
    $pageStart = ($pageScale*($pageGroup-1)) +1;
    $pageEnd = $pageStart + $pageScale -1;

    if($pageGroup >1){
        //이전목록의 시작 페이지번호 설정
        //$paging_str .= "<a href='$_SELF?page=1&bbsData=$bbsData'>[1] </a>";
        $pre_groupStart = 1;
        $paging_str .= "<a href='$_SELF?code=$code&page=$pre_groupStart&bbsData=$bbsData' class='direction first' title='처음 페이지로 이동'><i>처음</i></a>";
    }
    if($current_page-1){
        $prePage = $current_page -1;
        $paging_str .= "<a href='$_SELF?code=$code&page=$prePage&bbsData=$bbsData' class='direction prev' title='이전 페이지로 이동'><i>이전</i></a>";
    }

    for($i=$pageStart; $i <= $pageEnd; $i++){

        if($totalPage < $i ) break;
        if($current_page == $i) $paging_str .= "<a href='#' title='$i 페이지로 이동' class='on'>$i</a>";
        else $paging_str .= "<a href='$_SELF?code=$code&page=$i&bbsData=$bbsData' title='$i 페이지로 이동'>$i</a>";
    }


    if( $current_page < $totalPage){
        $nextPage = $current_page +1;
        $paging_str .= "<a href='$_SELF?code=$code&page=$nextPage&bbsData=$bbsData' class='direction next' title='다음 페이지로 이동'><i>다음</i></a>";
    }

    if($pageEnd < $totalPage){
        $next_groupStart = $totalPage;
        $paging_str .= " &nbsp;<a href='$_SELF?code=$code&page=$next_groupStart&bbsData=$bbsData' class='direction last' title='마지막 페이지로 이동'><i>마지막</i></a>";
        //$paging_str .= "<a href='$_SELF?page=$totalPage&bbsData=$bbsData'>[$totalPage] </a>";
    }


    return $paging_str;

}

function pageing_list_new($current_page="1", $totalPage="0", $pageScale="10", $url, $post_page="[이전]", $post_start="[이전 10개]", $next_page="..",$next_start="[다음 10개]", $code, $bbsData) 
{
    $paging_str ="";

	//$paging_str.= "<div class=\"pageList mb\">";

    //페이지 group설정
    $pageGroup = ceil($current_page/$pageScale);
    $pageStart = ($pageScale*($pageGroup-1)) +1;
    $pageEnd = $pageStart + $pageScale -1;

    if($pageGroup >1){
        //이전목록의 시작 페이지번호 설정
        $pre_groupStart = $pageStart - $pageScale;
		$paging_str .= "<span class=\"btn btn_prevv\"><a href='$_SELF?code=$code&page=$pre_groupStart&bbsData=$bbsData' class='prevEnd'>맨앞으로</a></span>";
    }
    if($current_page-1){
        $prePage = $current_page -1;
        $paging_str .= "<span class=\"btn btn_prev\"><a href='$_SELF?code=$code&page=$prePage&bbsData=$bbsData' class='prev'>앞으로</a></span>";
    }

    for($i=$pageStart; $i <= $pageEnd; $i++){

        if($totalPage < $i ) break;
        if($current_page == $i) $paging_str .= " <span><a href='#' class=\"on\">$i</a></span>";
        else $paging_str .= "<span><a href='$_SELF?code=$code&page=$i&bbsData=$bbsData'>$i</a></span>";
    }


    if( $current_page < $totalPage){
        $nextPage = $current_page +1;
        $paging_str .= "<span class=\"btn btn_next\"><a href='$_SELF?code=$code&page=$nextPage&bbsData=$bbsData' class='next'>뒤로</a></span>";
    }

    if($pageEnd < $totalPage){
        $next_groupStart = $pageStart +10;
		if($next_groupStart > $totalPage) $next_groupStart = $totalPage;
        $paging_str .= " <span class=\"btn btn_nextt\"><a href='$_SELF?code=$code&page=$next_groupStart&bbsData=$bbsData' class='nextEnd'>맨뒤로</a></span>";
    }

	//$paging_str.= "</div>";

    return $paging_str;

}

################################################################################
// 이전/다음 리스트 (view화면)
################################################################################

//이전글의 index를 가져온다
function get_post_idx($code, $DB_table, $current_ref) {
	global $connect;

	$query = "select MIN(ref) from $DB_table where code='$code' and re_level=0 and ref > $current_ref";
    $pre_ref = MyFetchRow($query,$connect);

    if($pre_ref[0]){ 
		$query = "select idx from $DB_table where code='$code' and re_level=0 and ref =$pre_ref[0]";
		$pre_idx = MyFetchRow($query,$connect);
		$pre_idx = $pre_idx[0];
	}

	return $pre_idx;

}

//다음글의 index를 가져온다
function get_next_idx($code, $DB_table, $current_ref)
{
	global $connect;

	$query = "select MAX(ref) from $DB_table where code='$code'and re_level=0 and ref < $current_ref";
    $next_ref = MyFetchRow($query,$connect);

    if($next_ref[0]){ 
		$query = "select idx from $DB_table where code='$code' and re_level=0 and ref =$next_ref[0] ";
		$next_idx = MyFetchRow($query,$connect);
		$next_idx = $next_idx[0];
	}

	return $next_idx;

}


function post_next_list($pre_arr, $next_arr, $url, $belong_page="1", $str_len) 
{

    if($pre_arr){
        $preData=MyEncrypt("no=".$pre_arr['idx']);
        $preLink="code=$code&page=$belong_page&bbsData=$preData&mode=view&".$pre_arr['idx'];
		 $pre_title=strcut_utf8(stripslashes($pre_arr['title']),$str_len,false,'..'); 
		 $pre_title = clearxss($pre_title,"");
		 }

    if($next_arr){
        $nextData=MyEncrypt("no=".$next_arr['idx']);
        $nextLink="code=$code&page=$belong_page&bbsData=$nextData&mode=view&".$next_arr['idx'];
        $next_title=strcut_utf8($next_arr['title'],$str_len,false,'..');
		$next_title = clearxss($next_title,"");
    }

    $html_str = "";
    $html_str .= "<li class='li_prev'> <a href='$url?$preLink'>";
    $html_str .= "<span class='prev'>이전글</span><p>$pre_title</p></a></li>";
    $html_str .= "<li class='li_next'> <a href='$url?$nextLink'>";
    $html_str .= "<span class='next'>다음글</span><p>$next_title</p></a></li>";

    return $html_str;

}

function view_prev_list($pre_arr,$url,$belong_page="1", $str_len){
	global $OT_LEVELX;
	$html_str = "";

	$secret = $pre_arr['secret'];

	if($pre_arr){
        $preData=MyEncrypt("no=".$pre_arr['idx']);
		if(empty($secret) || $OT_LEVELX<=2){
			$preLink="code=".$pre_arr['code']."&page=$belong_page&bbsData=$preData&mode=view&".$pre_arr['idx'];
		}else{
			$preLink="code=".$pre_arr['code']."&page=$belong_page&bbsData=$preData&mode=check&".$pre_arr['idx'];
		}
		$pre_title=strcut_utf8(stripslashes($pre_arr['title']),$str_len,false,'..'); 
		$pre_title = clearxss($pre_title,"");

		$html_str .= "<a href='$url?$preLink'>";
		$html_str .= "$pre_title";
		$html_str .= "</a>";
	}else{
		$html_str .= "이전글이 없습니다.";
	}

	return $html_str;
}

function view_next_list($next_arr,$url,$belong_page="1", $str_len){
	global $OT_LEVELX;
	$html_str = "";

	$secret = $next_arr['secret'];
	
	if($next_arr){
        $nextData=MyEncrypt("no=".$next_arr['idx']);
        if(empty($secret) || $OT_LEVELX<=2){
			$nextLink="code=".$next_arr['code']."&page=$belong_page&bbsData=$nextData&mode=view&".$next_arr['idx'];
		}else{
			$nextLink="code=".$next_arr['code']."&page=$belong_page&bbsData=$nextData&mode=check&".$next_arr['idx'];
		}
        $next_title=strcut_utf8($next_arr['title'],$str_len,false,'..');
		$next_title = clearxss($next_title,"");
		
		$html_str .= "<a href='$url?$nextLink'>";
		$html_str .= "$next_title";
		$html_str .= "</a>";
    }else{
		$html_str .= "다음글이 없습니다.";
	}

	return $html_str;
}



function get_month_last_day($yearx, $monx){	// 달의 마지막 날짜에 대한 배열
    $monxth_day = array(1 => 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31, 30);  
    if( $monx == 2 && checkdate($monx, 29, $yearx) ) {	// 2월이면서 윤년인지 확인한다.
        return 29;                                // 윤년 2월이면 29를 반환
    }else{ 
        return $monxth_day[$monx];                  // 그렇지 않으면 배열값을 반환  
    }
}

function clearxss($str,$avatag) {
	$str=str_replace("<b>", "<strong>", $str);
	$str=str_replace("</b>", "</strong>", $str);
	$str=str_replace("<", "&lt;", $str);
	$str=str_replace("\0", "", $str);
	$str=str_ireplace("javascript", "", $str);
	$str=str_ireplace("script", "", $str);
	$str=str_ireplace("expression", "", $str);
	// $str=str_ireplace("background", "", $str);
	$str=str_ireplace("alert", "", $str);
	$str=str_ireplace("\\|", "", $str);
	$str=str_ireplace("\\;", "", $str);
	$str=str_ireplace("\\$", "", $str);
	$str=str_ireplace("\\%", "", $str);
	$str=str_ireplace("\\@", "", $str);
	$str=str_ireplace("\\+", "", $str);
	$str=str_ireplace("\\-", "", $str);
	$str=str_ireplace("\\!", "", $str);
	$str=str_ireplace("\\*", "", $str);
	$str=str_ireplace("\\\\", "", $str);
	$str=str_ireplace("\\#", "", $str);
	$str=str_ireplace("'", "&#39;", $str);
	$str=str_ireplace("\"", "&#34;", $str);
	
	//허용할 태그를 지정할 경우
	$avatag=str_replace(" ", "", $avatag);
	if ($avatag != "") {	
		$otag = explode (",", $avatag);
	
		//허용할 태그를 존재 여부를 검사하여 원상태로 변환
		for ($i = 0;$i < count($otag);$i++) {
		  $str = preg_replace("/&lt;".$otag[$i]." /", "<".$otag[$i]." ", $str);
		  $str = preg_replace("/&lt;".$otag[$i].">/", "<".$otag[$i].">", $str);
		  $str = preg_replace("/&lt;\/".$otag[$i]."/", "</".$otag[$i], $str);
		}
	}
	return $str;
}

function create_cmid()
{
	$code  = rand(0, 9);
	$code .= rand(0, 9);
	$code .= rand(0, 9);
	$code .= rand(0, 9);
	$code .= rand(0, 9);
	$code .= rand(0, 9);
	$code .= rand(0, 9);
	$code .= rand(0, 9);
	$code .= rand(0, 9);
	$code .= rand(0, 9);
	$code .= rand(0, 9);

	return $code;

}


//모바일 구분
function isMobile(){
        $arr_browser = array ("iphone", "android", "ipod", "iemobile", "mobile", "lgtelecom", "ppc", "symbianos", "blackberry", "ipad");
        $httpUserAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
        // 기본값으로 모바일 브라우저가 아닌것으로 간주함
        $mobile_browser = false;
        // 모바일브라우저에 해당하는 문자열이 있는 경우 $mobile_browser 를 true로 설정
        for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++){
            if(strpos($httpUserAgent, $arr_browser[$indexi]) == true){
                $mobile_browser = true;
                break;
            }
        }
        return $mobile_browser;
}

//시스템 로그저장
function save_sys_log($m_id,$p_title,$contents,$on_ip) {
	global $connect;

	$gubun_1 = isMobile();
	if($gubun_1 == false) {
		$gubun = "PC";
	} else $gubun = "Mobile";
	
	$query = "insert into tb_mem_logo SET datexx=now(), com_ip='$on_ip', u_id='$m_id', gubunx='$gubun', page_name='$p_title', resultx='$contents'";
    if(sql_query($query))	{
		return true;
	} else {
		return false;
	}
}

function get_os_ver($os_ver) {
	if(strstr($os_ver,"Windows NT 5.1")) {
		$osver = "Windows XP";
	} else if(strstr($os_ver,"Windows NT 5.2")) {
		$osver = "Windows XP";
	} else if(strstr($os_ver,"Windows NT 5.0")) {
		$osver = "Windows 2000";
	} else if(strstr($os_ver,"Windows NT 4.1")) {
		$osver = "Windows 98";
	} else if(strstr($os_ver,"Windows NT 6.0")) {
		$osver = "Windows Vista";
	} else if(strstr($os_ver,"Windows NT 6.1")) {
		$osver = "Windows 7";
	} else if(strstr($os_ver,"Windows NT 6.2")) {
		$osver = "Windows 8";
	} else if(strstr($os_ver,"Windows NT 6.3")) {
		$osver = "Windows 8";
	} else if(strstr($os_ver,"Windows NT 10.0")) {
		$osver = "Windows 10";
	} else {
		$osver = "other";
	}

	return $osver;
}

//썸네일생성2
function thumbnail($filename, $source_path, $target_path, $thumb_width, $thumb_height, $is_create=false, $is_crop=false, $crop_mode='center', $is_sharpen=false, $um_value='80/0.5/3')
{

    if(!$thumb_width && !$thumb_height)
        return;

    $source_file = "$source_path/$filename";

    if(!is_file($source_file)) // 원본 파일이 없다면
        return;

    $size = @getimagesize($source_file);
    if($size[2] < 1 || $size[2] > 3) // gif, jpg, png 에 대해서만 적용
        return;

    if (!is_dir($target_path)) {
        @mkdir($target_path, 0777);
        @chmod($target_path, 0777);
    }

    // 디렉토리가 존재하지 않거나 쓰기 권한이 없으면 썸네일 생성하지 않음
    if(!(is_dir($target_path) && is_writable($target_path)))
        return '';

    // Animated GIF는 썸네일 생성하지 않음
    if($size[2] == 1) {
        if(is_animated_gif($source_file))
            return basename($source_file);
    }

    $ext = array(1 => 'gif', 2 => 'jpg', 3 => 'png');

    $thumb_filename = preg_replace("/\.[^\.]+$/i", "", $filename); // 확장자제거
    //$thumb_file = "$target_path/thumb-{$thumb_filename}_{$thumb_width}x{$thumb_height}.".$ext[$size[2]];
	$thumb_file = "$target_path/{$thumb_filename}_s.".$ext[$size[2]];

    $thumb_time = @filemtime($thumb_file);
    $source_time = @filemtime($source_file);

    if (file_exists($thumb_file)) {
        if ($is_create == false && $source_time < $thumb_time) {
            return basename($thumb_file);
        }
    }

    // 원본파일의 GD 이미지 생성
    $src = null;
    $degree = 0;

    if ($size[2] == 1) {
        $src = @imagecreatefromgif($source_file);
        $src_transparency = @imagecolortransparent($src);
    } else if ($size[2] == 2) {
        $src = @imagecreatefromjpeg($source_file);

        if(function_exists('exif_read_data')) {
            // exif 정보를 기준으로 회전각도 구함
            $exif = @exif_read_data($source_file);
            if(!empty($exif['Orientation'])) {
                switch($exif['Orientation']) {
                    case 8:
                        $degree = 90;
                        break;
                    case 3:
                        $degree = 180;
                        break;
                    case 6:
                        $degree = -90;
                        break;
                }

                // 회전각도 있으면 이미지 회전
                if($degree) {
                    $src = imagerotate($src, $degree, 0);

                    // 세로사진의 경우 가로, 세로 값 바꿈
                    if($degree == 90 || $degree == -90) {
                        $tmp = $size;
                        $size[0] = $tmp[1];
                        $size[1] = $tmp[0];
                    }
                }
            }
        }
    } else if ($size[2] == 3) {
        $src = @imagecreatefrompng($source_file);
        @imagealphablending($src, true);
    } else {
        return;
    }

    if(!$src)
        return;

    $is_large = true;
    // width, height 설정
    if($thumb_width) {
        if(!$thumb_height) {
            $thumb_height = round(($thumb_width * $size[1]) / $size[0]);
        } else {
            if($crop_mode === 'center' && ($size[0] > $thumb_width || $size[1] > $thumb_height)){
                $is_large = true;
            } else if($size[0] < $thumb_width || $size[1] < $thumb_height) {
                $is_large = false;
            }
        }
    } else {
        if($thumb_height) {
            $thumb_width = round(($thumb_height * $size[0]) / $size[1]);
        }
    }

    $dst_x = 0;
    $dst_y = 0;
    $src_x = 0;
    $src_y = 0;
    $dst_w = $thumb_width;
    $dst_h = $thumb_height;
    $src_w = $size[0];
    $src_h = $size[1];

    $ratio = $dst_h / $dst_w;

    if($is_large) {
        // 크롭처리
        if($is_crop) {
            switch($crop_mode)
            {
                case 'center':
                    if($size[1] / $size[0] >= $ratio) {
                        $src_h = round($src_w * $ratio);
                        $src_y = round(($size[1] - $src_h) / 2);
                    } else {
                        $src_w = round($size[1] / $ratio);
                        $src_x = round(($size[0] - $src_w) / 2);
                    }
                    break;
                default:
                    if($size[1] / $size[0] >= $ratio) {
                        $src_h = round($src_w * $ratio);
                    } else {
                        $src_w = round($size[1] / $ratio);
                    }
                    break;
            }
        

			$dst = imagecreatetruecolor($dst_w, $dst_h);

			if($size[2] == 3) {
				imagealphablending($dst, false);
				imagesavealpha($dst, true);
			} else if($size[2] == 1) {
				$palletsize = imagecolorstotal($src);
				if($src_transparency >= 0 && $src_transparency < $palletsize) {
					$transparent_color   = imagecolorsforindex($src, $src_transparency);
					$current_transparent = imagecolorallocate($dst, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
					imagefill($dst, 0, 0, $current_transparent);
					imagecolortransparent($dst, $current_transparent);
				}
			}
		}else{ //비율에 맞게 생성
			$dst = imagecreatetruecolor($dst_w, $dst_h);
            $bgcolor = imagecolorallocate($dst, 255, 255, 255); // 배경색

           
                if($src_w > $src_h) {
                    $tmp_h = round(($dst_w * $src_h) / $src_w);
                    $dst_y = round(($dst_h - $tmp_h) / 2);
                    $dst_h = $tmp_h;
                } else {
                    $tmp_w = round(($dst_h * $src_w) / $src_h);
                    $dst_x = round(($dst_w - $tmp_w) / 2);
                    $dst_w = $tmp_w;
                }

            if($size[2] == 3) {
                $bgcolor = imagecolorallocatealpha($dst, 0, 0, 0, 127);
                imagefill($dst, 0, 0, $bgcolor);
                imagealphablending($dst, false);
                imagesavealpha($dst, true);
            } else if($size[2] == 1) {
                $palletsize = imagecolorstotal($src);
                if($src_transparency >= 0 && $src_transparency < $palletsize) {
                    $transparent_color   = imagecolorsforindex($src, $src_transparency);
                    $current_transparent = imagecolorallocate($dst, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
                    imagefill($dst, 0, 0, $current_transparent);
                    imagecolortransparent($dst, $current_transparent);
                } else {
                    imagefill($dst, 0, 0, $bgcolor);
                }
            } else {
                imagefill($dst, 0, 0, $bgcolor);
            }
		}
    } else { 
        $dst = imagecreatetruecolor($dst_w, $dst_h);
        $bgcolor = imagecolorallocate($dst, 255, 255, 255); // 배경색

		//썸네일 비율 유지하지 않음
        /*if($src_w < $dst_w) {
            if($src_h >= $dst_h) {
                $dst_x = round(($dst_w - $src_w) / 2);
                $src_h = $dst_h;
            } else {
                $dst_x = round(($dst_w - $src_w) / 2);
                $dst_y = round(($dst_h - $src_h) / 2);
                $dst_w = $src_w;
                $dst_h = $src_h;
            }
        } else {
            if($src_h < $dst_h) {
                $dst_y = round(($dst_h - $src_h) / 2);
                $dst_h = $src_h;
                $src_w = $dst_w;
            }
        }*/
		//썸네일 비율 유지
		if($src_w < $dst_w) {
			if($src_h >= $dst_h) {
				if( $src_h > $src_w ){
					$tmp_w = round(($dst_h * $src_w) / $src_h);
					$dst_x = round(($dst_w - $tmp_w) / 2);
					$dst_w = $tmp_w;
				} else {
					$dst_x = round(($dst_w - $src_w) / 2);
					$src_h = $dst_h;
					if( $dst_w > $src_w ){
						$dst_w = $src_w;
					}
				}
			} else {
				$dst_x = round(($dst_w - $src_w) / 2);
				$dst_y = round(($dst_h - $src_h) / 2);
				$dst_w = $src_w;
				$dst_h = $src_h;
			}
		} else {
			if($src_h < $dst_h) {
				if( $src_w > $dst_w ){
					$tmp_h = round(($dst_w * $src_h) / $src_w);
					$dst_y = round(($dst_h - $tmp_h) / 2);
					$dst_h = $tmp_h;
				} else {
					$dst_y = round(($dst_h - $src_h) / 2);
					$dst_h = $src_h;
					$src_w = $dst_w;
				}
			}
		}

        if($size[2] == 3) {
            $bgcolor = imagecolorallocatealpha($dst, 0, 0, 0, 127);
            imagefill($dst, 0, 0, $bgcolor);
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
        } else if($size[2] == 1) {
            $palletsize = imagecolorstotal($src);
            if($src_transparency >= 0 && $src_transparency < $palletsize) {
                $transparent_color   = imagecolorsforindex($src, $src_transparency);
                $current_transparent = imagecolorallocate($dst, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
                imagefill($dst, 0, 0, $current_transparent);
                imagecolortransparent($dst, $current_transparent);
            } else {
                imagefill($dst, 0, 0, $bgcolor);
            }
        } else {
            imagefill($dst, 0, 0, $bgcolor);
        }
    }

    imagecopyresampled($dst, $src, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

    // sharpen 적용
    if($is_sharpen && $is_large) {
        $val = explode('/', $um_value);
        UnsharpMask($dst, $val[0], $val[1], $val[2]);
    }

    if($size[2] == 1) {
        imagegif($dst, $thumb_file);
    } else if($size[2] == 3) {
		$png_compress = 5;
        imagepng($dst, $thumb_file, $png_compress);
    } else {
        $jpg_quality = 90;
        imagejpeg($dst, $thumb_file, $jpg_quality);
    }

    chmod($thumb_file, 0777); // 추후 삭제를 위하여 파일모드 변경

    imagedestroy($src);
    imagedestroy($dst);

    return basename($thumb_file);
}

//썸네일생성2 - 비율무시
function thumbnail2($filename, $source_path, $target_path, $thumb_width, $thumb_height, $is_create = false, $is_crop = true, $crop_mode = 'center', $is_sharpen = false, $um_value = '80/0.5/3')
{

	if (!$thumb_width && !$thumb_height)
		return;

	$source_file = "$source_path/$filename";

	if (!is_file($source_file)) // 원본 파일이 없다면
		return;

	$size = @getimagesize($source_file);
	if ($size[2] < 1 || $size[2] > 3) // gif, jpg, png 에 대해서만 적용
		return;

	if (!is_dir($target_path)) {
		@mkdir($target_path, 0777);
		@chmod($target_path, 0777);
	}

	// 디렉토리가 존재하지 않거나 쓰기 권한이 없으면 썸네일 생성하지 않음
	if (!(is_dir($target_path) && is_writable($target_path)))
		return '';

	// Animated GIF는 썸네일 생성하지 않음
	if ($size[2] == 1) {
		if (is_animated_gif($source_file))
			return basename($source_file);
	}

	$ext = array(1 => 'gif', 2 => 'jpg', 3 => 'png');

	$thumb_filename = preg_replace("/\.[^\.]+$/i", "", $filename); // 확장자제거
	//$thumb_file = "$target_path/thumb-{$thumb_filename}_{$thumb_width}x{$thumb_height}.".$ext[$size[2]];
	$thumb_file = "$target_path/{$thumb_filename}_s." . $ext[$size[2]];

	$thumb_time = @filemtime($thumb_file);
	$source_time = @filemtime($source_file);

	if (file_exists($thumb_file)) {
		if ($is_create == false && $source_time < $thumb_time) {
			return basename($thumb_file);
		}
	}

	// 원본파일의 GD 이미지 생성
	$src = null;
	$degree = 0;

	if ($size[2] == 1) {
		$src = @imagecreatefromgif($source_file);
		$src_transparency = @imagecolortransparent($src);
	} else if ($size[2] == 2) {
		$src = @imagecreatefromjpeg($source_file);

		if (function_exists('exif_read_data')) {
			// exif 정보를 기준으로 회전각도 구함
			$exif = @exif_read_data($source_file);
			if (!empty($exif['Orientation'])) {
				switch ($exif['Orientation']) {
					case 8:
						$degree = 90;
						break;
					case 3:
						$degree = 180;
						break;
					case 6:
						$degree = -90;
						break;
				}

				// 회전각도 있으면 이미지 회전
				if ($degree) {
					$src = imagerotate($src, $degree, 0);

					// 세로사진의 경우 가로, 세로 값 바꿈
					if ($degree == 90 || $degree == -90) {
						$tmp = $size;
						$size[0] = $tmp[1];
						$size[1] = $tmp[0];
					}
				}
			}
		}
	} else if ($size[2] == 3) {
		$src = @imagecreatefrompng($source_file);
		@imagealphablending($src, true);
	} else {
		return;
	}

	if (!$src)
		return;

	$is_large = true;
	// width, height 설정
	if ($thumb_width) {
		if (!$thumb_height) {
			$thumb_height = round(($thumb_width * $size[1]) / $size[0]);
		} else {
			if ($crop_mode === 'center' && ($size[0] > $thumb_width || $size[1] > $thumb_height)) {
				$is_large = true;
			} else if ($size[0] < $thumb_width || $size[1] < $thumb_height) {
				$is_large = false;
			}
		}
	} else {
		if ($thumb_height) {
			$thumb_width = round(($thumb_height * $size[0]) / $size[1]);
		}
	}

	$dst_x = 0;
	$dst_y = 0;
	$src_x = 0;
	$src_y = 0;
	$dst_w = $thumb_width;
	$dst_h = $thumb_height;
	$src_w = $size[0];
	$src_h = $size[1];

	$ratio = $dst_h / $dst_w;

	if ($is_large) {
		// 크롭처리
		if ($is_crop) {
			switch ($crop_mode) {
				case 'center':
					if ($size[1] / $size[0] >= $ratio) {
						$src_h = round($src_w * $ratio);
						$src_y = round(($size[1] - $src_h) / 2);
					} else {
						$src_w = round($size[1] / $ratio);
						$src_x = round(($size[0] - $src_w) / 2);
					}
					break;
				default:
					if ($size[1] / $size[0] >= $ratio) {
						$src_h = round($src_w * $ratio);
					} else {
						$src_w = round($size[1] / $ratio);
					}
					break;
			}


			$dst = imagecreatetruecolor($dst_w, $dst_h);

			if ($size[2] == 3) {
				imagealphablending($dst, false);
				imagesavealpha($dst, true);
			} else if ($size[2] == 1) {
				$palletsize = imagecolorstotal($src);
				if ($src_transparency >= 0 && $src_transparency < $palletsize) {
					$transparent_color   = imagecolorsforindex($src, $src_transparency);
					$current_transparent = imagecolorallocate($dst, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
					imagefill($dst, 0, 0, $current_transparent);
					imagecolortransparent($dst, $current_transparent);
				}
			}
		} else { //비율에 맞게 생성
			$dst = imagecreatetruecolor($dst_w, $dst_h);
			$bgcolor = imagecolorallocate($dst, 255, 255, 255); // 배경색


			if ($src_w > $src_h) {
				$tmp_h = round(($dst_w * $src_h) / $src_w);
				$dst_y = round(($dst_h - $tmp_h) / 2);
				$dst_h = $tmp_h;
			} else {
				$tmp_w = round(($dst_h * $src_w) / $src_h);
				$dst_x = round(($dst_w - $tmp_w) / 2);
				$dst_w = $tmp_w;
			}

			if ($size[2] == 3) {
				$bgcolor = imagecolorallocatealpha($dst, 0, 0, 0, 127);
				imagefill($dst, 0, 0, $bgcolor);
				imagealphablending($dst, false);
				imagesavealpha($dst, true);
			} else if ($size[2] == 1) {
				$palletsize = imagecolorstotal($src);
				if ($src_transparency >= 0 && $src_transparency < $palletsize) {
					$transparent_color   = imagecolorsforindex($src, $src_transparency);
					$current_transparent = imagecolorallocate($dst, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
					imagefill($dst, 0, 0, $current_transparent);
					imagecolortransparent($dst, $current_transparent);
				} else {
					imagefill($dst, 0, 0, $bgcolor);
				}
			} else {
				imagefill($dst, 0, 0, $bgcolor);
			}
		}
	} else {
		$dst = imagecreatetruecolor($dst_w, $dst_h);
		$bgcolor = imagecolorallocate($dst, 255, 255, 255); // 배경색

		//썸네일 비율 유지하지 않음
		if($src_w < $dst_w) {
            if($src_h >= $dst_h) {
                $dst_x = round(($dst_w - $src_w) / 2);
                $src_h = $dst_h;
            } else {
                $dst_x = round(($dst_w - $src_w) / 2);
                $dst_y = round(($dst_h - $src_h) / 2);
                $dst_w = $src_w;
                $dst_h = $src_h;
            }
        } else {
            if($src_h < $dst_h) {
                $dst_y = round(($dst_h - $src_h) / 2);
                $dst_h = $src_h;
                $src_w = $dst_w;
            }
        }
		//썸네일 비율 유지
		/* if ($src_w < $dst_w) {
			if ($src_h >= $dst_h) {
				if ($src_h > $src_w) {
					$tmp_w = round(($dst_h * $src_w) / $src_h);
					$dst_x = round(($dst_w - $tmp_w) / 2);
					$dst_w = $tmp_w;
				} else {
					$dst_x = round(($dst_w - $src_w) / 2);
					$src_h = $dst_h;
					if ($dst_w > $src_w) {
						$dst_w = $src_w;
					}
				}
			} else {
				$dst_x = round(($dst_w - $src_w) / 2);
				$dst_y = round(($dst_h - $src_h) / 2);
				$dst_w = $src_w;
				$dst_h = $src_h;
			}
		} else {
			if ($src_h < $dst_h) {
				if ($src_w > $dst_w) {
					$tmp_h = round(($dst_w * $src_h) / $src_w);
					$dst_y = round(($dst_h - $tmp_h) / 2);
					$dst_h = $tmp_h;
				} else {
					$dst_y = round(($dst_h - $src_h) / 2);
					$dst_h = $src_h;
					$src_w = $dst_w;
				}
			}
		} */

		if ($size[2] == 3) {
			$bgcolor = imagecolorallocatealpha($dst, 0, 0, 0, 127);
			imagefill($dst, 0, 0, $bgcolor);
			imagealphablending($dst, false);
			imagesavealpha($dst, true);
		} else if ($size[2] == 1) {
			$palletsize = imagecolorstotal($src);
			if ($src_transparency >= 0 && $src_transparency < $palletsize) {
				$transparent_color   = imagecolorsforindex($src, $src_transparency);
				$current_transparent = imagecolorallocate($dst, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
				imagefill($dst, 0, 0, $current_transparent);
				imagecolortransparent($dst, $current_transparent);
			} else {
				imagefill($dst, 0, 0, $bgcolor);
			}
		} else {
			imagefill($dst, 0, 0, $bgcolor);
		}
	}

	imagecopyresampled($dst, $src, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

	// sharpen 적용
	if ($is_sharpen && $is_large) {
		$val = explode('/', $um_value);
		UnsharpMask($dst, $val[0], $val[1], $val[2]);
	}

	if ($size[2] == 1) {
		imagegif($dst, $thumb_file);
	} else if ($size[2] == 3) {
		$png_compress = 5;
		imagepng($dst, $thumb_file, $png_compress);
	} else {
		$jpg_quality = 90;
		imagejpeg($dst, $thumb_file, $jpg_quality);
	}

	chmod($thumb_file, 0777); // 추후 삭제를 위하여 파일모드 변경

	imagedestroy($src);
	imagedestroy($dst);

	return basename($thumb_file);
}






function UnsharpMask($img, $amount, $radius, $threshold)    {

/*
출처 : http://vikjavev.no/computing/ump.php
New:
- In version 2.1 (February 26 2007) Tom Bishop has done some important speed enhancements.
- From version 2 (July 17 2006) the script uses the imageconvolution function in PHP
version >= 5.1, which improves the performance considerably.


Unsharp masking is a traditional darkroom technique that has proven very suitable for
digital imaging. The principle of unsharp masking is to create a blurred copy of the image
and compare it to the underlying original. The difference in colour values
between the two images is greatest for the pixels near sharp edges. When this
difference is subtracted from the original image, the edges will be
accentuated.

The Amount parameter simply says how much of the effect you want. 100 is 'normal'.
Radius is the radius of the blurring circle of the mask. 'Threshold' is the least
difference in colour values that is allowed between the original and the mask. In practice
this means that low-contrast areas of the picture are left unrendered whereas edges
are treated normally. This is good for pictures of e.g. skin or blue skies.

Any suggenstions for improvement of the algorithm, expecially regarding the speed
and the roundoff errors in the Gaussian blur process, are welcome.

*/

////////////////////////////////////////////////////////////////////////////////////////////////
////
////                  Unsharp Mask for PHP - version 2.1.1
////
////    Unsharp mask algorithm by Torstein Hønsi 2003-07.
////             thoensi_at_netcom_dot_no.
////               Please leave this notice.
////
///////////////////////////////////////////////////////////////////////////////////////////////



    // $img is an image that is already created within php using
    // imgcreatetruecolor. No url! $img must be a truecolor image.

    // Attempt to calibrate the parameters to Photoshop:
    if ($amount > 500)    $amount = 500;
    $amount = $amount * 0.016;
    if ($radius > 50)    $radius = 50;
    $radius = $radius * 2;
    if ($threshold > 255)    $threshold = 255;

    $radius = abs(round($radius));     // Only integers make sense.
    if ($radius == 0) {
        return $img; imagedestroy($img);        }
    $w = imagesx($img); $h = imagesy($img);
    $imgCanvas = imagecreatetruecolor($w, $h);
    $imgBlur = imagecreatetruecolor($w, $h);


    // Gaussian blur matrix:
    //
    //    1    2    1
    //    2    4    2
    //    1    2    1
    //
    //////////////////////////////////////////////////


    if (function_exists('imageconvolution')) { // PHP >= 5.1
            $matrix = array(
            array( 1, 2, 1 ),
            array( 2, 4, 2 ),
            array( 1, 2, 1 )
        );
        $divisor = array_sum(array_map('array_sum', $matrix));
        $offset = 0;

        imagecopy ($imgBlur, $img, 0, 0, 0, 0, $w, $h);
        imageconvolution($imgBlur, $matrix, $divisor, $offset);
    }
    else {

    // Move copies of the image around one pixel at the time and merge them with weight
    // according to the matrix. The same matrix is simply repeated for higher radii.
        for ($i = 0; $i < $radius; $i++)    {
            imagecopy ($imgBlur, $img, 0, 0, 1, 0, $w - 1, $h); // left
            imagecopymerge ($imgBlur, $img, 1, 0, 0, 0, $w, $h, 50); // right
            imagecopymerge ($imgBlur, $img, 0, 0, 0, 0, $w, $h, 50); // center
            imagecopy ($imgCanvas, $imgBlur, 0, 0, 0, 0, $w, $h);

            imagecopymerge ($imgBlur, $imgCanvas, 0, 0, 0, 1, $w, $h - 1, 33.33333 ); // up
            imagecopymerge ($imgBlur, $imgCanvas, 0, 1, 0, 0, $w, $h, 25); // down
        }
    }

    if($threshold>0){
        // Calculate the difference between the blurred pixels and the original
        // and set the pixels
        for ($x = 0; $x < $w-1; $x++)    { // each row
            for ($y = 0; $y < $h; $y++)    { // each pixel

                $rgbOrig = ImageColorAt($img, $x, $y);
                $rOrig = (($rgbOrig >> 16) & 0xFF);
                $gOrig = (($rgbOrig >> 8) & 0xFF);
                $bOrig = ($rgbOrig & 0xFF);

                $rgbBlur = ImageColorAt($imgBlur, $x, $y);

                $rBlur = (($rgbBlur >> 16) & 0xFF);
                $gBlur = (($rgbBlur >> 8) & 0xFF);
                $bBlur = ($rgbBlur & 0xFF);

                // When the masked pixels differ less from the original
                // than the threshold specifies, they are set to their original value.
                $rNew = (abs($rOrig - $rBlur) >= $threshold)
                    ? max(0, min(255, ($amount * ($rOrig - $rBlur)) + $rOrig))
                    : $rOrig;
                $gNew = (abs($gOrig - $gBlur) >= $threshold)
                    ? max(0, min(255, ($amount * ($gOrig - $gBlur)) + $gOrig))
                    : $gOrig;
                $bNew = (abs($bOrig - $bBlur) >= $threshold)
                    ? max(0, min(255, ($amount * ($bOrig - $bBlur)) + $bOrig))
                    : $bOrig;



                if (($rOrig != $rNew) || ($gOrig != $gNew) || ($bOrig != $bNew)) {
                        $pixCol = ImageColorAllocate($img, $rNew, $gNew, $bNew);
                        ImageSetPixel($img, $x, $y, $pixCol);
                    }
            }
        }
    }
    else{
        for ($x = 0; $x < $w; $x++)    { // each row
            for ($y = 0; $y < $h; $y++)    { // each pixel
                $rgbOrig = ImageColorAt($img, $x, $y);
                $rOrig = (($rgbOrig >> 16) & 0xFF);
                $gOrig = (($rgbOrig >> 8) & 0xFF);
                $bOrig = ($rgbOrig & 0xFF);

                $rgbBlur = ImageColorAt($imgBlur, $x, $y);

                $rBlur = (($rgbBlur >> 16) & 0xFF);
                $gBlur = (($rgbBlur >> 8) & 0xFF);
                $bBlur = ($rgbBlur & 0xFF);

                $rNew = ($amount * ($rOrig - $rBlur)) + $rOrig;
                    if($rNew>255){$rNew=255;}
                    elseif($rNew<0){$rNew=0;}
                $gNew = ($amount * ($gOrig - $gBlur)) + $gOrig;
                    if($gNew>255){$gNew=255;}
                    elseif($gNew<0){$gNew=0;}
                $bNew = ($amount * ($bOrig - $bBlur)) + $bOrig;
                    if($bNew>255){$bNew=255;}
                    elseif($bNew<0){$bNew=0;}
                $rgbNew = ($rNew << 16) + ($gNew <<8) + $bNew;
                    ImageSetPixel($img, $x, $y, $rgbNew);
            }
        }
    }
    imagedestroy($imgCanvas);
    imagedestroy($imgBlur);

    return true;

}

function is_animated_gif($filename) {
    if(!($fh = @fopen($filename, 'rb')))
        return false;
    $count = 0;
    // 출처 : http://www.php.net/manual/en/function.imagecreatefromgif.php#104473
    // an animated gif contains multiple "frames", with each frame having a
    // header made up of:
    // * a static 4-byte sequence (\x00\x21\xF9\x04)
    // * 4 variable bytes
    // * a static 2-byte sequence (\x00\x2C) (some variants may use \x00\x21 ?)

    // We read through the file til we reach the end of the file, or we've found
    // at least 2 frame headers
    while(!feof($fh) && $count < 2) {
        $chunk = fread($fh, 1024 * 100); //read 100kb at a time
        $count += preg_match_all('#\x00\x21\xF9\x04.{4}\x00(\x2C|\x21)#s', $chunk, $matches);
   }

    fclose($fh);
    return $count > 1;
}

//최신글(일반적인)
function bbs_latest_basic($code,$min=0,$max,$link){
	$latest_txt = "";
	$sql = "SELECT idx, title, registerDay FROM tb_$code ORDER BY top desc, registerDay desc, ref desc, re_step, re_level 
		LIMIT $min, $max";
	//$latest_txt = $sql;
	$result = sql_query($sql);
	$cnt = sql_num_rows($result);

	if ($cnt > 0) {
		while ($row = sql_fetch_array($result)){
			$registerDay = substr($row['registerDay'],0,10);
			$title = strcut_utf8($row['title'],60,false,'..');
			$bbsData = MyEncrypt("no=".$row['idx']);
			$mode = "&amp;mode=view";
			$_registerDay = explode("-",$registerDay);
			$year = $_registerDay[0];
			$month = $_registerDay[1];
			$day = $_registerDay[2];
			$year = substr($year,2,2);

			$href = $link . "?bbsData=" . $bbsData . $mode;

			//$latest_txt.= "<li><a href=".$link."?bbsData=".$bbsData.$mode." target='_blank'>".$title."</a><span class='date'>".$registerDay."</span></li>";
			$latest_txt.= "<li>
				<span class='date'><b>$day</b>$year.$month</span>
				<a href=\"$href\">$title</a>
			</li>";
		}
	}else{
		$latest_txt.= "<li><p class=\"none\">등록된 글이 없습니다.</p></li>";
	}

	return $latest_txt;
}

//최신글(공지)
function bbs_latest_notice($code,$min=0,$max,$link){
	$latest_txt = "";
	$sql = "SELECT idx,title,registerDay,gubunx FROM tb_$code ORDER BY top desc, registerDay desc, ref desc, re_step, re_level LIMIT $min,$max";
	//$latest_txt = $sql;
	$result = myquery_error($sql);
	$cnt = sql_num_rows($result);

	if($cnt>0){
		while($row = sql_fetch_array($result)){
			$registerDay = substr($row['registerDay'],0,10);
			$title=strcut_utf8($row['title'],60,false,'..');
			$bbsData=MyEncrypt("no=".$row['idx']);
			$mode = "&amp;mode=view";
			$_registerDay = explode("-",$registerDay);
			$year = $_registerDay[0];
			$month = $_registerDay[1];
			$day = $_registerDay[2];
			//$year = substr($year,2,2);

			//$latest_txt.= "<li><a href=".$link."?bbsData=".$bbsData.$mode." target='_blank'>".$title."</a><span class='date'>".$registerDay."</span></li>";
			$latest_txt.= "<li><a href=".$link."?bbsData=".$bbsData.$mode."><span class='date'>".$day."<b>".$year.".".$month."</b></span><span class='txt'><b class='cate'>".$row['gubunx']."</b><b>".$title."</b></span></a></li>";
		}
	}else{
		$latest_txt.= "<li class=\"none\">등록된 글이 없습니다.</li>";
	}

	return $latest_txt;
}

//최신글(일반적인2)
function bbs_latest_basic2($code,$min=0,$max,$link){
	$latest_txt = "";
	$sql = "SELECT idx,title,registerDay FROM tb_$code ORDER BY top desc, registerDay desc, ref desc, re_step, re_level LIMIT $min,$max";
	//$latest_txt = $sql;
	$result = myquery_error($sql);
	$cnt = sql_num_rows($result);

	if($cnt>0){
		while($row = sql_fetch_array($result)){
			$registerDay = substr($row['registerDay'],0,10);
			$title=strcut_utf8($row['title'],35,false,'..');
			$bbsData=MyEncrypt("no=".$row['idx']);
			$mode = "&amp;mode=view";
			$latest_txt.= "<li><a href=".$link."?bbsData=".$bbsData.$mode."&code=".$code." target='_blank'>".$title."</a></li>";
		}
	}else{
		$latest_txt.= "<li><p class=\"none\">등록된 글이 없습니다.</p></li>";
	}

	return $latest_txt;
}

//최신글(포토갤러리)
function bbs_latest_photo($code,$min=0,$max,$link){
	$latest_txt = "";
	$sql = "SELECT idx,title,registerDay,link1,s_file,content,code FROM tb_$code ORDER BY top desc, registerDay desc, ref desc, re_step, re_level LIMIT $min,$max";
	//echo $sql;
	//$latest_txt = $sql;
	$result = myquery_error($sql);
	$cnt = sql_num_rows($result);

	if($cnt>0){
		while($row = sql_fetch_array($result)){
			$registerDay = substr($row['registerDay'],0,10);
			$title=strcut_utf8($row['title'],35,false,'..');
			$bbsData=MyEncrypt("no=".$row['idx']);
			$yiframe		= htmlspecialchars_decode($row['yiframe']); //유튜브 iframe 소스
			$yiframe = str_replace("&#34;","\"",$yiframe);
			$mode = "&amp;mode=view";
			$code = $row['code'];
			$idx = $row['idx'];
			
			$s_file = "";

			if($row['s_file']) {
				$s_file = $row['s_file'];
				$s_img  = "../bbsDown/".$code."/".$s_file;
			} else {
				$content = $row['content'];
				preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $content, $out5);
				$tmp_image1 = $out5[0][0];
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
					$s_img = explode("/",$s_img);
					$s_img = $s_img[3]; //파일명
					$s_img2 = preg_replace("/\.[^\.]+$/i", "", $s_img); // 확장자제거
					$s_img2 = $s_img2.'_s';
					$s_img_ext = pathinfo($s_img, PATHINFO_EXTENSION); // 확장자만 출력
					$s_img = $s_img2.".".$s_img_ext;
					$s_img = "/bbsDown/editor_up/".$s_img;

					if (!file_exists($_SERVER['DOCUMENT_ROOT'].$s_img)) $s_img = "";
				}
			}

			if ($s_img == "") $s_img = "/img/no_img.jpg";
			
			//$latest_txt.= "<li><a href=".$row['link1'].">".$title."</a></li>";
			$latest_txt.= "<li>";
			$latest_txt.= "<a href=".$link."?bbsData=".$bbsData.$mode."><img src='".$s_img."' alt='".$title."'></a>";
			$latest_txt.= "</li>";

		}
	}else{
		$latest_txt.= "<li class=\"none\"><a href=''>등록된 글이 없습니다.</a></li>";
	}

	return $latest_txt;
}


//최신글(교육홍보자료)
function bbs_latest_promotion($code,$min=0,$max,$link){
	$latest_txt = "";
	$sql = "SELECT idx,title,registerDay,link1,s_file,content,code,gubunx,yiframe FROM tb_$code ORDER BY top desc, registerDay desc, ref desc, re_step, re_level LIMIT $min,$max";
	//echo $sql;
	//$latest_txt = $sql;
	$result = myquery_error($sql);
	$cnt = sql_num_rows($result);

	if($cnt>0){
		while($row = sql_fetch_array($result)){
			$registerDay = substr($row['registerDay'],2,10);
			$registerDay = str_replace("-","",$registerDay);
			$title=strcut_utf8($row['title'],35,false,'..');
			$bbsData=MyEncrypt("no=".$row['idx']);
			$yiframe = htmlspecialchars_decode($row['yiframe']); //유튜브 iframe 소스
			$yiframe = str_replace("&#34;","\"",$yiframe);
			$mode = "&amp;mode=view";
			$code = $row['code'];
			$idx = $row['idx'];
			
			$s_file = "";

			$gubunx = $row['gubunx'];

			$colum_txt = "";
			switch($gubunx){
				case "영상": $colum_txt = "<span class=\"cate colum01\">영상</span>"; break;
				case "카드뉴스": $colum_txt = "<span class=\"cate colum02\">카드뉴스</span>"; break;
				case "리플릿": $colum_txt = "<span class=\"cate colum03\">리플릿</span>"; break;
				case "포스터": $colum_txt = "<span class=\"cate colum04\">포스터</span>"; break;
				case "연구자료": $colum_txt = "<span class=\"cate colum05\">연구자료</span>"; break;
				default: $colum_txt = $gubunx;
			}

			if($row['s_file']) {
				$s_file = $row['s_file'];
				$s_img  = "../bbsDown/".$code."/".$s_file;
			} else {
				$content = $row['content'];
				preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $content, $out5);
				$tmp_image1 = $out5[0][0];
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
					$s_img = explode("/",$s_img);
					$s_img = $s_img[4]; //파일명
					$s_img2 = preg_replace("/\.[^\.]+$/i", "", $s_img); // 확장자제거
					$s_img2 = $s_img2.'_s';
					$s_img_ext = pathinfo($s_img, PATHINFO_EXTENSION); // 확장자만 출력
					$s_img = $s_img2.".".$s_img_ext;

					/*if($code=="gallery" && $idx<=411 && $s_file==""){
						preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $content, $matches);
						$s_img = $matches[1];
						$s_img = explode(" ",$s_img[0]); //타이틀을 제외한 
						$s_img = $s_img[0];
						$s_img = explode("/",$s_img);
						$e_file_dir = $_SERVER['DOCUMENT_ROOT']."/bbsDown/editor_up/";
						$e_file_dir2 = $_SERVER['DOCUMENT_ROOT']."/".$s_img[3]."/".$s_img[4]."/".$s_img[5]."/".$s_img[6]."/";
						$e_file_name = $s_img[7]; //파일명
						//echo $e_file_name;
						$e_file_name = explode(".",$e_file_name);
						$e_file_name2 = $e_file_name[0]."_s.".$e_file_name[1];
						$s_img = "/bbsDown/editor_up/".$e_file_name2;
						//echo $s_img;
					}else{
						$s_img = "/bbsDown/editor_up/".$s_img;
					}*/
					$s_img = "/bbsDown/editor_up/".$s_img;
				}
			}
			
			//$latest_txt.= "<li><a href=".$row['link1'].">".$title."</a></li>";
			$latest_txt.= "<li>";
			if($gubunx=="영상"){
				$latest_txt.= "<a href=\"#view_movie".$idx."\" class=\"litebox\">";
			}else{
				$latest_txt.= "<a href=".$link."?bbsData=".$bbsData.$mode.">";
			}
			if($gubunx=="영상"){
				$latest_txt.= "<div class=\"photo movie\">";
			}else{
				$latest_txt.= "<div class=\"photo\">";
			}
			$latest_txt.= $colum_txt;
			$latest_txt.= "<img src='".$s_img."' alt='".$title."'>";
			$latest_txt.= "</div>";
			$latest_txt.= "<div class=\"txt\">";
			$latest_txt.= "<dl>";
			$latest_txt.= "<dt><span class=\"tit\">".$title."</span></dt>";
			$latest_txt.= "<dd class=\"date\">".$registerDay."</dd>";
			$latest_txt.= "</dl>";
			$latest_txt.= "</div>";
			$latest_txt.= "</a>";
			$latest_txt.= "</li>";


			if($gubunx=="영상"){
				$latest_txt.= "<div id=\"view_movie".$idx."\" class=\"no-display\">";
				$latest_txt.= "<div class=\"moviepop\">";
				$latest_txt.= "<h1 class=\"tac\">".$title."</h1>";
				$latest_txt.= "<div class=\"video-container\">".$yiframe."</div>";
				$latest_txt.= "</div>";
				$latest_txt.= "</div>";
			}

		}
	}else{
		$latest_txt.= "<li class=\"none\"><a href=''>등록된 글이 없습니다.</a></li>";
	}

	return $latest_txt;
}


//최신글(두테이블 합치기)
function bbs_latest_union($codes,$min=0,$max,$links){
	$latest_txt = "";
	
	$codes = explode("|",$codes);
	$links = explode("|",$links);

	$alphabetArr = range('a', 'z');

	$sql = "(SELECT a.* FROM tb_$codes[0] AS a) ";
	foreach ($codes as $key => $val) {
		if ($key != 0) $sql .=  " UNION (SELECT $alphabetArr[$key].* FROM tb_$codes[$key] AS $alphabetArr[$key]) ";
	}
	$sql .= "ORDER BY registerDay desc, ref desc, re_step, re_level LIMIT $min,$max";
	// echo $sql;
	$result = sql_query($sql);
	$cnt = sql_num_rows($result);

	if($cnt>0){
		while($row = sql_fetch_array($result)){
			$registerDay = substr($row['registerDay'],0,10);
			$_registerDay = str_replace("-", ".", $registerDay);
			$_registerDay = substr($_registerDay, 2, 10);
			$registerDay = explode("-",$registerDay);
			$title=strcut_utf8($row['title'],35,false,'..');
			$bbsData=MyEncrypt("no=".$row['idx']);
			$mode = "&amp;mode=view";
			$code = $row['code'];
			$idx = $row['idx'];
			
			$s_file = "";
			$s_img = "";

			$gubunx = $row['gubunx'];
			

			if($row['s_file']) {
				$s_file = $row['s_file'];
				$s_img  = "../bbsDown/".$code."/".$s_file;
			} else {
				$content = $row['content'];
				preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $content, $out5);
				$tmp_image1 = $out5[0][0];
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
					$s_img = explode("/",$s_img);
					$s_img = $s_img[4]; //파일명
					$s_img2 = preg_replace("/\.[^\.]+$/i", "", $s_img); // 확장자제거
					$s_img2 = $s_img2.'_s';
					$s_img_ext = pathinfo($s_img, PATHINFO_EXTENSION); // 확장자만 출력
					$s_img = $s_img2.".".$s_img_ext;
					$s_img = "/bbsDown/editor_up/".$s_img;
				}
			}

			if(empty($s_img)) $s_img = "../img/no_img.jpg";
			
			$contentTxt = $row['content'];
			$contentTxt = str_replace("&#34;","\"",$contentTxt);
			$contentTxt = str_replace("&#39;","'",$contentTxt);
			$contentTxt = str_replace("&nbsp;","",$contentTxt);
			$contentTxt = htmlspecialchars_decode($contentTxt);
			$contentTxt = strip_tags($contentTxt);
			$contentTxt = strcut_utf8($contentTxt, 100, false, '..');

			$bbsConfigRow = sql_fetch("SELECT bbs_title FROM tb_bbs_list WHERE code = '$code'");
			$bbsTitle = $bbsConfigRow['bbs_title'];

			$tagClass = $bbsTitleTxt = "";
			if ($code == "notice") {
				$tagClass = "tag01";
				$bbsTitleTxt = "공지";
			} else if ($code == "material") {
				$tagClass = "tag02";
				$bbsTitleTxt = "자료";
			} else if ($code == "press") {
				$tagClass = "tag03";
				$bbsTitleTxt = "보도";
			} else {
				$tagClass = "tag01";
				$bbsTitleTxt = "";
			}

			$href = $bbsConfigRow['folder_path'] . $bbsConfigRow['page_fn'] . "?bbsData=" . $bbsData . $mode;

			$latest_txt.= "
			<div class=\"swiper-slide\">
				<a href=\"$href\">
					<span class=\"tag $tagClass\">
						$bbsTitleTxt
					</span>
					<span class=\"date\">$_registerDay</span>
					<strong class=\"tlt\">$title</strong>
					<i class=\"line\"></i>
					<em class=\"txt\">$contentTxt</em>
				</a>
			</div>";

		}
	}

	return $latest_txt;
}

//최신글(두테이블 합치기) - 갤러리
function bbs_latest_union_photo($codes,$min=0,$max,$links){
	global $connect;
	$latest_txt = "";

	$codes = explode("|", $codes);
	$links = explode("|", $links);

	$alphabetArr = range('a', 'z');

	$sql = "(SELECT a.* FROM tb_$codes[0] AS a) ";
	foreach ($codes as $key => $val) {
		if ($key != 0) $sql .=  " UNION (SELECT $alphabetArr[$key].* FROM tb_$codes[$key] AS $alphabetArr[$key]) ";
	}
	$sql .= "ORDER BY registerDay desc, ref desc, re_step, re_level LIMIT $min,$max";
	$result = myquery_error($sql);
	$cnt = sql_num_rows($result);

	if($cnt>0){
		$key = 0;
		while($row = sql_fetch_array($result)){
			$registerDay = substr($row['registerDay'],0,10);
			$registerDay = explode("-",$registerDay);
			$title=strcut_utf8($row['title'],35,false,'..');
			$bbsData=MyEncrypt("no=".$row['idx']);
			$mode = "&amp;mode=view";
			$code = $row['code'];
			$idx = $row['idx'];
			
			$s_file = "";
			$s_img = "";

			$gubunx = $row['gubunx'];
			
			$contentTxt = $row['content'];
			$contentTxt = str_replace("&#34;","\"",$contentTxt);
			$contentTxt = str_replace("&#39;","'",$contentTxt);
			$contentTxt = str_replace("&nbsp;","",$contentTxt);
			$contentTxt = htmlspecialchars_decode($contentTxt);
			$contentTxt = strip_tags($contentTxt);
			$contentTxt = strcut_utf8($contentTxt, 504, false, '..');

			if($row['s_file']) {
				$s_file = $row['s_file'];
				$s_img  = "../bbsDown/".$code."/".$s_file;
			} else {
				$content = $row['content'];
				preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $content, $out5);
				$tmp_image1 = $out5[0][0];
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
					$s_img = explode("/",$s_img);
					$s_img = $s_img[3]; //파일명
					$s_img2 = preg_replace("/\.[^\.]+$/i", "", $s_img); // 확장자제거
					$s_img2 = $s_img2.'_s';
					$s_img_ext = pathinfo($s_img, PATHINFO_EXTENSION); // 확장자만 출력
					$s_img = $s_img2.".".$s_img_ext;
					$s_img = "/bbsDown/editor_up/".$s_img;

					if (!file_exists($_SERVER['DOCUMENT_ROOT'].$s_img)) $s_img = "";
				}
			}
			
			if (empty($s_img)) $s_img = "/img/no_img.png";

			$bbsConfigRow = sql_fetch("SELECT bbs_title FROM tb_bbs_list WHERE code = '".$codes[$key]."'");
			$bbsTitle = $bbsConfigRow['bbs_title'];
			if ($code == "notice") {
				$link = $links[0]."?bbsData=".$bbsData.$mode;
			} else if ($code == "media") {
				$link = $links[1]."?bbsData=".$bbsData.$mode;
			}

			$latest_txt.= "<li>
				<a href=\"$link\">
					<em class=\"img\">
						<img src=\"$s_img\" alt=\"$title\">
					</em>
					<div class=\"cont\">
						<span class=\"top\">$bbsTitle</span>
						<p class=\"tlt\">$title</p>
						<p class=\"txt\">$contentTxt</p>
						<em class=\"date\">$registerDay[0]-$registerDay[1]-$registerDay[2]</em>
					</div>
				</a>
			</li>";

			$key++;
		}
	} else {
		$latest_txt.= "<li class=\"none\"><a href=''>등록된 글이 없습니다.</a></li>";
	}

	return $latest_txt;
}

function view_prev_list_eng($pre_arr,$url,$belong_page="1", $str_len){
	$html_str = "";

	if($pre_arr){
        $preData=MyEncrypt("no=".$pre_arr['idx']);
        $preLink="code=$code&page=$belong_page&bbsData=$preData&mode=view&".$pre_arr['idx'];
		$pre_title=strcut_utf8(stripslashes($pre_arr['title']),$str_len,false,'..'); 
		$pre_title = clearxss($pre_title,"");

		$html_str .= "<a href='$url?$preLink'>";
		$html_str .= "$pre_title";
		$html_str .= "</a>";
	}else{
		$html_str .= "There is no prev article.";
	}

	return $html_str;
}

function view_next_list_eng($next_arr,$url,$belong_page="1", $str_len){
	$html_str = "";
	
	if($next_arr){
        $nextData=MyEncrypt("no=".$next_arr['idx']);
        $nextLink="code=$code&page=$belong_page&bbsData=$nextData&mode=view&".$next_arr['idx'];
        $next_title=strcut_utf8($next_arr['title'],$str_len,false,'..');
		$next_title = clearxss($next_title,"");
		
		$html_str .= "<a href='$url?$nextLink'>";
		$html_str .= "$next_title";
		$html_str .= "</a>";
    }else{
		$html_str .= "There is no next article.";
	}

	return $html_str;
}

function view_prev_list_chn($pre_arr,$url,$belong_page="1", $str_len){
	$html_str = "";

	if($pre_arr){
        $preData=MyEncrypt("no=".$pre_arr['idx']);
        $preLink="code=$code&page=$belong_page&bbsData=$preData&mode=view&".$pre_arr['idx'];
		$pre_title=strcut_utf8(stripslashes($pre_arr['title']),$str_len,false,'..'); 
		$pre_title = clearxss($pre_title,"");

		$html_str .= "<a href='$url?$preLink'>";
		$html_str .= "$pre_title";
		$html_str .= "</a>";
	}else{
		$html_str .= "上篇文章不存在。";
	}

	return $html_str;
}

function view_next_list_chn($next_arr,$url,$belong_page="1", $str_len){
	$html_str = "";
	
	if($next_arr){
        $nextData=MyEncrypt("no=".$next_arr['idx']);
        $nextLink="code=$code&page=$belong_page&bbsData=$nextData&mode=view&".$next_arr['idx'];
        $next_title=strcut_utf8($next_arr['title'],$str_len,false,'..');
		$next_title = clearxss($next_title,"");
		
		$html_str .= "<a href='$url?$nextLink'>";
		$html_str .= "$next_title";
		$html_str .= "</a>";
    }else{
		$html_str .= "没有下一篇文章。";
	}

	return $html_str;
}

//이름 별표처리
function mn_star($str){
	$v = "";
	$len = mb_strlen($str,"UTF-8");
	$str = preg_split('//u', $str, null, PREG_SPLIT_NO_EMPTY);
	for($i=0; $i<$len; $i++){
		if($len>=3){
			if($i!=0 && $i!=$len-1){
				$v .= "*";
			}else{
				$v .= $str[$i];
			}
		}else{
			if($i!=0 && $i!=$len){
				$v .= "*";
			}else{
				$v .= $str[$i];
			}
		}
	}
	return $v;
}

//메일보내기(PHPMailer - SMTP)
function sendMail($fromName,$replyTo,$toName,$subject,$contents,$to){
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//언어셋, 인코딩 설정
	$mail->CharSet = "UTF-8";
	//$mail->Encoding = "base64";
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;
	$mail->AuthType = "LOGIN"; //smtp 인증 안될 때 사용
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host = "mail.cmaru.com";
	//Set the SMTP port number - likely to be 25, 465 or 587
	$mail->Port = 465;
	//$mail->Port = 587;
	$mail->SMTPSecure = "ssl"; // SSL을 사용함
	//$mail->SMTPSecure = "tls"; // tls을 사용함
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication
	$mail->Username = "mailsender2@cmaru.com";
	//Password to use for SMTP authentication
	$mail->Password = "!7x1h_&xma";
	//Set who the message is to be sent from
	$mail->setFrom('mailsender2@cmaru.com', $fromName);
	//Set an alternative reply-to address
	$mail->addReplyTo('mailsender2@cmaru.com', $replyTo);
	//Set who the message is to be sent to
	$mail->addAddress($to, $toName);
	//Set the subject line
	$mail->Subject = $subject;
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
	//이미지파일 첨부
	//$imgpath = $_SERVER['DOCUMENT_ROOT'].'/img/sendmail.jpg';
	//$cid = md5($imgpath);
	//$mail -> AddEmbeddedImage($imgpath,$cid,'sendmail.jpg');
	//$img = "<div><img src='cid:$cid'></div>";
	//$contents = $img.$contents;
	$contents = $contents;
	 
	$mail->msgHTML($contents);
	
	
	//Replace the plain text body with one created manually
	$mail->AltBody = 'This is a plain-text message body';
	//Attach an image file
	//$mail->addAttachment('images/phpmailer_mini.png');

	//send the message, check for errors
    
	if (!$mail->send()) {
		//echo "Mailer Error: " . $mail->ErrorInfo;
		//exit;
	} else {
		//echo "Message sent!";
		//exit;
	}

	return $mail;
}

// 3.31
// HTML SYMBOL 변환
// &nbsp; &amp; &middot; 등을 정상으로 출력
function html_symbol($str)
{
    return preg_replace("/\&([a-z0-9]{1,20}|\#[0-9]{0,3});/i", "&#038;\\1;", $str);
}

// TEXT 형식으로 변환
function get_text($str, $html=0, $restore=false)
{
    $source[] = "<";
    $target[] = "&lt;";
    $source[] = ">";
    $target[] = "&gt;";
    $source[] = "\"";
    $target[] = "&#034;";
    $source[] = "\'";
    $target[] = "&#039;";

    if($restore)
        $str = str_replace($target, $source, $str);

    // 3.31
    // TEXT 출력일 경우 &amp; &nbsp; 등의 코드를 정상으로 출력해 주기 위함
    if ($html == 0) {
        $str = html_symbol($str);
    }

    if ($html) {
        $source[] = "\n";
        $target[] = "<br/>";
    }

    return str_replace($source, $target, $str);
}

// XSS 관련 태그 제거
function clean_xss_tags($str, $check_entities=0)
{
    $str_len = strlen($str);
    
    $i = 0;
    while($i <= $str_len){
        $result = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $str);
        
        if( $check_entities ){
            $result = str_replace(array('&colon;', '&lpar;', '&rpar;', '&NewLine;', '&Tab;'), '', $result);
        }
        
        $result = preg_replace('#([^\p{L}]|^)(?:javascript|jar|applescript|vbscript|vbs|wscript|jscript|behavior|mocha|livescript|view-source)\s*:(?:.*?([/\\\;()\'">]|$))#ius',
                '$1$2', $result);

        if((string)$result === (string)$str) break;

        $str = $result;
        $i++;
    }

    return $str;
}

function visitCount($sessName)
{
	$yearx = date("Y");
	$monthx  = date("n");
	if (strlen($monthx) == 1) $monthx = '0' . $monthx;
	$dayx = date("d");
	$timex = date("H:i");
	$datexx = $yearx . "-" . $monthx . "-" . $dayx;
	$datex = $yearx . "-" . $monthx;
	$n_date = mktime(0, 0, 0, $monthx, $dayx, $yearx);
	$youle = date("D", $n_date);

	$sess = $_SESSION[$sessName];
	///////// count	
	if (!$sess) {
		$_SESSION[$sessName] = $_SERVER["REMOTE_ADDR"];
		$os_ver = $_SERVER['HTTP_USER_AGENT'];
		$fr_loc = urlencode($_SERVER['HTTP_REFERER']);
		$os_ver = get_os_ver($os_ver);
		$isMobile = isMobile();
		if ($isMobile == false) {
			$pcCheck = "PC";
		} else $pcCheck = "Mobile";
		$query = "insert into tb_count set year='$yearx', 
							datex='$datex', datexx='$datexx', 
							youle='$youle', ip='$$_SERVER[REMOTE_ADDR]', 
							from_location='$fr_loc', timex='$timex', 
							pccheck='$pcCheck', os_ver='$os_ver'";
		sql_query($query);
	}
}

// 네이버tv 썸네일 통신 url 가져오기
function getNaverTV_thumbImg_url($movieid) {
	$url = "https://tv.naver.com/oembed?url=https://tv.naver.com/v/".$movieid;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	$response = curl_exec($ch);
	curl_close($ch);

	$apiUrl = $response;

	if ($response) {
		$thumbImg = getNaverTV_thumbImg($apiUrl);
		if ($thumbImg == "") $thumbImg = "/img/no_img.jpg";
	} else {
		$thumbImg = "/img/no_img.jpg";
	}

	return $thumbImg;
}

// 네이버tv 썸네일 가져오기
function getNaverTV_thumbImg($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	$response = curl_exec($ch);
	curl_close($ch);
	$datas = json_decode($response);
	return $datas->thumbnail_url;
}

function dateGap($sdate, $edate){
	$date = array();
	$sdate = str_replace("-","",$sdate);
	$edate = str_replace("-","",$edate);
	for($i=$sdate;$i<=$edate;$i++){
	 $year       = substr($i,0,4);
	 $month = substr($i,4,2);
	 $day     = substr($i,6,2);

	 if(checkdate($month,$day,$year)){
	  array_push($date, $year."-".$month."-".$day);
	 }
	}
   
	return $date;   
}
?>
