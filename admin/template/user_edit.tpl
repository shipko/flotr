<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link rel="shortcut icon" href="../../../favicon.ico" />
<title>{title}</title>
<noscript><meta http-equiv="refresh" content="0; URL=/badbrowser.php" /></noscript>
<meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT" />
<meta http-equiv="Pragma" content="no-cache" />
<link href="../template/css/style.css" rel="stylesheet" type="text/css" />
{CSS}
<script type="text/javascript">
var lang = new Array();
</script>
{JS}
</head>
<body>
    <div id="error_message"></div>
    <div class="wrapper">
    <div class="wr"><a href="index.php"><img src="../template/images/loog.png" /></a></div>
    <div class="wrapper_without_img">
    <table width="100%">
    <tr>
      <td><div class="header">
<div class="menu">
<ul class="list"><li><a href="index.php">�������</a></li><li><a href="../">������� � �����</a></li></ul>
</div>
</div></td>
    </tr>
   <tr><td style="background-color: #fff; border-radius: 5px; padding: 10px;">
           {message}
            <form action="user.php?act=edit&id={id}" method="post">
   <div class="headi" style="margin: 10px;">��������������  ��������������     </div>
   <table width="100%" border="0">
     <tr>
         <td width="26%" class="ListTableLeftBar">���:</td>
         <td width="74%"><input name="name" type="text" style="width: 400px" value="{name}" maxlength="30" />&nbsp;</td>
       </tr>
       <tr>
         <td width="26%" class="ListTableLeftBar">�������:</td>
         <td width="74%"><input name="surname" type="text" style="width: 400px" value="{surname}" maxlength="30" />&nbsp;</td>
       </tr>
       <tr>
         <td width="26%" class="ListTableLeftBar">�����:</td>
         <td width="74%"><input name="login" type="text" style="width: 400px" value="{login}" maxlength="25" />&nbsp;</td>
       </tr>
       <tr>
         <td width="26%" class="ListTableLeftBar">E-mail:</td>
         <td width="74%"><input name="mail" type="text" style="width: 400px" value="{mail}" maxlength="32" />&nbsp;</td>
       </tr>
       <tr>
         <td width="26%" class="ListTableLeftBar">������:</td>
         <td width="74%"><input name="pass" type="text" style="width: 400px" maxlength="20" />&nbsp;</td>
       </tr>
       <tr>
         <td class="ListTableLeftBar">&nbsp;</td>
         <td><input name="ok" type="submit" value="��������" />&nbsp;</td>
       </tr>
   </table>
     <p>&nbsp;</p>

   </form>
            </td>
    </tr>      
<tr>
    <td><div class="footer"><span class="foo left"><a href="../copyright.php">������� �����������</a></span><span class="foo right">� sfml.tom.ru 2011</span></div></td>
    </tr>
  </table>
</div>
</div>

</body>
</html>
