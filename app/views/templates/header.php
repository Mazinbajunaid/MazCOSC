<?php
if (isset($_SESSION['auth']) != 1) {
    header('Location: /home');
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <link href= "/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" href="/favicon.png">
        <title>COSC 4806</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script type="text/javascript">
   $(document).ready(function () 
   {
  $('body').on('change', '#province', function () 
  {
	  var select = document.getElementById("province");
	  var id = select.options[select.selectedIndex].value;
	
    $.ajax({
            url: '/home/cityList/'+id,
        //    data:"{'id':'" + id + "'}",
            type: "GET",
            dataType: "json",
            contentType: "application/json",
            success: function (data) 
			{
                //alert(data);
				 $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="'+ value +'">'+ value +'</option>');
                        });
            }
        });
   });
   
  });
  </script>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/home">COSC</a>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav">
                       
						 <li><a href="/home/phonebook">Phonebook</a></li>
                    
						<?php 
							if($_SESSION['role'] == "admin")
							{
								
								echo "<li><a href='/home/createStaff'>Create Staff</a></li>";
								echo "<li><a href='/home/createManager'>Create Manager</a></li>";
							}
							else if($_SESSION['role'] == "manager")
							{
								
								echo "<li><a href='/managerhome/index'>My Profile</a></li>";
								echo "<li><a href='/managerhome/staffmembers'>Staff Members</a></li>";
							}
							
							else if($_SESSION['role'] == "staff")
							{
								
								echo "<li><a href='/staffhome/index'>My Profile</a></li>";
							}
						?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>