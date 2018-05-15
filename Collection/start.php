<!DOCTYPE HTML>
<html>
    <head>
        <title>Login Page</title>
    </head>
    
    <body>     
        
        <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:73px">
               
                <form action="success.php" method="POST">
                    <label for="username">Username:</label><br/>
                    <input type="text" name="username" id="username"><br/>
                    <label for="password">Password:</label><br/>
                    <input type="password" name="password" id="password"><br/>
                    <input type="submit" value="Log In!">
                </form>

            </div>
				
         </div>
			
      </div>
    </body>
</html>