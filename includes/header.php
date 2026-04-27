<?php
// ---- Environment detection ----
$host = $_SERVER['HTTP_HOST'] ?? '';
$uri  = $_SERVER['REQUEST_URI'] ?? '';

// Default behavior: turn on rewriting only on the real server (userdir host)
$isProd = ($host === 'people.mpi-sws.org') || (strpos($uri, '/~cgiannoula') === 0);

// Optional override via environment variable (works with Apache SetEnv or shell/env)
// e.g., SetEnv APP_ENV production    (in .htaccess or vhost)
// or:   APP_ENV=development php -S localhost:8000 -t public_html
$env = getenv('APP_ENV');
if ($env !== false) {
  $isProd = (strtolower($env) === 'production');
}

// Public URL prefix
if (!defined('BASE_URL')) {
  define('BASE_URL', $isProd ? '/~cgiannoula' : '');
}

// Start the output-rewrite buffer only in production
if ($isProd && !defined('OB_USERDIR_REWRITE')) {
  define('OB_USERDIR_REWRITE', true);

  ob_start(function ($html) {
    $prefix = BASE_URL;

    // Rewrite src="/...", href="/...", action="/..."
    // Skip protocol-relative (//...) and already-correct (/~cgiannoula/...)
    $html = preg_replace(
      '#((?:\s|^)(?:src|href|action))=("|\')/(?!~cgiannoula|/)([^"\']+)#i',
      '$1=$2' . $prefix . '/$3',
      $html
    );

    // Rewrite CSS url(/...) (inline styles or style blocks)
    $html = preg_replace(
      '#url\(/(?!~cgiannoula|/)([^)]+)\)#i',
      'url(' . $prefix . '/$1)',
      $html
    );

    return $html;
  });
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- My font family -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Bootstrap -->
  <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">

  <!-- Font Awesome Example: stylesheet -->
  <link rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
    crossorigin="anonymous">

  <!-- Academicons -->
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/gh/jpswalsh/academicons/css/academicons.min.css">

  <!-- My CSS file -->
  <link rel="stylesheet" href="/css/style.css">

  <meta name="description" content="Christina Giannoula" />
  <meta name="keywords" content="Christina Giannoula, personal website" />
  <meta http-equiv="author" content="Christina Giannoula" />

  <script src="https://kit.fontawesome.com/d2f19fecef.js" crossorigin="anonymous"></script>

  <style>
    .fakeimg{height:200px;background:#aaa;}
    a{color:#3084de}
    a:hover{color:#3084de}
    a.custom-link.fa-twitter,
    a.custom-link.fa-linkedin,
    a.custom-link.fa-google-scholar{color:#3084de}
  </style>

  <title>Christina Giannoula's website</title>
</head>
<body>

<nav class="navbar sticky-top navbar-expand-sm navbar-light"
     style="background-color:#F0F4F8; padding-top:1rem; padding-bottom:1rem;">
  <div class="container">
    <a class="navbar-brand" href="index.php" style="color:#3084de;font-weight:bold;font-size:30px;">
      Christina Giannoula
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"
            aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="awards.php">Awards</a></li>
        <li class="nav-item"><a class="nav-link" href="publications.php">Publications</a></li>
        <li class="nav-item"><a class="nav-link" href="teaching.php">Teaching</a></li>
        <li class="nav-item"><a class="nav-link" href="service.php">Service</a></li>
        <li class="nav-item"><a class="nav-link" href="spin_home.php">Hiring</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" style="margin-top:30px">
