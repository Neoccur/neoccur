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
        <link rel="stylesheet" type="text/css" href="en/styles.css">

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
            <b><a href="home" style="float: left;">Home</a></b>
            <b><a href="login" style="float: right;">Log in</a></b>
            <b><a href="register" style="float: right;">Sign up</a></b>
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
                <h1>Welcome to Neoccur</h1>
                <b>“We don't meet anyone by chance” <br>         --Avijeet Das</b>
            </center>
            <div id="slideshow">
                <div class="slide-wrapper">
                    <div class="slide"><h1 class="slide-number">1</h1></div>
                    <div class="slide"><h1 class="slide-number">2</h1></div>
                    <div class="slide"><h1 class="slide-number">3</h1></div>
                    <div class="slide"><h1 class="slide-number">4</h1></div>
                    <div class="slide"><h1 class="slide-number">5</h1></div>
                </div>
            </div>
            <h1>Just a simple slideshow. CSS only, no JS</h1>
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
