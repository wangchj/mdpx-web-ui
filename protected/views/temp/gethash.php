<?php
/* @var $this TempController */

$this->breadcrumbs=array(
	'Temp',
);
?>

<form method="post" action="?r=temp/gethash">
<input type="text" name="str" /> <input type="submit" value="submit" />
</form>
<br />
<p>
<?php
echo $hashValue;
//end php?>
</p>
