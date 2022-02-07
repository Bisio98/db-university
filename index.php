<?php
    require_once __DIR__ .'/Department.php';
    require_once __DIR__.'/database.php';

    $sql = 'SELECT * FROM `departments`';
    $result = $connection->query($sql);
    
    if($result && $result->num_rows > 0){
        $departments = [];
        while( $row = $result->fetch_assoc()) {
            $department = new Department();
            $department->id = $row['id'];
            $department->name = $row['name'];
            $departments[] = $department;
        }
    } elseif($result) {
        echo 'Risultati non presenti per questa pagina';
    } else {
        echo 'Errore di query';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Università</title>
</head>
<body>
    <ul><?php foreach ($departments as $department) { ?>
        <li><a href="department-details.php?id=<?php echo $department->id ?>"><?php echo $department-> name?></a></li> 
        <?php } ?>
    </ul>
</body>
</html>