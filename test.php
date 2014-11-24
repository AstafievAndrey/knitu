<!DOCTYPE html>
<?php
require 'class.php';
Db::rightAutorize();
//if (isset($_SESSION['rating'])) echo $_SESSION['rating'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Тест</title>
        <link href="css/dist/css/bootstrap.css" rel="stylesheet">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <!--/////Основной блок/////-->
        <div class="container">
            <form action="rating.php" style="max-width:600px;margin:0 auto;padding-top:50px;" method="post">
                <?php
                    $con=Db::getInstance();
                    $obj=$con->randQuestions();
                        echo "Вопрос: ".$obj[1]."<br>";
                        echo "<input type='hidden' name='question' value='".$obj[0]."'>";
                        if ($obj[3]==0){
                            $var=$con->getVariant($obj[0]);
                            echo "<input type='hidden' name='type' value='0'>";
                            foreach ($var as $key){
                                echo "<input type='radio' name='answer' checked='checked' value='".$key[0]."'>$key[1]<br>";
                            }
                        }else{
                            echo "<input type='hidden' name='type' value='1'>";
                            $var=$con->getVariant($obj[0]);
                            foreach ($var as $key){
                                echo "<input class='form-control' type='text' name='answer'><br>";
                            }
                        }
                ?>
                <button type="submit" class="btn btn-sm btn-primary">Следующий</button>
            </form>
        </div>
    </body>
</html>


