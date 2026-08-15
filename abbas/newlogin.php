<?php
if(isset($_POST["login"])){
    include "conn.php";
    $email = $_POST['logemail'];
    $password = $_POST['logpassword'];
    $res = mysqli_query($con,"select * from users"); 
    if($res){
        $count=0;
        while($row = mysqli_fetch_assoc($res)){
            if($email==$row['email']){
                $count++;
                if($password == $row['password']){    
                session_start();
                $_SESSION['name']=$row['name'];
                $_SESSION['email']=$email;
                $_SESSION['profile']=$row['profile'];
                if(isset($_POST['rememberme'])){
                    setcookie("email","$email", time()+60*60*24*30);
                }
                    echo "<script>alert('Redirecing you to your account, Happy learning....😁')</script>";
                    echo "<script>location.href='newhome.php'</script>";
                }else{
                    echo "<script>alert('Wrong password 😡....')</script>";
                }
            }
        }
        if($count==0){
            echo "<script>alert('No account found with given email ,try registering.. 😅 ')</script>";
        }
    }
}
if(isset($_POST["register"]))
{
    include "conn.php";
    $name = $_POST["regname"];
    $email = $_POST["regemail"];
    $password = $_POST["regpassword"];
    $res = mysqli_query($con,"select email from users");  
    if($res){
        $count=0;
        while($row = mysqli_fetch_assoc($res)){
            if($email==$row['email']){
                $count++;
            }
        }
        if($count!=0){
            echo "<script>alert('An user already exists with this email,try new one login to existing one..😅')</script>";
        }else{
            echo "<script>alert('Redirecing you to your account, Happy learning....😁')</script>";
            $dirpath = "assets\\users\\".$email;
            mkdir($dirpath);
            $dirpath='assets\\\\img\\\\default2.png';
            $que = mysqli_query($con,"insert into users values('$name','$email','$password','$dirpath',0)");
            session_start();
            $_SESSION['name']=$name;
            $_SESSION['email']=$email;
            $_SESSION['profile']=$dirpath;
            setcookie("email","$email", time()+60*60*24*2);
            echo "<script>location.href='newhome.php'</script>";
        }
    }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="newlogin.css">
</head>
<body>
        <div class="error" onclick="document.getElementsByClassName('error')[0].style.zIndex='-1'">
            <div class="errcontainer">
                <div class="errdes">Baba is a good person </div>
                <div class="errbtn">
                    <button id="errbtn1" onclick="document.getElementsByClassName('error')[0].style.zIndex='-1'">OK</button>
                </div>
            </div>
        </div>
    <div class="main">
    <div class="container">
        <div class="head">
            <span id="heading" class="animations">LOGIN</span>
        </div>
        <div id="forms">
            <form action="newlogin.php" method="post" class="form" id="form1">

                <div class="input">
                <input autofocus onblur="down(document.getElementsByClassName('labels')[0],document.getElementsByClassName('credentials')[0])" onfocus="up(document.getElementsByClassName('labels')[0])" title="your email" class="credentials" type="email" id="logemail" name="logemail"  required>
                </div>
                 <label class="labels left" id="logemail">Enter your email : </label>
    
                <div class="input">
                <input  onblur="down(document.getElementsByClassName('labels')[1],document.getElementsByClassName('credentials')[1]),validate(document.getElementById('logpassword'))" onfocus="up(document.getElementsByClassName('labels')[1])"  title="password" class="credentials" autocomplete="off" type="password" id="logpassword" name="logpassword"  required><br>
                </div>
                <label class="labels left">Enter your password  &#128273; : </label>
                <div id="remember" style="display:flex;justify-content:baseline;gap:10px">
                    <input type="checkbox" name="rememberme" id="remember-me" style="accent-color:var(--bgcolor);width:25px;height:25px" checked> &nbsp;Remember Me
                </div>
                <div class="buttons">
                <input id="click1" onclick="log()" type="submit" name="login" value="Login Now &#128274;">
                </div>


            </form>
            <form action="newlogin.php" method="post" class="form" id="form2">

                <div class="input">
                <input autofocus onblur="down(document.getElementsByClassName('labels')[2],document.getElementsByClassName('credentials')[2])" onfocus="up(document.getElementsByClassName('labels')[2])"  title="your name" class="credentials" type="text" id="regname" name="regname" required ><br>
                </div>
                <label class="labels right" >Enter your name :</label>
    
                <div class="input">
                <input onblur="down(document.getElementsByClassName('labels')[3],document.getElementsByClassName('credentials')[3])" onfocus="up(document.getElementsByClassName('labels')[3])"  title="your email" class="credentials" type="email" id="regemail" name="regemail"  required ><br>
                </div>
                <label class="labels right">Enter your email : </label>
    
                <div class="input">
                <input onblur="down(document.getElementsByClassName('labels')[4],document.getElementsByClassName('credentials')[4]),validate(document.getElementById('regpassword'))" onfocus="up(document.getElementsByClassName('labels')[4])"  title="create a strong password" class="credentials" autocomplete="off" type="password" id="regpassword" name="regpassword" required ><br>
                </div>
                <label class="labels right" >create your password &#128273; :</label>
    
                <div class="input">
                <input  onblur="down(document.getElementsByClassName('labels')[5],document.getElementsByClassName('credentials')[5]),confirm(document.getElementById('regpassword'),document.getElementById('regconfirm'))" onfocus="up(document.getElementsByClassName('labels')[5])"  title="confirm your password" class="credentials" autocomplete="off" type="password" id="regconfirm" name="regconfirm"  required ><br>
                </div>
                <label class="labels right">confirm your password :</label>
                
                <div class="buttons">
                <input id="click2" onclick="reg()" type="submit" name="register" value="Register Now &#128100;">
                </div>

            </div>
        </form>
        <div class="button">
            <button class="btn" id="btn1" onclick="fun1()">login</button>
            <button class="btn" id="btn2" onclick="fun2()">signup</button>
        </div>
    </div>
</div>
</body>
<script>
    labels = document.querySelectorAll(".labels");
err = document.getElementById("err");
error = document.getElementById("error");
function validate(a){
    b = a.value.toString();
    if(b.length < 8 || b.length>16){
        display("password length must be \n greater than or equal to 8\n and  less than or equal to 16..");
    }
}
function confirm(a,b){
    x=a.value.toString();
    y=b.value.toString();
    if(x!=y){
        display("password and confirm password must be equal..");
    }
}
function up(a)
{
    a.style.fontSize="15px";
    a.style.bottom="16%";
    a.style.backgroundColor="white";
    a.style.padding="2px 10px";
    a.style.borderLeft="5px solid";
    a.style.borderRight="5px solid";
}
function down(a,b){
 if(b.value==""){
    a.style.fontSize="18px";
    a.style.bottom="11.5%";
    a.style.backgroundColor="white";
    a.style.borderLeft="none";
    a.style.borderRight="none";
   }
}
function fun1()
{
    a=document.getElementById("forms");
    a.style.transform="translateX(0)";
    b=document.getElementsByClassName('btn');
    b[0].style.backgroundColor='var(--bgcolor-primary)';
    b[1].style.backgroundColor='var(--color)';
    a=document.getElementById("heading");
    a.innerText='LOGIN';
    a.style.width="20%";
    c=document.getElementById("heading");
    c.style.animationName="none";
    requestAnimationFrame(()=>{
        c.style.animationName="";
    });

}
function fun2()
{
    a=document.getElementById("forms");
    a.style.transform="translateX(-100%)";
    b=document.getElementsByClassName('btn');   
    b[0].style.backgroundColor='var(--color)';
    b[1].style.backgroundColor='var(--bgcolor-primary)';
    a=document.getElementById("heading");
    a.innerText='REGISTER';
    a.style.width="30%";
    c=document.getElementById("heading");
    c.style.animationName="none";
    requestAnimationFrame(()=>{
        c.style.animationName="";
    });
}

function display(s){
    document.getElementsByClassName('error')[0].style.zIndex='1';
    document.getElementsByClassName('errdes')[0].innerText=s;
    
}
</script>
</html>
<?php
if(isset($_GET['status'])){
    $name = $_GET['status'];
    if($name == 'true'){
        echo "<script>fun2()</script>";
    }else{
        echo "<script>fun1()</script>";
    }
}
?>