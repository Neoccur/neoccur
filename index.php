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
            if ($HttpClient["Language"] == "English")
            {
                Header("Location: http://".$HttpServer["HostName"]."/en");
            }
            else if ($HttpClient["Language"] == "French")
            {
                Header("Location: http://".$HttpServer["HostName"]."/fr");
            }
        }
    }
?>
