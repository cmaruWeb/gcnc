String.prototype.trim = function () { return this.replace(/^\s+|\s+$/g, '') };

// AJAX Start
function grabFile(file, func) {
	var req = getHTTPObject();
	if (req) {
		req.onreadystatechange = function () { eval(func + "(req)"); };
		req.open("GET", file, true);
		req.send(null);
	}
}
function axOk(req) { if (req.readyState == 4 && (req.status == 200 || req.status == 304)) { return true; } else { return false; } }

function chkZsf(zsfObj) {
	zsfV = zsfObj.value;
	if (zsfV.length > 0) {
		grabFile("../zmSpamFree/zmSpamFree.php?zsfCode=" + zsfV, 'rsltZsf');
	}
	else {
		document.getElementById("rslt").innerHTML = 'ⓒ스팸방지코드를 입력하시면 결과를 표시합니다.';
		document.getElementById("rslt").className = "r";
		document.getElementById('zsfCode').focus();
	}
}

function rsltZsf(req) {
	if (axOk(req)) {
		zsfV = document.getElementById('zsfCode').value;
		rsltTxt = "틀렸";
		rsltCls = "0";
		if (req.responseText * 1 == true) {
			rsltTxt = "맞았";
			rsltCls = "1";
		}
		else {
			document.getElementById('zsfCode').value = '';
			document.getElementById('zsfImg').src = 'zmSpamFree.php?re&zsfimg=' + new Date().getTime();
		}
		document.getElementById("rslt").innerHTML = "ⓒ스팸방지코드 입력값이 " + rsltTxt + "습니다.(값: '" + zsfV + "')";
		document.getElementById("rslt").className = "r" + rsltCls;
		document.getElementById('zsfCode').focus();
	}
}
// AJAX End

function pasteImage(img_url, target) {
	//alert(img_url);
	sHTML = "<div><img src=" + img_url + "  alt='image'/></div>";
	oEditors.getById[target].exec("PASTE_HTML", [sHTML]);
}

function checkSubmitForm(frm , lang){
	let alertTxt = "";
	let alertTxtBool = false;
	if(lang != undefined && typeof lang == "string"){
		alertTxtBool = true;
		switch(lang){
			case "kor" : alertTxt = "문의사항이 접수되었습니다."; break;
			case "eng" : alertTxt = "You've been accepted."; break;
			case "chn" : alertTxt = "咨询事项已收到。"; break;		
		}
	}
	if(frm.security.value == ''){
		alertTxtBool ? alert(alertTxt) : "";
		frm.submit();
	}else{
		if(frm.security.value == 'recaptchaV3'){
			grecaptcha.ready(function () {
				grecaptcha.execute(frm.SITE_KEY.value, { action: "submit" }).then(function (token) {
					const tokenInput = document.createElement("input");
					tokenInput.type = "hidden";
					tokenInput.name = "recaptcha_token";
					tokenInput.value = token;
					frm.appendChild(tokenInput);
					
					alertTxtBool ? alert(alertTxt) : "";
					frm.submit();
				});
			});
		}
	}
}
let editorFlag = '';

function checkEditorType(){
	const editorSetElem = document.querySelector('#editor');
	
	if (typeof editorSetElem == 'undefined' || editorSetElem == null || editorSetElem.value == '' || editorSetElem.value == 'se2') {
		editorFlag = 'se2';
	} else if (editorSetElem.value == 'ckeditor') {
		editorFlag = 'ckeditor';
	} else if (editorSetElem.value == 'toast') {
		editorFlag = 'toast';
	}

	if (editorFlag == 'se2') {
		if (oEditors.getById["content"]) {
			oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
		}
	} else if (editorFlag == 'ckeditor') {
		let editor = window.editor;
	} 
}

function writeSendit() {
	var frm = document.forms.write_form1;

	checkEditorType();

	if (frm.title.value == "") {
		alert("제목을 입력해 주십시오.");
		frm.title.focus();
		return false;
	}

	if (frm.buncodxx.value != "") {
		if (frm.gubunx.value == "") {
			alert('분류를 선택해주세요.');
			frm.gubunx[0].focus();
			return false;
		}
	}

	if (frm.name.value == "") {
		alert("작성자를 입력해 주십시오.");
		frm.name.focus();
		return false;
	}

	if (editorFlag == 'se2') {
		if (frm.content.value == false) {
			alert("내용을 입력해 주십시오.");
			frm.content.focus();
			return false;
		}
	} else if (editorFlag == 'ckeditor') {
		if (editor.getData() == '') {
			alert("내용을 입력해 주십시오.");
			return false;
		}
		frm.content.value = editor.getData();

	} else if (editorFlag == 'toast') {
		const editorTxt = editorT.getMarkdown();
		if(editorTxt.length == 0){
			alert("내용을 입력해 주십시오.");
			return false;
		}
		frm.content.value = editorT.getHTML();
	}

	if (frm.pwd.value == "") {
		alert("비밀번호를 입력해 주십시오.");
		frm.pwd.focus();
		return false;
	}
	checkSubmitForm(frm)
}

function writeSendit_dictionary() {
	var frm = document.forms.write_form1;

	checkEditorType();

	if (frm.title.value == "") {
		alert("용어명을 입력해 주십시오.");
		frm.title.focus();
		return false;
	}

	if (frm.buncodxx.value != "") {
		if (frm.gubunx.value == "") {
			alert('분류를 선택해주세요.');
			frm.gubunx[0].focus();
			return false;
		}
	}

	if (frm.name.value == "") {
		alert("작성자를 입력해 주십시오.");
		frm.name.focus();
		return false;
	}

	if (editorFlag == 'se2') {
		if (frm.content.value == false) {
			alert("뜻을 입력해 주십시오.");
			frm.content.focus();
			return false;
		}
	} else if (editorFlag == 'ckeditor') {
		if (editor.getData() == '') {
			alert("뜻을 입력해 주십시오.");
			return false;
		}
		frm.content.value = editor.getData();

	} else if (editorFlag == 'toast') {
		const editorTxt = editorT.getMarkdown();
		if(editorTxt.length == 0){
			alert("뜻을 입력해 주십시오.");
			return false;
		}
		frm.content.value = editorT.getHTML();
	}

	checkSubmitForm(frm)
}

function writeSendit_application() {
	var frm = document.forms.write_form1;

	checkEditorType();

	if (frm.title.value == "") {
		alert("교육명을 입력해 주십시오.");
		frm.title.focus();
		return false;
	}

	if (frm.buncodxx.value != "") {
		if (frm.gubunx.value == "") {
			alert('분류를 선택해주세요.');
			frm.gubunx[0].focus();
			return false;
		}
	}

	if (frm.name.value == "") {
		alert("작성자를 입력해 주십시오.");
		frm.name.focus();
		return false;
	}

	if (frm.status.value == "") {
		alert("상태를 선택해주세요.");
		frm.status.focus();
		return false;
	}

	if (frm.strdat.value == "") {
		alert("시작일을 입력해주세요.");
		frm.strdat.focus();
		return false;
	}

	if (frm.enddat.value == "") {
		alert("종료일을 입력해주세요.");
		frm.enddat.focus();
		return false;
	}

	if (frm.vebnam.value == "") {
		alert("접수인원을 입력해주세요.");
		frm.vebnam.focus();
		return false;
	}

	if (frm.area.value == "") {
		alert("장소를 입력해주세요.");
		frm.area.focus();
		return false;
	}

	if (frm.pumnam.value == "") {
		alert("강사명을 입력해주세요.");
		frm.pumnam.focus();
		return false;
	}

	if (frm.col1.value == "") {
		alert("시작일을 입력해주세요.");
		frm.col1.focus();
		return false;
	}

	if (frm.col2.value == "") {
		alert("종료일을 입력해주세요.");
		frm.col2.focus();
		return false;
	}

	if (editorFlag == 'se2') {
		if (frm.content.value == false) {
			alert("내용을 입력해 주십시오.");
			frm.content.focus();
			return false;
		}
	} else if (editorFlag == 'ckeditor') {
		if (editor.getData() == '') {
			alert("내용을 입력해 주십시오.");
			return false;
		}
		frm.content.value = editor.getData();

	} else if (editorFlag == 'toast') {
		const editorTxt = editorT.getMarkdown();
		if(editorTxt.length == 0){
			alert("내용을 입력해 주십시오.");
			return false;
		}
		frm.content.value = editorT.getHTML();
	}

	if (frm.pwd.value == "") {
		alert("비밀번호를 입력해 주십시오.");
		frm.pwd.focus();
		return false;
	}
	checkSubmitForm(frm)
}

