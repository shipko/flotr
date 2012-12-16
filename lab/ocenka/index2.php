
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="./../../../admin/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="./../../../admin/template/css/mark.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>
    <script type="text/javascript">
        var ballOpt = {
            '2' : ['two',1],
            '3' : ['three',6],
            '4' : ['four',11],
            '5' : ['five',16],
            '6' : ['six',21]
        };
    </script>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Админ-панель</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Вы вошли как <a href="#" class="navbar-link">Дмитрий Муковкин</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Тест</li>
              <li class="active"><a href="#">Добавление</a></li>
              <li><a href="#">Редактирование</a></li>
              <!-- <li><a href="#">Восстановление</a></li> -->
              <li class="nav-header">Категории</li>
              <li><a href="#">Добавление</a></li>
              <li><a href="#">Редактирование</a></li>
              <li class="nav-header">Администраторы</li>
              <li><a href="#">Добавление</a></li>
              <li><a href="#">Редактирование</a></li>
              <li class="nav-header">Ответы к тестам</li>
              <li><a href="#">Предметы</a></li>
              <li class="nav-header">Статистика</li>
              <li><a href="#">Посмотреть</a></li>
              <li class="divider"></li>
              <li class="nav-header"></li>
              <li class="nav-header"></li>
              <li><a href="#">Перейти к сайту</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="container">
            <h2>Добавление теста</h2>
            <form class="form-horizontal">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Тема теста</label>
                    <div class="controls">
                        <input type="text" id="inputEmail" placeholder="Введите тему">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Предмет</label>
                    <div class="controls">
                        <select name="subject" id="subjectAction">

                            <option value="3">Алгебра</option>

                            <option value="13">Английский язык</option>

                            <option value="1">Биология</option>

                            <option value="10">География</option>

                            <option value="4">Геометрия</option>

                            <option value="6">Информатика</option>

                            <option value="11">История</option>

                            <option value="5">Литература</option>

                            <option value="12">ОБЖ</option>

                            <option value="7">Обществознание</option>

                            <option value="2">Русский язык</option>

                            <option value="9">Физика</option>

                            <option value="8">Химия</option>

                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Категория</label>
                    <div class="controls">
                        <select name="category"  id="catAction">
                            <option value="">Загрузка</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Активный?</label>
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox"> 
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Критерии оценки</label>
                    <div class="controls">
                    <label class="checkbox">
                        <span href="#" id="selectMark" style="color: #08C; text-decoration: none; cursor: pointer;">Задать</span>
                    </label>
                    </div>
                </div>
                
                <div class="control-group">
                    <div class="blockBall" style="display: none;">
                        <div class="blockLines">
                            <ul class="Lines">
                                <li class="oneLine" id="lines_1">&nbsp;</li>
                                <li class="oneLine" id="lines_2">&nbsp;</li>
                                <li class="oneLine" id="lines_3">&nbsp;</li>
                                <li class="oneLine" id="lines_4">&nbsp;</li>
                                <li class="oneLine" id="lines_5">&nbsp;</li>
                                <li class="oneLine selectLine" id="lines_6">6</li>
                                <li class="oneLine" id="lines_7">&nbsp;</li>
                                <li class="oneLine" id="lines_8">&nbsp;</li>
                                <li class="oneLine" id="lines_9">&nbsp;</li>
                                <li class="oneLine" id="lines_10">&nbsp;</li>
                                <li class="oneLine selectLine" id="lines_11">11</li>
                                <li class="oneLine" id="lines_12">&nbsp;</li>
                                <li class="oneLine" id="lines_13">&nbsp;</li>
                                <li class="oneLine" id="lines_14">&nbsp;</li>
                                <li class="oneLine" id="lines_15">&nbsp;</li>
                                <li class="oneLine selectLine" id="lines_16">16</li>
                                <li class="oneLine" id="lines_17">&nbsp;</li>
                                <li class="oneLine" id="lines_18">&nbsp;</li>
                                <li class="oneLine" id="lines_19">&nbsp;</li>
                                <li class="oneLine" id="lines_20">&nbsp;</li>
                            </ul>
                        </div>
                        <div class="blockMarks">
                            <ul class="Marks">
                                <li class="oneMark first two" id="1">2</li>
                                <li class="oneMark two" id="2">&nbsp;</li>
                                <li class="oneMark two" id="3">&nbsp;</li>
                                <li class="oneMark two" id="4">&nbsp;</li>
                                <li class="oneMark two" id="5">&nbsp;</li>
                                <li class="oneMark three selectMark" id="6">3</li>
                                <li class="oneMark three" id="7">&nbsp;</li>
                                <li class="oneMark three" id="8">&nbsp;</li>
                                <li class="oneMark three" id="9">&nbsp;</li>
                                <li class="oneMark three" id="10">&nbsp;</li>
                                <li class="oneMark four selectMark" id="11">4</li>
                                <li class="oneMark four" id="12">&nbsp;</li>
                                <li class="oneMark four" id="13">&nbsp;</li>
                                <li class="oneMark four" id="14">&nbsp;</li>
                                <li class="oneMark four" id="15">&nbsp;</li>
                                <li class="oneMark five selectMark" id="16">5</li>
                                <li class="oneMark five" id="17">&nbsp;</li>
                                <li class="oneMark five" id="18">&nbsp;</li>
                                <li class="oneMark five" id="19">&nbsp;</li>
                                <li class="oneMark five last" id="20">&nbsp;</li>
                            </ul>
                        </div>
                        <div class="blockInput">
                            <div class="timeMarksInput" id="timeInput_2">&nbsp;</div>
                            <div class="timeMarksInput" id="timeInput_3"><input type="text" name="timeMarks1" class="marksInput" value=""><div class="imagesMark" rel="popover" title="A Title" data-content="And here's some amazing content. It's very engaging. right?">&nbsp;</div></div>
                            <div class="timeMarksInput" id="timeInput_4"><input type="text" name="timeMarks1" class="marksInput" value=""></div>
                            <div class="timeMarksInput" id="timeInput_5"><input type="text" name="timeMarks1" class="marksInput" value=""></div>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                    <label class="checkbox">
                    </label>
                    <button type="submit" class="btn btn-success ">Сохранить</button>
                    </div>
                </div>
            </form>
          </div>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../../script/jquery.js"></script>
    <script src="../../../script/bootstrap.min.js"></script>
    <script src="../../../script/mark.js"></script>
  </body>
</html>
