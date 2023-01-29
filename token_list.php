<link rel="apple-touch-icon" sizes="76x76" href="public/particular_profile/assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="public/particular_profile/assets/img/favicon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>
    Token List By Date
</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<!-- CSS Files -->
<link href="public/particular_profile/assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="public/particular_profile/assets/demo/demo.css" rel="stylesheet" />
<link href="public/particular_profile/assets/change.css" rel="stylesheet" />

<?php
session_start();
$conn=mysqli_connect("localhost","root","","hallphp");


if(isset($_POST['request_for_token_list']))
{
    

    $token_date = $_POST['token_date'];
    $token_date= date('Y-m-d', strtotime( $token_date));
    //print_r($token_date);
    
    
    $query = "select sum(morning_meal_quantity) as sum_morning_meal_quantity, sum(launch_meal_quantity) as sum_launch_meal_quantity, sum(dinner_meal_quantity) as sum_dinner_meal_quantity from buy_meal where time='$token_date'";
    

    $result = mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result);
    $count_morning=0;
    $count_launch=0;
    $count_dinner=0;
    if(!empty($row['sum_morning_meal_quantity'])){
       $count_morning= $row['sum_morning_meal_quantity'];
    }
    if(!empty($row['sum_launch_meal_quantity'])){
       $count_launch= $row['sum_launch_meal_quantity'];
    }
    if(!empty($row['sum_dinner_meal_quantity'])){
       $count_dinner= $row['sum_dinner_meal_quantity'];
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
        <div style="text-align: center">
            <h2>Meal List According to Token Date</h2>
        </div>
        <div class="row">

            <div class="col-md-12">
                
            </div>

        </div>
         <div style="margin-top: 20px" class="row">
                <div class="card-body">
                        
                           
                            <h3 class="card-category text-gray">Total Morning Meal:

                                    <a href="#" class="btn btn-primary btn-round"> <?php echo $count_morning?>   </a>
                            </h3>

                            <h3 class="card-category text-gray">Total Launch Meal:
                                       
                                    <a href="#" class="btn btn-primary btn-round"> <?php echo $count_launch?>   </a>
                            </h3>
                             <h3 class="card-category text-gray">Total Dinner Meal:

                                    <a href="#" class="btn btn-primary btn-round"> <?php echo $count_dinner?>   </a>
                            </h3>
                            

                        
                        </div>
        </div>
        <div class="col-md-12" style="text-align: center;">
        <a type="button" href="set_token_date.php" class="btn btn-primary">Back</a>
        <button type="button" onclick="printCopy()"  class="btn btn-success">Print</button>
    </div>
        <div id="printArea">
        <?php
            $squery= "select * from student";
            $sres = mysqli_query($conn, $squery);
        ?>

            <div class="table-scrollable" >
                    <table class="responstable" id="sample_1">
                        <thead>
                        <tr>
                            <th>SNO.</th>
                            <th>Student Id</th>
                            <th>Morning Meal</th>
                            <th>Launch Meal</th>
                            <th>Dinner Meal</th>
                        </tr>
                        </thead>
                        <?php 
                    $i=1;
                    while ($srow = mysqli_fetch_assoc($sres)) { ?>


                        <?php 
                            $std_id =$srow['student_id'];
                            $sMquery = "select sum(morning_meal_quantity) as sum_morning_meal_quantity, sum(launch_meal_quantity) as sum_launch_meal_quantity, sum(dinner_meal_quantity) as sum_dinner_meal_quantity from buy_meal where time='$token_date' and bStudent_id='$std_id'";
        

                            $sMresult = mysqli_query($conn,$sMquery);
                            $sMrow=mysqli_fetch_assoc($sMresult);
                            if($sMresult){
                               $morningMQ= $sMrow['sum_morning_meal_quantity'];
                                $launchMQ= $sMrow['sum_launch_meal_quantity'];
                                $dinnerMQ= $sMrow['sum_dinner_meal_quantity']; 
                            }else{
                                $morningMQ= 0;
                                $launchMQ= 0;
                                $dinnerMQ= 0;
                            }
                            
                        if($morningMQ!=0 || $launchMQ!=0 || $dinnerMQ!=0){
                        ?>

                        <tr>
                            <th><?php echo $i; ?></th>
                        
                            <th><?php echo $std_id; ?></th>
                            <th><?php echo $morningMQ; ?></th>
                            <th><?php echo $launchMQ; ?></th>
                            <th><?php echo $dinnerMQ; ?></th>
                          

                        </tr>
                         <?php ++$i; }   } ?>
                        <tr>
                            <th colspan="2">Total</th>
                            <th><?php echo $count_morning?></th>
                            <th><?php echo $count_launch?></th>
                            <th><?php echo $count_dinner?></th>
                        </tr>

                    </table>


            </div> 
        </div> 


</div>






    

<?php include("layout/beforePagination.php");?>
<?php include("layout/afterPagination.php");?>

<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jQuery.print.js"></script>
    <script type="text/javascript">
    function printCopy() {
        var printContents = document.getElementById('printArea').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();
        document.body.innerHTML = originalContents;
    }
    $(document).ready(function() {
        $('#printA').on('click',function() {
            console.log('hello');
            $("#printArea").print({
                mediaPrint : false,
                deferred: $.Deferred(),
                title: null,
                

            });
        });
    });

</script>