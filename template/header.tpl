<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{description}">
    <meta name="keywords" content="{keywords}">
    <meta name="author" content="Муковкин Дмитрий">
    <link rel="shortcut icon" href="../../../favicon.ico" />
    <!-- Le styles -->
    <link href="template/css/bootstrap.css" rel="stylesheet">
	<link href="template/css/bootstrap-responsive.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>
    
    {CSS}

    <script type="text/javascript">
    var lang = new Array();
    </script>
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="./"><img src="template/images/loog.png" alt="" width="30"></a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Главная</a></li>
              <li><a href="home.php">Личный кабинет</a></li>
			  <li><a href="about.php">О проекте</a></li>
            </ul>
            <ul class="nav pull-right">
				<li class="dropdown">
					{header_user}
				</li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>