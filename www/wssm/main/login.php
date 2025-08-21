<?
$none=true;
$m1 = 0;
$m2 = 0;
$m3 = 0;
include("../inc/top.php" );

?>

<div class="loginWrap">
	<div class="logobox">
		<h1><img src="/img/logo_w.png" alt="로고"/></h1>
	</div>
	<div class="login">
		<h3>로그인이 필요합니다.</h3>

		<form name="login_frm" id="login_frm" action="login_check.php" method="post" onsubmit="return login_frm_go();">
		<input type="hidden" name="go_url" id="go_url" value="<?=$go_url?>" />
		<input type="hidden" name='loginOK'  value="1" />

	
		<ul class="input_txt">
			<!--<li><label for="per_id">관리자</label>
			<input type="text" name="l_id" id="l_id" hname="최고관리자" value="" option="idpass" maxlength="25" readonly="" placeholder="최고관리자"/></li>-->
			<li><label for="per_id">아이디</label>
			<!--<input type="text" name="l_id" id="l_id" hname="이름" value="" option="idpass" maxlength="25" placeholder="아이디를 입력해주세요." frequired="required" /></li>-->
			<input type="text" name="admin_id" id="l_id" hname="이름" value="" option="idpass" maxlength="25" placeholder="아이디를 입력해주세요." frequired="required" autofocus/></li>
			<li><label for="per_pw">패스워드</label>
			<!--<input type="password" name="l_pw" id="l_pw" hname="비밀번호" placeholder="비밀번호를 입력해주세요." frequired="required" />-->
			<input type="password" name="admin_pass" id="l_pw" hname="비밀번호" placeholder="비밀번호를 입력해주세요." frequired="required" />
			</li>
		</ul>
		<input type="submit" class="btn_sumit" value="로그인">			
		<!--<p class="rem"><input type="checkbox" id="chk_saveid" class="chkbtn" name="chk_saveid" value="1" />	<label for="chk_saveid" class="toggler">카운셀러번호 / 이름 기억하기</label></p>-->
		</form>

	</div>		
</div>

<p class="log_foot">	Copyright ⓒ 2021 <?php echo SITE_TITLE ?></p>


</div><!--wrap-->

<script language='javascript'>
	function login_frm_go(){
		f = document.login_frm
		if(f.admin_id.value==""){
			alert("아이디를 입력하여 주십시요")
			f.admin_id.focus();
			return false;
		}else if (f.admin_pass.value==""){
			alert("관리자 패스워드를 입력하여 주십시요")
			f.admin_pass.focus();
			return false;
		}else{
//			f.submit();
			return true;
		}
	}
</script>
