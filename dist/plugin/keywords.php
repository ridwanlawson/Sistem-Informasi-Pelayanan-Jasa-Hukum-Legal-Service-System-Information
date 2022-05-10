<script language="javascript">
function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function kodeScript(e, goods, field)
{
var key, keychar;
key = getkey(e);
if (key == null) return true;

keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
goods = goods.toLowerCase();

// check goodkeys
if (goods.indexOf(keychar) != -1)
	return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;
  
if (key == 13) {
	var i;
	for (i = 0; i < field.form.elements.length; i++)
		if (field == field.form.elements[i])
			break;
	i = (i + 1) % field.form.elements.length;
	field.form.elements[i].focus();
	return false;
	};
// else return false
return false;
}
</script>

<!-- <form method="post">
  <p>Tanggal lahir: <input name="Tanggal" type="text" size="2" onKeyPress="return kodeScript(event,'0123456789',this)" /> <input name="Bulan" type="text" size="12" onKeyPress="return kodeScript(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" /> <input name="Tahun" type="text" size="4" onKeyPress="return kodeScript(event,'0123456789',this)" /></p>
</form>

<input type="" name="" onKeyPress="return kodeScript(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)">
<textarea onKeyPress="return kodeScript(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)"></textarea> -->
<!-- <form method="post" > 
<input type="datetime-local" name="ss">
<input type="submit" name="save" >
</form> -->
<?php 
$anhu = "return kodeScript(event,' .0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)";
$hus = "return kodeScript(event,' abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)";
$hu = "return kodeScript(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)";
$ans = "return kodeScript(event,'0123456789',this)";
$an = "return kodeScript(event,'0123456789',this)";
	// include 'config/koneksi.php';
	// if (isset($_POST['save'])) {
	// 	# code...
	// 	$tanggal = $_POST['ss'];
	// 	echo $tanggal."<br>";
	// 	// $tgl = "2019-05-29";
	// 	$hari = date('l',strtotime($tanggal));
	// 	echo "Tanggal $tanggal adalah hari $hari";
	// }


 ?>

 <?php
?>