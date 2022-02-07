<?php
    require_once __DIR__ .'/Department.php';
    require_once __DIR__.'/database.php';
    $sql = $connection->prepare('SELECT * FROM departments WHERE id = ?');
    $sql-> bind_param('d',$id);

    $id = $_GET['id'];
    $sql->execute();
    $result = $sql -> get_result();

    if($result && $result->num_rows > 0){
        $departments = [];
        while( $row = $result->fetch_assoc()) {
            $department = new Department();
            $department->id = $row['id'];
            $department->name = $row['name'];
            $department->mail = $row['mail'];
            $department->address = $row['address'];
            $department->website = $row['website'];
            $department->phone = $row['phone'];
            $department->head_of_department = $row['head_of_department'];
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
        <li>
            <?php echo $department-> name; ?>
            <?php echo $department-> mail; ?>
            <?php echo $department-> address; ?>
            <?php echo $department-> website; ?>
            <?php echo $department-> phone; ?>
            <?php echo $department-> head_of_department; ?>
        </li> 
        <?php } ?>
    </ul>
</body>
</html>