<?php
try{
    $connect = new PDO("mysql:host=localhost;dbname=workshop2", "root", "");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
try{
    if(isset($_REQUEST['q'])){
        $sql = "SELECT * FROM matieres WHERE intitulé LIKE :q ";
        $statement = $connect->prepare($sql);
        $q = $_REQUEST['q'] . '%';
        $statement->bindParam(':q', $q);
        $statement->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                echo "<a style='display: block; padding: 3px 20px; clear: both; font-weight: 400; line-height: 1.42857143; color: #333; white-space: nowrap; text-decoration: none; background-color: transparent; box-sizing: border-box; '
                onMouseOver='this.style.color=' #262626';this.style.text-decoration='none';this.style='background-color: #f5f5f5';' 
                href='otherprofil.php?id=". $row['id'] ."'>" . $row['intitulé'] . "</a><br/>";
            }
        } else{
            echo "<p style='margin: 0;display: block; padding: 3px 20px; clear: both; font-weight: 400; line-height: 1.42857143; color: #333; white-space: nowrap; text-decoration: none; background-color: transparent; box-sizing: border-box; '
            onMouseOver='this.style.color=' #262626';this.style.text-decoration='none';this.style='background-color: #f5f5f5';>Aucun résultat trouvé !</p>";
        }
    }  
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
unset($statement);
unset($connect);
?>