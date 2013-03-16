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
	
		$('#signIn').on('click',function(event){
				$('#invalid').fadeIn();
			});
	
		$('#dept').on('change',function(){
		if($('#dept').val() != ''){
			$('#course_num').removeAttr('disabled');
		}
		else{
			$('#course_num').attr('disabled','disabled');
		}
	});
	
	$('#course_num').on('change',function(){
		if($('#course_num').val() != ''){
			$('#book_title').removeAttr('disabled');
		}
		else{
			$('#book_title').attr('disabled','disabled');
		}
	});
	
	$('#book_title').on('change',function(){
		if($('#book_title').val() != ''){
			$('#list_options').show();
		}
		else{
			$('#list_options').hide();
		}
	});

}

	function register(){
			$('#sign_in_wrapper').hide();
			$('#register_wrapper').show();
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
		<?php 
			if(!empty($_POST["name"])){
				echo "<div class='userBox'><div class='userIcon'></div><div class='userInfo'>Welcome ".$_POST["name"]."<br><a href='index.html' style='font-size:90%;'>Logout?</a></div></div>";
				$user = new stdClass;
				$user->name = $_POST["name"];
				$user->requested_book = "no";
			}
			elseif(!empty($_GET["name"])){
				$user = new stdClass;
				$user->name = $_GET["name"];
				echo "<div class='userBox'><div class='userIcon'></div><div class='userInfo'>Welcome ".urldecode($user->name)."<br><a href='index.html' style='font-size:90%;'>Logout?</a></div></div>";
				$user->requested_book = $_GET["requested_book"];
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
			<li style="background:#4D9AB3;"><a href="#" >Find a Book</a></li>
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
          	<div>
				<p><label for="isbn_search">Search by ISBN/Title: </label></p>
                <table style="width:500px;">
                	<tr>
                        <td><input id="isbn_search" type="text" name="isbn_search" placeholder="ISBN/Title" style="float:none; width:100%;" /></td>
                        <td><input type="submit" id="isbn_search_but" name="isbn_search_but" value="Search" class="btn right" style="float:none; margin:0px"></td>
                    </tr>
                 </table>
            </div>
            <br />
            <h1>-OR-</h1>
            <p><label for="isbn_search">Search by Course: </label></p>
            <form method="post" action="results.php">
				<div class="searchFieldBox">
					<input type="text" name="name" style="display:none" value="<?php if(!empty($user)){echo $user->name;} ?>"></input>
					<input type="text" name="requested_book" style="display:none" value="<?php if(!empty($user)){echo $user->requested_book;} ?>"></input>
					Department: <select  id="dept" class="newSelect">
					<option selected></option>
					<option>Seafaring</option>
					</select>
					<br /> <br /> 
					Course Number: <select  id="course_num" disabled="disabled" class="newSelect">
					<option selected></option>
					<option>200</option>
					</select>
					<br /> <br /> 
					Book Title: <select id="book_title" name="book_title" disabled="disabled" class="newSelect">
					<option selected></option>
					<option value="pym">Polishing Your Mizzenmast</option>
					<option value="bk">Being Knotty</option>
					</select>
					<br /> <br />
					<input type="submit" id="course_search_but" name="course_search_but" value="Search" class="btn right" style="float:none; margin:0px">
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
</body>
</html>
