<?

	$mTitle[0][0][0] = "gnb메뉴"; $mLink[0][0][0] = $noSSlDomain."";
			$mTitle[0][1][0] = ""; $mLink[0][1][0] = $noSSlDomain."/";
			$mTitle[0][2][0] = ""; $mLink[0][2][0] = $noSSlDomain."";
			$mTitle[0][3][0] = ""; $mLink[0][3][0] = $noSSlDomain."";
			$mTitle[0][4][0] = ""; $mLink[0][4][0] = $noSSlDomain."";
		
		

	$mTitle[1][0][0] = "운영관리"; $mLink[1][0][0] = $noSSlDomain."../sub01/sub01_01.php"; 		
		$mTitle[1][1][0] = "회원관리"; $mLink[1][1][0] = $noSSlDomain."../sub01/sub01_01.php"; 
			$mTitle[1][1][1] = "회원현황"; $mLink[1][1][1] = $noSSlDomain."../sub01/sub01_01.php"; 
			$mTitle[1][1][2] = "회원정보"; $mLink[1][1][2] = $noSSlDomain."../sub01/sub01_02.php"; 
			$mTitle[1][1][3] = "회원등급관리"; $mLink[1][1][3] = $noSSlDomain."../sub01/sub01_03.php"; 
		$mTitle[1][2][0] = "운영관리"; $mLink[1][2][0] = $noSSlDomain."../sub01/sub02_01.php"; 
			$mTitle[1][2][1] = "기본정보관리"; $mLink[1][2][1] = $noSSlDomain."../sub01/sub02_01.php";
			$mTitle[1][2][2] = "메인화면 팝업관리"; $mLink[1][2][2] = $noSSlDomain."../sub01/sub02_02.php";
			$mTitle[1][2][3] = "메인화면 배너관리"; $mLink[1][2][3] = $noSSlDomain."../sub01/sub02_03.php";
		
		
	
	$mTitle[2][0][0] = "게시판관리"; $mLink[2][0][0] = $noSSlDomain."../sub02/sub01_01.php"; 
		$mTitle[2][1][0] = "게시판관리"; $mLink[2][1][0] = $noSSlDomain."../sub02/sub01_01.php";
		$mTitle[2][2][0] = "팝업관리"; $mLink[2][2][0] = $noSSlDomain."../sub02/sub02_01.php"; 
		
		$l_i = 3;
		$menu_array = array();
		$min_result=MyResult("select * from tb_bbs_list where code<>'popup' order by folder_path,page_fn,code ", $connect);
		while($menu_row=sql_fetch_array($min_result)) { 
			$mTitle[2][$l_i][0] = $menu_row['bbs_title']; $mLink[2][$l_i][0] = $noSSlDomain."../sub02/sub03_01.php?code=".$menu_row['code']."&m2=".$l_i; 
			array_push($menu_array,$l_i);
			$l_i++;
		}
	
	/*$mTitle[3][0][0] = "프로그램관리"; $mLink[3][0][0] = $noSSlDomain."../sub03/sub10_01.php"; 
		/*$mTitle[3][1][0] = "상품관리"; $mLink[3][1][0] = $noSSlDomain."../sub03/sub01_02.php"; 
			$mTitle[3][1][1] = "상품분류관리"; $mLink[3][1][1] = $noSSlDomain."../sub03/sub01_01.php"; 
			$mTitle[3][1][2] = "상품관리"; $mLink[3][1][2] = $noSSlDomain."../sub03/sub01_02.php";
		$mTitle[3][2][0] = "메인화면 팝업존"; $mLink[3][2][0] = $noSSlDomain."../sub03/sub02_01.php"; 
			$mTitle[3][2][1] = "메인화면 팝업존"; $mLink[3][2][1] = $noSSlDomain."../sub03/sub02_01.php"; 
			$mTitle[3][2][2] = "메인화면 팝업 등록"; $mLink[3][2][2] = $noSSlDomain."../sub03/sub02_01_write.php"; 
		$mTitle[3][3][0] = "소식지 관리"; $mLink[3][3][0] = $noSSlDomain."../sub03/sub03_01.php"; 
		$mTitle[3][4][0] = "감염병 관리지침 관리"; $mLink[3][4][0] = $noSSlDomain."../sub03/sub04_01.php";
			$mTitle[3][4][1] = "감염병 관리지침 관리"; $mLink[3][4][1] = $noSSlDomain."../sub03/sub04_01.php";
			$mTitle[3][4][2] = "감염병 관리지침 등록"; $mLink[3][4][2] = $noSSlDomain."../sub03/sub04_01_write.php";*/
		/*$mTitle[3][10][0] = "비급여관리"; $mLink[3][10][0] = $noSSlDomain."../sub03/sub10_01.php";*/
			

	$mTitle[6][0][0] = "통계관리"; $mLink[6][0][0] = $noSSlDomain."../sub06/sub01_01.php"; 
		$mTitle[6][1][0] = "방문자통계"; $mLink[6][1][0] = $noSSlDomain."../sub06/sub01_01.php";

	$mTitle[7][0][0] = "로그이력"; $mLink[7][0][0] = $noSSlDomain."../sub07/sub01_01.php"; 
		$mTitle[7][1][0] = "로그이력"; $mLink[7][1][0] = $noSSlDomain."../sub07/sub01_01.php";
	

	
		



	
	


?>