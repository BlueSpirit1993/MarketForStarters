//MarketForStarters
//index.php
//Version:1.0
//Date Modified: 07/19/2020

<?php
require once __DIR__ . '/config.php';
class API {
	function Select(){
		$db = new Connect;
		$users = array();
		$data = $db->prepare('SELECT * FROM users ORDER BY id');
		$data->execute();
		while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
			$users[$OutputData['id']] = array(
				'id' => $OutputData['id'],
				'name' => $OutputData['name'],
				'age' => $OutputData['age']
			);
		}
		return json_encode($users);
	}
}

$API = new API;
header('Content-Type: application/json');
echo $API->Select();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Trader Home Page</title>
</head>
<body>
</body>
</html>
