<?php
    session_start();

if (!isset($_SESSION['student_id']))
    header('location:index.php');
$std=$_SESSION['student_id'];
$conn=mysqli_connect("localhost","root","","hallphp");
                   
    $search=mysqli_real_escape_string($conn,$_GET['search']);

    $limit=6;
    if(isset($_GET['page'])){
    $page_number=$_GET['page'];
    }else{
    $page_number=1;
    }
    $offset=($page_number-1) * $limit;
  $queryMCShow="SELECT * FROM mealcost where mtudent_id='$std'";
  $resultMCShow= mysqli_query($conn,$queryMCShow);
  $rowMCShow = mysqli_fetch_assoc($resultMCShow);
  $rmscost=$rowMCShow['cost'];

  $querya = "select * from student where student_id='$std'";

  $resulta = mysqli_query($conn,$querya);
  $rowa = mysqli_fetch_assoc($resulta);

    if($rowa['userType']=='User'){
        $query = "select * from amountable where amstudent_id='$std' and time LIKE '%{$search}%' order by id DESC LIMIT {$offset},{$limit}";
        $result = mysqli_query($conn,$query);
        $resultt = mysqli_query($conn,$query);
    }
    else{
        $query = "select * from amountable WHERE  time LIKE '%{$search}%'order by id DESC LIMIT {$offset},{$limit}";
        $result = mysqli_query($conn,$query);
        $resultt = mysqli_query($conn,$query);
    }



   // print_r($result);
?>

<?php include ("layout/beforeSearchMaster.php");?>



<div class="social clear">
    <form class="search-post" action="<?php $_SERVER['PHP_SELF']?>" method ="GET">
    <div class="searchbtn clear">

       <input type="text" name="search"   value="" placeholder="Search keyword..."/>
        <input type="submit" name="submit" value="Search"/>
    </div>
</form>
</div>


<?php include("layout/afterSearchMasterUserAdmin.php");?>



<link href="public/userDetails/css/style.css" rel="stylesheet" type="text/css" />




<div class="features_area section_gap_change">

                    <span class="contact100-form-title-1">
                       Amount List
                    </span>

        <div class="containerChange">

          <?php
             $student_id=$_SESSION['student_id'];
               
                $meal_cost = "select * from update_meal limit 1";
            $meal_cRes = mysqli_query($conn,$meal_cost);
            $meal_costRes= mysqli_fetch_assoc($meal_cRes);
            $morning_meal_cost= $meal_costRes['morning_meal_cost'];
            $launch_meal_cost   = $meal_costRes['launch_meal_cost'];
            $dinner_meal_cost= $meal_costRes['dinner_meal_cost'];

             $buy_meal_cost = "select  sum(morning_meal_quantity) as sum_morning_meal_quantity,  sum(launch_meal_quantity) as sum_launch_meal_quantity,  sum(dinner_meal_quantity) as sum_dinner_meal_quantity from buy_meal WHERE bStudent_id='$student_id'";

              $buy_meal_costRes = mysqli_query($conn,$buy_meal_cost);
            $buy_meal_costResult = mysqli_fetch_assoc($buy_meal_costRes);
            //print_r($buy_meal_costResult);
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
            $balance = $fund-$cost_meal_amount;
            if($balance<=0){
                $balance=0;
            }
          
           ?>
            <div style="color: red">
                <?php    if($rowa['userType']=='User'){?>
                <h3>Total Amount: <?php echo $fund?></h3>
                <h3> Cost: <?php echo $cost_meal_amount?></h3>
                <h3> Amount: <?php echo $balance?></h3>
                <?php }?>
            </div>
          

        
                <div class="table-scrollable" >
                <table class="responstable" id="sample_1">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <?php if($rowa['userType']=='Admin'){?>
                        <th>Student Id</th>
                        <?php }?>
                        <th>Amount</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <?php 
                $i=1;
                while ($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>
                        <th><?php echo $i; ?></th>
                        <?php if($rowa['userType']=='Admin'){?>
                            <th><?php echo $row['amstudent_id']; ?></th>
                        <?php }?>

                        <th><?php echo $row['amount']; ?></th>
                        <th><?php echo $row['time']; ?></th>

                    </tr>
                     <?php  ++$i; } ?>


                </table>
            </div>
            <div class="row">
                    <div class="col-12">
                        <nav aria-label="Page navigation example">
                            <?php 
                  
                  $query2="SELECT * FROM amountable WHERE  time='$search'";
                  $result2=mysqli_query($conn,$query2);
                  if(mysqli_num_rows($result2)){
                    $total_records=mysqli_num_rows($result2);
                    $total_page=ceil($total_records/$limit);
                    echo "<ul class='pagination justify-content-center'>";
                    if($page_number>1){
                       echo '<li class="page-item"><a class="page-link" href="amount_listSearch.php?search='.$search.'&page='.($page_number-1).'">prev</a></li>';
                     
                    }
                    
                    for ($i=1; $i <=$total_page ; $i++) { 

                      if($i == $page_number){
                        $active="active";
                      }else{
                        $active="";
                      }
                      echo '<li class="page-item" class='.$active.'><a class="page-link" href="amount_listSearch.php?search='.$search.'&page='.$i.'">'.$i.'</a></li>';
                      # code...
                    }
                    if($total_page>$page_number){
                    echo '<li class="page-item"><a class="page-link"  href="amount_listSearch.php?search='.$search.'&page='.($page_number+1).'">next</a></li>';
                    echo "</ul>";
                  }
                }



                   ?>

                            
                        </nav>

                   
            </div>
            </div>
            </div>
</div>




<?php include("layout/beforePagination.php");?>
<?php include("layout/afterPagination.php");?>


