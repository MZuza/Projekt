<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Rozgrywki futbolowe</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <div class="baner">
            <h2>Światowe rozgrywki piłkarskie</h2>
            <img src="obraz1.jpg" alt="boisko">
        </div>
        <div class="info">
            <?php
                    $dsn = "mysql:host=localhost;dbname=egzamin";
                    $user="root";
                    $pass="";
                    
                    $polaczenie = new PDO($dsn,$user,$pass);
                    $wynik="SELECT zespol1,zespol2,wynik,data_rozgrywki FROM rozgrywka WHERE zespol1='EVG';";
                    $zapytanie2=$polaczenie->query($wynik);
                    while ($r = $zapytanie2 ->fetch()){
                        echo "<div class='mecze'>";
                        echo "<h3>".$r['zespol1']." - ".$r['zespol2']."</h3>";
                        echo "<h4>".$r['wynik']."</h4>";
                        echo "<p>w dniu: ".$r['data_rozgrywki']."</p>";
                        echo "</div>";
                    }
                    $dsn = null;
            ?>
        </div>
        <div class="glowny">
            <h2>Reprezentacja Polski</h2>
        </div>
        <div class="lewy">
            <p>Podaj pozycję zawodników (1-bramkarze,  2-obrońcy, 3-pomocnicy, 4-  napastnicy):</p>
            <form method="POST" action="futbol.php">
                <input type="number" name="numer">
                <input type="submit" value="Sprawdź" name="przeslij">
            </form>
            <ol>
                <?php
                    $dsn = "mysql:host=localhost;dbname=egzamin";
                    $user="root";
                    $pass="";
                    
                    $polaczenie = new PDO($dsn,$user,$pass);
                    $number = $_POST['numer'];
                    
                        if (!empty($number)){
                            
                            $wynik = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id=$number;";
                            $zapytanie1 = $polaczenie->query($wynik);
                            
                            while($r = $zapytanie1->fetch()){
                            echo "<li><p>".$r['imie']." ".$r['nazwisko']."</p></li>";
                        
                        }
                        }
                        
                    $dsn = null;
                    
                    
                ?>
            </ol>
        </div>
        <div class="prawy">
            <img src="zad1.png" alt="piłkarz">
            <p>Autor: Kryspin Bednarz</p>
        </div>
    </body>
</html>