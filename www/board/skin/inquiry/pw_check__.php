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

        <fieldset>
                <legend>글 작성 영역</legend>
                <!-- table -->
                <h3 class="screen_out">글 작성하기 </h3>
        
                <table class="bo_writ_01" summary="글쓰기의 수정시 비밀번호 입력하세요">
                        <caption>비밀번호 입력</caption>
                        <colgroup>
                                <col width="20%;" />
                                <col width="*" />
                        </colgroup>
                        <tbody>

                                <!-- 비밀번호 -->
                                <tr>
<? if(($modex=="d") || ($modex=="e") ) {?>
	<? if($sign_ok) { ?>
                                        <th colspan="2" scope="row">글의 수정 및 삭제를 위해서 확인버튼을 눌러주세요. </th>
                                </tr>
								<input type="hidden" name="pwd" value="pass" />
	<? } else { ?>
                                        <th colspan="2" scope="row">글의 수정 및 삭제를 위해서 비밀번호를 입력하여 주세요. </th>
                                </tr>
                                <!-- 비밀번호 -->
                                <tr>
                                        <th scope="row"><label for="pwd">비밀번호 확인</label><em><img src="../board/images/ico_chk.png" alt="필수항목" /></em></th>
                                        <td ><input id="pwd" name="pwd" class="gl_input_W200" type="password" title="확인용 비밀번호 입력" value="<?=$OT_LEVELX4?>" /></td>
                                </tr>
	<? } ?>
<? } else { ?>
                                        <th colspan="2" scope="row">이 글은 비밀글입니다. 비밀번호를 입력하여 주세요. </th>
                                </tr>
                                <!-- 비밀번호 -->
                                <tr>
                                        <th scope="row"><label for="pwd">비밀번호 확인</label><em><img src="../board/images/ico_chk.png" alt="필수항목" /></em></th>
                                        <td ><input id="pwd" name="pwd" class="gl_input_W200" type="password" title="확인용 비밀번호 입력" value="<?=$OT_LEVELX4?>" /></td>
                                </tr>
<? } ?>
                              

                        </tbody>
                </table>
                <!--// table -->
                
                
                <!-- 게시판 컨트롤 버튼 start -->
				<div class="boardButton">
					<span><a href="<?=$PHP_SELF?>?code=<?=$code?>&amp;bbsData=<?=$mvData?>&amp;mode=list">목록으로</a> </span> 
					<span><a href="#ok" onclick="document.check_form.submit();">확인</a> </span> 
				</div>

                <!-- / 게시판 컨트롤 버튼 end -->
        </fieldset>

</form>
