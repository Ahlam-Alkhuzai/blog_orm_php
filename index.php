<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
          <!-- add the jQuery script -->
    <script type="text/javascript" src="jqwidgets-ver5.3.2/scripts/jquery-1.11.0.min.js"></script>	
    <!-- add the jQWidgets framework -->
    <script type="text/javascript" src="jqwidgets-ver5.3.2/jqwidgets/jqxcore.js"></script>
    <!-- add one or more widgets -->
    <script type="text/javascript" src="jqwidgets-ver5.3.2/jqwidgets/jqxbuttons.js"></script>
    <!-- add the jQWidgets base styles and one of the theme stylesheets -->
    <link rel="stylesheet" href="jqwidgets-ver5.3.2/jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="jqwidgets-ver5.3.2/jqwidgets/styles/jqx.energyblue.css" type="text/css" />
      <script type="text/javascript" src="jqwidgets-ver5.3.2/jqwidgets/jqxinput.js"></script>
        <title></title>
    </head>
    <body>
            <script type="text/javascript">
        $(document).ready(function () {
            $("#signup").jqxButton({ width: '120px', height: '35px', theme: 'energyblue'});
        });
        $(document).ready(function () {
            $("#login").jqxButton({ width: '120px', height: '35px', theme: 'energyblue'});
        });
        $(document).ready(function () {              
           $("#usrname").jqxInput({placeHolder: "Enter UserName", height: 25, width: 200, minLength: 1,theme: 'energyblue' });
            });
        $(document).ready(function () {              
           $("#usrpass").jqxInput({placeHolder: "Enter Password", height: 25, width: 200, minLength: 1, theme: 'energyblue' });
            });
    </script>
    
    
	
    <center> 
        <form  action="http://localhost/Blog_ORM/index.php" method="post" >
            <input type="text" id="usrname" name="usrname0"/>
            </br>
            </br>
            <input type="password" id="usrpass" name="usrpass0"/>
            </br>
            </br>
            <input type="submit" value="Login"  name = "login" id='login' class='btn'/> 
            <input type="submit" value="New User" name = "signup" id='signup' class='btn'/>
            </form>
    </center>
        <?php     
       if(isset($_POST['login']))
       {   
           $usrname=$_POST['usrname0'];
           $usrpass= $_POST['usrpass0'];
           if($usrpass!="" && $usrname!="")
           {     
               if(validateData($usrname,$usrpass))
                    header("Location:main.php");
           }
           else 
               echo '<script>alert("Please fill in all required information !")</script>';
       }
       else if(isset($_POST['signup']))
           header("Location: newUser.php");
       ///////////////////////////////////////////////////////////////
       
 
       function validateData($username , $password)
       {
            require 'RedBeanPHP4_3_4/rb.php';
            require 'connect.php';
            R::setup( 'mysql:host=localhost;dbname='.$DBNAME, $DBUSERNAME, $DBPASSWORD);
            $query= 'SELECT * FROM user WHERE username ="'.$username.'"';
            $user=R::getRow($query);                              
            if($user['userpassword']==$password)           
               return true; 
            else {
               echo '<script>alert("username and password combinaation does not match our recored!")</script>';
               return false;
            }
        }
        ?>
    </body>
</html>
