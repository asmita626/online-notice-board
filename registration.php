<?php
require('connection.php');
extract($_POST);
if(isset($save))
{
//check user alereay exists or not
$sql=mysqli_query($conn,"select * from user where email='$e'");

$r=mysqli_num_rows($sql);

if($r==true)
{
$err= "<font color='red'>This user already exists</font>";
}
else
{
//dob
$dob=$yy."-".$mm."-".$dd;

//hobbies
$hob=implode(",",$hob);
//image
$imageName=$_FILES['img']['name'];


//encrypt your password
$pass=md5($p);


$query="insert into user values('','$n','$e','$pass','$mob','$gen',$hob,$imageName','$dob',now())";
mysqli_query($conn,$query);

//upload image

mkdir("images/$e");
move_uploaded_file($_FILES['img']['tmp_name'],"images/$e/".$_FILES['img']['name']);


$err="<font color='blue'>Registration successfull !!</font>";

}
}
?>
<body>
<link rel="stylesheet" href="register11.css" class="asm">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Limelight&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Limelight&family=Poppins:ital@1&display=swap" rel="stylesheet">

<div class="weapper">
     	  
 <h2><b>REGISTRATION FORM</b></h2>
<form method="post" class="my"enctype="multipart/form-data">
  <table class="table table-bordered">
	<Tr class="aa2">
		<Td colspan="2"><?php echo @$err;?></Td></Tr> 
         
				<tr>
					<td>Your Name</td>
					<Td><input  type="text"  class="form-control" name="n" required/></td>
				</tr>
				<tr>
					<td>Your Email </td>
					<Td><input type="email"  class="form-control" name="e" required/></td>
				</tr>

				<tr>
					<td>Your Password </td>
					<Td><input type="password"  class="form-control" name="p" required/></td>
				</tr>

				<tr>
					<td>Your Mobile No. </td>
					<TD><input type="tel" id="phone" name="phone" placeholder="123456789"required></TD>
				</tr>
				<tr>
					<td>Select Your Gender</td>
					<Td class="aa">
				<input type="radio" name="gen" value="m" required/>Male
				<input type="radio" name="gen" value="f"/>Female
					</td>
				</tr>
				<tr>
					<td>Hobbies</td>
					<Td><input type="text" class="form-control" name="hobbies"></td>
				</tr>
                  <tr>
					<td>Upload  Your Image </td>
					<Td><input class="form-control" type="file" name="img" required/></td>
				</tr>

			    <tr>
					<td>Date of Birth</td>
				  <Td>
					<select name="yy" required>
					<option value="">Year</option>
					<?php
					for($i=1950;$i<=2016;$i++)
					{
					echo "<option>".$i."</option>";
					}
					?>

					</select>

					<select name="mm" required>
					<option value="">Month</option>
					<?php
					for($i=1;$i<=12;$i++)
					{
					echo "<option>".$i."</option>";
					}
					?>

					</select>


					<select name="dd" required>
					<option value="">Date</option>
					<?php
					for($i=1;$i<=31;$i++)
					{
					echo "<option>".$i."</option>";
					}
					?>

					</select>

				  </td>
				</tr>
				<tr>
					<td><label for="categories">Categories:</label>

                   <select id="categories">
                    <option value="Education institution">Education Institution</option>
                    <option value="Government Oragnization">Government Organization</option>
                    <option value="Private Organization">Private Oragnization</option>
                  </select>
				</tr>
	
	 <tr>
</div>

          <Td colspan="2"  align="center" class="css">
         <input type="submit" class="btn btn-success" value="Save" name="save"/>
          <input type="reset" class="btn btn-success" value="Reset"/>

		   </td>
        </tr>
 
  <tr><td><a href="login.php" class="asw">Login</a></td></tr>  
    
  </table>
</form>

</body>
</html>
