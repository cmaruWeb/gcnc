<script type="text/javascript">
     function layerClose(id) {
         document.getElementById("layerPopup" + id).style.visibility = "hidden";
     }
 
    function closeByToday(id){
         if (document.getElementById("chkbox" + id).checked) {
             setCookie("layerPopup" + id, "done", 1);
         }
 
        document.getElementById("layerPopup" + id).style.visibility = "hidden";
        document.getElementById("chkbox" + id).checked = false;
     }

function setCookie( name, value, expiredays )
{
	var todayDate = new Date();
	todayDate.setDate( todayDate.getDate() + expiredays );
	document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
}
function getCookie( name )
{
	var nameOfCookie = name + "=";
	var x = 0;
	while ( x <= document.cookie.length )
	{
		var y = (x+nameOfCookie.length);
		if ( document.cookie.substring( x, y ) == nameOfCookie ) {
			if ( (endOfCookie=document.cookie.indexOf( ";", y )) == -1 )
				endOfCookie = document.cookie.length;
			return unescape( document.cookie.substring( y, endOfCookie ) );
		}
		x = document.cookie.indexOf( " ", x ) + 1;
		if ( x == 0 )
			break;
	}
	return "";
}
</script>
<style type="text/css">
<?
	for ($i=0;$i < $popcnt;$i++) {
		$ix = $pop_left[$i];
		$iy = $pop_top[$i]; 
     echo "#layerPopup".$i." {";
     echo "    visibility : hidden;";
     echo "    position : absolute;";
     echo "    background-color : #FFFFFF;";
     echo "    border:none;";
     echo "    width : ".$pop_width[$i]."px;";
     echo "    height : ".$pop_height[$i]."px;";
     echo "    color: #676767;";
     echo "    left : ".$ix."px;";
     echo "    top : ".$iy."px;";
     echo "		}	";
     echo "    #layerPopup".$i." .whites{color:white; font-size:12px;} ";

	}
?>
 
</style>

<?
	for ($i=0;$i < $popcnt;$i++) {
		$pop_newx = $pop_new[$i];
		if($pop_newx == null) {
			$pop_newx = "";
		} else if ($pop_newx == "Y") {
			$pop_newx = " target='_blank' title='새창열림' ";
		} else {
			$pop_newx = "";
		}

		echo "<div id='layerPopup".$i."' style='z-index:99999;'>";
		echo "<div style='border:4px solid #333; background-color:#FFFFFF;'>";
		if($pop_url[$i]) {
			//echo "<a href='http://".$pop_url[$i]."' ".$pop_newx." >";
			echo "<a href='".$pop_url[$i]."' ".$pop_newx." >";
		}
		if($pop_file[$i]) {
			echo "<img src='../bbsDown/popup/".$pop_file[$i]."' width=".$pop_width[$i]." alt='".$pop_tit[$i]."' />";
		}
		$popi[$i] = str_replace("&#34;","\"",$popi[$i]);
		$popi[$i] = str_replace("&#39;","'",$popi[$i]);
		$popi[$i] = str_replace("&nbsp;","",$popi[$i]);
		$popi[$i] = htmlspecialchars_decode($popi[$i]);
		//$popi[$i] = nl2br($popi[$i]);
		//$popi[$i] = strip_tags($popi[$i],'<img>');
		if($popi[$i] == "<p><br></p>"){
			$popi[$i] = strip_tags($popi[$i],'<img>');
		}

		echo $popi[$i];
		if($pop_url[$i]) {
			echo "</a>";
		}
		echo "</div>";
		echo "<div style='background:#333333; padding:8px;'><label><input title='하루동안안보기체크' type='checkbox' name='chkbox".$i."' id='chkbox".$i."' onclick='closeByToday(".$i.")' /></label> <span class='whites'>하루 동안 이 창을 열지 않습니다.</span>    <a href='close#' onClick='layerClose(".$i."); return false;' onkeypress='this.click' style='float:right;'><span class='whites'>닫기</span></a>";
		echo "</div>";
		echo "</div>";
	}
?>

<script type="text/javascript">
    var file_name = getCookie("layerPopup0");
	var popcnt = <?=$popcnt?>;
 
    for (i = 0; i < popcnt; i++){
		file_name = getCookie("layerPopup"+i);	
         if (file_name != "done") {
             document.getElementById("layerPopup" + i).style.visibility = "visible";
         } else {
             document.getElementById("layerPopup" + i).style.visibility = "hidden";
         }
     }
</script>
