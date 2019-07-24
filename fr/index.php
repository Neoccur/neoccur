<?php
    $HttpServer = array
    (
        "HostName" => "neoccur.com"
    );

    $HttpClient = array
    (
        "RequestHostName" => $_SERVER["SERVER_NAME"],
        "RequestMethod" => $_SERVER["REQUEST_METHOD"],
        "Token" => $_SESSION["ClientToken"],
        "Language" => "English"
    );

    if ($HttpClient["RequestHostName"] == $HttpServer["HostName"])
    {
        if ($HttpClient["RequestMethod"] == "GET")
        {
            ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Neoccur</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="../assets/styles/original.css">

        <script>
            function LanguageClickEvent(Language)
            {
                if (Language == 0)
                {
                    // English
                    document.location.href="http://neoccur.com/en/";
                }
                else if (Language == 1)
                {
                    // French
                    document.location.href="http://neoccur.com/fr/";
                }
            }
        </script>
    </head>
    <body>
        <div class="NavigationBar">
            <b><a href="index.html" style="float: left;">Accueil</a></b>
            <b><a href="/login/index.php" style="float: right;">Connexion</a></b>
            <b><a href="/register/index.php" style="float: right;">Inscription</a></b>
            <div style="float: right;" id="MenuSlide">
                <li>
                    <img class="Language" src="../assets/icons/language.png" alt="Language"/>
                    <ul>
                        <li onclick="LanguageClickEvent(0);"><img src="../assets/icons/flags/us.png" width="38px" height="auto" alt="EN"/></li>
                        <li onclick="LanguageClickEvent(1);"><img src="../assets/icons/flags/fr.png" width="38px" height="auto" alt="FR"/></li>
                    </ul>
                </li>
            </div>
        </div>
        <div class="WhiteBackground">  
            <div class="Home">

                <center>
                    
                    <div class="neoccur_Header">
                        <img src="../assets/images/neoccur_logo.png" alt="neoccur">
                    </div>
                    
                    <br><br><br><br><br><br><br>
                    
                    <div class="quote">
                        <b>“Nous ne recontrons personne par hasard” <br><br>         --Avijeet Das</b>
                    </div>

                    <div class="red_line"></div>

                    <div class="questions">
                        <div class="question_1">
                        </div>

                        <div class="question_2">
                            <div class="triangle_1"></div>
                        </div>
                        
                        <div class="question_3">
                            <div class="triangle_2"></div>
                        </div>
                    </div>

                </center>
            </div>
        </div>
    </body>
</html>
            <?php
        }
        else
        {

        }
    }
?>
