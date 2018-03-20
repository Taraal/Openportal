<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OpenPortal - Profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Aldrich|Questrial" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="disconnection">
            <a href="#">
                <img src="img/disconnection.svg" alt="" class="disconnection_icon">
            </a>
        </div>
        <img src="img/openportal_logo.svg" alt="OP" id="logo">
        <h1 class="title">OpenPortal</h1>
    </header>
    <main class="main-board">
        <div class="left_list">
            <section class="courses_followed-list">
                <h3 class="board_title">Mes cours</h3>
                    <ul class="list-group">
                        <li class="list-group-item course_followed"><a href="#">Compétence</a></li>
                        <li class="list-group-item course_followed"><a href="#">Compétence</a></li>
                        <li class="list-group-item course_followed"><a href="#">Compétence</a></li>
                        <li class="list-group-item course_followed"><a href="#">Compétence</a></li>
                        <li class="list-group-item course_followed"><a href="#">Compétence</a></li>
                        <li class="list-group-item course_followed"><a href="#">Compétence</a></li>
                        <li class="list-group-item course_followed"><a href="#">Compétence</a></li>
                    </ul>
            </section>
            <section class="courses_taught-list">
                <h3 class="board_title">Matières enseignées</h3>
                    <ul class="list-group">
                        <li class="list-group-item course_taught"><a href="#">Programmation Web</a></li>
                        <li class="list-group-item course_taught"><a href="#">Compétence</a></li>
                        <li class="list-group-item course_taught"><a href="#">Compétence</a></li>
                        <li class="list-group-item course_taught"><a href="#">Compétence</a></li>
                        <li class="list-group-item course_taught"><a href="#">Compétence</a></li>
                        <li class="list-group-item course_taught"><a href="#">Compétence</a></li>
                        <li class="list-group-item course_taught"><a href="#">Compétence</a></li>
                    </ul>
            </section>
        </div>
        <div class="right_list">
            <section class="courses-list">
                <h3 class="board_title">Compétences</h3>
                <form action="" id="search-courses">
                        <input type="search" name="" id="search_courses" placeholder="Compétence">
                        <input type="submit" value="Rechercher" id="search_submit">
                </form>
                <ul class="list-group">
                    <li class="list-group-item course"><a href="#">Compétence</a></li>
                    <li class="list-group-item course"><a href="#">Compétence</a></li>
                    <li class="list-group-item course"><a href="#">Compétence</a></li>
                    <li class="list-group-item course"><a href="#">Compétence</a></li>
                    <li class="list-group-item course"><a href="#">Compétence</a></li>
                    <li class="list-group-item course"><a href="#">Compétence</a></li>
                    <li class="list-group-item course"><a href="#">Compétence</a></li>
                    <li class="list-group-item course"><a href="#">Compétence</a></li>
                    <li class="list-group-item course"><a href="#">Compétence</a></li>
                    <li class="list-group-item course"><a href="#">Compétence</a></li>
                    <li class="list-group-item course"><a href="#">Compétence</a></li>
                    <li class="list-group-item course"><a href="#">Compétence</a></li>
                    <li class="list-group-item course"><a href="#">Compétence</a></li>
                    <li class="list-group-item course"><a href="#">Compétence</a></li>
                    <li class="list-group-item course"><a href="#">Compétence</a></li>
                    <li class="list-group-item course"><a href="#">Compétence</a></li>
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
                <a href=""><img src="img/speech-bubble.svg" id="speach_icon" alt="chat"></a>
            </div>
        </section>
    <footer>
        <p>Alexandre CAILLER - Elian BOURDU</p>
        <p>Sylouan CORFA - Anaïs TATIBOUËT</p>
        <p>Workshop 2018 - B1</p>
    </footer>
    <script src="js/main.js"></script>
</body>

</html>