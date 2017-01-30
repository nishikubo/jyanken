<?php
  session_start();
  
  if(isset($_POST["login"])){
  if($_POST["login"]=="ログイン"&&$_POST["userid"]!=""&&$_POST["rajanken"]!=""){
      $_SESSION["JANKEN"] = $_POST["rajanken"];
      $_SESSION["USERID"] = $_POST["userid"];
      header("Location: janken-result.php");
      exit;
      }
      else{
      header("Location: janken-error.php");
      exit;
      }
  }

?>
<!doctype html>
<html>
	<head>
	    <meta charset="UTF-8">
	    <title>じゃんけん</title>
	    <style type="text/css">
	    .subtitle{
	    	color: red;
	    }
	    </style>
	</head>
<body>
  <form id="Chat-Login" name="Chat-Login" action="<?php print($_SERVER['PHP_SELF']) ?>" method="POST">
  <h1 align="left">じゃんけん</h1>		
  <label for="userid">あなたのIDを入力</label><input type="text" id="userid" name="userid" value=""><br>
  <label for="janken">何を出す？</label><br>
  <input type=radio id="rajanken" name="rajanken" value="グー">グー<br>
  <input type=radio id="rajanken" name="rajanken"  value="チョキ">チョキ<br>
  <input type=radio id="rajanken" name="rajanken" value="パー">パー<br>
  <th><input type="submit" id="login" name="login" value="ログイン"></th>
  </form>	
</body>
</html>
