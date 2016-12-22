<html>
    <head>
        <title>My first PHP Website</title>
    </head>
    <body>
        <h2>Registration Page</h2>
        <a href="index.php">Click here to go back<br/><br/></a>
		
		
		
		<table border="1" align="center"><tr><td>
        <form action="register.php" method="POST" align ="center">
           Enter Username: <input type="text" name="username" required="required" /> <br/>
		    Enter Email:   <input type="text" name="email" required="required" /> <br/>
           Enter password: <input type="password" name="password" required="required" /> <br/>
           <input type="submit" value="Register"/>
        </form></td></tr></table>
    </body>
</html>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "first_db";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username =($_POST['username']);
	$email = ($_POST['email']);
	$password =($_POST['password']);
    $bool = true;
	}
	// Check connection   //Connect to server
    $conn = new mysqli($servername, $username,$dbname);
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "INSERT INTO users (id,username, email,password )
VALUES ('$id', '$username', 'email','password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	$sql = "SELECT id, username, email,password FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["email"]. " " . $row["password"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
	

	/**mysql_select_db("first_db") or die("Cannot connect to database"); //Connect to database
	$query = mysql_query("Select * from users"); //Query the users table
	while($row = mysql_fetch_array($query)) //display all rows from query
	{
		$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($username == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
			Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
		}
	}
	if($bool) // checks if bool is true
	{
		mysql_query("INSERT INTO users (username,email,password) VALUES ('$username','email','$password')"); //Inserts the value to table users
		Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
		Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
	}
}
?>
