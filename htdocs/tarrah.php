<?php 

require_once('protect-this.php');
echo '<meta name="robots" content="noindex">';
require_once('config.php');
require_once('funcs.php');
$activeuser14b = $_COOKIE['username'];
$tedademteh=fact_ret("users", "username", $activeuser14b, "excount");
$tedademteh = (int)$tedademteh;
?>

<!DOCTYPE html>
<html lang="en">
<head>	

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D18WG7GGNX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-D18WG7GGNX');
</script>

	<meta charset="UTF-8">
	<title>آزمونیار</title>
	<link href="font.css" rel="stylesheet">
	<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
	<script src="sn.js"></script>
	<script src="summernote-ext-rtl.js"></script>
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="favicon.png">
	<link rel="stylesheet" href="font.css">
	<style>
	body {


		margin: 5%;
	}
	
	img {
		max-width: 100%;
		height: auto;
	}
	</style>


</head>
<body>

<?php 
if($tedademteh > 0){

?>	

<center><a style="color:green;" href="tarrah.php">سوال جدید</a> - <a href="natayej.php">آزمون ها و نتایج</a> - <a href="azmoonsaz.php" onclick="return confirm('آیا مطمئن هستید؟')"> از سوالات زیر آزمون بساز</a> -  <a style="color:ff7b00;" href="https://me.refinedview.com/?p=62">آموزش کار با سامانه</a> - شما <?php echo $tedademteh; ?> آزمون دارید<br><br><p style="color: grey;">لینک کارنامه:    <?php echo $base_url; ?>karnameh.php</p></center><hr><br>
<?php

$questionid=$_POST["qid"];

if($_POST["step"]==null){
	
	$valuedr="سوال";
	$ider="q";
	$steper="one";

	
}

if($_POST["step"]=="one"){
	
	$valuedr="گزینه اول";
	$ider="a1";
	$steper="two";
	
	$contentq=mysqli_real_escape_string($con, $_POST['q']); 
	$sql = "INSERT INTO soal (`matn`, `user`) VALUES ('$contentq', '$activeuser14b')";
	$result=mysqli_query($con, $sql);
	$questionid = $con->insert_id;
	
}

if($_POST["step"]=="two"){
	
	$valuedr="گزینه دوم";
	$ider="a2";
	$steper="three";
	
	$contentq=mysqli_real_escape_string($con, $_POST['a1']); 
	$soal=$questionid;
	$dorosti=$_POST["sahih"];
	$sql = "INSERT INTO gozineha (`soal`,`matn`,`dorosti`) VALUES ('$soal','$contentq','$dorosti')";
	$result=mysqli_query($con, $sql);
	
}

if($_POST["step"]=="three"){
	
	$valuedr="گزینه سوم";
	$ider="a3";
	$steper="four";
	
	$contentq=mysqli_real_escape_string($con, $_POST['a2']); 
	$soal=$questionid;
	$dorosti=$_POST["sahih"];
	$sql = "INSERT INTO gozineha (`soal`,`matn`,`dorosti`) VALUES ('$soal','$contentq','$dorosti')";
	$result=mysqli_query($con, $sql);
	
}

if($_POST["step"]=="four"){
	
	$valuedr="گزینه چهارم";
	$ider="a4";
	$steper="five";
	
	$contentq=mysqli_real_escape_string($con, $_POST['a3']); 
	$soal=$questionid;
	$dorosti=$_POST["sahih"];
	$sql = "INSERT INTO gozineha (`soal`,`matn`,`dorosti`) VALUES ('$soal','$contentq','$dorosti')";
	$result=mysqli_query($con, $sql);
	
}


if($_POST["step"]=="five"){
	
	$contentq=mysqli_real_escape_string($con, $_POST['a4']); 
	$soal=$questionid;
	$dorosti=$_POST["sahih"];
	$sql = "INSERT INTO gozineha (`soal`,`matn`,`dorosti`) VALUES ('$soal','$contentq','$dorosti')";
	$result=mysqli_query($con, $sql);
	echo '<style>html *{ direction: rtl; }</style><center>سوال با موفقیت اضافه شد. شناسه سوال '.$questionid.' می باشد. <br> <a href="tarrah.php">سوال جدید</a> </center><hr>';
	die;
}


?>

<form action="tarrah.php" method="post">



<center><?php echo $valuedr; ?></center>
<textarea spellcheck="false" name="<?php echo $ider; ?>" id="summernote"><div style="direction: rtl;"><span style="font-size: 18px;">بنویس</span></div></textarea><br><center>محدودیت حجم هر فایل تصویری بارگزاری شده ۱ مگابایت می‌باشد<center></center> </center><hr>

<?php
if($_POST["step"]!=null){
echo '<br><center><select id="sahih" name="sahih"><option value="n">این گزینه صحیح نیست</option><option value="y">این گزینه صحیح است</option></select></center>';
}	
?>





<input type="hidden" value='<?php echo $steper; ?>' name="step" id="step"><input type="hidden" value='<?php echo $questionid; ?>' name="qid" id="qid"><br>
<br><center><input class="btn btn-primary" type="submit" value="ذخیره"></center>

</form>



<script>
	$(document).ready(function() {
			$('#summernote').summernote({
					callbacks: {
						onImageUpload: function(files) {
							for(let i=0; i < files.length; i++) {
								$.upload(files[i]);
							}
						},
						
						
						onPaste: function (e) {
										var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
										e.preventDefault();
										setTimeout( function(){
											document.execCommand( 'insertText', false, bufferText );
										}, 10 );
									}
						
					},
					height: 200,
					fontNames: ['IRANSans','Arial'],
						fontNamesIgnoreCheck: ['IRANSans','Arial'],
						toolbar: [
							['style', ['bold', 'italic', 'underline']],
							['font', ['strikethrough', 'superscript', 'subscript']],
							['fontsize', ['fontsize']],
							['height', ['height']],
							['color', ['color']],
							['insert',['ltr','rtl']],
							['para', ['ul', 'ol', 'paragraph']],
							['table', ['table']],
							['insert', ['link', 'picture', 'video']],
							['view', ['fullscreen', 'codeview', 'help']],
						],
						disableResizeEditor: true

						});

$('#summernote').summernote('fontSize', 18);
$("#summernote").summernote("removeModule", "imagePopover");

				$.upload = function (file) {
					let out = new FormData();
					out.append('file', file, file.name);

					$.ajax({
						method: 'POST',
						url: 'upload.php',
						contentType: false,
						cache: false,
						processData: false,
						data: out,
						success: function (img) {
							$('#summernote').summernote('insertImage', img);
						},
						error: function (jqXHR, textStatus, errorThrown) {
							console.error(textStatus + " " + errorThrown);
						}
					});
				};
	});


</script>

<br><hr><center><form action="copykon.php" method="post">
<input type="text" placeholder="لینک آزمون در آزمونیار شریفی" name="copyid"><br><br><input value="سوال های این آزمون را کپی کن" class="btn btn-warning" type="submit"></form></center><hr><br>
<span dir='rtl'>
<?php

$sqlb = "SELECT * FROM soal where azed='n' and user='$activeuser14b'";
$resultb = mysqli_query($con, $sqlb);

while($row = mysqli_fetch_assoc($resultb)) 
{
					
$soalasli=$row["matn"];
$shenasoal=$row["id"];
echo '<p style="text-align:right;">';
echo '<font color="red" face="IRANSansWeb-Bold"><a href="hazf.php?id='.$shenasoal.'">حذف</a> سوال ' . $shenasoal . " - </font></p>";
echo $soalasli . '<br>';
$sqlc = "SELECT * FROM gozineha where soal='$shenasoal'";
$resultc = mysqli_query($con, $sqlc);
$kerm=0;
	while($rowb = mysqli_fetch_assoc($resultc)) 
		{
			$kerm=$kerm+1;
			echo '<p style="text-align:right;">' . 'گزینه ';
			echo $kerm;
			if($rowb["dorosti"]=="y"){ echo ' (گزینه درست)'; }
			echo ':</p>';
			echo $rowb["matn"] . "<br>";
			
			
	
		}

echo '<br><hr>';
}
				


?>
</span>
<br><br>
<?php 
}else{ echo '<center>شما مجوز گرفتن آزمون دیگری را ندارید <br> <a href="natayej.php">مشاهده نتایج آزمون های گرفته شده</a></center>'; }
?>
</body>
</html>
<?php 


mysqli_close($con); 
?>
