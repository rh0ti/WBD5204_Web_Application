<?php

require_once 'app/init.php';

$itemsQuery = $db->prepare("
SELECT id, name, done
FROM items
WHERE user = :user
");

$itemsQuery->execute([
'user' => $_SESSION ['user_id']
]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Application - Wish List</title>

    <link href="https://fonts.googleapis.com/css?family=Barlow|Cinzel|Julius+Sans+One|Poiret+One|Quicksand|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
    <div class="list">
        <h1 class="header">Wish List</h1>

        <?php if(!empty($items)): ?>
        <ul class="items">
            <?php foreach($items as $item): ?>
                <li>
                    <span class="item<?php echo $item['done'] ? ' done' : '' ?>"><?php echo $item['name']; ?></span>
                    <?php if(!$item['done']): ?>
                        <a href="mark.php?as=done&item=<?php echo $item['id'];?>" class="done-button">Mark as done</a>
                    <?php endif ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php else: ?>
            <p>You haven't added any wishes yet!</p>
        <?php endif; ?>

        <form class="item-add" action="add.php" method="POST">
            <input type="text" name="name" placeholder="Type in a new wish" class="input" autocomplete="off" required>
            <input type="submit" value="Add" class="submit">
        </form>

    </div>
    
</body>
</html>