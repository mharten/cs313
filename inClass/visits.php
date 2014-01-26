<?php
$key = "visits";
$visits = 0;

if (isset($_COOKIE[$key]))
  {     
    //not the first time                                                        
    $visits = $_COOKIE[$key];
  }
else
  {
    //the first time                                                            
    $visits = 0;
  }

$visits++;

setcookie($key, $visits, time() + 6000);

?>

<!DOCTYPE html>
<head>
<title>asdf</title>
</head>
<body>
<p>This is a paragraph</p>

<?php

echo "Yes it is! You have visited $visits times";

?>


</body>
</html>