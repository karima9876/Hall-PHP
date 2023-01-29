
<?php
session_start();
$conn=mysqli_connect("localhost","root","","hallphp");

$student_id="";
$pass="";
if(isset($_POST["submit"])){

    $student_id=$_POST['student_id'];
    $password=$_POST['pass'];

    //print_r($student_id);


    //TO CHECK user exist or not
    if($student_id!=""){
        $select="SELECT * FROM student WHERE student_id='$student_id' AND password='$password'";
        $result=mysqli_query($conn,$select);
        $roResult = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)<1){
            $_SESSION['message']="Student id and password combination is not correct";
            header('location:login.php');
        }
        else{
            $_SESSION['student_id']=$student_id;
            $_SESSION['userType']=$roResult['userType'];
            
            
            

            
             //header('location:welcomeUserAdmin.php');
        }
    }
}

if (isset($_SESSION['student_id']))
    header('location:welcomeUserAdmin.php');
//mysqli_close($conn);
?>










<?php include ("layout/beforeSearchMaster.php");?>
<div class="social clear">
    <div class="searchbtn clear">


    </div>
</div>
<?php include("layout/afterSearchMaster.php");?>
<div class="col-lg-2 col-md-3 col-12 menu_block">










    <!--main menu -->
    <div class="side_menu_section">
        <ul class="menu_navCocoon">
            <li class="active">
                <a href="index.php">
                    Dashboard
                </a>
            </li>


            <!--
                <li>
                    if($userTable->userType==1)

                        <a href="{url('')}}">
                            Folder
                        </a>

                    endif
                </li>
                -->

        </ul>
    </div>
    <!--main menu end -->

</div>


            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <div style="background: greenyellow; display: inline;margin-bottom: 5px;"><?php if (isset($_SESSION['message'])) echo $_SESSION['message'];?></div>
                        <form class="form-horizontal" method="POST" action="">
                            <div class="form-group">
                                <label for="student_id" class="col-md-4 control-label">Id</label>
                                <div class="col-md-6">
                                    <input id="student_id" type="text" class="form-control" name="student_id" value="" required autofocus>
                                        <span class="help-block">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="pass" required>
                                        <span class="help-block">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <!-- <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" > Remember Me
                                        </label>
                                    </div> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                    <!-- <a class="btn btn-link" href="">
                                        Forgot Your Password?
                                    </a> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<?php include("layout/beforePagination.php");?>
<?php include("layout/afterPagination.php");?>


