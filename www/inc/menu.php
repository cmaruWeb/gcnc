<h3 class="tit"><?=$mTitle[$m1][0][0]?></h3>
			<?if( $m1==1 ){?>
			<ul class="li07">
				<li <?= $m2==1 ? "class='active'" : ""  ?>><a href="<?=$mLink[1][1][0]?>"><?=$mTitle[1][1][0]?></a></li>
				<li <?= $m2==2 ? "class='active'" : ""  ?>><a href="<?=$mLink[1][2][0]?>"><?=$mTitle[1][2][0]?></a></li>
				<li <?= $m2==3 ? "class='active'" : ""  ?>><a href="<?=$mLink[1][3][0]?>"><?=$mTitle[1][3][0]?></a></li>
				<li <?= $m2==4 ? "class='active'" : ""  ?>><a href="<?=$mLink[1][4][0]?>"><?=$mTitle[1][4][0]?></a></li>
				<li <?= $m2==5 ? "class='active'" : ""  ?>><a href="<?=$mLink[1][5][0]?>"><?=$mTitle[1][5][0]?></a></li>
				<li <?= $m2==6 ? "class='active'" : ""  ?>><a href="<?=$mLink[1][6][0]?>"><?=$mTitle[1][6][0]?></a></li>
		</ul>

			<?}else if( $m1==2){?>
			<ul>
				<li <?= $m2==1 ? "class='active'" : ""  ?>><a href="<?=$mLink[2][1][0]?>"><?=$mTitle[2][1][0]?></a></li>
				<li <?= $m2==2 ? "class='active'" : ""  ?>><a href="<?=$mLink[2][2][0]?>"><?=$mTitle[2][2][0]?></a></li>
				<li <?= $m2==3 ? "class='active'" : ""  ?>><a href="<?=$mLink[2][3][0]?>"><?=$mTitle[2][3][0]?></a></li>
				<li <?= $m2==4 ? "class='active'" : ""  ?>><a href="<?=$mLink[2][4][0]?>"><?=$mTitle[2][4][0]?></a></li>
			</ul>

			<?}else if( $m1==3){?>
			<ul>
				<li <?= $m2==1 ? "class='active'" : ""  ?>><a href="<?=$mLink[3][1][0]?>"><?=$mTitle[3][1][0]?></a></li>
				<li <?= $m2==2 ? "class='active'" : ""  ?>><a href="<?=$mLink[3][2][0]?>"><?=$mTitle[3][2][0]?></a></li>
				<li <?= $m2==3 ? "class='active'" : ""  ?>><a href="<?=$mLink[3][3][0]?>"><?=$mTitle[3][3][0]?></a></li>
				<li <?= $m2==4 ? "class='active'" : ""  ?>><a href="<?=$mLink[3][4][0]?>"><?=$mTitle[3][4][0]?></a></li>
				<li <?= $m2==5 ? "class='active'" : ""  ?>><a href="<?=$mLink[3][5][0]?>"><?=$mTitle[3][5][0]?></a></li>
			</ul>	

			<?}else if( $m1==4){?>
			<ul>
				<li <?= $m2==1 ? "class='active'" : ""  ?>><a href="<?=$mLink[4][1][0]?>"><?=$mTitle[4][1][0]?></a></li>
				<li <?= $m2==2 ? "class='active'" : ""  ?>><a href="<?=$mLink[4][2][0]?>"><?=$mTitle[4][2][0]?></a></li>
				<li <?= $m2==3 ? "class='active'" : ""  ?>><a href="<?=$mLink[4][3][0]?>"><?=$mTitle[4][3][0]?></a></li>
				<li <?= $m2==4 ? "class='active'" : ""  ?>><a href="<?=$mLink[4][4][0]?>"><?=$mTitle[4][4][0]?></a></li>
			
			</ul>			
			
			<?}else if( $m1==10){?>
			<ul>
				<li <?= $m2==1 ? "class='active'" : ""  ?>><a href="<?=$mLink[10][1][0]?>"><?=$mTitle[10][1][0]?></a></li>
				<li <?= $m2==2 ? "class='active'" : ""  ?>><a href="<?=$mLink[10][2][0]?>"><?=$mTitle[10][2][0]?></a></li>	
				<li <?= $m2==3 ? "class='active'" : ""  ?>><a href="<?=$mLink[10][3][0]?>"><?=$mTitle[10][3][0]?></a></li>	
			</ul>
              <?php } ?>