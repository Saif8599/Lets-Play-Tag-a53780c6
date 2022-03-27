<?php
    include_once('connection.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="new_post_style.css">
    <title>New post</title>
</head>
<body>
<div class="container">
    <a href="index.php"><button>Terug</button></a>
    <div id="header">
        <h1>New post</h1>
    </div>
    <div class="form">
        <form method="POST" action="new_post.php">
            <h2>
                <?php
                    echo "Titel : ";
                    echo "<br><input type='text' name='titel'>";
                ?>
            </h2>
            <h2>
                <?php
                    echo "URL afbeelding : ";
                    echo "<br><input type='text' name='url_afbeelding'>";
                ?>
            </h2>
            <h2>
                <?php
                    echo "Inhoud : ";
                    echo "<br><Textarea rows='6' cols='60' name='inhoud'></textarea>";
                    echo "<br><input class='submit' type='submit' value='submit'>";
                ?>
            </h2>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $titel = $_POST['titel'];
                $url_afbeelding = $_POST['url_afbeelding'];
                $inhoud = $_POST['inhoud'];

                //empty form alert

                if (empty($titel)) {
                    echo "<h3>Vul de lege velden</h3>";
                    exit;
                } elseif (empty($url_afbeelding)) {
                    echo "<h3>Vul de lege velden</h3>";
                    exit;
                } elseif (empty($inhoud)) {
                    echo "<h3>Vul de lege velden</h3>";
                    exit;
                } else {
                    echo "<h3>Post verstuurd</h3>";
                }

                //query
                $sql = "INSERT INTO posts (titel, img_url, inhoud )
                VALUES (:titel, :url_afbeelding, :inhoud)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    'titel' => $titel,
                    'url_afbeelding' => $url_afbeelding,
                    'inhoud' => $inhoud
                ]);

                header("location: index.php");
            }
            ?>
        </form>
    </div>
</div>
</body>
</html>
