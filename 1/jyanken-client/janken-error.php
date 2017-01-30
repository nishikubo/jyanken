<?php
  session_start();
  
  if(isset($_POST["error"])){
  if($_POST["error"]=="戻る"){
      header("Location: janken-select.php");
      exit;
      }
  }

?>
<!doctype html>
<html>
	<head>
	    <meta charset="UTF-8">
	    <title>エラー</title>
	    <style type="text/css">
	    .subtitle{
	    	color: red;
	    }
	    </style>
	</head>
<body>
  <form id="janken-error" name="janken-error" action="<?php print($_SERVER['PHP_SELF']) ?>" method="POST">
  <h1 align="left">エラー</h1>		
  <th><input type="submit" id="error" name="error" value="戻る"></th>
  </form>	
</body>
</html>
