<!DOCTYPE html>
<html>

<head>
	
<meta name="google-translate-customization" content="a420b98ebeb45ff-5ad8a028603c954d-g6b96ed87fdce08e3-4a"></meta>
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<link rel = "stylesheet" type = "text/css" href = "style.css"/> 
</head>

<body>
<div><h2>Dessert</h2></div>
<div>
	<form method="post" action="http://students.csci.unt.edu/~kc0284/CustomerInterface/MenuConfirm.php">
		<?php 
			include("DatabaseFunctions.php");

			// ****************************************
			// Connect database
			// ****************************************
			$con = ConnectDatabase();
			
			// ****************************************
			// Saving ingredients
			// ****************************************
			Saving_Ingredient();

			// ****************************************
			// Print ingredients with buttons
			// ****************************************
			$query = "SELECT distinct ingredient_name FROM ingredient WHERE ingredient_type = 'Dessert' AND quantity > 0";
			$r = mysql_query($query);
			if($r)
			{
				while($row=mysql_fetch_row($r))
				{
      				foreach ($row as $value)
      				{
						echo "<input type=\"checkbox\" name=\"Dessert[]\" value=\"$value\" />";
						$symbols = array("_");
  						$value = str_replace($symbols, " ", $value);
						echo $value . "<BR>";
					}
				}	
			}

			mysql_close($con);
		?>
		<div>
			<input type="button" class=Button value="Back" onClick="history.go(-1)" >
			<input type="submit" class=Button value="Next" />
		</div>
	</form>
</div>

</body>
</html>

