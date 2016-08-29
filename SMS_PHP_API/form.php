<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<script type="text/javascript">
<!--
function popup(url)
{
 var width  = 600;
 var height = 350;
 var left   = (screen.width  - width)/2;
 var top    = (screen.height - height)/2;
 var params = 'width='+width+', height='+height;
 params += ', top='+top+', left='+left;
 params += ', directories=no';
 params += ', location=no';
 params += ', menubar=no';
 params += ', resizable=no';
 params += ', scrollbars=no';
 params += ', status=no';
 params += ', toolbar=no';
 newwin=window.open(url,'windowname5', params);
 if (window.focus) {newwin.focus()}
 return false;
}
// -->
</script>
</HEAD>
<fieldset dir=ltr>
<table border="0" width="100%" cellspacing="3" cellpadding="3">
<form action="" method="POST">
	<tr>
		<td>Your Balance</td>
<td><input type="text" name="Balance" size="20" disabled="disabled" value="<? echo $Credits; ?>"</td>
	</tr>
	<tr>
		<td>Sender Name</td>
<td>
    <select size=1 name=Originator>
    <option selected value="1">Select sender name</option>
    <? for($i=0;$i<count($SenderName);$i++){echo'<option value="'.$SenderName[$i].'">'.$SenderName[$i].'</option>';} ?>
    </select>
<a href="javascript: void(0)" onclick="popup('addsender.php')"> Add Sender Name</a></td>
	</tr>
	<tr>
		<td>Mobile No.</td>
<td><textarea name="Mobile" cols="30" rows="5"></textarea><br><font size="2" color="#FF0000"> Ex. 96655xxxxxxx,96655xxxxxxx</font></td>
	</tr>
	<tr>
		<td>Message</td>
		<td><textarea name="Text" cols="30" rows="5"></textarea></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="Go" value="Send SMS" /></td>
	</tr>
	</form>
</table>
</fieldset>