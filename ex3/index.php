<?php 
session_start();
if (!isset($_SESSION['notes'])){
    $_SESSION['notes'] = [];
}
if (isset($_POST['titre']) && isset($_POST['note'])){
    $_SESSION['notes'][] = ['titre' => $_POST['titre'], 'note' => $_POST['note']]; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keep</title>
    <style>
        .container {
            max-width: 800px;
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;
        }
        .content {
            width: 100%;
        }
        .notes-card {
            width: 100%;
            border: 2px solid black;
            display: flex;
            justify-content: center;
            align-items: stretch;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .notes-card-title {
            min-width: 100%;
            text-align: center;
            margin-bottom: auto;
        }
        .notes-card-item {
            max-width: 200px;
            min-width: 200px;
            margin-left: 10px;
            margin-right: 10px;
            margin-bottom: 10px;
            margin-top: 10px;
            border: 1px solid grey;
        }
        .input-field {
            width: 100%;
            border: none;
            min-height: 50px;
            margin-bottom: 10px;
        }
        .btn {
            width: 100px;
            height: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="notes-card">
                <h3 class="notes-card-title">Notes</h3>
                <?php
                    foreach ($_SESSION['notes'] as $note):
                ?>
                    <div class="notes-card-item">
                        <b><?= $note['titre'] ?></b>
                        <div><?= $note['note'] ?></div>
                    </div>
                <?php
                    endforeach
                ?>
            </div>
            <form action="" method="POST">
                <input type="text" class="input-field" name="titre" placeholder="Titre" required>
                <textarea name="note" class="input-field" rows="2" placeholder="Note" required></textarea>
                <button type="submit" class="btn">Ajouter</button>
            </form>
        </div>
    </div>
</body>
</html>