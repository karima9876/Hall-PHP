<?php
                session_start();
if (!isset($_SESSION['student_id']))
    header('location:index.php');
$std=$_SESSION['student_id'];
              $conn=mysqli_connect("localhost","root","","hallphp");

$querya = "select * from student where student_id='$std'";

$resulta = mysqli_query($conn,$querya);
$rowa = mysqli_fetch_assoc($resulta);
//print_r($rowa['userType']);

                    $query ="SELECT * FROM update_meal";
                    //print_r($query);
                     $result= mysqli_query($conn,$query);
                         $row = mysqli_fetch_assoc($result);
//                    print_r($row);
//                    echo $row['id'].'<br>';
//                    echo $row['dinner_meal_cost'].'<br>';
//                    echo $row['morning_meal_cost'];



            if(isset($_POST['update_meal_cost']))
            {
                $id=$_POST['id'];
                $morning=$_POST['morning_meal_cost'];
                $launch=$_POST['launch_meal_cost'];
                $dinner=$_POST['dinner_meal_cost'];

                $query="UPDATE  update_meal 
                    SET morning_meal_cost='$morning',
                        launch_meal_cost='$launch',
                        dinner_meal_cost='$dinner'
         
                        WHERE id='$id'";



                if (mysqli_query($conn,$query)) {
                   echo "Successfully Updated!!";

                   echo '<script>alert("Successfully Updated!!");location.href="update_meal_cost.php"</script>';
                }
                else{
                  echo "<script>alert('Unsuccessful!!');</script>";
                }
              }
        ?>

<?php include ("layout/beforeSearchMaster.php");?>
<div class="social clear">
    <div class="searchbtn clear">


    </div>
</div>
<?php include("layout/afterSearchMasterUserAdmin.php");?>

<div class="contentsection contemplete clear">
    <div class="maincontent clear" >
        <div style="text-align: center; ">
            <h2> Meal Cost</h2>
        </div>
        <br>
        <br>
        <!--to show meal buying successful message-->
         <form  method="POST" action="update_meal_cost.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php if (isset($row['id'])) echo $row['id']?>">

        <div class="form-group" style="text-align: left">

            <label>Morning Meal Cost</label>
            <input class="form-control"  style="text-align: left; " type="text" name="morning_meal_cost" <?php if($rowa['userType']=='User') echo "disabled='true'" ; ?>  value="<?php if (isset($row['morning_meal_cost'])) echo $row['morning_meal_cost']; ?> " >

        </div>
        <div class="form-group" style="text-align: left">
            <label>Launch Meal Cost</label>
            <input class="form-control" style="text-align: left; " type="text" name="launch_meal_cost" <?php if($rowa['userType']=='User') echo "disabled='true'" ; ?>  value="<?php if (isset($row['launch_meal_cost'])) echo $row['launch_meal_cost']; ?>">
        </div>
        <div class="form-group" style="text-align: left" >
            <label>Dinner Meal Cost</label>
            <input class="form-control" style="text-align: left; " type="text" name="dinner_meal_cost" <?php if($rowa['userType']=='User') echo "disabled='true'" ; ?>  value="<?php if (isset($row['dinner_meal_cost'])) echo $row['dinner_meal_cost']; ?>">

        </div>
        <div   style="text-align: left; ">
            <button type="submit" <?php if($rowa['userType']=='User') echo "disabled='true'" ; ?>   name="update_meal_cost" class="btn btn-primary">Update Cost</button>
        </div> 
    </form>

    </div>


</div>
<script>

    $(document).ready(function(){
        $('.form-horizontal').on('submit', function(e){
            $(this).css('opacity', '0.5');
            $('.submit').attr('disabled', true);
            $('#loader').removeClass('hide');
        });
    });


</script>
<?php include("layout/beforePagination.php");?>
<?php include("layout/afterPagination.php");?>


