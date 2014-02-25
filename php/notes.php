<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$server          = 'localhost';
$username        = 'phpUser';
$password        = 'php-pass';
$database        = 'puzzilla';


$link = mysqli_connect($server, $username, $password);
if(!$link)
  {
    exit('Error: could not establish database connection');
  }

  if(!mysqli_select_db($link, $database))
  {
    exit('Error: could not select the database');
  }

?>

<!DOCTYPE html>
<html>
  <head>
     <title>Puzzilla Notes</title>
     <link rel="stylesheet"  type="text/css" href="notes.css">
     <link rel="stylesheet"  type="text/css" href="/../style.css">
  </head>
  <body>
<div class="navigation">
      <nav>
        <ul>
          <li><a href="/../index.html">Home</a></li>
          <li><a href="/../about.html">About</a></li>
          <li><a href="/../projects.html">Projects</a></li>
          <li><a href="/../contact.html">Contact</a></li>
        </ul>
      </nav>
    </div>
    <h1 style="float:left">Puzzilla Notes</h1>
     <div class="insert">
<form method="POST" action="insert.php" float="left">
        Family Search ID: <input type="text" name="fsid" />&nbsp;
Content: <input type="textfield" style="width:400px;" name="content"/>&nbsp;
        <input type="submit" value="Create Note">
     </form>
     </div>  

	  <table><th>Delete</th><th>Family Search ID</th><th>Note</th><th>Date Created</th>
            

<?php

$sql = "SELECT fsid, content, `date` FROM note";
            
$result = mysqli_query($link, $sql);

if(!$result) 
{
  echo '<br />The database is down, please try again later<br /><br />';
}
else {
  if(mysqli_num_rows($result) == 0) {
    echo 'Something went wrong';
  }
  else {
    while($row = mysqli_fetch_assoc($result)) {
      
      echo '<tr><td class="center"><input type="checkbox" /></td><td class="center">' . $row['fsid'] . '</td><td>' . $row['content'] . '</td><td class="center">' . $row['date'] . '</td></tr>';
    }
echo "</table>";
  }
  }






  

?>

   </body>
</html>
