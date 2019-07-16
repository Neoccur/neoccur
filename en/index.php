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
        <div class="WhiteBackground">
            <div class="Home">

                <center>
                    <div class="neoccur_Header">
                        <h1>neoccur</h1>
                    </div>
                    <br><br><br><br>
                    <b>“We don't meet anyone by chance” <br><br>         --Avijeet Das</b>
                </center>
                <br><br><br>
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
