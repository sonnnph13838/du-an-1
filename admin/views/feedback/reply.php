<?php
 foreach ($list_feedback as $lf) : ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<form name="contactform" method="post" action="<?= ADMIN_URL . 'post-reply'?>">
<input type="hidden" name="id" value = "<?=$id?>" >
<table awidth="450px">
<tr>
<td valign="top">

</td>

</td>
</tr>
<tr>
<td valign="top">
<label for="email">Email Address</label>
</td>
<td valign="top">
    
<input  type="text" name="email" maxlength="80" size="30" value = "<?= $lf['email'] ?>">
</td>
</tr>
<tr>
<td valign="top">
</td>
</tr>
<tr>
<td valign="top">
<label for="comments">Reply</label>
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
<?php endforeach ?>

