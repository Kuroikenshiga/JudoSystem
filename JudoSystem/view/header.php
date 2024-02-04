

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
  <img id="logoImg" src="../../JudoSystem/view/img/logo.png" alt="">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="../../index.php?class=main&method=showMain">JudoSystem</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul style="display: <?=$bool?'none':''?>;">
          <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
          <li><a class="nav-link scrollto" href="index.php?class=atleta&method=list">Atletas</a></li>
          <li><a class="nav-link scrollto" href="index.php?class=competicao&method=list">Competições</a></li>
          <li><a class="nav-link scrollto" href="index.php?class=academia&method=showUpdate">Academia</a></li>
          
          <li><a class="nav-link scrollto " href="index.php?class=main&method=logout">Sair</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      
    </div>
  </header><!-- End Header -->