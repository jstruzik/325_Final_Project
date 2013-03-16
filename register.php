<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
</head>
<body>
<div id="wrapper">
  <div id="header">
	 <a href="index.html">
    <div class="logo">
    </div></a>
    <div class="nav">
    </div>
  </div>
    <div id="continerbottombg">
      <div id="continer">
        <div class="main_content">
			<?php
				if (!empty($_POST["new_email"])){
					echo "<p>Thank you for signing up with us! An email has been sent to verify your account and complete your registration. In the meantime, please fill out the following information:</p><br /><br />";
				} else{ 
					echo "<p>In order to continue you must create an account! Please fill in the information below.</p><br /><br />";
					} ?>
          <form method="post" action="search.php">
          <div id="login">
          	<div>
				<p><label for="email">Email</label></p>
				<?php
					if (!empty($_POST["new_email"])){
						echo '<input id="email" type="text" name="email" value="'.$_POST["new_email"].'" style="float:none;"  />
						<img src="images/valid.png" class="valid8_valid" id="email_valid">';
					}
					else{
						echo '<input id="email" type="text" name="email" placeholder="Please enter your email here" style="float:none;" />';
					} ?>
			</div>
          	<div>
				<p><label for="name">Name</label></p>
				<input id="name" type="text" name="name" placeholder="Please enter your full name" style="float:none;" />
			</div>
          	<div>
				<p><label for="password">Password</label></p>
				<input id="password" type="password" name="password" placeholder="Please enter a password" style="float:none;" />
			</div>
			<div>
				<p><label for="confirmpassword">Re-enter Password</label></p>
				<input id="confirmpassword" type="password" name="confirmpassword" placeholder="Please re-enter your password" style="float:none;" />
			</div>
            <div>
                <input type="button" id="completeReg" name="completeReg" value="Complete Registration" class="btn right" style="float:none;" onclick="if(valid8.isValid(this.form))$(this.form).submit();">
            </div>
            </div>
            </form>
      </div>
    </div>
  </div>
  
      <div class="summryblock">
		 <div class="innerwrapper">
      <p>UBooks is a registered blah blah blah 2012.<br><br> Terms and conditions.</p>
      </div>
	</div>
  
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/valid8-1.0.js"></script>
    <script type="text/javascript">
		valid8.add(valid8.stringValidator, { element: "name", required: true, minLength: 3, maxLength: 100 });
		valid8.add(valid8.stringValidator, { element: "password", required: true, minLength: 8, maxLength: 25 });
		valid8.add(valid8.stringValidator, { element: "email", required: true, maxLength: 400, regex: valid8.emailRegex });
		valid8.add(valid8.matchValidator, { element: "confirmpassword", elementToMatch: "password", matchingFieldsError: "Your passwords do not match" });
	</script>
</body>
</html>
