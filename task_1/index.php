<?php
    $pdo = new PDO("mysql:host=localhost;dbname=mydb;charset=utf8","root","123456789");

    if(isset($_POST['submit']) ){
        $name = $_POST['name'];
        $sth = $pdo->prepare("INSERT INTO todos (name) VALUES (:name)");
        $sth->bindValue(':name', $name, PDO::PARAM_STR);
        $sth->execute();
    }elseif(isset($_POST['delete'])){
        $id = $_POST['id'];
        $sth = $pdo->prepare("delete from todos where id = :id");
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
    }
?>

<!DOCTYPE HTML>
<html >
<head>
    <title>Todo List </title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
</head>

<body class="container" style="background-color:#e9d8f4">
    <h1 style="font-weight:bold;">Todo List</h1>
    <form method="post" action="">
        <input type="text" name="name" value="" placeholder="Enter your task ;)">
        <input type="submit" name="submit" value="Add">
    </form>
    <h2 align="center">Current Todos</h2>
    <div style="  align-items: center; border :2px solid black;margin:10px;padding:20px;" >
    <table class="table table-striped">
        <thead><th>Task</th><th></th></thead>
        <tbody>
<?php
    $sth = $pdo->prepare("SELECT * FROM todos ORDER BY id DESC");
    $sth->execute();
    
    foreach($sth as $row) {
?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td>
                    <form method="POST">
                        <button type="submit" name="delete">Delete</button>
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="delete" value="true">
                    </form>
                </td>
            </tr>
<?php
    }
?>
        </tbody>
    </table>
    </div>
    <h3 >Follow me :D </h3>
    <a href="https://fb.com/abdoaboganimaa" target="_blank"><img src="fb.png" height=30px></a>
    <h3>Project link</h3>
    <a href="https://github.com/abdoaboganima" target="_blank"><img src="git.png" height=40px></a>
</body>
</html>