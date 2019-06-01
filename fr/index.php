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
        "Language" => "French"
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
                    document.location.href="http://<?php echo $HttpServer["HostName"]; ?>/en/";
                }
                else if (Language == 1)
                {
                    // French
                    document.location.href="http://<?php echo $HttpServer["HostName"]; ?>/fr/";
                }
            }
        </script>
    </head>
    <body>
        <div class="NavigationBar">
            <b><a href="home" style="float: left;">Accueil</a></b>
            <b><a href="login" style="float: right;">Connexion</a></b>
            <b><a href="register" style="float: right;">S'enregistrer</a></b>
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
        <div class="Home">
            <center>
                <h1>Bienvenue sur Neoccur</h1>
                <b>“Nous ne rencontrons personne par hasard”</b>
            </center>
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
