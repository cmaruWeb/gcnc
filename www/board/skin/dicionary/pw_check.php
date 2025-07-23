<? if(($modex=="d") || ($modex=="e") ) {?>
<form name="check_form" method="post" action="<?=$boardURL?>/bbs_del.php">
<? } else { ?>
<form name="check_form" method="post" action="<?=$boardURL?>/view_passOk.php">
<? } 
if($OT_LEVELX=="1") {
	$OT_LEVELX4 = "1";
}
?>
<input type='hidden' name="doc_url" value="<?=$PHP_SELF?>" />
<input type="hidden" name="code" value="<?=$code?>" />
<input type="hidden" name="item_code" value="<?=$item_code?>" />
<input type="hidden" name="class_code" value="<?=$class_code?>" />
<input type="hidden" name="bbsData" value="<?=$mvData?>" />
<input type="hidden" name="sd" value="<?=$file_dir?>" />
<input type="hidden" name="modex" value="<?=$modex?>" />
<input type="hidden" name="Act" value="<?=$Act?>" />
<input type="hidden" name="m2" value="<?=$m2?>" />


	<div class="editList">
		<ul>
<? if(($modex=="d") || ($modex=="e") ) {?>
	<? if($sign_ok) { ?>
			<li>							
				<span class="txt">글의 수정 및 삭제를 위해서 확인버튼을 눌러주세요.</span>
				<input type="hidden" name="pwd" id="pwd" value="pass" />
			</li>		
	<? } else { ?>
			<li>							
				<span class="txt">글의 수정 및 삭제를 위해서 비밀번호를 입력하세요.</span>
				<span class="pswd"><input type="password" name="pwd" id="pwd" value="<?=$OT_LEVELX4?>" /></span>
			</li>	
	<? } ?>
<? } else { ?>
			<li>							
				<span class="txt">이 글은 비밀글입니다. 비밀번호를 입력하여 주세요.</span>
				<span class="pswd"><input type="password" name="pwd" id="pwd" value="<?=$OT_LEVELX4?>" /></span>
			</li>	
<? } ?>
		</ul>
	</div>


	<!-- 게시판 컨트롤 버튼 start -->
	<div class="boardButton">
		<span><a href="<?=$PHP_SELF?>?code=<?=$code?>&amp;bbsData=<?=$mvData?>&amp;mode=list&m2=<?=$m2?>">목록</a> </span> 
		<span><a href="#ok" onclick="document.check_form.submit();">확인</a> </span> 
	</div>


</form>
