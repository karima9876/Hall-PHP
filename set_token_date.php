
<?php
    session_start();
$conn=mysqli_connect("localhost","root","","hallphp");
//     if(isset($_POST['request_for_token_list']))
//            {
//              $meal_time=$_POST['meal_time_quantity'];
//
//                $token_date = $_POST['token_date'];
//                if($meal_time=="morning_meal_quantity"){
//                    $query = "select * from buy_meal where morning_meal_quantity='$meal_time' AND time='$token_date' order by id DESC ";
//                }elseif ($meal_time=="launch_meal_quantity"){
//                    $query = "select * from buy_meal where launch_meal_quantity='$meal_time' AND time='$token_date' order by id DESC ";
//                }else{
//                    $query = "select * from buy_meal where dinner_meal_quantity='$meal_time' AND time='$token_date' order by id DESC ";
//                }
//
//                $result = mysqli_query($conn,$query);
//                print_r( $result);
//            }
   // print_r($result);
?>


<?php include ("layout/beforeSearchMaster.php");?>
<div class="social clear">
    <div class="searchbtn clear">


    </div>
</div>





<?php include("layout/afterSearchMasterUserAdmin.php");?>




<div class="contentsection contemplete clear">
    <div class="maincontent clear" >
        <div style="text-align: center">
            <h2>Set Token Date</h2>
        </div>
        <br>
        <br>

         <form style="text-align:center;font-size:20px;margin-top: 20px"  method="POST" action="token_list.php" enctype="multipart/form-data">
        <div class="form-group">
            <label >Token Date:    </label>

            <input type="date" value="<?php echo date("Y-m-d"); ?>" name="token_date" placeholder="YYYY-MM-DD" required />
        </div>
       

            <button style=" margin-left: -10px;margin-top: 10px" href="token_list.php" type="submit" name="request_for_token_list"  class="btn btn-primary">Token List</button>
            </form>
        </div> 

    </div>

<script>
    $('#sample_1').DataTable({
        "iDisplayLength": 10,
        "aLengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "all"]
        ]
    });

    $(document).ready(function(){
        $('.form-horizontal').on('submit', function(e){
            $(this).css('opacity', '0.5');
            $('.submit').attr('disabled', true);
            $('#loader').removeClass('hide');
        });
    })


</script>




<?php include("layout/beforePagination.php");?>
<?php include("layout/afterPagination.php");?>


