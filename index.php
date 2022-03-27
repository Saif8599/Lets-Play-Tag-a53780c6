<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <?php
        include 'connection.php';
        $titel = $pdo->query('SELECT titel FROM `posts`');
        $datum = $pdo->query('SELECT datum FROM `posts`');
        $img_url = $pdo->query('SELECT img_url FROM `posts`');
        $inhoud = $pdo->query('SELECT inhoud FROM `posts`');
        # Haal hier alle posts uit de data base op.
    ?>

    <div class="container">

        <div id="header">
            <h1>Foodblog</h1>
            <a href="new_post.php"><button>Nieuwe post</button></a>
        </div>

        <div class="post">

            <div class="header">
                <?php
                    echo "<table>";
                foreach ($titel as $row) {
                    echo "<tr>";
                    echo "<th><h2>" . $row['titel'] . "</h2></th>";
                    echo "</tr>";
                    foreach ($img_url as $rowb) {
                            echo "<tr><td>";
                            echo "<img src='" . $rowb['img_url'] . "'/><br>";
                            echo "</td></tr>";
                            break;
                    }
                    foreach ($datum as $rowa) {
                            echo"<tr>";
                            echo "<td><span> Geschreven op : " . $rowa['datum'] . " door <b>NAAM<b></span><br></td>";
                            echo "</tr>";
                            break;
                    }
                    foreach ($inhoud as $rowc) {
                            echo"<tr>";
                            echo "<td><br>" . $rowc['inhoud'] . "</td>";
                            echo "</tr>";
                            break;
                    }
                }
                echo "</table>";

                ?>
            </div>
    </div>
    </body>
</html>
