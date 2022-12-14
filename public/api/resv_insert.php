<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

  	
	try{
		require_once("./connect_cgd103g1.php");
		//sql 指令
		$sql = "insert into tibamefe_cgd103g1.reservation values( null, :rsv_date, :rsv_ppl, :rsv_name, :rsv_mobile, :rsv_email, :rsv_status, :rsv_ps )";

		//編譯, 執行
		$reservation = $pdo->prepare($sql);
		$reservation->bindValue(":rsv_date", $_POST["rsv_date"]);
		$reservation->bindValue(":rsv_ppl", $_POST["rsv_ppl"]);
		$reservation->bindValue(":rsv_name", $_POST["rsv_name"]);
		$reservation->bindValue(":rsv_mobile", $_POST["rsv_mobile"]);
		$reservation->bindValue(":rsv_email", $_POST["rsv_email"]);
		$reservation->bindValue(":rsv_status", $_POST["rsv_status"]);
		$reservation->bindValue(":rsv_ps", $_POST["rsv_ps"]);
		$reservation->execute();
		
	    $msg = "success";
	} catch (PDOException $e) {
		$msg = "error_line: ".$e->getLine().", error_msg: ".$e->getMessage();
	}	


//輸出結果
$result=["msg"=>$msg];
echo json_encode($result);

?>    