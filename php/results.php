<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dzień Pi - rezultaty wyszukiwania</title>
</head>
<body>
    <h2>Dzień Pi - rezultaty wyszukiwania</h2>
    <?php
        $search_metchod = $_REQUEST['search_metchod'];
        $phraze = $_REQUEST['phraze'];

        $phraze = trim($phraze);

        if(!$search_metchod || !$phraze){
            echo "Brak parametrów wyszukiwania </body></html>";
            exit;
        }

        //Nazwiązywanie połączenia z metodą obietową
        @ $db = new mysqli('localhost', 'root', '', 'ksiazki');
        if(mysqli_connect_errno()){
            echo "Połączenie nie powiodło się";
            exit;
        }
        $sqlQuery = "SELECT * FROM attempts WHERE ".$search_method." LIKE '%".$phraze."%'";
        echo $sqlQuery;

        //Wysyłąnie zapytania do bazy danych i odebranie wyników
        $result = $db -> query($sqlQuery);
        $search_results_count = $result -> num_rows;
        echo "<p>Znalezionych pozycji: $search_results_count </p>";
        for($i = 0; $i < $search_results_count; $i++){
            $row = $result -> fetch_assoc();
            /*echo "<p>".($i+1)."Tytuł: ";
            echo $row['tytul'];
            echo "</br>Autor";
            echo $row['autor'];
            echo "</br>ISBN";
            echo $row['isbn'];
            echo "</br>Cena";
            echo $row['cena'];
            echo "</p>";*/
        }
    ?>
</body>
</html>