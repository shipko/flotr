{HEADER}
<script type="text/javascript">var i = {countAnswer}, test_id = {testId}, uid = "{testUnique}";</script>
<div class="headi" style="margin: 10px 0 0 10px;">
    ���������� �������� � ����� �� ���� "{testTitle}"
    <a href="test.php?sec=edit&cat=list&id={testId}">{return}</a>
</div>
    <div style="margin-left: 10px;">
        <form action="test.php?sec=add&cat=addQuestion&id={testId}" method="post">
            <div class="table">
                <div class="left" id="right_bar">
                    <h1 class="head">������</h1>
                    <div class="table_text"> 
                        <textarea name="title" class="big_input textArea" id="TitleTextarea" onkeydown="textAreaHeight(this)" rows="3" style="width: 470px; min-height: 50px; overflow: hidden; " /></textarea>
                    </div>
                    <h1 class="head" style="-moz-user-select: none; -webkit-user-select: none; ">
                        �������� ������ 
                        <span class="hint">
                            <span id="addans" class="addansact" style="color: #69C;">��������</span>
                             | 
                            <span id="delans">�������</span> 
                        </span>
                    </h1>
                    <div class="hint" style="margin: 0 0 10px 10px;">��������� ������� ����� � �������, ������� ����������.</div>
                        {answers}
                 </div>
                    <div class="right_bar">
                        <h1 class="head">����������� (�� �����������)</h1>
                        <div class="dropbox_top">&nbsp;</div>
                        <div class="file_upload" id="dropbox">
                            <span class="message">
                                ���������� ����������� ����. <br />
                                <i>(��� ����� �� �������� � �����)</i>
                            </span>

                            <input type="hidden" name="count_files" value="0" id="count_files">
                        </div>
                        
                    </div>
                    <table width="100%" border="0" style="margin-top: 30px;">
                        <tr>
                            <td width="225px" align="right" class="ListTableLeftBar">
                                <input type="checkbox" name="answers_next" value="2" {checkedAnswer} >�������� ������
                            </td>
                            <td>
                                <input type="hidden" name="number" id="valans" value="{countAnswer}">
                                <input name="ok" id="submit" type="submit" value="���������" /> &nbsp;
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
{FOOTER}