function writeSendit_link() {
	var frm = document.forms.write_form1;

	//var gubunx = "<?=$buncod_mx?>";
	var buncodxx = "<?=$buncodxx?>";

	checkEditorType();

	if (frm.title.value == "") {
		alert("제목을 입력해 주십시오.");
		frm.title.focus();
		return false;
	}

	if (frm.buncodxx.value != "") {
		if (frm.gubunx.value == "") {
			alert('분류를 선택해주세요.');
			frm.gubunx[0].focus();
			return false;
		}
	}

	if (frm.name.value == "") {
		alert("작성자를 입력해 주십시오.");
		frm.name.focus();
		return false;
	}

	if (editorFlag == 'se2') {
		if (frm.content.value == false) {
			alert("내용을 입력해 주십시오.");
			frm.content.focus();
			return false;
		}
	} else if (editorFlag == 'ckeditor') {
		if (editor.getData() == '') {
			alert("내용을 입력해 주십시오.");
			return false;
		}

		frm.content.value = editor.getData();
	} else if (editorFlag == 'toast') {
		const editorTxt = editorT.getMarkdown();
		if(editorTxt.length == 0){
			alert("내용을 입력해 주십시오.");
			return false;
		}
		frm.content.value = editorT.getHTML();
	}

	if (frm.link1.value == "") {
		alert("링크주소를 입력해 주십시오.");
		frm.link1.focus();
		return false;
	}

	if (frm.pwd.value == "") {
		alert("비밀번호를 입력해 주십시오.");
		frm.pwd.focus();
		return false;
	}

	checkSubmitForm(frm)
}

function writeSendit_video() {
	var frm = document.forms.write_form1;

	//var gubunx = "<?=$buncod_mx?>";
	var buncodxx = "<?=$buncodxx?>";

	const editorSetElem = document.querySelector('#editor');
	checkEditorType();

	if (editorFlag == 'se2') {
		if (oEditors.getById["content"]) {
			oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
		}
	} else if (editorFlag == 'ckeditor') {
		let editor = window.editor;
	} else if (editorFlag == 'toast') {
		const editorTxt = editorT.getMarkdown();
		if(editorTxt.length == 0){
			alert("내용을 입력해 주십시오.");
			return false;
		}
		frm.content.value = editorT.getHTML();
	}

	if (frm.title.value == "") {
		alert("제목을 입력해 주십시오.");
		frm.title.focus();
		return false;
	}

	if (frm.buncodxx.value != "") {
		if (frm.gubunx.value == "") {
			alert('분류를 선택해주세요.');
			frm.gubunx[0].focus();
			return false;
		}
	}

	if (frm.name.value == "") {
		alert("작성자를 입력해 주십시오.");
		frm.name.focus();
		return false;
	}

	/* if (frm.yiframe.value == "") {
		alert("유튜브 동영상 소스를 입력해 주십시오.");
		frm.yiframe.focus();
		return false;
	} */

	if (editorFlag == 'se2') {
		if (frm.content.value == false) {
			alert("내용을 입력해 주십시오.");
			frm.content.focus();
			return false;
		}
	} else if (editorFlag == 'ckeditor') {
		if (editor.getData() == '') {
			alert("내용을 입력해 주십시오.");
			return false;
		}

		frm.content.value = editor.getData();
	}

	if (frm.pwd.value == "") {
		alert("비밀번호를 입력해 주십시오.");
		frm.pwd.focus();
		return false;
	}

	checkSubmitForm(frm)

}

function writeSendit_promotion_multi() {
	var frm = document.forms.write_form1;

	//var gubunx = "<?=$buncod_mx?>";
	var buncodxx = "<?=$buncodxx?>";
	checkEditorType();

	if (frm.title.value == "") {
		alert("제목을 입력해 주십시오.");
		frm.title.focus();
		return false;
	}

	if (frm.buncodxx.value != "") {
		if (frm.gubunx.value == "") {
			alert('분류를 선택해주세요.');
			frm.gubunx[0].focus();
			return false;
		}
	}

	if (frm.gubunx.value == "영상") {
		if (frm.yiframe.value == "") {
			alert("유튜브 동영상 소스를 입력해 주십시오.");
			frm.yiframe.focus();
			return false;
		}
	}

	if (frm.name.value == "") {
		alert("작성자를 입력해 주십시오.");
		frm.name.focus();
		return false;
	}

	if (editorFlag == 'se2') {
		if (frm.content.value == false) {
			alert("내용을 입력해 주십시오.");
			frm.content.focus();
			return false;
		}
	} else if (editorFlag == 'ckeditor') {
		if (editor.getData() == '') {
			alert("내용을 입력해 주십시오.");
			return false;
		}

		frm.content.value = editor.getData();
	} else if (editorFlag == 'toast') {
		const editorTxt = editorT.getMarkdown();
		if(editorTxt.length == 0){
			alert("내용을 입력해 주십시오.");
			return false;
		}
		frm.content.value = editorT.getHTML();
	}

	if (frm.pwd.value == "") {
		alert("비밀번호를 입력해 주십시오.");
		frm.pwd.focus();
		return false;
	}

	checkSubmitForm(frm)

}

