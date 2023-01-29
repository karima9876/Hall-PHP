<?php
session_start();
if (!isset($_SESSION['student_id']))
    header('location:index.php');
if(isset($_POST['Save']))
{

    //print_r($_POST);

    $student_id=$_POST['amstudent_id'];
    $amount=$_POST['amount'];
    $time = date('Y-m-d');
    //print_r($rtitle);



    $conn=mysqli_connect("localhost","root","","hallphp");
    //print_r($conn);
    $query="INSERT INTO amountable(amstudent_id,amount,time) VALUES('$student_id','$amount','$time')";

    //print_r($query);

     //print_r(mysqli_query($conn,$query));
    if(mysqli_query($conn,$query)){

        echo '<script>alert("Successfully Add Amount!!");location.href="amountList.php"</script>';

    }
    else{
        echo '<script>alert("Uncessfull, please try again!!")</script>';
    }
}

?>


<?php include ("layout/beforeSearchMaster.php");?>
<div class="social clear">
    <div class="searchbtn clear">


    </div>
</div>





<?php include("layout/afterSearchMasterUserAdmin.php");?>

<div class="features_area section_gap_change">


				<span class="contact100-form-title-1">
                    Add Amount Form
				</span>

    <div class="containerChange">



        <div class="wrap-contact100">
            <form class="contact100-form validate-form" method="POST" action="addAmount.php">
                <!--  <input type="hidden" name="id" value=""> -->

                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Student ID:</span>
                    <input class="input100" type="text" name="amstudent_id" value="" placeholder="Enter student id" required>
                    <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Amount:</span>
                    <input class="input100" type="text" name="amount" value="" placeholder="Enter Amount" required>
                    <span class="focus-input100"></span>
                </div>




                <div class="container-contact100-form-btn">
                    <button type="submit" name="Save" class="contact100-form-btn1">
                        <span>
                            Save
                            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>


            </form>

        </div>


    </div>



</div>





<?php include("layout/beforePagination.php");?>
<?php include("layout/afterPagination.php");?>




<script src="{{asset('https://code.jquery.com/jquery-1.12.4.js')}}"></script>
<script src="{{asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js')}}"></script>
<script>
    $( function() {
        $('.date').datepicker();
    });
</script>