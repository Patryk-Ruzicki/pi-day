<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dzień Pi - Wstawianie</title>
    <style>
        table {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h2>Dzień Pi - rezultaty</h2>
    <?php
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $Class = $_POST['Class'];

        $FirstName = trim($FirstName);
        $LastName = trim($LastName);
        $Class = trim($Class);

        $FirstName = addslashes($FirstName);
        $LastName = addslashes($LastName);
        $Class = addslashes($Class);

        @ $db = new mysqli('localhost', 'root', '', 'pi_day');
        if(mysqli_connect_errno()){
            echo "Błąd połączenia z bazą danych!";
            exit;
        }

        $sqlQuery = "SELECT MAX(students.StudentID) FROM `students`";
        $wynik = $db -> query($sqlQuery);
        $StudentID = $wynik -> fetch_row();
        $StudentID = intval($StudentID[0]); echo $StudentID[0]."<br>";
        $StudentID++; echo $StudentID."<br>";

        $sqlCode = "INSERT INTO students VALUES ('".$StudentID."', '".$FirstName."', '".$LastName."', '".$Class."')<br>";
        echo $sqlCode;

        $result = $db -> query($sqlCode);
        if($result){
            echo $db -> affected_rows." student zapisany do bazy.";
        }else{
            echo "Błąd. Uczeń nie został zapisany do bazy. <br>";
            echo mysqli_error($db);
        }
        $db -> close();
    ?>
</body>
</html>
