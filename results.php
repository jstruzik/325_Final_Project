<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<link rel="stylesheet" href="css/messi.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
<script src="js/messi.js"></script>
<script language="javascript" type="text/javascript">
	window.onload=function(){

	var offset=$('#menu').offset();

	$('#menu').mousemove(function(e){

		coordinateX=e.pageX-offset.left;
		new_pos = coordinateX;
		$('#slider').css("margin-left",new_pos);

	});
			$('#signIn').on('click',function(event){
				$('#invalid').fadeIn();
			});
	
   $('#request').click(function(){
        var the_name = $('#hidden_user').val();
        if(the_name == ''){
			window.location.href ='register.php';
		}
		else{
			new Messi('Once this book becomes available for purchase or borrow we will update you via your email address.', {title: 'Book Requested!', buttons: [{id: 0, label: 'Okay', val: 'Y'}, {id: 1, label: 'Cancel', val: 'N'}], callback: function(val) { 
				if(val=='Y'){
					$.ajax({
					type :'GET',
					url  : 'requested_books.php',
					data : '&requested_book=yes',
					success : function(data) {
						window.location.href = 'requested_books.php?name='+the_name+'&requested_book=yes';
			   }
			})
		}else{
			
		}
				}})

		}
   })

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
			}
		elseif(!empty($_POST["name"])){
				$user = new stdClass;
				$user->name = $_POST["name"];
				echo "<div class='userBox'><div class='userIcon'></div><div class='userInfo'>Welcome ".urldecode($user->name)."<br><a href='index.html' style='font-size:90%;'>Logout?</a></div></div>";
				$user->requested_book = $_POST["requested_book"];
			}
			else{
				echo ' <div id="login">
		<form class="boxCont" method="post" action="register.php">
        <div id="sign_in_wrapper">
			<div>
				<label for="email">Email</label>
				<input id="email" type="text" name="email" placeholder="Please enter your email here" />
			</div>
			
			<div>
				<label for="password">Password</label>
				<input id="password" type="password" name="password" placeholder="And your password here" />
			</div>
			
			<div>
				<input type="button" id="signIn" name="signIn" value="Sign In" class="btn left" />
				<input type="button" id="signUp" name="signUp" value="Sign Up" class="btn right" onclick="register();">
			</div>
		</div>
        <div id="register_wrapper" style="display:none;">
        	Please enter your email to register <br /><br />
        	<div>
				<label for="new_email">Email</label>
				<input id="new_email" type="text" name="new_email" placeholder="Please enter your email here" />
			</div>
            <div>
                <input type="submit" id="signUp" name="signUp" value="Register" class="btn right">
            </div>
        </div>
		</form>
        </div>'	;
	} ?>
    </div>
  </div>
  <div id="menu">
	<div id="m-top">
		<ul>
			<?php if(!empty($user->name)){ ?>
			<li style="background:#4D9AB3;"><a href=<?php echo str_replace(' ','+',"search.php?name=".$user->name."&requested_book=".$user->requested_book); ?> >Find a Book</a></li>
			<li><a href=<?php echo str_replace(' ','+',"list.php?name=".$user->name."&requested_book=".$user->requested_book);?> >List a Book</a></li>
			<li><a href=<?php echo str_replace(' ','+',"requested_books.php?name=".$user->name."&requested_book=".$user->requested_book);?>>My Books</a></li>
			<li><a href="#">Account Settings</a></li>
			<?php } else{ ?>
			<li style="background:#4D9AB3;"><a href="search.php" >Find a Book</a></li>
			<li><a href="register.php">List a Book</a></li>
			<li><a href="register.php">My Books</a></li>
			<li><a href="#">Account Settings</a></li>
			<?php } ?>
		</ul>
	</div>
	<div id="m-slider">
		<div id="slider"></div>
	</div>
	</div>	
    <div id="continerbottombg">
      <div id="continer">
        <div class="main_content">
			<?php
			if($_POST['book_title'] == 'pym'){ 
					echo'
					<h1>Results</h1><br />
					<p>"Polishing Your Mizzenmast"</p>
					<hr style="width:950px" />
					<div id="" class="searchResult">
						<div class="optionsLeft">
							<div class="resultIcon">
								<img class="icon" src="images/sail_example2.jpg" style="width:100px;height:140px;" />
							</div>
							<div class="optionText">
								<p class="Heading" >
									Polishing Your Mizzenmast, 1st ed.
								</p>
								Author: Dingus McGee<br />
								ISBN: IOJ23487KJH324
							</div>
						 </div>
						<div class="optionsRight">
							<p style="color:green;">Price: $50.00</p>
							<p>Condition: Like-new</p>
							<input type="button" id="book_buy" name="book_buy" value="Buy" class="btn right" style="margin:60px 0 0">
							</div>
					</div>
					<br>
					<div id="" class="searchResult" style="background:#CBDF98;">
						<div class="optionsLeft">
							<div class="resultIcon">
								<img class="icon" src="images/sail_example2.jpg" style="width:100px;height:140px;" />
							</div>
							<div class="optionText">
								<p class="Heading" >
									Polishing Your Mizzenmast, 2st ed.
								</p>
								Author: Dingus McGee<br />
								ISBN: IOJ2IJFIHKAOJ
							</div>
						 </div>
						<div class="optionsRight">
							<p style="color:green;">Available to Borrow</p>
							<p>Condition: New</p>
							<input type="button" id="book_buy" name="book_buy" value="Borrow" class="btn right" style="margin:60px 0 0">
							</div>
					</div>';
                }
                else{
					echo'<div id="no_results" style="width: 950px;overflow: hidden;">
					<h1>Results</h1><br />
					<p>"Being Knotty"</p>
					<hr style="width:950px" />
					<div class="optionsLeft">
							<div class="resultIcon">
								<img class="icon" src="images/sail_example.jpg" style="width:100px;height:140px;" />
							</div>
						<p>Sorry but there were no available listings.</p>
					</div>
					<div class="optionsRight" style="margin-right: 0px;">
						<input type="button" id="request" name="request" value="Request This Book" class="btn right" />
					</div>
					</div>';
                 }
                 ?>
                <br />
                <input type="text" id="hidden_user"  value="<?php if(!empty($user)){echo $user->name;} ?>" style="display:none;">
                <a href=<?php  if(!empty($user->name)){ echo str_replace(' ','+',"search.php?name=".$user->name."&requested_book=".$user->requested_book);}else{echo"search.php";}?>><input type="button" id="new_search" value="Start a New Search" class="btn right" /></a>
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
