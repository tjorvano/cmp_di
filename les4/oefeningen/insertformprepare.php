<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="insertform.php" method="post">
       <p> Familienaam: <input type="text" name="familienaam"> </p>
        <p> Voornaam:  <input type="text" name="voornaam"> </p>
        <p> Email: <input type="text" name="email"> </p>
       <p> Bericht <textarea rows="4" cols="50" name="bericht"></textarea> </p>


        <input type="submit">
    </form>


    <?php 
    require_once '../connectie.php';
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            echo "post";
            $familienaam = $_POST['familienaam'];
            $voornaam = $_POST['voornaam'];
            $email = $_POST['email'];
            $bericht = $_POST['bericht'];

            $statement = $db->prepare("INSERT INTO gebruiker (voornaam, familienaam, email, bericht)
                    VALUES (':voornaam', ':familienaam', ':email', ':bericht')");
            $statement->execute(array(
                "voornaam" => $voornaam,
                "familienaam" => $familienaam,
                "familienaam" => $email,
                "familienaam" => $bericht,

            ));       

           /* $sql = "INSERT INTO gebruiker (voornaam, familienaam, email, bericht)
                    VALUES ('$voornaam', '$familienaam', '$email', '$bericht')";
                    */
          
                try{
                   // $db->query($sql);
                  //  echo "succes<br>";
                  //  $last_id = $db->LastInsertId();
                   // echo "Laatste toevoeging id :  ".$last_id . "<br>";

                }catch(PDOException $e){
                    echo $e->getMessage();
                     }
        } 
    ?>

</body>
</html>