function writeSendit_apply() {
	var frm = document.forms.write_form1;
	//var gubunx = "<?=$buncod_mx?>";
	var buncodxx = "<?=$buncodxx?>";

	checkEditorType();

	if (editorFlag == 'se2') {
		if (oEditors.getById["content"]) {
			oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
		}
	} else if (editorFlag == 'ckeditor') {
		let editor = window.editor;
	}

	if (frm.title.value == "") {
		alert("제목을 입력해 주십시오.");
		frm.title.focus();
		return false;
	}

	if (frm.pumnam.value == "") {
		alert("교육과정을 선택해 주십시오.");
		frm.pumnam[0].focus();
		return false;
	}

	if (frm.buncodxx.value != "") {
		if (frm.gubunx.value == "") {
			alert('분류를 선택해주세요.');
			frm.gubunx[0].focus();
			return false;
		}
	}

	if (frm.name.value == "") {
		alert("작성자를 입력해 주십시오.");
		frm.name.focus();
		return false;
	}

	if (frm.vebnam.value == "") {
		alert("희망 교육명을 입력해 주십시오.");
		frm.vebnam.focus();
		return false;
	}

	if (frm.email.value == "") {
		alert("이메일을 입력해 주십시오.");
		frm.email.focus();
		return false;
	}

	if (frm.telnum.value == "") {
		alert("연락처를 입력해 주십시오.");
		frm.telnum.focus();
		return false;
	}
	if (frm.col1.value == "") {
		alert("소속을 입력해 주십시오.");
		frm.col1.focus();
		return false;
	}

	if (frm.col2.value == "") {
		alert("부서/직책을 입력해 주십시오.");
		frm.col2.focus();
		return false;
	}

	if (frm.col3.value == "") {
		alert("희망 교육일을 입력해 주십시오.");
		frm.col3.focus();
		return false;
	}

	if (frm.col4.value == "") {
		alert("인원을 입력해 주십시오.");
		frm.col4.focus();
		return false;
	}

	if (editorFlag == 'se2') {
		if (frm.content.value == false) {
			alert("내용을 입력해 주십시오.");
			frm.content.focus();
			return false;
		}
	} else if (editorFlag == 'ckeditor') {
		if (editor.getData() == '') {
			alert("내용을 입력해 주십시오.");
			return false;
		}

		frm.content.value = editor.getData();
	} else if (editorFlag == 'toast') {
		const editorTxt = editorT.getMarkdown();
		if(editorTxt.length == 0){
			alert("내용을 입력해 주십시오.");
			return false;
		}
		frm.content.value = editorT.getHTML();
	}

	if (frm.pwd.value == "") {
		alert("비밀번호를 입력해 주십시오.");
		frm.pwd.focus();
		return false;
	}

	if (frm.bbsData.value == "") {
		if ($("input:checkbox[id='personal_agree']").is(":checked") == false) {
			alert('개인정보취급방침에 동의해주세요.');
			$("input:checkbox[id='personal_agree']").focus();
			return false;
		}
	}

	checkSubmitForm(frm)
}

function writeSendit_e4() {
	var frm = document.forms.write_form1;
	checkEditorType();

	if (editorFlag == 'se2') {
		if (oEditors.getById["content"]) {
			oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
		}
	} else if (editorFlag == 'ckeditor') {
		let editor = window.editor;
	}

	if (frm.title.value == "") {
		alert("제목을 입력해 주십시오.");
		frm.title.focus();
		return false;
	}

	if (frm.buncodxx.value != "") {
		if (frm.gubunx.value == "") {
			alert('분류를 선택해주세요.');
			frm.gubunx[0].focus();
			return false;
		}
	}

	if (frm.name.value == "") {
		alert("작성자를 입력해 주십시오.");
		frm.name.focus();
		return false;
	}

	if (frm.strdat.value == "") {
		alert("시작일을 입력해 주십시오.");
		frm.strdat.focus();
		return false;
	}

	if (frm.enddat.value == "") {
		alert("종료일을 입력해 주십시오.");
		frm.enddat.focus();
		return false;
	}

	if (frm.vebnam.value == "") {
		alert("시간을 입력해 주십시오.");
		frm.vebnam.focus();
		return false;
	}

	if (frm.homepage.value == "") {
		alert("장소를 입력해 주십시오.");
		frm.homepage.focus();
		return false;
	}

	if (editorFlag == 'se2') {
		if (frm.content.value == false) {
			alert("내용을 입력해 주십시오.");
			frm.content.focus();
			return false;
		}
	} else if (editorFlag == 'ckeditor') {
		if (editor.getData() == '') {
			alert("내용을 입력해 주십시오.");
			return false;
		}

		frm.content.value = editor.getData();
	} else if (editorFlag == 'toast') {
		const editorTxt = editorT.getMarkdown();
		if(editorTxt.length == 0){
			alert("내용을 입력해 주십시오.");
			return false;
		}
		frm.content.value = editorT.getHTML();
	}

	if (frm.pwd.value == "") {
		alert("비밀번호를 입력해 주십시오.");
		frm.pwd.focus();
		return false;
	}

	checkSubmitForm(frm)

}

function writeSendit_e5() {
	var frm = document.write_form1;
	checkEditorType();

	if (editorFlag == 'se2') {
		if (oEditors.getById["content"]) {
			oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
		}
	} else if (editorFlag == 'ckeditor') {
		let editor = window.editor;
	}

	if (frm.title.value == "") {
		alert("제목을 입력해 주십시오.");
		frm.title.focus();
		return false;
	}

	if (frm.name.value == "") {
		alert("작성자를 입력해 주십시오.");
		frm.name.focus();
		return false;
	}

	/* if (editorFlag == 'se2') {
		if (frm.content.value == false) {
			alert("내용을 입력해 주십시오.");
			frm.content.focus();
			return false;
		}
	} else if (editorFlag == 'ckeditor') {
		if (editor.getData() == '') {
			alert("내용을 입력해 주십시오.");
			return false;
		}

		frm.content.value = editor.getData();
	} else if (editorFlag == 'toast') {
		const editorTxt = editorT.getMarkdown();
		if(editorTxt.length == 0){
			alert("내용을 입력해 주십시오.");
			return false;
		}
		frm.content.value = editorT.getHTML();
	} */

	if (frm.pwd.value == "") {
		alert("비밀번호를 입력해 주십시오.");
		frm.pwd.focus();
		return false;
	}

	return true;

}

function writeSendit_eng() {
	var frm = document.forms.write_form1;

	//var gubunx = "<?=$buncod_mx?>";
	var buncodxx = "<?=$buncodxx?>";
	checkEditorType();

	if (editorFlag == 'se2') {
		if (oEditors.getById["content"]) {
			oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
		}
	} else if (editorFlag == 'ckeditor') {
		let editor = window.editor;
	}
	if (frm.title.value == "") {
		alert("Please enter a Title.");
		frm.title.focus();
		return false;
	}

	if (frm.buncodxx.value != "") {
		if (frm.gubunx.value == "") {
			alert('Please select a category.');
			frm.gubunx[0].focus();
			return false;
		}
	}

	if (frm.name.value == "") {
		alert("Please enter the Writer.");
		frm.name.focus();
		return false;
	}

	if (editorFlag == 'se2') {
		if (frm.content.value == false) {
			alert("Please enter the contents.");
			frm.content.focus();
			return false;
		}
	} else if (editorFlag == 'ckeditor') {
		if (editor.getData() == '') {
			alert("Please enter the contents.");
			return false;
		}

		frm.content.value = editor.getData();
	} else if (editorFlag == 'toast') {
		const editorTxt = editorT.getMarkdown();
		if(editorTxt.length == 0){
			alert("Please enter the contents.");
			return false;
		}
		frm.content.value = editorT.getHTML();
	}

	if (frm.pwd.value == "") {
		alert("Please enter your password.");
		frm.pwd.focus();
		return false;
	}

	checkSubmitForm(frm)

}

function writeSendit_chn() {
	var frm = document.forms.write_form1;

	//var gubunx = "<?=$buncod_mx?>";
	var buncodxx = "<?=$buncodxx?>";
	checkEditorType();

	if (editorFlag == 'se2') {
		if (oEditors.getById["content"]) {
			oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
		}
	} else if (editorFlag == 'ckeditor') {
		let editor = window.editor;
	}

	if (frm.title.value == "") {
		alert("请输入标题。");
		frm.title.focus();
		return false;
	}

	if (frm.buncodxx.value != "") {
		if (frm.gubunx.value == "") {
			alert('请选择分类。');
			frm.gubunx[0].focus();
			return false;
		}
	}

	if (frm.name.value == "") {
		alert("请输入作者。");
		frm.name.focus();
		return false;
	}

	if (editorFlag == 'se2') {
		if (frm.content.value == false) {
			alert("请输入内容。");
			frm.content.focus();
			return false;
		}
	} else if (editorFlag == 'ckeditor') {
		if (editor.getData() == '') {
			alert("请输入内容。");
			return false;
		}

		frm.content.value = editor.getData();
	} else if (editorFlag == 'toast') {
		const editorTxt = editorT.getMarkdown();
		if(editorTxt.length == 0){
			alert("请输入内容。");
			return false;
		}
		frm.content.value = editorT.getHTML();
	}

	if (frm.pwd.value == "") {
		alert("请输入密码。");
		frm.pwd.focus();
		return false;
	}

	checkSubmitForm(frm)

}

