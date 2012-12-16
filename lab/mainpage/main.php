
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="windows-1251">
    <title>Главная</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../../favicon.ico" />
    <!-- Le styles -->
    <link href="../../template/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .jumbotron {
  position: relative;
  padding: 40px 0;
  color: #fff;
  text-align: center;
  text-shadow: 0 1px 3px rgba(0,0,0,.4), 0 0 30px rgba(0,0,0,.075);
  background: #020031; /* Old browsers */
  background: -moz-linear-gradient(45deg,  #020031 0%, #6d3353 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,#020031), color-stop(100%,#6d3353)); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(45deg,  #020031 0%,#6d3353 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(45deg,  #020031 0%,#6d3353 100%); /* Opera 11.10+ */
  background: -ms-linear-gradient(45deg,  #020031 0%,#6d3353 100%); /* IE10+ */
  background: linear-gradient(45deg,  #020031 0%,#6d3353 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#020031', endColorstr='#6d3353',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
  -webkit-box-shadow: inset 0 3px 7px rgba(0,0,0,.2), inset 0 -3px 7px rgba(0,0,0,.2);
     -moz-box-shadow: inset 0 3px 7px rgba(0,0,0,.2), inset 0 -3px 7px rgba(0,0,0,.2);
          box-shadow: inset 0 3px 7px rgba(0,0,0,.2), inset 0 -3px 7px rgba(0,0,0,.2);
}
.jumbotron h1 {
  font-size: 80px;
  font-weight: bold;
  letter-spacing: -1px;
  line-height: 1;
}
.jumbotron p {
  font-size: 24px;
  font-weight: 300;
  line-height: 30px;
  margin-bottom: 30px;
}
    </style>
    
    <link href="../../template/css/main.css" rel="stylesheet" type="text/css" />


    <script type="text/javascript">
    var lang = new Array();
    </script>
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="./"><img src="http://testeng.ru/template/images/loog.png" alt="" width="30"></a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Главная</a></li>
              <li><a href="test.php?id=3">Тест</a></li>
              
            </ul>
            <ul class="nav pull-right">
              <li class="dropdown">
                <a href="admin" class="dropdown-toggle" data-toggle="dropdown">
                      Вход
                      <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="admin">Вход</a></li>    
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
        <header class="jumbotron subhead" id="overview">
            <div class="container">
                <h1>Components</h1>
                <p class="lead">Dozens of reusable components built to provide navigation, alerts, popovers, and more.</p>
            </div>
        </header>
     <div class="container">
        <div class="row">
            <div class="span8">
                
                <div class="hero-unit">
                    <h1>Добро пожаловать!</h1>
                        <p>Сайт создан для тестирования обучающихся Северского физико-математического лицея.</p>
                        <p>На сайте собраны тесты различной тематики по всем школьным предметам. </p>
                        <p>После прохождения теста система выставит вам оценку.</p>
                        <p><a class="btn btn-primary btn-large" href="test.php?id=28">Пройти тест &raquo;</a></p>
                </div>
                <div class="span4">
          <h2>Последние 50 тестов</h2>
           <p>Посмотрите последние добавленные тесты, которые вы можете пройти </p>
          <p><a class="btn" href="subject.php?sec=list">Посмотреть &raquo;</a></p>
        </div>
        <div class="span3">
          <h2>Пример теста</h2>
           <p>Это простой пример теста, который будет основой всего сайта</p>
          <p><a class="btn" href="test.php?id=3">Посмотреть &raquo;</a></p>
       </div>
        
            </div>
            <div class="span4">
                <h1>Список предметов</h1>
                
                <ul class="nav nav-list">
                    <li class="header"><a href="subject.php?sec=subject&id=3"><h3>Алгебра (4)</h3></a></li><li class="header"><a href="subject.php?sec=subject&id=13"><h3>Английский язык (9)</h3></a></li><li class="header"><a href="subject.php?sec=subject&id=1"><h3>Биология (3)</h3></a></li><li class="header"><a href="subject.php?sec=subject&id=10"><h3>География (2)</h3></a></li><li class="header"><a href="subject.php?sec=subject&id=4"><h3>Геометрия (0)</h3></a></li><li class="header"><a href="subject.php?sec=subject&id=6"><h3>Информатика (14)</h3></a></li><li class="header"><a href="subject.php?sec=subject&id=11"><h3>История (9)</h3></a></li><li class="header"><a href="subject.php?sec=subject&id=5"><h3>Литература (0)</h3></a></li><li class="header"><a href="subject.php?sec=subject&id=12"><h3>ОБЖ (0)</h3></a></li><li class="header"><a href="subject.php?sec=subject&id=7"><h3>Обществознание (0)</h3></a></li><li class="header"><a href="subject.php?sec=subject&id=2"><h3>Русский язык (0)</h3></a></li><li class="header"><a href="subject.php?sec=subject&id=9"><h3>Физика (1)</h3></a></li><li class="header"><a href="subject.php?sec=subject&id=8"><h3>Химия (0)</h3></a></li>
                </ul>
                
            </div>
            
        
        </div>
     
      <div class="row">
        
      </div>

<hr>

      <footer>
            <p class="pull-right"><a href="about.php">О проекте</a></p>
            <p>&copy; sfml.tom.ru 2011</p>
        
      </footer>
</hr>
    </div>
    
    
    <script src="script/bootstrap-dropdown.js"></script>
    <script src="script/bootstrap-collapse.js"></script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter10637911 = new Ya.Metrika({id:10637911, enableAll: true, webvisor:true});
        } catch(e) {}
    });
    
    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/10637911" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
  </body>
</html>

<!-- generated: 0.472656965256 seconds -->