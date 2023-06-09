<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>予約入力</title>
	</head>
	<body>
	    <?php

			require_once '_database_conf.php';
			require_once '_h.php';

			try
			{
				$db = new PDO($dsn, $dbUser, $dbPass);
				$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql='SELECT * FROM kyouzai ';
				$stmt=$db->prepare($sql);
				$stmt->execute();

				$db=null;

				while(true)
					{
					$rec=$stmt->fetch(PDO::FETCH_ASSOC);
					if($rec==false)
					{
					break;
					}
					print h($rec['科目名']).' ';
					print h($rec['教科書名']).' ';
					print h($rec['出版社']);
					print h($rec['値段']).' ';
					print '<br />';
					}
			}
			catch(Exception $e)
		{
			echo'エラーが発生しました。内容:'.h($e->getMessage());
			exit();
		}
			?>
			<form method="post">
			学籍番号入力<br/>
			<input type="text" name="name" style="width:100px"><br/>
			氏名入力<br/>
			<input type="text" name="name" style="width:100px"><br/>

			<select name="select">
			<option value="9:00-9:15" selected>9:00-9:15</option>
			<option value="9:15-9:30" selected>9:15-9:30</option>
			</select>


				
	</body>
</html>