function bbsSearchSendit() {
	var frm = document.forms.bbs_search_form;

	/*if(frm.searchstring.value=="")     {
		alert("검색 내용을 입력해 주십시오.");
		frm.searchstring.focus();
		return false;
	}*/

	return true;

}

function check_Sendit() {
	var form = document.check_form;
	if (form.pwd.value.trim() == "") {
		alert('비밀번호를 입력하세요');
		form.pwd.value == "";
		form.pwd.focus();
		return false;
	}
	return true;
}


/* 전체선택
********************************************/
function chkAll() {
	var frm = document.bbs_form;
	const chkAllVal = document.querySelector("input[name=checkAll]").checked

	for (var i = 0; i < frm.elements.length; i++) {
		if (frm.elements[i].getAttribute("type") == "checkbox") {
			frm.elements[i].checked = chkAllVal;
		}
	}
}

/* 선택 삭제
********************************************/
function selected_delete() {
	var frm = document.bbs_form;
	var len = frm.elements.length;
	var cnt = 0;

	for (i = 0; i < len; i++) { //전체선택 체크박스와 삭제버튼은  제외
		if (frm.elements[i].checked == true) cnt++;
	}

	if (cnt) {

		if (confirm('선택한 게시물은 완전히삭제되며 복구할수 없습니다. \n\n처리 하시겠습니까? \n\n')) {
			document.bbs_form.submit();
		}

	} else {
		alert("삭제할 게시물을 선택하여 주십시오.");
		return;
	}
}
/********************************************/

/*선택 수정*/
function selected_modify() {
	var frm = document.bbs_form;
	var len = frm.elements.length;
	var cnt = 0;

	for (i = 0; i < len; i++) { //전체선택 체크박스와 삭제버튼은  제외
		if (frm.elements[i].checked == true) {
			cnt++;
		}
	}

	if (cnt > 1) {
		alert('선택된 게시물 1개만 수정할 수 있습니다.');
		return false;
	}

	if (cnt == 1) {

		if (confirm('선택한 게시물을 수정하시겠습니까?')) {
			document.bbs_form.Act.value = "selectEdit";
			document.bbs_form.submit();

		}

	} else {
		alert("수정할 게시물을 선택하여 주십시오.");
		return;
	}
}


function numchk1(num) {
	var sign = "";

	if (isNaN(num)) {
		alert("숫자만 입력할 수 있습니다");
		return 0;
	}
	if (num == 0) { return num; }

	if (num < 0) {
		num = num * (-1);
		sign = "-";
	} else num = num * 1;

	num = new String(num)
	var temp = "";
	var pos = 3;
	num_len = num.length;
	while (num_len > 0) {
		num_len = num_len - pos;
		if (num_len < 0) {
			pos = num_len + pos;
			num_len = 0;
		}
		temp = "," + num.substr(num_len, pos) + temp;
	}
	return sign + temp.substr(1);
}


function agree_send() {
	var frm = document.forms.join2_frm;

	if ($("input:radio[id='agree01']").is(":checked") == false) {
		alert("이용약관에 동의해야만 가입이 가능합니다.");
		$("input:radio[id='agree01']").focus();
		return false;
	}

	if ($("input:radio[id='agree03']").is(":checked") == false) {
		alert("개인정보취급방침에 동의해야만 가입이 가능합니다.");
		$("input:radio[id='agree03']").focus();
		return false;
	}

	return true;
}

function autoHypenPhone(obj) {
	var str = obj.value;

	str = str.replace(/[^0-9]/g, '');
	var tmp = '';
	if (str.length < 4) {
		tmp = str;
	} else if (str.length < 7) {
		tmp += str.substr(0, 3);
		tmp += '-';
		tmp += str.substr(3);
	} else if (str.length < 11) {
		tmp += str.substr(0, 3);
		tmp += '-';
		tmp += str.substr(3, 3);
		tmp += '-';
		tmp += str.substr(6);
	} else {
		tmp += str.substr(0, 3);
		tmp += '-';
		tmp += str.substr(3, 4);
		tmp += '-';
		tmp += str.substr(7);
	}
	obj.value = tmp;
}

function foldDaumPostcode() {
	// iframe을 넣은 element를 안보이게 한다.
	document.getElementById('wrap_zip').style.display = 'none';
}

function searchzip() {
	// 현재 scroll 위치를 저장해놓는다.
	var currentScroll = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
	new daum.Postcode({
		oncomplete: function (data) {
			// 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

			// 각 주소의 노출 규칙에 따라 주소를 조합한다.
			// 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
			var fullAddr = data.address; // 최종 주소 변수
			var extraAddr = ''; // 조합형 주소 변수

			// 기본 주소가 도로명 타입일때 조합한다.
			if (data.addressType === 'R') {
				//법정동명이 있을 경우 추가한다.
				if (data.bname !== '') {
					extraAddr += data.bname;
				}
				// 건물명이 있을 경우 추가한다.
				if (data.buildingName !== '') {
					extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
				}
				// 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
				fullAddr += (extraAddr !== '' ? ' (' + extraAddr + ')' : '');
			}

			// 우편번호와 주소 정보를 해당 필드에 넣는다.
			document.getElementById('zipcod').value = data.zonecode; //5자리 새우편번호 사용
			document.getElementById('addrxx').value = fullAddr;

			// iframe을 넣은 element를 안보이게 한다.
			// (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
			document.getElementById('wrap_zip').style.display = 'none';

			// 우편번호 찾기 화면이 보이기 이전으로 scroll 위치를 되돌린다.
			document.body.scrollTop = currentScroll;
		},
		// 우편번호 찾기 화면 크기가 조정되었을때 실행할 코드를 작성하는 부분. iframe을 넣은 element의 높이값을 조정한다.
		onresize: function (size) {
			document.getElementById('wrap_zip').style.height = size.height + 'px';
		},
		width: '100%',
		height: '100%'
	}).embed(document.getElementById('wrap_zip'));

	// iframe을 넣은 element를 보이게 한다.
	document.getElementById('wrap_zip').style.display = 'block';
}

var regTel = /^(01[016789]{1}|02|0[3-9]{1}[0-9]{1})-?[0-9]{3,4}-?[0-9]{4}$/;
function check_mobile(obj) {
	if (!regTel.test(obj)) {
		return false
	}
	return true;
}
var check_pw = /^(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])(?=.*[0-9]).{8,16}$/;
var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;

