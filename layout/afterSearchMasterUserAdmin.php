<?php
if (!isset($_SESSION['student_id']))
    header('location:index.php');
$std=$_SESSION['student_id'];
//print_r($std);
$connn=mysqli_connect("localhost","root","","hallphp");
$querya = "select * from student where student_id='$std'";

$resulta = mysqli_query($connn,$querya);

$rowa = mysqli_fetch_assoc($resulta);

//print_r($row);


?>
<ul class="header-account dropdown default-dropdown" xmlns:color="http://www.w3.org/1999/xhtml.php">
    
     <div class="login" role="button" data-toggle="dropdown" aria-expanded="true">

<?php

if(isset($_SESSION['student_id'])) {
              echo '<strong class="text-lowercase">'.  $_SESSION['student_id'].'</strong>';
}
?>


     </div>
     <?php

if(isset($_SESSION['student_id'])&&$_SESSION['userType']=='User') {?>
     <div class="login" role="button" >
        <?php


                $student_id=$_SESSION['student_id'];
                $conn=mysqli_connect("localhost","root","","hallphp");
                $meal_cost = "select * from update_meal limit 1";
            $meal_cRes = mysqli_query($conn,$meal_cost);
            $meal_costRes= mysqli_fetch_assoc($meal_cRes);
            $morning_meal_cost= $meal_costRes['morning_meal_cost'];
            $launch_meal_cost   = $meal_costRes['launch_meal_cost'];
            $dinner_meal_cost= $meal_costRes['dinner_meal_cost'];

             $buy_meal_cost = "select  sum(morning_meal_quantity) as sum_morning_meal_quantity,  sum(launch_meal_quantity) as sum_launch_meal_quantity,  sum(dinner_meal_quantity) as sum_dinner_meal_quantity from buy_meal where bStudent_id='$student_id'";

              $buy_meal_costRes = mysqli_query($conn,$buy_meal_cost);
            $buy_meal_costResult = mysqli_fetch_assoc($buy_meal_costRes);
           // print_r($buy_meal_costResult);
            if($buy_meal_costRes){
               $morning_meal_quantity=  $buy_meal_costResult['sum_morning_meal_quantity'];
                $launch_meal_quantity=  $buy_meal_costResult['sum_launch_meal_quantity'];
                $dinner_meal_quantity=  $buy_meal_costResult['sum_dinner_meal_quantity']; 
            }else{
                $morning_meal_quantity=0;
                $launch_meal_quantity=0;
                $dinner_meal_quantity=0;
            }
            $cost_meal_amount=0;
            $cost_meal_amount= $morning_meal_cost*$morning_meal_quantity+$launch_meal_cost*$launch_meal_quantity+$dinner_meal_cost*$dinner_meal_quantity;

            $fund_amount ="select sum(amount) as sum_amount from amountable where amstudent_id='$student_id'";
            $fund_amountRes = mysqli_query($conn,$fund_amount );
             $fund=0;
            if ( $fund_amountRes) {
                $fund_amountResult = mysqli_fetch_assoc($fund_amountRes);
                $fund = $fund_amountResult['sum_amount'];
            }
			//print_r($fund);
            $balance = $fund-$cost_meal_amount;
			//print_r($balance);
            if($balance<=0){
                $balance=0;
            }
             

              echo '<strong class="text-lowercase">'.  $balance.' Taka'.'</strong>';

?>
        
</div>
<?php
}
?>

    <ul class="custom-menu">

            <li>
                <a href="logout.php" ><i class="fa fa-unlock-alt"></i> Logout</a>
            </li>
        </ul>

</ul>
<!-- /Account -->







</div>

<div class="row justify-content-colter">
    <div class="col-lg-2 col-md-3 col-12 menu_block">



        <!--main menu -->
        <div class="side_menu_section">
            <ul class="menu_navCocoon">

                <li class="active" >
                    <a  href="welcomeUserAdmin.php">
                        Dashboard
                    </a>
                </li>
                <?php if ( $rowa['userType']=='User' ){ ?>

                    <li>


                        <a  href="reportAddEdit.php">
                            Add Complain
                        </a>


                    </li>
                <?php } ?>

                <li>

                    <a href="profile.php">
                        Profiles
                    </a>
                </li>

                <?php if ( $rowa['userType']=='Admin' ){ ?>

                    <li>


                        <a href="reportList.php">
                            ComplainList
                        </a>


                    </li>
                <?php } ?>


                <?php if ( $rowa['userType']=='Admin' ){ ?>

                    <li>


                    <a href="userDetailsAddEdit.php">
                        Add Student
                    </a>


                </li>
                <?php } ?>

                <?php if ( $rowa['userType']=='Admin' ){ ?>

                    <li>


                        <a href="userDetailslist.php">
                            StudentList
                        </a>


                    </li>
                <?php } ?>
                 <?php if ( $rowa['userType']=='Admin' ){ ?>

                    <li>


                    <a href="adminAddEdit.php">
                        Add Admin
                    </a>


                </li>
                <?php } ?>
                 <?php if ( $rowa['userType']=='Admin' ){ ?>

                    <li>


                    <a href="adminList.php">
                        Admin List
                    </a>


                </li>
                <?php } ?>
                <?php if ( $rowa['userType']=='Admin' ){ ?>

                    <li>


                        <a href="set_token_date.php">
                            Token List
                        </a>


                    </li>
                <?php } ?>
                <?php if ( $rowa['userType']=='User' ){ ?>

                    <li>


                        <a href="buy_meal.php">
                            Buy Meal Token
                        </a>


                    </li>
                <?php } ?>
                <?php if ( $rowa['userType']=='User' ){ ?>
                <li>
                    <a href="list_meal.php">
                        List Meal Token
                    </a>
                </li>
                 <?php } ?>
                <?php if ( $rowa['userType']=='Admin' ){ ?>

                    <li>


                        <a href="addAmount.php">
                            Add Amount
                        </a>


                    </li>
                <?php } ?>
                <li>


                    <a href="amountList.php">
                        Amount List
                    </a>


                </li>

<!--                --><?php //if ( $rowa['userType']=='Admin' ){ ?>

                    <li>


                        <a href="update_meal_cost.php">
                            Meal Cost
                        </a>


                    </li>
<!--                --><?php //} ?>
                    <li>

                        <a href="transaction_info.php">
                            Transaction Information
                        </a>

                    </li>



            </ul>
        </div>
        <!--main menu end -->


    </div>
    <script>

        $('.li').on('click','li', function(){
            $(this).addClass('active').siblings().removeClass('active');
        });
    </script>

