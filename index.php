<?php 
include('phpqrcode/qrlib.php');


 if (isset($_POST['data'])) $data = $_POST['data'];
 else $data = "";
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>QR Code Generator</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <div class="container">
     	<form action="" method="POST">
     		<h1>QR Code Generator</h1>
     		<label>Enter Text or URL</label>
     		<input type="text" 
     		       name="data"
     		       value="<?=$data?>" 
     		       placeholder="Enter your data">

     		<label>Select QR Code Size</label>
     		<select name="size">
     			<option value="500">Small (500x500)</option>
     			<option value="750">Medium (750x750)</option>
     			<option value="1000">Large (1000x1000)</option>
     		</select>

     		<button type="submit">Generate QR Code</button>

     	</form>
     	<div class="qr">
     		<?php if (isset($_POST['data']) && !empty($_POST['data'])) {
     			$data = $_POST['data'];
     			$size = (int)$_POST['size'];

     			$filePath = 'qrcodes/'. uniqid(). '.png';
     			QRcode::png($data, $filePath, QR_ECLEVEL_L, $size/150);
     			echo "<h2>Here is your QR Code:</h2>";
     			echo "<img src='$filePath' alt='QR Code'><br>";
     			echo "<a href='$filePath' download>Download QR Code</a>";
     		}else {
     			echo "<br>No data received!";
     		}
     		?>
     		<!-- ;extension=gd -->
     	</div>
     </div>
</body>
</html>