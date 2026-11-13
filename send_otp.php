<?php
$con=mysqli_connect('localhost','root','123456','smcproject');
echo $email=$_POST['email'];
$res=mysqli_query($con,"select * from user1 where email='$email'");
$count=mysqli_num_rows($res);
if($count>0)
{
 $otp=rand(1111,9999);
 mysqli_query($con,"update user1 set otp='$otp' where email='$email'");
 echo "yes";
}
else{
    echo "not_exist";
}
?>