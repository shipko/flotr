{HEADER}
<div class="headi" style="margin: 10px 10px 0 10px; height: 10px;">�������������� ��������� <a href="subject.php?cat=sub&id={sid}">(�����)</a></div>
    <form action="subject.php?cat=edit&id={id}&do" method="post">
        <div class="row">
            <div class="rowTitle ListTableLeftBar">���������</div>
            <div class="rowBlock">
                <input name="title" type="text" style="width: 400px" value="{title}" maxlength="150" />
            </div>
        </div>
        <div class="row">
            <div class="rowTitle ListTableLeftBar">�������</div>
            <div class="rowBlock">
                <select name="subject">
                    {ListSubject}
                </select>
            </div>
        </div>
        
        <div class="row">
            <div class="rowTitle ListTableLeftBar">&nbsp;</div>
            <div class="rowBlock">
                <input name="ok" type="submit" value="���������" />
            </div>
        </div>
</form>
    </table>
{FOOTER}