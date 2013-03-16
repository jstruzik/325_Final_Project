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
	
	   $('#view_listing').click(function(){
        var the_name = $('#hidden_user').val();
        var req = $('#hidden_req').val();
        $.ajax({
            type :'GET',
            url  : 'requested_books.php',
            success : function(data) {
				window.location.href = 'requested_books.php?name='+the_name+'&requested_book='+req;
           }
        })
           })
        
        	   $('#list_another').click(function(){
        var the_name = $('#hidden_user').val();
        var req = $('#hidden_req').val();
        $.ajax({
            type :'GET',
            url  : 'list.php',
            success : function(data) {
				window.location.href = 'list.php?name='+the_name+'&requested_book='+req;
           }
        })
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
			}?>
    </div>
  </div>
  <div id="menu">
	<div id="m-top">
		<ul>
			<li><a href=<?php echo str_replace(' ','+',"search.php?name=".$user->name."&requested_book=".$user->requested_book); ?> >Find a Book</a></li>
			<li style="background:#4D9AB3;"><a href=<?php echo str_replace(' ','+',"list.php?name=".$user->name."&requested_book=".$user->requested_book);?> >List a Book</a></li>
			<li><a href=<?php echo str_replace(' ','+',"requested_books.php?name=".$user->name."&requested_book=".$user->requested_book);?>>My Books</a></li>
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
          	<div style="text-align:center;">
				<p>Congratulations! You have successfully listed a book to lend out to a fellow UMass student. You're awesome!</p>
				<br>
				<p>Please drop off your book at the UBook center located at somewhere on campus to complete your listing.</p>
				<br>
				<img src="images/the_fonz.jpg"></img>
				<br><br>
                
            	<input type="submit" id="view_listing"value="View My Listing" class="btn right" style="float:none; margin:0px">
            	<input type="button" id="list_another"value="List Another Book" class="btn right" style="float:none; margin:0px">
            </div>
            </div>
      </div>
    </div>
  </div>
  
  <input type="text" id="hidden_user"  value="<?php if(!empty($user)){echo $user->name;} ?>" style="display:none;">
  <input type="text" id="hidden_req"  value="<?php if(!empty($user)){echo $user->requested_book;} ?>" style="display:none;">
  
      <div class="summryblock">
		 <div class="innerwrapper">
      <p>UBooks is a registered blah blah blah 2012.<br><br> Terms and conditions.</p>
      </div>
	</div>
  
</div>
</body>
</html>
