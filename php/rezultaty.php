<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>Książkorama - rezultaty wyszukiwania</h2>
    <?php
        $metoda_szukania = $_REQUEST['metoda_szukania'];
        $wyrazenie = $_REQUEST['wyrazenie'];

        $wyrazenie = trim($wyrazenie);

        if(!$metoda_szukania || !$wyrazenie){
            echo "Brak parametrów wyszukiwania </body></html>";
            exit;
        }

        //Nazwiązywanie połączenia z metodą obietową
        @ $db = new mysqli('localhost', 'root', '', 'ksiazki');
        if(mysqli_connect_errno()){
            echo "Połączenie nie powiodło się";
            exit;
        }
        $zapytanie = "select * from ksiazki where ".$metoda_szukania." like '%".$wyrazenie."%'";
        echo $zapytanie;

        //Wysyłąnie zapytania do bazy danych i odebranie wyników
        $wynik = $db -> query($zapytanie);
        $ile_znalezionych = $wynik -> num_rows;
        echo "<p>Znalezionych pozycji: $ile_znalezionych </p>";
        for($i = 0; $i < $ile_znalezionych; $i++){
            $wiersz = $wynik -> fetch_assoc();
            echo "<p>".($i+1)."Tytuł: ";
            echo $wiersz['tytul'];
            echo "</br>Autor";
            echo $wiersz['autor'];
            echo "</br>ISBN";
            echo $wiersz['isbn'];
            echo "</br>Cena";
            echo $wiersz['cena'];
            echo "</p>";
        }
    ?>
</body>
</html>