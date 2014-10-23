{HEADER}
<script type="text/javascript">
    var ballOpt = {
        '2' : ['two',1],
        '3' : ['three',{factor3}],
        '4' : ['four',{factor4}],
        '5' : ['five',{factor5}],
        '6' : ['six',21]
    };
</script>
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
                   {ListSubject}
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
            <div class="rowTitle ListTableLeftBar">
                Критерии оценки
                <div class="hint">По умолчанию используются критерии предмета</div>
            </div>
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
                <input name="factor1" id="factor3" type="hidden" value="{factor3}" />
                <input name="factor2" id="factor4" type="hidden" value="{factor4}" />
                <input name="factor3" id="factor5" type="hidden" value="{factor5}" />
                <input name="is_edit_factor" id="is_edit" type="hidden" value="false" />
                <input name="ok" type="submit" value="Сохранить" />
            </div>
        </div>
    </div>
</form>
{FOOTER}