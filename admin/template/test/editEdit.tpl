﻿{HEADER}
<script type="text/javascript">
    var cat_id = {categoryId},
    ballOpt = {
        '2' : ['two',1],
        '3' : ['three',{factor3}],
        '4' : ['four',{factor4}],
        '5' : ['five',{factor5}],
        '6' : ['six',21]
    };
</script>
<form action="test.php?sec=edit&cat=updateTest&id={TestId}" method="post">
    <div class="headi" style="margin: 10px;">Редактирование теста <a href="test.php?sec=edit&cat=list&id={TestId}">(назад)</a></div>
    <div class="container">
        <div class="row">
            <div class="rowTitle ListTableLeftBar">Тема теста</div>
            <div class="rowBlock"><input name="title" type="text" style="width: 400px" maxlength="150" value="{InputTitle}" /></div>
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
            <div class="rowBlock"><input name="status" type="checkbox" value="2" {Checked} /></div>
        </div>
		<!--<div class="row">
            <div class="rowTitle ListTableLeftBar">Не перемешивать вопросы</div>
            <div class="rowBlock"><input name="shuffle" type="checkbox" value="2" {Checked-Shuffle} /></div>
        </div>-->
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
                        <li class="oneLine" id="lines_6">&nbsp;</li>
                        <li class="oneLine" id="lines_7">&nbsp;</li>
                        <li class="oneLine" id="lines_8">&nbsp;</li>
                        <li class="oneLine" id="lines_9">&nbsp;</li>
                        <li class="oneLine" id="lines_10">&nbsp;</li>
                        <li class="oneLine" id="lines_11">&nbsp;</li>
                        <li class="oneLine" id="lines_12">&nbsp;</li>
                        <li class="oneLine" id="lines_13">&nbsp;</li>
                        <li class="oneLine" id="lines_14">&nbsp;</li>
                        <li class="oneLine" id="lines_15">&nbsp;</li>
                        <li class="oneLine" id="lines_16">&nbsp;</li>
                        <li class="oneLine" id="lines_17">&nbsp;</li>
                        <li class="oneLine" id="lines_18">&nbsp;</li>
                        <li class="oneLine" id="lines_19">&nbsp;</li>
                        <li class="oneLine" id="lines_20">&nbsp;</li>
                    </ul>
                </div>
                <div class="blockMarks">
                    <ul class="Marks">
                        <li class="oneMark first" id="1">2</li>
                        <li class="oneMark" id="2">&nbsp;</li>
                        <li class="oneMark" id="3">&nbsp;</li>
                        <li class="oneMark" id="4">&nbsp;</li>
                        <li class="oneMark" id="5">&nbsp;</li>
                        <li class="oneMark" id="6">&nbsp;</li>
                        <li class="oneMark" id="7">&nbsp;</li>
                        <li class="oneMark" id="8">&nbsp;</li>
                        <li class="oneMark" id="9">&nbsp;</li>
                        <li class="oneMark" id="10">&nbsp;</li>
                        <li class="oneMark" id="11">&nbsp;</li>
                        <li class="oneMark" id="12">&nbsp;</li>
                        <li class="oneMark" id="13">&nbsp;</li>
                        <li class="oneMark" id="14">&nbsp;</li>
                        <li class="oneMark" id="15">&nbsp;</li>
                        <li class="oneMark" id="16">&nbsp;</li>
                        <li class="oneMark" id="17">&nbsp;</li>
                        <li class="oneMark" id="18">&nbsp;</li>
                        <li class="oneMark" id="19">&nbsp;</li>
                        <li class="oneMark last" id="20">&nbsp;</li>
                    </ul>
                </div>
                <div class="blockInput" style="display: none;">
                    <div class="timeMarksInput" id="timeInput_2">&nbsp;</div>
                    <div class="timeMarksInput" id="timeInput_3"><input type="text" name="timeMarks1" class="marksInput" value=""></div>
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
               <input name="ok" type="submit" value="Обновить" />
            </div>
        </div>
    </div>
</form>
{FOOTER}