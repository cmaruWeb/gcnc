<!--meta http-equiv='Refresh' content='0; URL=main/main.php'-->

<!DOCTYPE html>
<html lang="ko">

<head>
  <title>경상남도 탄소중립 지원센터</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no, address=no, email=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="robots" content="index, follow" />
  <meta name="author" content="경상남도 탄소중립 지원센터">
  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <meta property="og:type" content="website">
  <meta property="og:image" content="../img/sns_img.jpg">
  <meta property="og:title" content="경상남도 탄소중립 지원센터">
  <meta property="og:description" content="">
  <meta property="og:url" content="">

  <link rel="canonical" href="">
  <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon" />
  <link rel="stylesheet" media="all" href="../css/font.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" media="all" href="../css/style.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" media="all" href="../css/layout.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" media="all" href="../css/contents.css?v=<?php echo time(); ?>" />
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

<body>

<div class="ready">
    <div class="ready-box">
        <img src="/img/symbol.png" alt="로고" class="logo">
        <strong>홈페이지 준비중</strong>
        <em>경상남도 탄소중립지원센터 홈페이지는<br>
 보다 나은 서비스 제공을 위해 현재 리뉴얼 작업 중입니다.<br>
작업 완료 후, 더욱 유익한 내용으로 찾아뵙겠습니다.</em>
    </div>
</div>



 <style>
    
/*폰트변경*/
@font-face {
    font-family: Paperlogy;
    src: url("../webfont/Paperlogy/Paperlogy-1Thin.woff") format("woff");
    font-style: normal;
    font-weight: 100;
    text-rendering: optimizeLegibility;
}
@font-face {
    font-family: Paperlogy;
    src: url("../webfont/Paperlogy/Paperlogy-2ExtraLight.woff") format("woff");
    font-style: normal;
    font-weight: 200;
    text-rendering: optimizeLegibility;
}
@font-face {
    font-family: Paperlogy;
    src: url("../webfont/Paperlogy/Paperlogy-3Light.woff") format("woff");
    font-style: normal;
    font-weight: 300;
    text-rendering: optimizeLegibility;
}
@font-face {
    font-family: Paperlogy;
    src: url("../webfont/Paperlogy/Paperlogy-4Regular.woff") format("woff");
    font-style: normal;
    font-weight: 400;
    text-rendering: optimizeLegibility;
}
@font-face {
    font-family: Paperlogy;
    src: url("../webfont/Paperlogy/Paperlogy-5Medium.woff") format("woff");
    font-style: normal;
    font-weight: 500;
    text-rendering: optimizeLegibility;
}
@font-face {
    font-family: Paperlogy;
    src: url("../webfont/Paperlogy/Paperlogy-6SemiBold.woff") format("woff");
    font-style: normal;
    font-weight: 600;
    text-rendering: optimizeLegibility;
}
@font-face {
    font-family: Paperlogy;
    src: url("../webfont/Paperlogy/Paperlogy-7Bold.woff") format("woff");
    font-style: normal;
    font-weight: 700;
    text-rendering: optimizeLegibility;
}
@font-face {
    font-family: Paperlogy;
    src: url("../webfont/Paperlogy/Paperlogy-8ExtraBold.woff") format("woff");
    font-style: normal;
    font-weight: 800;
    text-rendering: optimizeLegibility;
}
@font-face {
    font-family: Paperlogy;
    src: url("../webfont/Paperlogy/Paperlogy-9Black.woff") format("woff");
    font-style: normal;
    font-weight: 900;
    text-rendering: optimizeLegibility;
}



    /* Reset & 기본 설정 */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body, html { width: 100%; height: 100%; }

    /* 컨테이너: 전체 화면 배경 + 가운데 정렬 */
    .ready { font-family: Paperlogy, 'Pretendard', sans-serif, '돋움';
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;

      /* 배경 이미지: 실제 경로로 교체 */
      background: url('/img/main_vidusl.png') no-repeat center/cover;
      min-height: 100vh;
      padding: 16px;
    }

    /* 카드 스타일 */
    .ready-box {
      background-color: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      border-radius: 12px;
      padding: 24px;
      width: 100%;
      max-width: 320px;
    }

    /* 로고 */
    .ready-box .logo {
      display: block;
      width: 56px;
      margin: 0 auto 16px;
    }

    /* 제목 */
    .ready-box strong {
      display: block;
      font-size: 1.4rem;
      color: #ffffff;
      margin-bottom: 12px;
    }

    /* 설명문 */
    .ready-box em {
      display: block;
      font-style: normal;
      color: #f0f0f0;
      line-height: 1.5;
      font-size: 0. ninerem; font-weight: 400;
    }

    /* ——————————————————————————————
       태블릿 이상 (min-width: 768px)
       —————————————————————————————— */
    @media (min-width: 768px) {
      .ready-box {
        max-width: 480px;
        padding: 32px;
      }
      .ready-box .logo {
        width: 72px;
        margin-bottom: 24px;
      }
      .ready-box strong {
        font-size: 1.8rem;
        margin-bottom: 16px;
      }
      .ready-box em {
        font-size: 1rem;
      }
    }

    /* ——————————————————————————————
       데스크탑 이상 (min-width: 1200px)
       —————————————————————————————— */
    @media (min-width: 1200px) {
      .ready-box {
        max-width: 600px;
        padding: 52px 48px;
      }
      .ready-box .logo {
        width: 96px;
        margin-bottom: 25px;
      }
      .ready-box strong {
        font-size: 2.2rem;
      }
      .ready-box em {
        font-size: 1.1rem;
      }
    }
  </style>

  </body>
</html>
