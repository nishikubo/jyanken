<?php
  session_start();
  
  //もう一回を押したら
    if(isset($_POST["update"])){
  	 if($_POST["update"]=="もう一回"){
      header("Location: janken-result.php");
      exit;
      }
  }
  
  //戻るを押したら
    if(isset($_POST["esc"])){
  	 if($_POST["esc"]=="戻る"){
      header("Location: janken-select.php");
      exit;
      }
  }
  
  //Id取得
  $userid = $_SESSION["USERID"];
  
  //敵の手
  $enemyjanken = array(
  'グー',
  'チョキ',
  'パー'
  );
  
  $enemychois = $enemyjanken[array_rand($enemyjanken)];
  
  //自分の手
  if($_SESSION["JANKEN"]=="グー"){
  $myjanken='グー';
  }
  else if($_SESSION["JANKEN"]=="チョキ"){
  $myjanken='チョキ';
  }
  else if($_SESSION["JANKEN"]=="パー"){
  $myjanken='パー';
  }
  else{
  $myjanken="エラー";
  }
  
      // 勝敗判定
    if ($myjanken === 'グー' && $enemychois === 'チョキ') {
       $result = 'あなたの勝ち';
  		$strwin=file_get_contents("win.txt");
  		$fpwin = fopen("win.txt", "w");
  		fwrite($fpwin, $strwin+"1");
  		fclose($fpwin);        
    } else if ($myjanken === 'グー' && $enemychois === 'グー') {
       $result = 'あいこ';
       $strdrow=file_get_contents("drow.txt");
  		$fpdrow = fopen("drow.txt", "w");
  		fwrite($fpdrow, $strdrow+"1");
  		fclose($fpdrow); 
    } else if ($myjanken === 'グー' && $enemychois === 'パー') {
       $result = 'あなたの負け';
       $strlose=file_get_contents("lose.txt");
  		$fplose = fopen("lose.txt", "w");
  		fwrite($fplose, $strlose+"1");
  		fclose($fplose); 
    } else if ($myjanken === 'チョキ' && $enemychois === 'パー') {
       $result = 'あなたの勝ち';
   		$strwin=file_get_contents("win.txt");
  		$fpwin = fopen("win.txt", "w");
  		fwrite($fpwin, $strwin+"1");
  		fclose($fpwin);   
    } else if ($myjanken === 'チョキ' && $enemychois === 'チョキ') {
       $result = 'あいこ';
       $strdrow=file_get_contents("drow.txt");
  		$fpdrow = fopen("drow.txt", "w");
  		fwrite($fpdrow, $strdrow+"1");
  		fclose($fpdrow); 
    }else if ($myjanken === 'チョキ' && $enemychois === 'グー') {
       $result = 'あなたの負け';
       $strlose=file_get_contents("lose.txt");
  		$fplose = fopen("lose.txt", "w");
  		fwrite($fplose, $strlose+"1");
  		fclose($fplose); 
    }else if ($myjanken === 'パー' && $enemychois === 'グー') {
       $result = 'あなたの勝ち';
  		$strwin=file_get_contents("win.txt");
  		$fpwin = fopen("win.txt", "w");
  		fwrite($fpwin, $strwin+"1");
  		fclose($fpwin);     
    }else if ($myjanken === 'パー' && $enemychois === 'パー') {
       $result = 'あいこ';
       $strdrow=file_get_contents("drow.txt");
  		$fpdrow = fopen("drow.txt", "w");
  		fwrite($fpdrow, $strdrow+"1");
  		fclose($fpdrow); 
    }else if ($myjanken === 'パー' && $enemychois === 'チョキ') {
       $result = 'あなたの負け';
       $strlose=file_get_contents("lose.txt");
  		$fplose = fopen("lose.txt", "w");
  		fwrite($fplose, $strlose+"1");
  		fclose($fplose); 
    }
    else{
    $result = 'エラー';
    }
    
    //リザルト
  $strwinresult=file_get_contents("win.txt");
  $strloseresult=file_get_contents("lose.txt");
  $strdrowresult=file_get_contents("drow.txt");
?>
<!doctype html>
<html>
	<head>
	    <meta charset="UTF-8">
	    <title>じゃんけん結果</title>
	    <style type="text/css">
	    </style>
	</head>
<body>
  <form id="janken-result" name="janken-result" action="<?php print($_SERVER['PHP_SELF']) ?>" method="POST">
			<table>
			<tr>
				<td class="subtext"><?php echo $userid; ?>:<?php echo $myjanken; ?></td>
			</tr>
			<tr>
				<td class="subtext">相手:<?php echo $enemychois; ?></td>
			</tr>
			<tr>
				<td class="subtext"><?php echo $result; ?></td>
			</tr>
			<tr>
				<td class="subtext"><?php echo $strwinresult; ?>勝<?php echo $strloseresult; ?>敗<?php echo $strdrowresult; ?>分け</td>
			</tr>
			<tr>
				<td><input type="submit" id="update" name="update" value="もう一回"></td>
			</tr>
			<tr>
				<td><input type="submit" id="esc" name="esc" value="戻る"></td>
			</tr>
			</table>
</body>
</html>
