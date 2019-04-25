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

    function MysqlClientInsert($MysqlInsertTypeList, $MysqlInsertValueList)
    {
        try
        {
            // Retreive the variable assigned data in this function level <-- Applaus ! this is a serious comment +1pt
            global $MysqlServer;

            // The 'addslashes()' method is here to prevent from the SQL Injection attacks... DON'T PLAY PETIT CON WITH ME, JE KNOW ME DEFENDRE ON INTERNET
            $InsertTypeIndex = 0;

            foreach ($MysqlInsertTypeList as &$MysqlInsertType)
            {
                $MysqlInsertTypeList[$InsertTypeIndex] = addslashes($MysqlInsertType);

                $InsertTypeIndex = $InsertTypeIndex + 1;
            }

            $InsertValueIndex = 0;

            foreach ($MysqlInsertValueList as &$MysqlInsertValue)
            {
                $MysqlInsertValueList[$InsertValueIndex] = addslashes($MysqlInsertValue);

                $InsertValueIndex = $InsertValueIndex + 1;
            }

            $InsertType = join(", ", $MysqlInsertTypeList);
            $InsertValue = join(", ", $MysqlInsertValueList);

            // Create the connection beetween the client and the server.
            $MysqlClient = mysqli_connect($MysqlServer["HostName"], $MysqlServer["UserName"], $MysqlServer["UserKey"], $MysqlServer["DatabaseName"]);
            
            // Check if there is any occured error with the created connection
            if ($MysqlClient == true)
            {
                // We retreive the server's response
                $MysqlResponseValue = mysqli_fetch_array(mysqli_query($MysqlClient,"INSERT INTO ".$MysqlServerTableName." (".$InsertType.") VALUES (".$InsertValue.");"));

                // Close properly the connection beetween the client and the server
                mysqli_close($MysqlClient);
                return;
            }

            return false;
        }
        catch (Exception $ExceptionDescription)
        {
            return false;
        }
    }

    function GenerateToken()
    {
        return bin2hex(random_bytes(32));
    }

    function CreateAccount($UserName, $UserEmail, $UserKey)
    {
        $ClientToken = GenerateToken();
        $ClientTokenQueryToken = MysqlClientQuery("UserToken", $ClientToken, "UserName")[0];

        if (isset($ClientTokenQueryToken) && $ClientTokenQueryToken != "")
        {
            $InsertType = ["UserName", "UserEmail", "UserKey", "UserToken"];
            $InsertValue = [$UserName, $UserEmail, $UserKey, $UserToken];

            MysqlClientInsert($InsertType, $InsertValue);
        }
        else
        {
            CreateAccount($UserName, $UserEmail, $UserKey);
        }
    }

    // Retreive the client method to determine the page to send <-- serious comment +1pt
    switch ($HttpClient["RequestMethod"])
    {
        case "GET":
            // Send the register page <-- serious comment but sert à rien, +0.5pt

            if (isset($_SESSION["ClientToken"]))
            {
                $ClientTokenQueryName = MysqlClientQuery("ClientToken", $_SESSION["ClientToken"], "ClientName")[0];

                if (isset($ClientTokenQueryName))
                {
                    HttpClientRedirect($HttpServer["HostUrl"]);
                }
            }

            ?>
<!DOCTYPE html>
<html>
        <head>
            <!-- This is very complex to understand, this is a title ! It's means that when a client connect to the server, he can see the 'Neoccur - Register' title in his tab ! -->
            <title>Neoccur - Register</title>
        </head>
        <body>
            <center>
                <h2>Sign up</h2>
            <?php

                if (isset($_GET["error"]))
                {
                    if ($_GET["error"] == "not_filled_credential")
                    {
            ?>
                <p>Please, fill all the credential</p>
            <?php
                    }
                    else if ($_GET["error"] == "not_valid_credential")
                    {
            ?>
                <p>The username or password is incorrect</p>
            <?php
                    }
                    else if ($_GET["error"] == "not_match_userkey")
                    {
            ?>
                <p>The password don't match with the password verification</p>
            <?php
                    }
                }

            ?>
                <!-- We use the 'POST' method for the authentication system -->
                <form method="post">
                    <br>
                    <p>Username <input class="InputClientName" type="text" name="ClientName"/></p>
                    <p>Email <input class="InputClientEmail" type="text" name="ClientEmail"/></p>
                    <p>Password <input class="InputClientKey" type="password" name="ClientKey"/></p>
                    <p>Repeat password <input class="InputClientKey" type="password" name="ClientKeyCheck"/></p>
                    <br>
                    <input class="SubmitVerify" type="submit" value="Register"/>
                    <br>
                    <p>Already have an account ? <a href="<?php echo "/login"; ?>">Login</a></p>
                </form>
            </center>
        </body>
</html>
            <?php

            break;
        case "POST":

                // So, enfaite this machain chouaitte truc bidule is here to allow the authentication because si non it will be the anarchy thermo nucléaire because there is a lot of singes sur internet.
                if (isset($_POST["ClientName"]) && isset($_POST["ClientEmail"]) && isset($_POST["ClientKey"]) && isset($_POST["ClientKeyCheck"]) && $_POST["ClientName"] != "" && $_POST["ClientEmail"] != "" && $_POST["ClientKey"] != "" && $_POST["ClientKeyCheck"] != "")
                {
                    $ClientNameQueryToken = MysqlClientQuery("UserName", $_POST["ClientName"], "UserToken")[0];
                    $ClientEmailQueryToken = MysqlClientQuery("UserEmail", $_POST["ClientEmail"], "UserToken")[0];

                    // On est des hackers, Ouai! Ah merde ya un système d'authentification, bon bah tampis! ... Geniuses! :D
                    if (isset($ClientNameQueryToken) && $ClientNameQueryToken != "")
                    {
                        HttpClientRedirect("/register?error=not_available_username");
                    }
                    else if ($_POST["ClientKey"] != $_POST["ClientKeyCheck"])
                    {
                        HttpClientRedirect("/register?error=not_match_userkey");
                    }
                    else if (isset($ClientNameQueryToken) && $ClientNameQueryToken != "")
                    {
                        HttpClientRedirect("/register?error=not_available_useremail");
                    }
                    else
                    {
                        CreateAccount($_POST["ClientName"], $_POST["ClientEmail"], $_POST["ClientKey"]);
                        HttpClientRedirect("/");
                    }
                }
                else
                {
                    HttpClientRedirect("/register?error=not_filled_credential");
                }

            break;
        default:
            
            // The method used by the client is not handled by our server, for security reasons we dont interpret it
            // We redirect our client to the main page with the 'GET' method
            HttpClientRedirect("/");

            break;
    }
?>
