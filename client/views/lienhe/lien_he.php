<div class="mgt-dn cnter mg-fterr">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tạo form liên hệ đơn giản</title>
</head>
<body>
<form name="contactform" method="post" action="<?= BASE_URL . 'post-lien-he'?>">
<table awidth="450px">
<tr>
<td valign="top">
<label for="first_name">First Name *</label>
</td>
<td valign="top">
<input  type="text" name="first_name" maxlength="50" size="30">
</td>
</tr>
<tr>
<td valign="top"">
<label for="last_name">Last Name</label>
</td>
<td valign="top">
<input  type="text" name="last_name" maxlength="50" size="30">
</td>
</tr>
<tr>
<td valign="top">
<label for="email">Email Address</label>
</td>
<td valign="top">
<input  type="text" name="email" maxlength="80" size="30">
</td>
</tr>
<tr>
<td valign="top">
<label for="telephone">Telephone Number</label>
</td>
<td valign="top">
<input  type="text" name="phone" maxlength="30" size="30">
</td>
</tr>
<tr>
<td valign="top">
<label for="comments">Comments *</label>
</td>
<td valign="top">
<textarea  name="content" maxlength="1000" cols="25" rows="6"></textarea>
</td>
</tr>
<tr>
<td colspan="2" style="text-align:center">
<input type="submit" value="Submit" name="submit"></td>
</tr>
</table>
</form>
</body>
</html>
</div>