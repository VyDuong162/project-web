<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Movie Site</title>
    <style>
        .dongchan {
            background: red;
            color: aliceblue;
        }

        .dongle {
            background: green;
            color: aliceblue;
        }
    </style>
</head>

<body>
    <?php
    define('FAVMOVIE', 'The Life of Brian ');
    echo 'My favorite movie is ' . '<br/>';
    echo FAVMOVIE . '<br/>';
    $FAVMOVIE = 'TITANIC';
    echo 'Your favorite movie is ' . FAVMOVIE . '<br/>';
    echo '--- So chia het cho 2 va 5 ---' . '<br/>';
    for ($i = 1; $i < 100; $i++) {
        if (($i % 2) == 0 && ($i % 5) == 0)
            echo $i . '<br/>';
    }

    ?>
    <?php
    echo '<h1> Tao bang bang dong lap for </h1>';
    echo '<table border="1">';
    for ($i = 0; $i < 4; $i++) {
        echo '<tr>';
        for ($j = 0; $j < 5; $j++) {
            echo '<td>';
            echo "Dòng:{$i} Cột:{$j}";
            echo '</td>';
        }
        echo '</tr>';
    }

    echo '</table>';
    ?>
    
    <h1>Table kết hợp PHP và HTML</h1>
    <table border="1">  
        <?php for ($i = 0; $i < 4; $i++) : ?>
        <?php if (($i % 2) == 0) : ?>
            <tr class="dongchan">
            <?php else : ?>
            <tr class="dongle">
            <?php endif; ?>
                <?php for ($j = 0; $j < 5; $j++) : ?>
                    <td><?php echo "Dòng {$i} cột {$j}"; ?></td>
                <?php endfor; ?> 
            </tr>
        <?php endfor; ?>
    </table>

</body>

</html>