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

<link rel="stylesheet" href="public/sharing/assets/css/custom.css">

<div class="contentsection contemplete clear">
    <div class="maincontent clear" >
        <div style="text-align: center">
            

        <h2>Buy Meal Token</h2>
        </div>
        <br>
        <br>

           <!--to show meal buying successful message-->
            <form class="" method="POST" action="buy_meal.php">

                <div class="form-group">
                <label style="float: left;" for="from">Date</label>

                
                <input style="margin-left: 5%" class="form-horizontal date picker" type="date" data-date-format="DD-MM-YYYY" id="start_date"  name="start_date" />

                <label style="margin-left: 5%" for="to">to</label>
                <input style="margin-left: 5%" class="form-horizontal" type="date"  data-date-format="DD-MM-YYYY" id="end_date" name="end_date" />


    
                <span>(From which date to date you want for taking meal)</span>
            </div>


            <div class="form-group">
                <label style="float: left">Morning Meal Quantity <span style="color: red">*</span></label>
                <select name="morning_meal_quantity" class="form-control">
                    <option value="0">0</option>
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="form-group">
                <label style="float: left">Launch Meal Quantity <span style="color: red">*</span></label>
                <select name="launch_meal_quantity" class="form-control">
                    <option value="0">0</option>
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="form-group">
                <label style="float: left">Diner Meal Quantity <span style="color: red">*</span></label>
                <select name="dinner_meal_quantity" class="form-control">
                    <option value="0">0</option>
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>

            </div>
            <div style="float: left; text-align: center">
                <button type="submit" name="request_for_token" class="btn btn-primary">Request</button>
            </div>
        </form>

    </div>


</div>
<?php
            $connn=mysqli_connect("localhost","root","","hallphp");
           
            $queryM ="SELECT * FROM update_meal";
            $resultM= mysqli_query($connn,$queryM);
            $rowM = mysqli_fetch_assoc($resultM);
            //print_r(2*$rowM['morning_meal_cost']);
        
            if(isset($_POST['request_for_token']))
            {

   //print_r($_POST);
                //print_r('jsdjsdjkd');

                $morning=$_POST['morning_meal_quantity'];
                //print_r($rtitle);
                $launch=$_POST['launch_meal_quantity'];
                $dinner=$_POST['dinner_meal_quantity'];
                $start_date="";
                if(!empty($_POST['start_date'])){
                    $start_date = $_POST['start_date'];
                }
                if(!empty($_POST['end_date'])){
                    $end_date = $_POST['end_date'];
                }
                $day=1;
                if(!empty($start_date)&&!empty($end_date)){
                    $start_d = strtotime($start_date);
                    $end_d = strtotime($end_date);
                    $day= $end_d-$start_d;
                    $day = floor($day / (24 * 60 * 60 ));
                     $day=$day+1;
                     $c=$start_date;
                }else{
                    $c=date('Y-m-d'); 
                    $day=1;
                }

                $amount= $day*$morning*$rowM['morning_meal_cost']+ $day*$launch*$rowM['launch_meal_cost']+ $day*$dinner*$rowM['dinner_meal_cost'];
                
                //echo '<script>alert("Name is '.$name.'")</script>';
                $conn=mysqli_connect("localhost","root","","hallphp");
                //print_r($conn);

                $queryMCShow="SELECT * FROM mealcost where mtudent_id='$std'";
                $resultMCShow= mysqli_query($connn,$queryMCShow);
                $rowMCShow = mysqli_fetch_assoc($resultMCShow);
                $rmsid=$rowMCShow['id'];
                $rmscost=$rowMCShow['cost'];

                $queryam = "select * from amountable where amstudent_id='$std' order by id DESC ";
                $resultam = mysqli_query($conn,$queryam);
                $tam=0;
                while ($row = mysqli_fetch_assoc($resultam)) {
                    $tam=$tam+$row['amount'];
                }
                if ($tam<$amount&&$amount!=0){
                    echo '<script>alert("Unsuccessfull, not enough balance!!")</script>';

                }else {

                    
                    $querybamm = "select * from buy_meal where bStudent_id='$std' AND time='$c'";
                    $resultbam = mysqli_query($conn, $querybamm);
                    $rowbamm = mysqli_fetch_assoc($resultbam);
                    //print_r($rowbamm);
                    if ($rowbamm['id']) {
                        echo '<script>alert("Unsuccessfull, one time for a day!!")</script>';
                    } else {
                        if (empty($rowMCShow['mtudent_id'])) {
                            //print_r($amount);
                            $queryMCost = "INSERT INTO mealcost(mtudent_id,cost) VALUES('$std','$amount')";
                            mysqli_query($conn, $queryMCost);
                        } else {
                            //print_r($amount);
                            $amount = $amount + $rmscost;
                            //print_r($amount);
                            //print_r($rmsid);
                            $queryMECost = "UPDATE  mealcost 
                    SET mtudent_id='$std',
                        cost='$amount'
                        WHERE id='$rmsid'";
                            //print_r($queryMECost);
                            //$queryMCost="INSERT INTO mealcost(mtudent_id,cost) VALUES('$std','$amount')";
                            mysqli_query($conn, $queryMECost);
                            //print_r($hhh);
                        }
                        $trp=0;
                        for ($i=0; $i < $day; $i++) 
                        { 
                            $quema ="INSERT INTO buy_meal(bStudent_id,morning_meal_quantity,launch_meal_quantity,dinner_meal_quantity,time) VALUES('$std','$morning','$launch','$dinner','$c')";
                            mysqli_query($conn,$quema);
                            
                          $c=  date('Y-m-d', strtotime($c. ' + 1 days'));
                            $trp=1;
                         }

                        

                        //print_r($quema);
                        if ( $trp==1) {
                            echo '<script>alert("Successfully requested!!");location.href="list_meal.php"</script>';

                        } else {
                             echo '<script>alert("Unsuccessfull, please try again!!")</script>';
                        }
                    }
                }
            }
        ?>















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
    });


</script>

<?php include("layout/beforePagination.php");?>
<?php include("layout/afterPagination.php");?>


