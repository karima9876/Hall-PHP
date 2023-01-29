<?php
    session_start();

if (!isset($_SESSION['student_id']))
    header('location:index.php');
$std=$_SESSION['student_id'];

$conn=mysqli_connect("localhost","root","","hallphp");
//print_r($conn);
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
        $query = "select * from amountable where amstudent_id='$std' order by id DESC LIMIT {$offset},{$limit}";
        $result = mysqli_query($conn,$query);
        $resultt = mysqli_query($conn,$query);
    }
    else{
        $query = "select * from amountable order by id DESC LIMIT {$offset},{$limit}";
        $result = mysqli_query($conn,$query);
        $resultt = mysqli_query($conn,$query);
    }



   // print_r($result);
?>

<?php include ("layout/beforeSearchMaster.php");?>



<div class="social clear">
    <form class="search-post" action="amount_listSearch.php" method ="GET">
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
          $tamount=0;
          while ($rowt = mysqli_fetch_assoc($resultt)) {
              $tamount=$tamount+$rowt['amount'];
           }
           ?>
            <div>
                <?php    if($rowa['userType']=='User'){?>
                <h3>Total Amount: <?php echo $tamount?></h3>
                <h3> Cost: <?php echo $rmscost?></h3>
                <h3> Amount: <?php echo $tamount-$rmscost?></h3>
                <?php }?>
            </div>
          <!--   <div class="col-12Change2">
                <a class="primary-btn text-uppercase"  href="userDetailsAddEdit.php">Add Student Form</a>
            </div> -->

        
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
                  
                  $query2="SELECT * FROM amountable";
                  $result2=mysqli_query($conn,$query2);
                  if(mysqli_num_rows($result2)){
                    $total_records=mysqli_num_rows($result2);
                    $total_page=ceil($total_records/$limit);
                    echo "<ul class='pagination justify-content-center'>";
                    if($page_number>1){
                       echo '<li class="page-item"><a class="page-link" href="amountList.php?page='.($page_number-1).'">prev</a></li>';
                     
                    }
                    
                    for ($i=1; $i <=$total_page ; $i++) { 

                      if($i == $page_number){
                        $active="active";
                      }else{
                        $active="";
                      }
                      echo '<li class="page-item" class='.$active.'><a class="page-link" href="amountList.php?page='.$i.'">'.$i.'</a></li>';
                      # code...
                    }
                    if($total_page>$page_number){
                    echo '<li class="page-item"><a class="page-link"  href="amountList.php?page='.($page_number+1).'">next</a></li>';
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


