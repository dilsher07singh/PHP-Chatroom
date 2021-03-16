<?php

if (!isset($_COOKIE["name"])) {
    header("Location: error.html");
    return;
}

// get the name from cookie
$name = $_COOKIE["name"];

print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Add Message Page</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <style>
            .div-color {
                position: absolute;
                width: 50px;
                height: 50px;
            }
        </style>


        <script type="text/javascript">

        function load() {
            var name = "<?php print $name; ?>";

            setTimeout("document.getElementById('msg').focus()", 100);
        }

        function userlist(newur) {
            var openwin=window.open(newur,'name','height=605,width=805');
            if (window.focus) {

                openwin.focus()
                
            }
            return 0;
        }

        function select(color) {
            if (confirm('Are you sure to change your color to ' + color + '?')) {

                document.getElementById("color").value = color;

            }
        }
        </script>
    </head>


    <body style="text-align: left" onload="load()">
        <form action="add_message.php" method="post">
            <table border="0" cellspacing="5" cellpadding="0">
                <tr>

                    <td>What is your message?</td>
                </tr>

                <tr>
                    <td><input class="text" type="text" name="message" id="msg" style= "width: 780px" /></td>
                </tr>

                <tr>
                    <td>
                       
                        
                        <div style="position:relative; height: 75px;">
                            Choose your color:
                            <div class="div-color" style="background-color:yellow;left:0px" onclick="select('yellow')"></div>
                            <div class="div-color" style="background-color:red;left:50px" onclick="select('red')"></div>
                            <div class="div-color" style="background-color:coral;left:100px" onclick="select('coral')"></div>
                            <div class="div-color" style="background-color:cyan;left:150px" onclick="select('cyan')"></div>
                            <div class="div-color" style="background-color:orange;left:200px" onclick="select('orange')"></div>
                            <div class="div-color" style="background-color:magenta;left:250px" onclick="select('magenta')"></div>
                            <div class="div-color" style="background-color:maroon;left:300px" onclick="select('maroon')"></div>
                            <div class="div-color" style="background-color:olive;left:350px" onclick="select('olive')"></div>
                        </div>
                        <input type="hidden" name="color" id="color" value="yellow" />

                         <input class="button" type="submit" value="Send Message To Chat Room" style="width: 200px" />
                    </td>
                </tr>
            </table>
        </form>
        
        <!--logout button-->
        <table border="0" cellspacing="5" cellpadding="0">
            <tr>
                <td>

                    <button class="button" style="margin-left: 0px;width: 220px" onclick="userlist('userL.html'); 
                    return 0;">Users List Display</button>

                </td>

                <td>

                    <form action="logout.php" method="post" onsubmit="alert('You have logged out')">
                        <input class="button" type="submit" value="Logout" style="position:relative; width: 205px;"/>
                    </form>
                    
                </td>
                
            </tr>
        </table>

    </body>
</html>
