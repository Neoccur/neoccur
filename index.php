<?php
    $HttpServer = array
    (
        "HostName" => "neoccur.com"
    );

    $HttpClient = array
    (
        "RequestHostName" => $_SERVER["SERVER_NAME"],
        "RequestMethod" => $_SERVER["REQUEST_METHOD"],
        "Language" => "English"
    );

    if ($HttpClient["RequestHostName"] == $HttpServer["HostName"] || $HttpClient["RequestHostName"] == "www".$HttpServer["HostName"])
    {
        if ($HttpClient["RequestMethod"] == "GET")
        {
            if ($HttpClient["Language"] == "English")
            {
                ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Neoccur</title>

        <meta http-equiv="refresh" content="0;URL=http://<?php echo $HttpServer["HostName"]; ?>/en">
    </head>
    <body>
        
    </body>
</html>
                <?php
            }
            else if ($HttpClient["Language"] == "French")
            {
                ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Neoccur</title>

        <meta http-equiv="refresh" content="0;URL=http://<?php echo $HttpServer["HostName"]; ?>/fr">
    </head>
    <body>
        
    </body>
</html>
                <?php
            }
        }
    }
?>
