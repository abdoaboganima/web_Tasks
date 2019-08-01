<!DOCTYPE html>

<html>
<head>
    <meta charset=UTF-8 >
    <title>To-Do-List</title>

</head>

<body>


<form method=get >
   <input type=text  name=name placeholder=Enter a task>
   <input type=submit value=Add>
</form>

<div style="border : 2px solid black">
<ul>
 <?php
    
    
    echo "<li>";
    print "You entered ".$_GET["name"]."<br>";
    
    
    
 ?>
 </ul>
 
<div>



</body>

</html>