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
	
	$('#course_list_lend').on('click',function(){
		if($('#price_input').val()!=''){
			alert("You cannot input a price if you're lending a book!");
		}
		else{
			var the_name = $('#hidden_user').val();
			var req = $('#hidden_req').val();
			$.ajax({
				type :'GET',
				url  : 'congrats.php',
				success : function(data) {
					window.location.href = 'congrats.php?name='+the_name+'&requested_book='+req;
			   }
			})
		}
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
          	<div>
				<p><label for="isbn_search">Search for a Book to List by ISBN/Title: </label></p>
                <table style="width:500px;">
                	<tr>
                        <td><input id="isbn_search" type="text" name="isbn_search" placeholder="ISBN/Title" style="float:none; width:100%;" /></td>
                        <td><input type="submit" id="isbn_search_but" name="isbn_search_but" value="Search" class="btn right" style="float:none; margin:0px"></td>
                    </tr>
                 </table>
            </div>
            <br />
            <h1>-OR-</h1>
            <div class="searchFieldBox">
            <p><label for="isbn_search">List a Book by Course: </label></p>
            Department: <select id="dept" class="newSelect">
            <option></option>
            <option>Seafaring</option>
            </select>
            <br /><br />
            Course Number: <select id="course_num" disabled="disabled" class="newSelect">
            <option></option>
            <option>200</option>
            </select>
            <br /><br />
            Book Title: <select id="book_title" disabled="disabled" class="newSelect">
            <option></option>
            <option>Polishing Your Mizzenmast</option>
            <option>Being Knotty</option>
            </select>
            <br /><br />
            <div id="list_options" style="display:none;">
            	Condition: <select id="cond" class="newSelect">
                <option></option>
                <option>New</option>
                <option>Like-new</option>
                <option>Okay</option>
                <option>Tarnished</option>
                </select>
                <br /><br />
                Edition: <select id="edition" class="newSelect">
                <option></option>
                <option>1st</option>
                <option>2nd</option>
                <option>3rd</option>
                </select>
                <br /><br />
                <div class="price">
                	<p style="float:left">Price (If Listing to Sell): $   </p><input id="price_input" type="text" style="padding:3px;width:auto;float:none"/>
                </div>
                <br />
            	<input type="submit" id="course_list_sell"value="List to Sell!" class="btn right" style="float:none; margin:0px">
                            	<input type="submit" id="course_list_lend"value="List to Lend!" class="btn right" style="float:none; margin:0px">
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
