<?
$m1 = 0;
$m2 = 0;
$m3 = 0;
include("../inc/top.php" );

$ymd = date("Y-m-d");


?>

<div class="main">

	<div class="main_top">
		<h3><?php echo SITE_TITLE ?> <br/> 관리시스템에 오신걸 환영합니다.</h3>
	</div>
		
	
	<div class="mwrap ofh">
		<div class="halfcon mr">

			
			<div class="notice" id="tabsholder">
				<?php if ($OT_LEVELX == 1) { ?>
				<ul class="tabs">
					<li id="tab1">회원목록</li>
					<li id="tab2">공지사항</li>
					<li id="tab3">온라인문의</li>
				</ul> 
				<div id="content1" class="tabscontent">
					<a class="btn_clink" href="../sub01/sub01_02.php">more</a>
					<ul class="dot_li">
					<?
					//공지사항
					$sql = "SELECT * FROM tb_member WHERE (1) ORDER BY idx DESC LIMIT 5";
					//echo $sql;
					$result = myquery_error($sql);
					while($row=sql_fetch_array($result)){
						$writeday_y=substr($row['registerDay'],0,4);
						$writeday_m=substr($row['registerDay'],5,2);
						$writeday_d=substr($row['registerDay'],8,2);
						$writeday=mktime(0,0,0,$writeday_m,$writeday_d,$writeday_y);
						$registerDay="".$writeday_y."-".$writeday_m."-".$writeday_d."";
						$bbsData=MyEncrypt("no=".$row['idx']."");
					?>
						 <li><a href="../sub01/sub01_02.php?idx=$idx"><?=$row['id']?>(<?=$row['name']?>)</a>&nbsp;<span><?=$registerDay?></span></li>
					<?
					}
					?>
					</ul>			
				</div>
				<div id="content2" class="tabscontent">
					<a class="btn_clink" href="">more</a>
					<ul class="dot_li">
					
					</ul>			
				</div>
				<div id="content3" class="tabscontent">
					<a class="btn_clink" href="">more</a>
					<ul class="dot_li">
					
					</ul>
				</div>
				<?php } ?>
			</div>	
		</div>

	
	</div>
</div><!--//main-->





<script type="text/javascript">
	$(document).ready(function(){
			$("#tabsholder").tytabs({
									tabinit:"1",
									fadespeed:"fast"
							});
			$("#tabsholder2").tytabs({
						prefixtabs:"tabz",
						prefixcontent:"contentz",
						classcontent:"tabscontent",
						tabinit:"1",
						catchget:"tab2",
						fadespeed:"fast"
						});
				});
</script>



<? include ("../inc/footer.php")?>