function memberSendit() {
	var frm = document.forms.mem_frm;

	if (frm.m_id.value == "") {
		alert("ID를 입력해 주십시오.");
		frm.m_id.focus();
		return false;
	}
	if (frm.id_check.value == "") {
		alert("아이디 중복확인을 해 주십시오.");
		frm.m_id.focus();
		return false;
	}
	if (frm.m_pw.value == "") {
		alert("비밀번호를 입력해 주십시오.");
		frm.m_pw.focus();
		return false;
	}
	if (frm.m_pw.value.length < 8 || frm.m_pw.value.length > 20) {
		alert("비밀번호는 8자이상 20자 이하로 설정해 주세요.");
		frm.m_pw.focus();
		return false;
	}
	if (!check_pw.test(frm.m_pw.value)) {
		alert("비밀번호는 영문,숫자,특수문자의 조합으로 입력해주세요.");
		frm.m_pw.focus();
		return false;
	}
	if (frm.m_pwd.value == "") {
		alert("비밀번호확인란을 입력해 주십시오.");
		frm.m_pwd.focus();
		return false;
	}
	if (frm.m_pw.value != frm.m_pwd.value) {
		alert("비밀번호 확인 입력이 올바르지 않습니다.");
		frm.m_pwd.focus();
		return false;
	}
	if (frm.name.value == "") {
		alert("이름을 입력해 주십시오.");
		frm.name.focus();
		return false;
	}
	if (frm.mobile.value == "") {
		alert("휴대폰번호를 입력해 주십시오.");
		frm.mobile.focus();
		return false;
	}
	if (check_mobile(frm.mobile.value) == false) {
		alert("잘못된 전화번호형식입니다. 숫자, - 를 포함한 숫자만 입력하세요. 예) 0XX-XXXX-XXXX");
		frm.mobile.focus();
		return false;
	}
	if (frm.zipcod.value == "") {
		alert("우편번호를 입력해 주십시오.");
		searchzip();
		return false;
	}
	if (frm.addrxx.value == "") {
		alert("주소를 입력해 주십시오.");
		searchzip();
		return false;
	}
	if (frm.addres.value == "") {
		alert("상세주소를 입력해 주십시오.");
		frm.addres.focus();
		return false;
	}
	return true;
}

function mem_edt_Sendit() {
	var frm = document.forms.mem_frm;


	if (frm.m_pw.value != "") {
		if (frm.m_pw.value.length < 8 || frm.m_pw.value.length > 20) {
			alert("비밀번호는 8자이상 20자 이하로 설정해 주세요.");
			frm.m_pw.focus();
			return false;
		}
		if (!check_pw.test(frm.m_pw.value)) {
			alert("비밀번호는 영문,숫자,특수문자의 조합으로 입력해주세요.");
			frm.m_pw.focus();
			return false;
		}
		if (frm.m_pwd.value == "") {
			alert("비밀번호확인란을 입력해 주십시오.");
			frm.m_pwd.focus();
			return false;
		}
		if (frm.m_pw.value != frm.m_pwd.value) {
			alert("비밀번호 확인 입력이 올바르지 않습니다.");
			frm.m_pwd.focus();
			return false;
		}
	}
	if (frm.name.value == "") {
		alert("이름을 입력해 주십시오.");
		frm.name.focus();
		return false;
	}
	if (frm.mobile.value == "") {
		alert("휴대폰번호를 입력해 주십시오.");
		frm.mobile.focus();
		return false;
	}
	if (check_mobile(frm.mobile.value) == false) {
		alert("잘못된 전화번호형식입니다. 숫자, - 를 포함한 숫자만 입력하세요. 예) 0XX-XXXX-XXXX");
		frm.mobile.focus();
		return false;
	}
	if (frm.zipcod.value == "") {
		alert("우편번호를 입력해 주십시오.");
		searchzip();
		return false;
	}
	if (frm.addrxx.value == "") {
		alert("주소를 입력해 주십시오.");
		searchzip();
		return false;
	}
	if (frm.addres.value == "") {
		alert("상세주소를 입력해 주십시오.");
		frm.addres.focus();
		return false;
	}
	return true;
}

function uncomma(str) {
	str = String(str);
	return Number(str.replace(/,/g, ""));
}

//나이 선택시 
function select_per_birth(yearx) {
	var b_year = uncomma($("#per_birth").val());
	var agex = 0;
	yearx = uncomma(yearx);

	if (b_year > 0) {
		agex = yearx - b_year + 1;
	} else {
		agex = 0;
	}

	if (agex < 14) {
		alert("14세 미만의 어린이및 청소년은 가입에 제한이 있습니다.");
		$("#age_check").val("2");
		return false;
	} else {
		$("#age_check").val("1");
	}


}

function id_search_submit() {
	var r_data = "";
	var serch_name = $("#serch_name").val();
	var per_email = $("#per_email").val();

	if (serch_name == "") {
		alert("이름을 입력하세요!");
		$("#serch_name").focus();
		return false;
	} else if (per_email == "") {
		alert("이메일을 입력하세요!");
		$("#per_email").focus();
		return false;
	} else {
		r_data = (GetHttpRequest("./search_id_ok.php", "serch_name=" + encodeURIComponent(serch_name) + "&per_email=" + encodeURIComponent(per_email))).trim();
		if (r_data == "E") {
			alert("일치하는 정보가 없습니다.");
			return false;
		} else {
			url = "./id_chk_page.php?m_id=" + r_data;
			//window.open(url,"search_id","width=500,height=270");
			location.href = url;
			return false;
		}
	}

}


function pw_search_submit() {
	var frm = document.forms.pw_form;

	if (frm.serch_p_id.value == "") {
		alert("아이디를 입력하세요!");
		frm.serch_p_id.focus();
		return false;
	}
	if (frm.serch_p_name.value == "") {
		alert("이름을 입력하세요!");
		frm.serch_p_name.focus();
		return false;
	}
	if (frm.serch_p_mail.value == "") {
		alert("이메일을 입력하세요!");
		frm.serch_p_mail.focus();
		return false;
	}
	//return true;
	frm.submit();
}

function sub_userLogin() {
	var frm = document.forms.login_frm;

	if (frm.l_id.value == "") {
		alert("아이디를 입력해 주십시오.");
		frm.l_id.focus();
		return false;
	}

	if (frm.l_pw.value == "") {
		alert("비밀번호를 입력해 주십시오.");
		frm.l_pw.focus();
		return false;
	}

	return true;
}


function my_userLogin() {
	var frm = document.forms.login_frm;

	if (frm.per_pw.value == "") {
		alert("비밀번호를 입력해 주십시오.");
		frm.per_pw.focus();
		return false;
	}

	return true;
}

function fn_blank(obj) {
	var val = obj.value;
	if (val.indexOf("-") > 0) val = val.replace(/-/gi, "");
	obj.value = val;
}

function fn_date(obj) {
	var val = obj.value;
	if (val.length != 8) {
		alert("날짜가 형식에 맞지 않습니다.");
		obj.focus();
		return;
	} else {
		val = val.substring(0, 4) + "-" + val.substring(4, 6) + "-" + val.substring(6, 8);
		obj.value = val;
	}
}

