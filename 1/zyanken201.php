<html>
	<head>
		<title>jyanken</title>
	</head>
	<body>

		<?php
  		if(isset($_POST['loginid'])){
  		$loginid=$_POST['loginid'];
  		}
  		else {
  		$loginid="";
  		}
  		
  		
  		if(isset($_POST['ipadress'])){
  		$ipadress=$_POST['ipadress'];
  		}
  		else {
  		$ipadress="";
  		}
		?>
		
		<div>
		<form action="zyanken201.php" name="form1" method="post">
		<?php print $_REQUEST['loginid']; ?>
  		<input name="comment" type="text">
  		<input name="loginid" type="hidden" value= $loginid >
  		<input type="submit" name="fSub1" value="Write">
  		<br>
			<hr>
			<script>
			function koshin(){
			  location.reload();
			}
			</script>
			<input type="submit" value="Refresh" onclick="koshin()">
  			<div> <?php print $_REQUEST['loginid']; ?></div>
  		  		
  		</form> 
 


   		

  		</div>
	</body>
</html>
