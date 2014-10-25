{HEADER}
<div class="headi" style="margin: 10px 10px 0 10px; height: 10px;">Добавление категории <a href="subject.php?cat=sub&id={id}">(назад)</a>
</div>
    <table width="100%" border="0">
        <form action="subject.php?cat=add&do" method="post"><tr>
         <td width="26%" class="ListTableLeftBar">Категория:</td>
         <td width="74%"><input name="title" type="text" style="width: 400px" value="" maxlength="150" />&nbsp;</td>
       </tr>
       <tr>
         <td class="ListTableLeftBar">Предмет</td>
         <td><select name="subject">
                {ListSubject}
             </select></td>
       </tr>
       <tr>
         <td class="ListTableLeftBar">&nbsp;</td>
         <td><input name="ok" type="submit" value="Сохранить" />&nbsp;</td>
       </tr>
       <tr>
         <td class="ListTableLeftBar">&nbsp;</td>
         <td>&nbsp;</td>
       </tr>

</form>
    </table>
{FOOTER}