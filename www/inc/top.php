<?php
session_start();
include "../board/rootDir.inc";
$boardDir = $rootDir."/board";  //board 폴더
include $boardDir."/lib.php";
include $boardDir."/function.php";
?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <title>경상남도탄소중립지원센터</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no, address=no, email=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="robots" content="index, follow" />
  <meta name="author" content="경상남도탄소중립지원센터">
  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <meta property="og:type" content="website">
  <meta property="og:image" content="../img/sns_img.jpg">
  <meta property="og:title" content="경상남도탄소중립지원센터">
  <meta property="og:description" content="">
  <meta property="og:url" content="">

  <link rel="canonical" href="">
  <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon" />
  <link rel="stylesheet" media="all" href="../css/font.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" media="all" href="../css/style.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" media="all" href="../css/layout.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" media="all" href="../css/contents.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" media="all" href="../css/contents2.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" media="all" href="../css/menu.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" media="all" href="../css/board.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" media="all" href="../css/main.css?v=<?php echo time(); ?>" />

  <script src="../plugin/share/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="../js/d_lnb.js"></script>
  <script type="text/javascript" src="../js/common.js"></script>
  <!-- 게시판 -->
  <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
  <!-- 게시판 -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:FILL@1" />
  <!--fullpage-->
  <script type="text/javascript" src="../plugin/fullpage/jquery.fullPage.js"></script>
  <!--공통-->
  <link rel="stylesheet" href="../plugin/swiper/swiper-bundle.min.css">
  <script src="../plugin/swiper/swiper-bundle.min.js"></script>
  <!--공통-->
  <!--[if lt IE 9]>
  <script type="text/javascript" src="../plugin/share/html5.js"></script>
  <script type="text/javascript" src="../plugin/share/respond.min.js"></script>
  <![endif]-->
    <!--[if lte IE 8]>
  <link href="../css/ie8.css" rel="stylesheet">
  <![endif]-->

  <!--프로그램-->
  <script src="/board/boardScript.js?v=<?php echo date("YmdH"); ?>"></script>
  <script src="/SmartEditor2/js/service/HuskyEZCreator.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body class="<?= ($is_main) ? "mainWrap" : "bodyWrap" ?>">
  <div class="wrap">
    <? include("../inc/header.php") ?>