
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link rel="shortcut icon" href="../../../favicon.ico" />
<title>Добавление теста</title>
<script type="text/javascript" src="../../../script/jquery.js"></script>
<link href="../../../../template/css/style.css" rel="stylesheet" type="text/css" />
<link href="./../../../template/css/main.css" rel="stylesheet" type="text/css" />
<link href="./../../../admin/template/css/main.css" rel="stylesheet" type="text/css" />
<link href="./../../../admin/template/css/mark.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../../script/jquery.ui.js"></script>
<script type="text/javascript" src="../../script/add.js"></script>
<script type="text/javascript" src="../../script/mark.js"></script>

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
    <div id="error_message"></div>
    <div class="wrapper">
    <div class="wr"><a href="index.php"><img src="../../../../template/images/loog.png" /></a></div>
    <div class="wrapper_without_img">
  <table width="100%">
    <tr>
      <td><div class="header">
<div class="menu">
<ul class="list"><li><a href="../admin">Главная</a></li><li><a href="../">Перейти к сайту</a></li></ul>
</div>
</div></td>
    </tr>
    <tr>
        <td style="background-color: #fff; border-radius: 5px;">
<form action="test.php?sec=add&cat=add" method="post">
    <div class="headi" style="margin: 10px;">Добавление теста</div>
    <script type="text/javascript">var cat_id = 0;</script>
    <div class="container">
        <div class="row">
            <div class="rowTitle ListTableLeftBar">Тема теста</div>
            <div class="rowBlock"><input name="title" type="text" style="width: 400px" maxlength="150" /></div>
        </div>
        <div class="row">
            <div class="rowTitle ListTableLeftBar">Предмет</div>
            <div class="rowBlock">
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
        <div class="row">
            <div class="rowTitle ListTableLeftBar">
                Категория
                <div class="hint">Необязательно</div>
            </div>
            <div class="rowBlock">
                <select name="category"  id="catAction">
                   <option value="">Загрузка</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="rowTitle ListTableLeftBar">Будет ли показываться?</div>
            <div class="rowBlock"><input name="status" type="checkbox" value="2" /></div>
        </div>
        <div class="row">
            <div class="rowTitle ListTableLeftBar">Критерии оценки</div>
            <div class="rowBlock">
                <span id="selectMark" style="color: #2D76B9; font-size: 14px; cursor: pointer;">Задать &#8595;</span>
            </div>
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
                <div class="blockInput" style="display: none;">
                    <div class="timeMarksInput" id="timeInput_2">&nbsp;</div>
                    <div class="timeMarksInput" id="timeInput_3"><input type="text" name="timeMarks1" class="marksInput" value=""><div class="imagesMark" rel="popover" title="A Title" data-content="And here's some amazing content. It's very engaging. right?">&nbsp;</div></div>
                    <div class="timeMarksInput" id="timeInput_4"><input type="text" name="timeMarks1" class="marksInput" value=""></div>
                    <div class="timeMarksInput" id="timeInput_5"><input type="text" name="timeMarks1" class="marksInput" value=""></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="rowTitle ListTableLeftBar">&nbsp;</div>
            <div class="rowBlock">
                <input name="factor1" type="hidden" value="" />
                <input name="factor2" type="hidden" value="" />
                <input name="factor3" type="hidden" value="" />
                <input name="is_edit_factor" type="hidden" value="" />
                <input name="ok" type="submit" value="Сохранить" />
            </div>
        </div>
    </div>
</form>
        </td>
    </tr>
<tr>
    <td><div class="footer"><span class="foo left"><a href="copyright.php">Правила перепечатки</a></span><span class="foo right">© sfml.tom.ru 2012 </span></div></td>
    </tr>
  </table>
</div>
</div>
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
</html><!-- generated: 0.202584028244 seconds -->