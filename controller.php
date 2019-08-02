<!DOCTYPE html>
<html>
  <head>
    <title>Neoccur - controller</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="assets/styles/original.css" />
    <link rel="stylesheet" type="text/css" href="assets/styles/register.css" />
    <!-- Bootstrap and font awesome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous" />
    <!-- The JavaScript library in main.js -->
    <script src="main.js"></script>
  </head>
  <body class="sign-body">
    <nav class="NavigationBar nav-scroll" id="myNav">
      <div class="nav-links">
        <a href="index.html">Home</a>
      </div>
      <div class="nav-link nav-logo">
        <a href="#">
          <img src="assets/images/logo.svg" alt="logo" width="50px" />
        </a>
      </div>
      <div class="nav-links">
        <div id="MenuSlide">
          <li>
            <img class="Language" src="assets/images/language.png" alt="Language" />
            <ul>
              <li onclick="languageClickEvent('en');"><img src="assets/images/flags/us.png" width="38px" height="auto" alt="EN" /></li>
              <li onclick="languageClickEvent('fr');"><img src="assets/images/flags/fr.png" width="38px" height="auto" alt="FR" /></li>
            </ul>
          </li>
        </div>
        <a href="register.php">Sign up</a>
        <a href="login.php">Log in</a>
      </div>
    </nav>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // Handle GET Method here
}
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{

$username = addslashes($_POST["username"]);
$email = addslashes($_POST["email"]);
$password = addslashes($_POST["password"]);

if (!empty($username) || !empty($email) || !empty($password)) {
      // connection
	$host = "neoccurcecdev.mysql.db";
	$dbUsername = "neoccurcecdev";
	$dbpassword = "devPasswordNeoccur150";
	$dbname = "Authentification";

      //createconnection
	$conn = new mysqli($host, $dbUsername, $dbpassword, $dbname);
	if (mysqli_connect_error()) {
		die('connect error(' . mysqli_connnect_errorno() . ')' . mysqli_connect_error());
	} else {
		$SELECT = "SELECT email from users where email = ? limit 1;";
		$INSERT = "INSERT INTO `users`( `username`, `email`, `password`) VALUES ( ?, ?, ?);";

          //prepare statment
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
		$stmt->bind_result();
		$rnum = $stmt->num_rows;

		if ($rnum == 0) {
			$stmt->close();

			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$username = "welcome $username";
			$email = "you email addres is $email, this is a test bla bla bla, this will be the welcome page.. ish";
		} else {
			echo "<p> hello! this is the error and here is the same form, just that its red (because the user had a problem)";
			die();
		}
	}
  }
}



?>

1
    <!-- Optional JavaScript for bootstrap and font awesome-->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>




