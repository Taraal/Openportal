<?php

session_start();

if(isset($_SESSION['id'])) {

?>
<?php 

$connect = new PDO("mysql:host=localhost;dbname=workshop2;charset=utf8", "root", "");

$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $connect->query("SELECT * FROM matieres");


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OpenPortal - Compétences</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Aldrich|Questrial" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
    .highlighted{
        
    }
    </style>
</head>

<body>
    <header>
        <div class="disconnection">
            <a href="../module/traitement-deconnection.php">
                <img src="img/disconnection.svg" alt="" class="disconnection_icon">
            </a>
        </div>
        <img src="img/openportal_logo.svg" alt="OP" class="logo">
        <h1 class="title">OpenPortal</h1>
        <p class="baseline">Osez aller au-delà de vous-même</p>
    </header>
    <main class="main-board">
    <button id="btn-courses">Compétences</button>
        <div class="left_list">
            <section class="courses_followed-list">
                <h3 class="board_title">Mes cours</h3>
                    <ul class="list-group connectedSortable" id="sortable3" style=" height:400px">
                        
                    </ul>
            </section>
            <section class="courses_taught-list">
                <h3 class="board_title">Matières enseignées</h3>
                    <ul class="list-group connectedSortable" id="sortable1" style="height:400px">
                        
                    </ul>
            </section>
        </div>
        <div class="right_list">
            <section class="courses-list">
                <h3 class="board_title">Compétences</h3>
                <form action="" id="search-courses">
                        <input type="text" name="category" id="categoryfilter" placeholder="Compétence">
                        <img src="img/search_icon.svg" alt="" id="search_submit">
                </form>
                <ul class="list-group filter" id="filter">
                <?php
           
           while ($matiere = $statement->fetch()) {
               
            echo  "<li class='list-group-item course ' id='".$matiere['id']."'><a href='page-matiere.php?id=".$matiere['id']."&nom=".$matiere['intitule']."'><span>".$matiere['intitule']."</span></a></li>";

        }
           
           $statement->closeCursor();
           
           ?>
                </ul>
            </section>
        </div>
    </main>
    <section class="chat-window">
            <h3 class="chat_title">CHAT</h3>
            <div class="send">
                <h4 class="name_sender">Elian Bourdu</h4>
                <p class="message">blablabla</p>
            </div>
            <div class="receive">
                <h4 class="name_receiver">Anaïs TATIBOUET</h4>
                <p class="message">blablabla</p>
            </div>
            <div class="receive">
                <h4 class="name_receiver">Anaïs TATIBOUET</h4>
                <p class="message">blablabla</p>
            </div>
            <div class="send">
                <h4 class="name_sender">Elian Bourdu</h4>
                <p class="message">blablabla</p>
            </div>
            <div class="send-message-container">
                <form action="" method="post">
                    <input type="text" name="" id="send_msg" placeholder="Votre message" class="form-control">
                    <button class="btn-send-msg" type="submit">Envoyer</button>
                </form>
            </div>
     </section>
    <section class="chat">
            <div class="chat_button">
                <img src="img/speech-bubble.svg" id="speach_icon" alt="chat">
            </div>
            <a href="Myprofile.php">Mypofil</a>
        </section>
        <a href="profile.php?id=2">test profil</a>
    <footer>
        <p>Alexandre CAILLER - Elian BOURDU</p>
        <p>Sylouan CORFA - Anaïs TATIBOUËT</p>
        <p>Workshop 2018 - B1</p>
    </footer>
        
   
    <script src="js/script.js"></script>
    <script src="js/main.js"></script> 
</body>

</html>

<script>

       /* $(document).ready(function(){

            $(".block").draggable();

        });*/

        /*$(document).ready(function(){
            $("#filter").sortable({connectWith:"#items"}).disableSelection();
            $("#filter").sortable({connectWith:"#professeur"}).disableSelection();
        });*/

        $(function(){
            $( "#filter, #sortable1" ).sortable({
                connectWith: ".connectedSortable"
            }).disableSelection(); 
        });
  
        $(function(){
            $( "#filter, #sortable3" ).sortable({
                connectWith: ".connectedSortable"
            }).disableSelection();
        });
        
        /*$(document).ready(function(){
            $("#myAccordion").accordion();
            $(".source li").draggable({helper:"clone"});
            $("#cart").droppable({drop:function(event,ui){
                $("#items").append($("<li></li>").text(ui.dragable.text()));
            }});
        });*/
        

        
</script>

<?php 

} else {

    header('location: index.php?error1=Vous devez vous connecter pour voir votre profil');
    
}

?>