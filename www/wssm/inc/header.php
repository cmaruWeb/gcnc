<? include("../inc/menu_link.php"); ?>

<div id="header">
	<div class="headerwrap">
		<div id="headerin">
			<h1><a href="../" class="logo"><img src="/img/logo_w.png" alt="로고" /></a></h1>
			<nav class="gnb">
				<ul>
					<?php if ($OT_ID != "notice_master") { ?>
					<li class="menu">
						<a href="<?= $mLink[1][0][0] ?>" class="m"><?= $mTitle[1][0][0] ?></a>
						<div class="sub sub1">
							<div class="subList clearfix">
								<ul>
									<li><a href="<?= $mLink[1][1][0] ?>"><?= $mTitle[1][1][0] ?></a></li>
									<!-- <li><a href="<?= $mLink[1][2][0] ?>"><?= $mTitle[1][2][0] ?></a></li>
										<li><a href="<?= $mLink[1][3][0] ?>"><?= $mTitle[1][3][0] ?></a></li> -->
								</ul>
							</div> <!--.g2 .subList-->
						</div> <!--.sub-->
					</li> <!--.menu.g1-->
					<?php } ?>
					<?php if ($OT_ID == "notice_master") { ?>
					<li class="menu">
						<a href="/wssm/sub02/sub03_01.php?code=notice&m2=1" class="m">공지사항</a>
						<div class="sub sub2">
							<div class="subList clearfix">
								<ul>
									<li><a href="/wssm/sub02/sub03_01.php?code=notice&m2=1">공지사항</a></li>
								</ul>
							</div> <!--.g2 .subList-->
						</div> <!--.sub-->
					</li> <!--.menu.g1-->
					<?php } else { ?>
					<li class="menu">
						<a href="<?= $mLink[2][0][0] ?>" class="m"><?= $mTitle[2][0][0] ?></a>
						<div class="sub sub2">
							<div class="subList clearfix">
								<ul>
									<li><a href="<?= $mLink[2][1][0] ?>"><?= $mTitle[2][1][0] ?></a></li>
									<li><a href="<?= $mLink[2][2][0] ?>"><?= $mTitle[2][2][0] ?></a></li>
								</ul>
							</div> <!--.g2 .subList-->
						</div> <!--.sub-->
					</li> <!--.menu.g1-->
					<?php } ?>
					<?php if ($OT_ID != "notice_master") { ?>
					<li class="menu">
						<a href="<?= $mLink[3][0][0] ?>" class="m"><?= $mTitle[3][0][0] ?></a>
						<div class="sub sub2">
							<div class="subList clearfix">
								<ul>
									<!--<li><a href="<?= $mLink[3][1][0] ?>"><?= $mTitle[3][1][0] ?></a></li>
										<li><a href="<?= $mLink[3][2][1] ?>"><?= $mTitle[3][2][1] ?></a></li>
										<li><a href="<?= $mLink[3][3][0] ?>"><?= $mTitle[3][3][0] ?></a></li>
										<li><a href="<?= $mLink[3][4][0] ?>"><?= $mTitle[3][4][0] ?></a></li>-->
									<li><a href="<?= $mLink[3][10][0] ?>"><?= $mTitle[3][10][0] ?></a></li>
								</ul>
							</div> <!--.g2 .subList-->
						</div> <!--.sub-->
					</li> <!--.menu.g1-->
					<li class="menu">
						<a href="<?= $mLink[6][1][0] ?>" class="m"><?= $mTitle[6][0][0] ?></a>
						<div class="sub sub2">
							<div class="subList clearfix">
								<ul>
									<li><a href="<?= $mLink[6][1][0] ?>"><?= $mTitle[6][1][0] ?></a></li>
								</ul>
							</div> <!--.g2 .subList-->
						</div> <!--.sub-->
					</li> <!--.menu.g1-->
					<li class="menu">
						<a href="<?= $mLink[7][0][0] ?>" class="m"><?= $mTitle[7][0][0] ?></a>
						<div class="sub sub2">
							<div class="subList clearfix">
								<ul>
									<li><a href="<?= $mLink[7][0][0] ?>"><?= $mTitle[7][0][0] ?></a></li>
								</ul>
							</div> <!--.g2 .subList-->
						</div> <!--.sub-->
					</li> <!--.menu.g1-->
					<?php } ?>
					<li class="menu last">
						<!--마루 접속 중-->관리자님, 로그인되었습니다.<button class="btn_sumit ml10" onclick="logout()">로그아웃</button><a class="btn_sumit blbtn ml10" href="../../main/main.php" target="_blank">홈페이지</a>
					</li> <!--.menu.g1-->




				</ul>
			</nav>
		</div>

	</div>
</div>


<script>
	function logout() {
		location.href = '../main/logout.php';
	}
</script>