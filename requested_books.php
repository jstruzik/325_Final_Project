<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
	window.onload=function(){

	var offset=$('#menu').offset();

	$('#menu').mousemove(function(e){

		coordinateX=e.pageX-offset.left;
		new_pos = coordinateX;
		$('#slider').css("margin-left",new_pos);

	});

}
</script>

</head>
<body>
<div id="wrapper">
  <div id="header">
	 <a href="index.html">
    <div class="logo">
    </div></a>
    <div class="nav">
				<?php if(!empty($_GET["name"])){
				$user = new stdClass;
				$user->name = $_GET["name"];
				echo "<div class='userBox'><div class='userIcon'></div><div class='userInfo'>Welcome ".urldecode($user->name)."<br><a href='index.html' style='font-size:90%;'>Logout?</a></div></div>";
				$user->requested_book = $_GET["requested_book"];
			}?>
    </div>
  </div>
  <div id="menu">
	<div id="m-top">
		<ul>
			<li><a href=<?php echo str_replace(' ','+',"search.php?name=".$user->name."&requested_book=".$user->requested_book); ?> >Find a Book</a></li>
			<li><a href=<?php echo str_replace(' ','+',"list.php?name=".$user->name."&requested_book=".$user->requested_book);?> >List a Book</a></li>
			<li style="background:#4D9AB3;"><a href=<?php echo str_replace(' ','+',"requested_books.php?name=".$user->name."&requested_book=".$user->requested_book);?>>My Books</a></li>
			<li><a href="#">Account Settings</a></li>
		</ul>
	</div>
	<div id="m-slider">
		<div id="slider"></div>
	</div>
	</div>	
    <div id="continerbottombg">
      <div id="continer">
        <div class="main_content">
        	


            <div class="leftRequest">
            	<input type="button" id="rb" value="Requested Books" class="nav_button">
                <input type="button" id="pb" value="Posted Books" class="nav_button">
                <input type="button" id="oh" value="Order History" class="nav_button">
            </div>
			<?php if($_GET['requested_book'] == 'yes'){ ?>
                <div class="rightRequest">
					                <h1>Requested Books</h1>
                <div class="searchResult" style="width:750px">
                	<div class="optionsLeft">
                        <div class="resultIcon">
                            <img class="icon" src="images/sail_example.jpg" style="width:100px;height:140px;" />
                        </div>
                        <div class="optionText">
                            <p class="Heading" >
                                Being Knotty, 2nd ed.
                            </p>
                            Author: Betty Targus<br />
                            ISBN: IOIH823984YJH
                        </div>
                     </div>
                    <div class="optionsRight" style="text-align:center;">
                        <div class="unavBook">Unavailable</div>
                        </div>
                </div>
            </div>
            <?php } else{ ?>
            <div class="rightRequest">
				                <h1>Requested Books</h1>
				<p>You have no requested Books.</p>
				</div>
				<?php } ?>
    </div>
  </div>
  
      <div class="summryblock">
		 <div class="innerwrapper">
      <p>UBooks is a registered blah blah blah 2012.<br><br> Terms and conditions.</p>
      </div>
	</div>
  
</div>
</body>
</html>