function OnCheckPhone(oTa) {
	var oForm = oTa.form;
	var sMsg = oTa.value;
	var onlynum = "";
	var imsi = 0;
	onlynum = RemoveDash2(sMsg);  //하이픈 입력시 자동으로 삭제함 
	onlynum = checkDigit(onlynum);  // 숫자만 입력받게 함 
	var retValue = "";

	if (event.keyCode != 12) {
		if (onlynum.substring(0, 2) == 02) {  // 서울전화번호일 경우  10자리까지만 나타나교 그 이상의 자리수는 자동삭제 
			if (GetMsgLen(onlynum) <= 1) oTa.value = onlynum;
			if (GetMsgLen(onlynum) == 2) oTa.value = onlynum + "-";
			if (GetMsgLen(onlynum) == 4) oTa.value = onlynum.substring(0, 2) + "-" + onlynum.substring(2, 3);
			if (GetMsgLen(onlynum) == 4) oTa.value = onlynum.substring(0, 2) + "-" + onlynum.substring(2, 4);
			if (GetMsgLen(onlynum) == 5) oTa.value = onlynum.substring(0, 2) + "-" + onlynum.substring(2, 5);
			if (GetMsgLen(onlynum) == 6) oTa.value = onlynum.substring(0, 2) + "-" + onlynum.substring(2, 6);
			if (GetMsgLen(onlynum) == 7) oTa.value = onlynum.substring(0, 2) + "-" + onlynum.substring(2, 5) + "-" + onlynum.substring(5, 7);
			if (GetMsgLen(onlynum) == 8) oTa.value = onlynum.substring(0, 2) + "-" + onlynum.substring(2, 6) + "-" + onlynum.substring(6, 8);
			if (GetMsgLen(onlynum) == 9) oTa.value = onlynum.substring(0, 2) + "-" + onlynum.substring(2, 5) + "-" + onlynum.substring(5, 9);
			if (GetMsgLen(onlynum) == 10) oTa.value = onlynum.substring(0, 2) + "-" + onlynum.substring(2, 6) + "-" + onlynum.substring(6, 10);
			if (GetMsgLen(onlynum) == 11) oTa.value = onlynum.substring(0, 2) + "-" + onlynum.substring(2, 6) + "-" + onlynum.substring(6, 10);
			if (GetMsgLen(onlynum) == 12) oTa.value = onlynum.substring(0, 2) + "-" + onlynum.substring(2, 6) + "-" + onlynum.substring(6, 10);
		}
		if (onlynum.substring(0, 2) == 05) {  // 05로 시작되는 번호 체크 
			if (onlynum.substring(2, 3) == 0) {  // 050으로 시작되는지 따지기 위한 조건문 
				if (GetMsgLen(onlynum) <= 3) oTa.value = onlynum;
				if (GetMsgLen(onlynum) == 4) oTa.value = onlynum + "-";
				if (GetMsgLen(onlynum) == 5) oTa.value = onlynum.substring(0, 4) + "-" + onlynum.substring(4, 5);
				if (GetMsgLen(onlynum) == 6) oTa.value = onlynum.substring(0, 4) + "-" + onlynum.substring(4, 6);
				if (GetMsgLen(onlynum) == 7) oTa.value = onlynum.substring(0, 4) + "-" + onlynum.substring(4, 7);
				if (GetMsgLen(onlynum) == 8) oTa.value = onlynum.substring(0, 4) + "-" + onlynum.substring(4, 8);
				if (GetMsgLen(onlynum) == 9) oTa.value = onlynum.substring(0, 4) + "-" + onlynum.substring(4, 7) + "-" + onlynum.substring(7, 9);
				if (GetMsgLen(onlynum) == 10) oTa.value = onlynum.substring(0, 4) + "-" + onlynum.substring(4, 8) + "-" + onlynum.substring(8, 10);
				if (GetMsgLen(onlynum) == 11) oTa.value = onlynum.substring(0, 4) + "-" + onlynum.substring(4, 7) + "-" + onlynum.substring(7, 11);
				if (GetMsgLen(onlynum) == 12) oTa.value = onlynum.substring(0, 4) + "-" + onlynum.substring(4, 8) + "-" + onlynum.substring(8, 12);
				if (GetMsgLen(onlynum) == 13) oTa.value = onlynum.substring(0, 4) + "-" + onlynum.substring(4, 8) + "-" + onlynum.substring(8, 12);
			} else {
				if (GetMsgLen(onlynum) <= 2) oTa.value = onlynum;
				if (GetMsgLen(onlynum) == 3) oTa.value = onlynum + "-";
				if (GetMsgLen(onlynum) == 4) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 4);
				if (GetMsgLen(onlynum) == 5) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 5);
				if (GetMsgLen(onlynum) == 6) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 6);
				if (GetMsgLen(onlynum) == 7) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 7);
				if (GetMsgLen(onlynum) == 8) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 6) + "-" + onlynum.substring(6, 8);
				if (GetMsgLen(onlynum) == 9) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 7) + "-" + onlynum.substring(7, 9);
				if (GetMsgLen(onlynum) == 10) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 6) + "-" + onlynum.substring(6, 10);
				if (GetMsgLen(onlynum) == 11) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 7) + "-" + onlynum.substring(7, 11);
				if (GetMsgLen(onlynum) == 12) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 7) + "-" + onlynum.substring(7, 11);
			}
		}

		if (onlynum.substring(0, 2) == 03 || onlynum.substring(0, 2) == 04 || onlynum.substring(0, 2) == 06 || onlynum.substring(0, 2) == 07 || onlynum.substring(0, 2) == 08) {  // 서울전화번호가 아닌 번호일 경우(070,080포함 // 050번호가 문제군요) 
			if (GetMsgLen(onlynum) <= 2) oTa.value = onlynum;
			if (GetMsgLen(onlynum) == 3) oTa.value = onlynum + "-";
			if (GetMsgLen(onlynum) == 4) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 4);
			if (GetMsgLen(onlynum) == 5) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 5);
			if (GetMsgLen(onlynum) == 6) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 6);
			if (GetMsgLen(onlynum) == 7) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 7);
			if (GetMsgLen(onlynum) == 8) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 6) + "-" + onlynum.substring(6, 8);
			if (GetMsgLen(onlynum) == 9) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 7) + "-" + onlynum.substring(7, 9);
			if (GetMsgLen(onlynum) == 10) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 6) + "-" + onlynum.substring(6, 10);
			if (GetMsgLen(onlynum) == 11) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 7) + "-" + onlynum.substring(7, 11);
			if (GetMsgLen(onlynum) == 12) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 7) + "-" + onlynum.substring(7, 11);
		}
		if (onlynum.substring(0, 2) == 01) {  //휴대폰일 경우 
			if (GetMsgLen(onlynum) <= 2) oTa.value = onlynum;
			if (GetMsgLen(onlynum) == 3) oTa.value = onlynum + "-";
			if (GetMsgLen(onlynum) == 4) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 4);
			if (GetMsgLen(onlynum) == 5) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 5);
			if (GetMsgLen(onlynum) == 6) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 6);
			if (GetMsgLen(onlynum) == 7) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 7);
			if (GetMsgLen(onlynum) == 8) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 7) + "-" + onlynum.substring(7, 8);
			if (GetMsgLen(onlynum) == 9) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 7) + "-" + onlynum.substring(7, 9);
			if (GetMsgLen(onlynum) == 10) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 6) + "-" + onlynum.substring(6, 10);
			if (GetMsgLen(onlynum) == 11) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 7) + "-" + onlynum.substring(7, 11);
			if (GetMsgLen(onlynum) == 12) oTa.value = onlynum.substring(0, 3) + "-" + onlynum.substring(3, 7) + "-" + onlynum.substring(7, 11);
		}

		if (onlynum.substring(0, 1) == 1) {  // 1588, 1688등의 번호일 경우 
			if (GetMsgLen(onlynum) <= 3) oTa.value = onlynum;
			if (GetMsgLen(onlynum) == 4) oTa.value = onlynum + "-";
			if (GetMsgLen(onlynum) == 5) oTa.value = onlynum.substring(0, 4) + "-" + onlynum.substring(4, 5);
			if (GetMsgLen(onlynum) == 6) oTa.value = onlynum.substring(0, 4) + "-" + onlynum.substring(4, 6);
			if (GetMsgLen(onlynum) == 7) oTa.value = onlynum.substring(0, 4) + "-" + onlynum.substring(4, 7);
			if (GetMsgLen(onlynum) == 8) oTa.value = onlynum.substring(0, 4) + "-" + onlynum.substring(4, 8);
			if (GetMsgLen(onlynum) == 9) oTa.value = onlynum.substring(0, 4) + "-" + onlynum.substring(4, 8);
			if (GetMsgLen(onlynum) == 10) oTa.value = onlynum.substring(0, 4) + "-" + onlynum.substring(4, 8);
			if (GetMsgLen(onlynum) == 11) oTa.value = onlynum.substring(0, 4) + "-" + onlynum.substring(4, 8);
			if (GetMsgLen(onlynum) == 12) oTa.value = onlynum.substring(0, 4) + "-" + onlynum.substring(4, 8);
		}
	}
}

