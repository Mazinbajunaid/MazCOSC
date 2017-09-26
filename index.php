<?php
session_start();
if (isset($_POST['submit']))
	{  


		$LoginInfo = array( "Mike" , "Mazin" , "Maz");
		
		$max = sizeof($LoginInfo);
		$logged = false; 
		for($i=0;$i<$max;$i++)
		{
					
					
			if($_POST['UserName']==$LoginInfo[$i])
			{
				echo "You have logged in";
				
			 $logged = true;
			}

		}
		if( $logged == false )
			{
				echo "wrong username or password!";
			}		
					
    }
		
?>

<html>
<body>
<h1>MazCOSC

First step of creating website

    <title>Login</title>
    </head>
    <body>
       
        <form name="login" action="" method="post">
		
            <label><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="UserName" value="" required><br />
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="Password" required><br />
            
			<button type="submit" name="submit" value= "submit">Login</button>
            
			<input type="checkbox" checked="checked"> Remember
			
			<div class="container" style="background-color:#f1f1f1">
   
    <span class="user & psw">Forgot <a href="#"> Username or password?</a></span>


			
        </form>
    </body>
</html>
