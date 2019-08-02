<?php
    session_start();

    $Database = array
    (
        "HostName" => "",
        "Name" => "",
        "UserName" => "",
        "UserPassword" => "",
	"TableName" => ""
    );

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // WE SEND THE REGISTRATION FORM TO THE CLIENT

        ?>
<html>
    <head>
        <title>Neoccur</title>
    </head>
    <body>
        <center>
            <form action="/register.php" method="post">
                <h1>Register</h1>

                <p>Username : <input type="text" name="client_name"></p>
                <p>Email : <input type="text" name="client_email"></p>
                <p>Password : <input type="text" name="client_password"></p>

                <input type="submit">Register</input>
            </form>
        </center>
    </body>
</html>
        <?php
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // WE HANDLE THE REGISTRATION REQUEST

        if (isset($_POST["client_name"]) == true && isset($_POST["client_email"]) == true && isset("client_password") == true)
        {
            // OK ALL REQUIRED DATA ARE FILLED

            try
            {
                // CONNECTION TO THE DATABASE

                $MysqlClient = new mysqli($Database["HostName"], $Database["UserName"], $Database["UserPassword"], $Database["Name"]);

                $Client = array
                (
                    "Name" => addslashes($_POST["client_name"]),
                    "Email" => addslashes($_POST["client_email"]),
                    "Password" => addslashes($_POST["client_password"])
                );

                $SqlResult = $MysqlClient->query("SELECT UserToken FROM ".$Database["TableName"]." WHERE UserName = '".$Client["Name"]."';");

                echo(var_dump($SqlResult));
                
                $MysqlClient->close();
            }
            catch
            {
                // ERROR ON DATABASE CONNECTION

                die("Error on database connection");
            }
        }
        else
        {
            // ERROR ALL REQUIRED DATA ARE NOT FILLED

            die("You must fill all required credentials");
        }
    }
    else
    {
        Header("HTTP/1.0 405 Method Not Allowed");
    }
?>