function RemoveDash2(sNo) {
	var reNo = "";
	for (var i = 0; i < sNo.length; i++) {
		if (sNo.charAt(i) != "-") {
			reNo += sNo.charAt(i);
		}
	}
	return reNo;
}

function GetMsgLen(sMsg) { // 0-127 1byte, 128~ 2byte 
	var count = 0;
	for (var i = 0; i < sMsg.length; i++) {
		if (sMsg.charCodeAt(i) > 127) {
			count += 2;
		}
		else {
			count++;
		}
	}
	return count;
}

function checkDigit(num) {
	var Digit = "1234567890";
	var string = num;
	var len = string.length;
	var retVal = "";

	for (i = 0; i < len; i++) {
		if (Digit.indexOf(string.substring(i, i + 1)) >= 0) {
			retVal = retVal + string.substring(i, i + 1);
		}
	}
	return retVal;
}



function writeSendit_e6() {
	var frm = document.write_form1;
	checkEditorType();

	if(editorFlag == 'se2') {
		if (oEditors.getById["content"]) {
			oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
		}
	} else if(editorFlag == 'ckeditor') {
		let editor = window.editor;
	}

	if (frm.title.value == "") {
		alert("제목을 입력해 주십시오.");
		frm.title.focus();
		return false;
	}

	if (frm.vebnam.value == "") {
		alert("회사명을 입력해 주십시오.");
		frm.vebnam.focus();
		return false;
	}

	if (frm.name.value == "") {
		alert("성명을 입력해 주십시오.");
		frm.name.focus();
		return false;
	}

	if (frm.telnum.value == "") {
		alert("연락처를 입력해 주십시오.");
		frm.telnum.focus();
		return false;
	}

	if (frm.pumnam.value == "") {
		alert("문의분류를 선택해주세요.");
		frm.pumnam[0].focus();
		return false;
	}

	if(editorFlag == 'se2') {
		if (frm.content.value == false) {
			alert("내용을 입력해 주십시오.");
			frm.content.focus();
			return false;
		}
	} else if(editorFlag == 'ckeditor') {
		if (editor.getData() == '') {
			alert("내용을 입력해 주십시오.");
			return false;
		}
		
		frm.content.value = editor.getData();
	}
	
	if (frm.pwd.value == "") {
		alert("비밀번호를 입력해 주십시오.");
		form.pwd.focus();
		return false;
	}

	if (document.getElementById("personal_agree").checked == false) {
		alert("개인정보 취급방침에 동의해주세요.");
		document.getElementById("personal_agree").focus();
		return false;
	}

	checkSubmitForm(frm , "kor")

}

function writeSendit_idea() {
	var frm = document.write_form1;

	if (frm.title.value == "") {
		alert("아이디어명을 입력해 주십시오.");
		frm.title.focus();
		return false;
	}

	if (frm.area.value == "") {
		alert("지역을 선택해주세요.");
		frm.area.focus();
		return false;
	}

	if (frm.name.value == "") {
		alert("성명을 입력해 주십시오.");
		frm.name.focus();
		return false;
	}

	if (frm.pwd.value == "") {
		alert("비밀번호를 입력해 주십시오.");
		form.pwd.focus();
		return false;
	}

	if (frm.email.value == "") {
		alert("이메일을 입력해 주십시오.");
		frm.email.focus();
		return false;
	}

	if (frm.telnum.value == "") {
		alert("연락처를 입력해 주십시오.");
		frm.telnum.focus();
		return false;
	}

	if (frm.etc_content2.value == "") {
		alert("주요내용을 입력해 주십시오.");
		frm.etc_content2.focus();
		return false;
	}
	

	if (document.getElementById("personal_agree").checked == false) {
		alert("개인정보 취급방침에 동의해주세요.");
		document.getElementById("personal_agree").focus();
		return false;
	}

	if (confirm('등록하시겠습니까?')) {
		alert('아이디어제안이 접수되었습니다.');
		frm.submit();
	}
}

function writeSendit_e6_eng() {
	var form = document.write_form1;

	checkEditorType();

	if(editorFlag == 'se2') {
		if (oEditors.getById["content"]) {
			oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
		}
	} else if(editorFlag == 'ckeditor') {
		let editor = window.editor;
	}

	if (form.title.value == "") {
		alert("Please enter a Title.");
		form.title.focus();
		return false;
	}

	if (form.vebnam.value == "") {
		alert("Please enter the company name.");
		form.vebnam.focus();
		return false;
	}

	if (form.name.value == "") {
		alert("Please enter your name.");
		form.name.focus();
		return false;
	}

	if (form.telnum.value == "") {
		alert("Please enter your contact information.");
		form.telnum.focus();
		return false;
	}

	if (form.pumnam.value == "") {
		alert("Please select an inquiry classification.");
		form.pumnam[0].focus();
		return false;
	}

	if(editorFlag == 'se2') {
		if (form.content.value == false) {
			alert("Please enter the content.");
			form.content.focus();
			return false;
		}
	} else if(editorFlag == 'ckeditor') {
		if (editor.getData() == '') {
			alert("Please enter the content.");
			return false;
		}
		
		form.content.value = editor.getData();
	}

	if (form.pwd.value == "") {
		alert("Please enter your password.");
		form.pwd.focus();
		return false;
	}

	if (document.getElementById("personal_agree").checked == false) {
		alert("Please agree to the privacy policy.");
		document.getElementById("personal_agree").focus();
		return false;
	}

	checkSubmitForm(form , "eng")
}

function writeSendit_e6_chn() {
	var form = document.write_form1;

	checkEditorType();

	if (form.title.value == "") {
		alert("请输入标题。");
		form.title.focus();
		return false;
	}

	if (form.vebnam.value == "") {
		alert("请输入公司名。");
		form.vebnam.focus();
		return false;
	}

	if (form.name.value == "") {
		alert("请输入姓名。");
		form.name.focus();
		return false;
	}

	if (form.telnum.value == "") {
		alert("请输入联系方式。");
		form.telnum.focus();
		return false;
	}

	if (form.pumnam.value == "") {
		alert("请选择咨询分类。");
		form.pumnam[0].focus();
		return false;
	}

	if(editorFlag == 'se2') {
		if (form.content.value == false) {
			alert("请输入内容。");
			form.content.focus();
			return false;
		}
	} else if(editorFlag == 'ckeditor') {
		if (editor.getData() == '') {
			alert("请输入内容。");
			return false;
		}
		
		form.content.value = editor.getData();
	}

	if (form.pwd.value == "") {
		alert("请输入密码。");
		form.pwd.focus();
		return false;
	}

	if (document.getElementById("personal_agree").checked == false) {
		alert("请同意个人信息处理方针。");
		document.getElementById("personal_agree").focus();
		return false;
	}

	checkSubmitForm(form , "chn")

}

