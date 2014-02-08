<!DOCTYPE html>
<html>
<head>
   <title>Puzzilla Notes</title>
   <script type="text/javascript" src="puzzillaNotes.js"></script>
   
</head>

<body>

<form id="notes">

<select name="familySearchId" onchange="handleChange(this);">

<?php

   require_once("dbInfo.php");

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbDatabase);

if ($conn->connect_errno)
  {
    echo "Failed to connect!" . $conn->connect_error;
  }

$results = $conn->query("SELECT id, content FROM note");

while ($row = $results->fetch_assoc())
  {
    echo "<option value = \"" . $row["id"] . "\">" . $row["userId"] . "</option>\n";
  }

?>
</select>
</form>
</body>


</html>