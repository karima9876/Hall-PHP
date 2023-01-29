<?php
session_start();
if (!isset($_SESSION['student_id']))
    header('location:index.php');
$std=$_SESSION['student_id'];
?>
<?php include ("layout/beforeSearchMaster.php");?>

<div class="social clear">
    <div class="searchbtn clear">

        
    </div>
</div>

<?php include("layout/afterSearchMasterUserAdmin.php");?>
<div class="features_area section_gap_change">
                <span class="contact100-form-title-1">
                    Add Complain
                </span>
        <div class="containerChange">
            <div class="wrap-contact100">
                <form class="contact100-form validate-form" method="POST" action="reportAddEdit.php">
                    <input type="hidden" name="id" value="">
                <div class="wrap-input100 validate-input">
                        <span  class="label-input100">Title:</span>
                        <input style="margin-left: 10px;" class="input100" type="text"  name="rtitle"  value=""   placeholder="Enter Title" >
                        <span class="focus-input100"></span>
                    </div>
                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Content:</span>
                    <textarea class="input100" type="text"  name="rcontent"     placeholder="Enter Complain"></textarea>
                </div>
                
                <div class="container-contact100-form-btn">
                        <button type="submit" name="Save" class="contact100-form-btn1">
                        <span>
                            Save
                            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                        </span>
                        </button>
                    </div>


               <!--  <div class="container-contact100-form-btn">
                        <input type="submit" name="submit" value="Save" class="contact100-form-btn1" >
                        
                     
                </div> -->
                </form>
            </div>
        </div>
    </div>
        <?php
            
        
            if(isset($_POST['Save']))
            {

   //print_r($_POST);
                //print_r('jsdjsdjkd');

                $rtitle=$_POST['rtitle'];
                //print_r($rtitle);
                $rcontent=$_POST['rcontent'];


              
                //echo '<script>alert("Name is '.$name.'")</script>';
                $conn=mysqli_connect("localhost","root","","hallphp");
                //print_r($conn);
                $query="INSERT INTO complain(cStudent_id,rtitle,rcontent) VALUES('$std','$rtitle','$rcontent')";
                //print_r(mysqli_query($conn,$query));
                if(mysqli_query($conn,$query)){
                    echo '<script>alert("Successfully Complained!!");location.href="reportAddEdit.php"</script>';
                  
                }
                else{
                    echo '<script>alert("Uncessfull, please try again!!")</script>';
                }
            }
        ?>
 



<?php include("layout/beforePagination.php");?>
<?php include("layout/afterPagination.php");?>

