<?php include_once "src/scripts/genTables.php"; ?>
<!DOCTYPE html>
<html lang="ru-en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/style/index.css">
		<link rel="stylesheet" href="assets/style/table.css">
    <title>OfficeManager</title>
</head>
<body>
	<?php include_once "src/template/header.php"?>

	<main>

		<?php

			if(!isset($_GET['tables'])){
				echo "Нажми на название таблицы";
			}else{
				GenerationTable($conn , $_GET['tables']);
			}
			
		?>
	</main>

	<?php include_once "src/template/footer.php"?>
</body>
</html>