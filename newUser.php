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
           $("#usrname").jqxInput({placeHolder: "Enter Username", height: 25, width: 200, minLength: 1,theme: 'energyblue' });
            });
        $(document).ready(function () {              
           $("#usrpass").jqxInput({placeHolder: "Enter Password", height: 25, width: 200, minLength: 1, theme: 'energyblue' });
            });
            $(document).ready(function () {              
           $("#usremail").jqxInput({placeHolder: "Enter Email", height: 25, width: 200, minLength: 1, theme: 'energyblue' });
            });
    </script>
    
    <center> 
        <form  action="http://localhost/Blog_ORM/newUser.php" method="post" >
            <input type="text" id="usrname" name="usrname0" class="inputFromusr"/>
            </br>
            </br>
            <input type="password" id="usrpass" name="usrpass0" class="inputFromusr"/>
            </br>
            </br>
            <input type="text" id="usremail" name="usremail0" class="inputFromusr"/>
            </br>
            </br>
            <input type="submit" value="Sign Up" name = "signup0" id='signup' class='btn'/>
            </form>
    </center>
    
    <?php
    require 'RedBeanPHP4_3_4/rb.php';
    
    if(isset($_POST['signup0']))
    {
        $username=$_POST['usrname0'];
        $password=$_POST['usrpass0'];
        $email=$_POST['usremail0'];
        
        if(!isEmpty($username) && !isEmpty($password) && !isEmpty($email))
        {
            if(ValidEmail($email))
            {
                include 'connect.php';
                R::setup( 'mysql:host=localhost;dbname='.$DBNAME, $DBUSERNAME, $DBPASSWORD);
                $post = R::dispense( 'user' );
                $post->username = $username;
                $post->userpassword = $password;
                $post->useremail = $email;
                $id = R::store( $post );
                echo "<script> alert('Your acount has been reated successfully')</script>";
                header("Location:main.php");
            }
 
        }
         else {
             echo "<script> alert('Please fill out all required information ! ')</script>";
         }
 }
 
 ///////////////////////////////////////////////////////////////////////////////
    function isEmpty($text)
    {
        if($text=="")
            return true;
        else 
            return false;
    }
    function ValidEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        { 
            $emailErr = "Invalid email format"; 
            echo "<script> alert('".$emailErr."')</script>";
            return false;
        }
        else 
            return true;    
    }    
    ?>
    </body>
</html>
