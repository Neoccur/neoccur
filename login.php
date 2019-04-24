<?php
    $HttpServer = array
    (
        "HostName" => "neoccur.com", // It is the ligne de code the most important du server
        "HostUrl" => "http://neoccur.com"
    );

    $MysqlServer = array
    (
        "HostName" => "", // Set the mysql host name
        "UserName" => "", // Set the mysql username
        "UserKey" => "", // Set the mysql database password
        "DatabaseName" => "", // BON TA COMPRIS ! Yes nom dla base..
        "TableName" => "" // flemme d'expliquer...
    );

    $HttpClient = array
    (
        "IpAddress" => $_SERVER["REMOTE_ADDR"],
        "RequestMethod" => $_SERVER["REQUEST_METHOD"]
    );

    // Fonction pas terrible
    function HttpClientRedirect($HttpAddress)
    {
        try
        {
            Header("Location: ".$HttpAddress);
        }
        catch (Exception $ExceptionDescription)
        {
            return;
        }
    }

    // Define a function to query mysql data, Oh my god jure?! c'est not comme si it was written!
    function MysqlClientQuery($MysqlQueryType, $MysqlQueryValue, $MysqlResponseType)
    {
        try
        {
            // Retreive the variable assigned data in this function level <-- Applaus ! this is a serious comment +1pt
            global $MysqlServer;

            // The 'addslashes()' method is here to prevent from the SQL Injection attacks... DON'T PLAY PETIT CON WITH ME, JE KNOW ME DEFENDRE ON INTERNET
            $MysqlQueryType = addslashes($MysqlQueryType);
            $MysqlQueryValue = addslashes($MysqlQueryValue);
            $MysqlResponseType = addslashes($MysqlResponseType);

            // Create the connection beetween the client and the server.
            $MysqlClient = mysqli_connect($MysqlServer["HostName"], $MysqlServer["UserName"], $MysqlServer["UserKey"], $MysqlServer["DatabaseName"]);
            
            // Check if there is any occured error with the created connection
            if ($MysqlClient == true)
            {
                // We retreive the server's response
                $MysqlResponseValue = mysqli_fetch_array(mysqli_query($MysqlClient,"SELECT ".$ResponseType." FROM ".$MysqlServerTableName." WHERE ".$QueryType." = '".$QueryValue."';"));

                // Close properly the connection beetween the client and the server
                mysqli_close($MysqlClient);
                return $ResponseValue;
            }

            return false;
        }
        catch (Exception $ExceptionDescription)
        {
            return false;
        }
    }

    // Retreive the client method to determine the page to send <-- serious comment +1pt
    switch ($HttpClient["RequestMethod"])
    {
        case "GET":
            // Send the login page <-- serious comment but sert à rien, +0.5pt
            ?>
<!DOCTYPE html>
<html>
        <head>
            <!-- This is very complex to understand, this is a title ! It's means that when a client connect to the server, he can see the 'Neoccur - Login' title in his tab ! -->
            <title>Neoccur - Login</title>
        </head>
        <body>
            <center>
                
                <h2>Sign in</h2>

                <!-- We use the 'POST' method for the authentication system -->
                <form method="post">
                    <p>Username <input class="InputClientName" type="text" name="ClientName"/></p>
                    <br>
                    <p>Password <input class="InputClientKey" type="password" name="ClientKey"/></p>
                    <br>
                    <input class="SubmitVerify" type="submit" value="Verify"/>
                </form>
            </center>
        </body>
</html>
            <?php

            break;
        case "POST":

                // So, enfaite this machain chouaitte truc bidule is here to allow the authentication because si non it will be the anarchy thermo nucléaire because there is a lot of singes sur internet.
                if (isset($_POST["ClientName"]) && isset($_POST["ClientKey"]))
                {
                    $ClientNameQueryToken = MysqlClientQuery("UserName", $_POST["ClientName"], "UserToken")[0];
                    $ClientKeyQueryToken = MysqlClientQuery("UserKey", $_POST["ClientKey"], "UserToken")[0];

                    if (isset($ClientNameQueryToken) && isset($ClientKeyQueryToken))
                    {
                        // On est des hackers, Ouai! Ah ya un système d'authentification, bon bah tampis! ... Geniuses! :D
                        if ($ClientNameQueryToken == $ClientKeyQueryToken)
                        {
                            $_SESSION["ClientToken"] = $ClientKeyQueryToken;

                            HttpClientRedirect($HttpServer["HostUrl"]);
                        }
                    }
                    else
                    {
                        HttpClientRedirect($HttpServer["HostUrl"]."/login?error=not_valid_clientname");
                    }
                }
                else
                {
                    HttpClientRedirect($HttpServer["HostUrl"]."/login?error=not_filled_credential");
                }

            break;
        default:
            
            // The method used by the client is not handled by our server, for security reasons we dont interpret it
            // We redirect our client to the main page with the 'GET' method
            HttpClientRedirect($HttpServer["HostUrl"]);

            break;
    }

    // REPARTION DES DIFFERENTES UTILITEES DES LIGNES DE CODE
    // 90% : comments (include 80% stupid comments and only 10% of serious comments. Yes this is not a engineer's book)
    // 10% : code (include 9.99% of code pas terrible and 0.01% of serious code)

    // EVOLUTION DU DEVELOPPEMENT DU CODE
    // Mardi : 3 lignes de codes (à peine)
    // Mercredi : 150 lignes de codes
    // Jeudi : 1 ligne de codes
    // Compte rendu : ON DIRAI LA PUTAIN DE COURBE DU BITCOIN !!!! Mais si non travail très bien réparti sur le temps tout ca tout ca...
    // Vraiment il mérite daitre ingénieur ainformatique cé ain truk de malade
    // Rédigé par une professeur de français pas térrible. Signé Mme Pas terrible.
    // (Mme Pas terrible aurait purgé une peine d'emprisonnement de 50 ans pour avoir commit un attentat en vers la langue française en 1998)

    // CODED BY VADLES (C) COPYRIGHT LE CODEUR HUMOURISTE À 2€
?>