//썸네일 이미지 클릭시 원본 이미지 호출
function big_img2(img) {
	/*var imgInfo = new Image();
	imgInfo.src = obj.src;*/
	var imgInfo = new Image();
	imgInfo.src = img;

	//새창의 크기
	if (imgInfo.width <= 800) { cw = imgInfo.width; } else { cw = 800; }
	if (imgInfo.height <= 600) { ch = imgInfo.height; } else { ch = 600; }

	//스크린의 크기
	sw = screen.availWidth;
	sh = screen.availHeight;
	//열 창의 포지션
	px = (sw - cw) / 2;
	py = (sh - ch) / 2;

	result = window.open(img, "big_img", "width=" + cw + " , height=" + ch + ",left=" + px + ",top=" + py);

}

// 이메일이 잘못되었는지 확인하는 함수 
function chkEmail(str) {
	var reg_email = /^([0-9a-zA-Z_\.-]+)@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}$/;
	var rv = false;

	if (!reg_email.test(str)) {
		rv = false;
	} else {
		rv = true;
	}

	return rv;
}

//임의테이블 파일삭제
function delFile(tb, obj, idx, url) {
	if (obj == "") {
		alert('삭제할 파일이 없습니다.');
		return false;
	}

	if (confirm('정말로 삭제하시겠습니까?')) {
		$.ajax({
			url: "/board/ajax/delFile.php",
			type: "post",
			data: { "tb": tb, "obj": obj, "idx": idx },
			success: function (data, textStatus, jqXHR) {
				location.href = url;
			},
			error: function (e) {
				alert(e.responseText);
			}
		});
	}

}

//임의테이블 파일삭제
function delFileCustom(tb, code, idx, url) {
	if (code == "" || idx == "") {
		alert('삭제할 파일이 없습니다.');
		return false;
	}

	if (confirm('정말로 삭제하시겠습니까?')) {
		$.ajax({
			url: "/board/ajax/delFileCustom.php",
			type: "post",
			data: { "tb": tb, "code": code, "idx": idx },
			success: function (data, textStatus, jqXHR) {
				location.href = url;
			},
			error: function (e) {
				alert(e.responseText);
			}
		});
	}

}

//카운트
function countNumber(type, obj) {
	if (type == "plus") {

	} else if (type == "minus") {

	} else {
		alert('잘못된 요청입니다.');
		return false;
	}
}

//중복submit방지
var doubleSubmitFlag = false;
function doubleSubmitCheck() {
	if (doubleSubmitFlag) {
		console.log('제출 중입니다.');
		//alert('전송 중입니다.');
		return doubleSubmitFlag;
	} else {
		doubleSubmitFlag = true;
		console.log('submit.');
		return false;
	}
}

//중복submit방지
var doubleSubmitFlag2 = false;
function doubleSubmitCheck2() {
	if (doubleSubmitFlag2) {
		//console.log('제출 중입니다.');
		alert('전송 중입니다.');
		return doubleSubmitFlag2;
	} else {
		doubleSubmitFlag2 = true;
		//console.log('submit.');
		return false;
	}
}

//달력생성
function getCal(y, m, _data) {
	var ymd = document.getElementById("ymd").value;

	$.ajax({
		type: "POST",
		url: "/board/ajax/makeCal_ajax.php",
		data: { "year": y, "month": m, "ymd": ymd, "_data": _data },
		success: function (data, textStatus, jqXHR) {
			//alert('t');
			$("#cal_box").html(data);
		},
		/*beforeSend: function(){
			$(".loading_box").addClass("on");
		},
		complete: function(){
			$(".loading_box").removeClass("on");
		},*/
		error: function (e) {
			alert(e.responseText);
		}
	});
}

//달력이동
function moveMonth(type, _data) {
	var year = $("#year").val();
	var month = $("#month").val();

	if (type == "prev") {
		month--;
		if (month <= 0) {
			year--;
			month = 12;
		}
	}

	if (type == "next") {
		month++;
		if (month > 12) {
			year++;
			month = 1;
		}
	}

	if (month < 10) {
		month = "0" + month;
	}


	$("#year").val(year);
	$("#month").val(month);

	getCal(year, month, _data);
	$("#yearArea").html(year);
	$("#monthArea").html(month);

	ymd = year + "-" + month + "-01";

}

//요일선택
function chkYoil(v, obj, _data) {
	//$(".calDay").find("a").removeClass("ic_ready");
	//$(obj).closest("div").addClass("on_day");
	//$(obj).addClass("ic_ready");
	$("#ymd").val(v);

	var _data_ymd = v.replace(/-/gi, "");

	//초기화
	/*$("#notice_txt").html("");
	$("#reserv_day").val("");
	$("#_reserv_day").val("");
	$("#reserv_time").val("");
	$("#_reserv_time").val("");

	if(_data!=''){
		//console.log(_data);
		var data = _data.split("|");
		//console.log(data[0]+","+data[1]+","+data[2]+","+data[3]+","+_data_ymd);
		getReservationTimes(data[0],data[1],data[2],data[3],_data_ymd);
		//$("#notice_txt").html(_data_ymd);
		var _ymd = v.substr(2,10);
		$("#notice_txt").html(_ymd);
		$("#_reserv_day").val(_ymd);
		$("#reserv_day").val(_data_ymd);
	}*/

}

//체크박스 체크(required)
function chkAgree(f) {
	if (document.getElementById("personal_agree").checked == false) {
		alert("약관에 동의해주세요.");
		document.getElementById("personal_agree").focus();
		return false;
	}

	alert('접수되었습니다.');
}

function list_copy_submit() {

	const frm = document.bbs_form;
	const len = frm.elements.length;
	let chk_count = 0;
	let chked = [];

	for (i = 0; i < len; i++) { //전체선택 체크박스와 삭제버튼은  제외
		if (frm.elements[i].name != "checkAll" && frm.elements[i].checked == true) {
			chked[chk_count] = frm.elements[i].name
			chk_count++;
		}
	}

	if (!chk_count) {
		alert("복사할 게시물을 하나 이상 선택하세요.");
		return false;
	}

	chked = chked.join(",")
	frm.chked.value = chked

	if (chk_count) {
		select_copy();
		return;
	} else {
		alert("복사할 게시물을 하나 이상 선택하세요.");
		return false;
	}
}

// 선택한 게시물 복사
function select_copy() {
	const f = document.bbs_form;
	const sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

	f.sw.value = "copy";
	f.target = "move";
	f.action = "/board/move.php";
	f.submit();
}

function board_move(href) {
	window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}

//유니크아이디 만들기
function makeUniqCode(typeName, elem) {
	if (typeof typeName == 'undefined') typeName = '';
	if (typeof elem == 'undefined') return false;

	let uniqCode = uniqid(typeName, true);
	let obj = document.querySelector(elem);
	obj.value = uniqCode;
}

//유니크 코드 생성
function uniqid(prefix = "", random = false) {
	let sec = Date.now() * 1000 + Math.random() * 1000;
	let id = sec.toString(16).replace(/\./g, "").padEnd(14, "0");
	let rv = `${prefix}${id}${random ? `${Math.trunc(Math.random() * 100000000)}` : ""}`;
	rv = rv.substring(0, 13);
	return rv;
}