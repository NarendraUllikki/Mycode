<!DOCTYPE html>
<html>
<head>
    <title>Lecturer Profile</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #057dfdb3;
    margin: 0;
    padding: 0;
}
.lecturer-photo {
            border-radius: 50%;
            height: 150px;
            margin: 0 auto 20px;
            overflow: hidden;
            width: 150px;
    
 }
#main{
    max-width: 800px;
    margin: 50px auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 30px rgb(0, 0, 0);
    border:3px solid rgb(255, 255, 255);
    transition: all 0.3s ease-in-out;
    overflow: hidden;
}
h3 {
    color: #007bff;
}
label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #666;
}

#main .lecturer-info .li{
    width: 95%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    display:flex;
    column-gap:20px;
}

.gb-btn {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    overflow: hidden;
}
#gbbtn
{
    display: flex;
    justify-content: center;
    margin-top:23px;
}
.gb-btn:hover {
    background-color: #0056b3;
}
.div
{
    display: flex;
    justify-content: space-between;
    border:none;
    width:140px;
    
}
    </style>
</head>
<body>
    <div id="main">
        <div class="lecturer-profile" disabled>
        <?php
try
{
  
  $con=@ new mysqli('localhost','root','','narendra');
  if($con->connect_error)
  {
    throw new Exception("connection error");
  }
  else
  { if(isset($_POST['profile-submit']))
    {
    $gb = $_POST['sub'];
    $e = $_POST['profile-submit'];
    }
  $get="select * from pro where name= '$e'";
    $res=mysqli_query($con,$get);
  if($res)
  {     $row=mysqli_fetch_array($res);
       $name=$row['Name'];
       $email=$row['Email'];
       $qualification=$row['Qualifications'];
       $subject=$row['Subject'];
       $phone=$row['Phone'];
       $prof=$row['Prof'];
        ?>
                  <div class="lecturer-photo" disabled  >
                <img src="stu5.jpeg" alt="Lecturer Photo" draggable="false">
            </div>
            <div class="lecturer-info">
                <div class="li" disabled >
                    <div class="div"><h3>Name</h3>
                    <h3>:</h3></div><h3><?php echo $name?></h3>
                </div>
                
                <div class="li" disabled >
                    <div class="div"><h3>Qualification</h3>
                    <h3>:</h3></div><h3><?php echo $qualification?></h3>
                </div>
                <div class="li" disabled >
                    <div class="div"><h3>Profession</h3>
                    <h3>:</h3></div><h3><?php echo $prof?></h3>
                </div>
                <div class="li" disabled >
                    <div class="div"><h3>Subjects</h3>
                    <h3>:</h3></div><h3><?php echo $subject?></h3>
                </div>
                <div class="li" disabled >
                    <div class="div"><h3>Email</h3>
                    <h3>:</h3></div><h3><?php echo $email?></h3>
                </div>
                <div class="li" disabled >
                    <div class="div"><h3>Contact</h3>
                    <h3>:</h3></div><h3><?php echo $phone?></h3>
                </div>
              

            </div>
        </div>
        <div id="gbbtn">
        <form action="lecturer.php" method="post">
            <button class="gb-btn" type="submit" name="submit" value="<?php echo $gb ?> "> &lt;&lt; Go back  </button>
        </form>
        </div>
                 <?php
       
    
    
    }
    
    else
    {   ?>
        <div class="li" style="display:flex;align-items:center;color: #007bff;">
        <h4>
                    No Data Found. Please ensure the database is connected
        
        </h4>
       </div>
       <?php
    }
  
}
}
catch(Exception $e)
{?>
                <div class="li" style="display:flex;align-items:center;color: #007bff;">
                  <h4>server busy cannot connect to databse.
                    our tecnicians are looking into it.
                  </h4>
                 </div>
<?php
}
mysqli_close($con);
?>
        
    </div>
    </div>    
</body>
</html>