<!doctype html>

<html>

	<head>
		<title>PHP Form</title>
		<meta charset="utf-8">	

		<style>
		.error {
			color: red;
		}
		</style>
		
	</head>

<body>

<?php

// Variables I will use to store inputed data
$name = $website = $position = $experience = $estatus = $comments = "";

// An IF statement to see if user has submited a form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["name"])) {
        echo "<span class=\"error\">Error: First name required</span>";
    }
    
    // Validation: Name can only contain letters and white space
    elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST["name"])) {
        echo "<span class=\"error\">Error: Name can only contain letters</span>";
    }
    
    elseif (empty($_POST["website"])) {
        echo "<span class=\"error\">Error: Website required</span>";
    }
    
    // Validation: Website must be in correct format (www.mysite.com)
    elseif (!preg_match("/\b(?:https?|ftp):\/\/|www\.[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", 
    $_POST["website"])) {
        echo "<span class=\"error\">Error: Website is in wrong format</span>";
    }
    
    else {
    
        $name = val($_POST["name"]);
        $website = val($_POST["website"]);
        $position = val($_POST["position"]);
        $experience = val($_POST["experience"]);
        $estatus = val($_POST["estatus"]);
        $comments = val($_POST["comments"]);
        
    }
}

// A function to validate inputed data
function val($data) {
    $data = trim($data);                // remove any unnecesary spaces, tabs or brakes
    $data = stripslashes($data);        // remove any unnecesary backslashes, thus adding a layer of security
    $data = htmlspecialchars($data);    // to make suredata is transmitted securely
    return $data;
}

?>

<form name="employment" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
 <table width="600" border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td><h2>Employment Application</h2></td>
      <td></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><input type="text" name="name" maxlength="50" />
	  </td>
    </tr>
    <tr>
      <td>Website</td>
      <td><input type="text" name="website" maxlength="50" /></td>
    </tr>
    <tr>
      <td>Position</td>
      <td>
	  
			  <select name="position">
			  
				<option value="Accountant">Accountant</option>
				<option value="Receptionist">Receptionist</option>
				<option value="Administrator">Administrator</option>
				<option value="Supervisor">Supervisor</option>
			  
			  </select>
			  	  
	  </td>
    </tr>
    <tr>
      <td>Experience Level</td>
      <td>
	  
			<select name="experience">
			  
				<option value="Entry Level">Entry Level</option>
				<option value="Some Experience">Some Experience</option>
				<option value="Very Experienced">Very Experienced</option>
			  
			</select>
	  
	  </td>
    </tr>
    <tr>
      <td>Employment Status</td>
      <td>
	  
	  <input type="radio" name="estatus" value="Employed" checked />Employed
	  <input type="radio" name="estatus" value="Unemployed" />Unemployed
	  <input type="radio" name="estatus" value="Student" />Student
	  
	  </td>
    </tr>
    <tr>
      <td>Additional Comments</td>
      <td>
	  
	  <textarea name="comments" cols="45" rows="5"></textarea>
	  
	  </td>
    </tr>
    <tr>
      <td></td>
      <td>
	  
	  <input type="submit" name="submit" value="Submit" />
	  <input type="reset" name="reset" value="Reset" />
	  
	  </td>
    </tr>
  </table>
</form>

<?php 
// Display data 

echo "<h2>User Input:</h2>";
echo "Name: " . $name;
echo "<br>";
echo "Website: " . $website;
echo "<br>";
echo "Position: " . $position;
echo "<br>";
echo "Experience: " . $experience;
echo "<br>";
echo "Employment Status: " . $estatus;
echo "<br>";
echo "Comments: " . $comments;
echo "<br>";
?>

</body>
</html>
