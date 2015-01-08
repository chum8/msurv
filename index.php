<?php
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
	echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">";


	echo "<head>";
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";

?>
<script>
	function validate(form_type, form_data)
	{	params = "texti[0]="
		len =  form_data.length
		for (i = 0; i < form_data.length; i++)
		{ 
			params += form_data[i].value + "&texti[" + (i + 1) + "]=" 	
			//jerry rigg this bad boy by making an array from STRING operations, ha ha!  That's what I'm talkin' about.
		}
		
		request = new ajaxRequest()
		request.open("POST", "verify_fields.php", true)
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		request.setRequestHeader("Content-length", params.length)
		request.setRequestHeader("Connection", "close")

		request.onreadystatechange = function()
		{
			if (this.readyState == 4)
			{
				if (this.status == 200)
				{
					if (this.responseText != null)
					{
						document.getElementById('warning').innerHTML = this.responseText
					} 
					else window.alert("Ajax error: no data received")
				}
				else window.alert("Ajax error: " + this.statusText)
			}
		}
		request.send(params)
	}
	function ajaxRequest()
	{
		try
		{  var request = new XMLHttpRequest()  }
		catch (e1)
		{
			try
			{ request = new ActiveXObject("Msxlm2.XMLHTTP") }
			catch (e2)
			{
				try
				{ request = new ActiveXObject("Microsoft.XMLHTTP") }
				catch (e3)
				{ request = false }
			}
		}
		return request
	}
	

</script>
</head>
<body>

Answer just two questions and be entered for a chance to win a $25 amazon.com gift card!
Before we get started, please enter your contact information below.

Surveys like this are created to gather valuable information about customers, so great companies
can better serve you!  To continue to the questions, please enter your contact information.

What will we do with your contact information?
1)  You may be mailed occasional print materials from the company who has paid us to conduct this survey.
2)  You agree to receive either one phone call, or one e-mail (your choice!) gauging your interest products offered by the company who commissioned this survey.
3)  We will never sell or give away your contact information to third parties
'
<form action="page1.php" method="post" id = "my_form" onChange="return validate(1, document.getElementsByName('texti[]'))">

First Name
<?php
echo "<input type=\"text\" name=\"texti[]\" value=\"\" size=\"24\" maxlength=\"24\"/>";
?>

Last Name
<?php
echo "<input type=\"text\" name=\"texti[]\" value=\"\" size=\"24\" maxlength=\"24\"/>";
?>

Occupation
<?php
echo "<input type=\"text\" name=\"texti[]\" value=\"\" size=\"24\" maxlength=\"24\"/>";
?>

Street
<?php
echo "<input type=\"text\" name=\"texti[]\" value=\"\" size=\"24\" maxlength=\"50\"/>";
?>

City
<?php
echo "<input type=\"text\" name=\"texti[]\" value=\"\" size=\"24\" maxlength=\"24\"/>";
?>

State
<?php
echo "<input type=\"text\" name=\"texti[]\" value=\"\" size=\"3\" maxlength=\"2\"/>";
?>

Zip Code
<?php
echo "<input type=\"text\" name=\"texti[]\" value=\"\" size=\"7\" maxlength=\"5\"/>";
?>

Phone Number
<?php
echo "<input type=\"text\" name=\"texti[]\" value=\"\" size=\"4\" maxlength=\"3\"/>";
?>

<?php
echo "<input type=\"text\" name=\"texti[]\" value=\"\" size=\"4\" maxlength=\"3\"/>";
?>

<?php
echo "<input type=\"text\" name=\"texti[]\" value=\"\" size=\"6\" maxlength=\"4\"/>";
?>

E-mail Address
<?php
echo "<input type=\"text\" name=\"texti[]\" value=\"\" size=\"40\"  maxlength=\"70\"/>";
?>

I Agree to the terms and conditions above
<select name ="texti[]" size = "1">
<option value = "n"/>No, not today.</option>
<option value = "y"/>Yes! Enter my name!</option>
</select>
and would prefer to be contacted by
<select name="texti[]" size="1">
<option value ="0"/>
<option value ="1">Email</option>
<option value ="2">Phone</option>
</select>
<div id = 'warning'>Before you submit this form, you must complete each field with valid input and agree to terms by checking the box.  Thanks!</div>
</form>
</body>

</html>