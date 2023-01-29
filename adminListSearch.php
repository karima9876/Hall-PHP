

<?php
    session_start();
if (!isset($_SESSION['student_id']))
    header('location:index.php');
?>
<?php 
                    $conn=mysqli_connect("localhost","root","","hallphp");
                    if(isset($_GET['submit'])){
                    $search=mysqli_real_escape_string($conn,$_GET['search']);

    $limit=6;
    if(isset($_GET['page'])){
    $page_number=$_GET['page'];
    }else{
    $page_number=1;
    }
    $offset=($page_number-1) * $limit;
     $uTpe='Admin';
    $query = "select * from student where userType='$uTpe' and department LIKE '%{$search}%' or name LIKE '%{$search}%'  ORDER BY id DESC LIMIT {$offset},{$limit}";
    $result = mysqli_query($conn,$query);
    $count=0;
    if($result){
        $count=1;
    }
}
    //$count=mysqli_num_rows($result);



   // print_r($result);


     if (isset($_GET['id'])) {
        $id=$_GET['id'];
         //print_r($id);

          $query ="DELETE FROM student where id='$id' ";
         $result= mysqli_query($conn,$query);
           header("location:adminList.php");


     }
     

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
                       Admin List
                    </span>

        <div class="containerChange">

            <div class="col-12Change2">
                
                <h2 style="" class="page-heading">Search:<?php echo $search; ?></h2>
            </div>

        
                <div class="table-scrollable" >
                <table class="responstable" id="sample_1">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID</th>
                        <th>EMAIL</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Department</th>
                        <th>Contact Number</th>
                        <th>Blood Group</th>
                        <th>Photo</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>
                    <?php 
                    if($count>0){
                $i=1;
                while ($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>
                        <th><?php echo $row['id']; ?></th>
                        <th><?php echo $row['student_id']; ?></th>
                        <th><?php echo $row['email']; ?></th>
                        <th><?php echo $row['name']; ?></th>
                        <th><?php echo $row['address']; ?></th>
                        <th><?php echo $row['department']; ?></th>
                        <th><?php echo $row['cnumber']; ?></th>
                        <th><?php echo $row['blood_group']; ?></th>

                      

                        


                       <td style="word-wrap: break-word;"><img width="100px" src="<?php echo $row['image'] ?>"/> </td>



                        <th>
                            <a href="adminupdate.php?id=<?php echo $row['id']; ?>">Edit /</a>
                        <a onclick="return confirm('Are You Sure?')"href="adminList.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </th>
                    </tr>
                     <?php  ++$i; 
                 } 
                 

                        }else{
                            
                            echo "No record found";
                        }
                    
                        ?>

                 


                </table>
            </div>
            <div class="row">
                    <div class="col-12">
                        <nav aria-label="Page navigation example">
                            <?php 
                  
                  $query2="SELECT * FROM student WHERE department LIKE '%{$search}%'";
                  $result2=mysqli_query($conn,$query2);
                  if(mysqli_num_rows($result2)){
                    $total_records=mysqli_num_rows($result2);
                    $total_page=ceil($total_records/$limit);
                    echo "<ul class='pagination justify-content-center'>";
                    if($page_number>1){
                       echo '<li class="page-item"><a class="page-link" href="adminList.php?search='.$search.'&page='.($page_number-1).'">prev</a></li>';
                     
                    }
                    
                    for ($i=1; $i <=$total_page ; $i++) { 

                      if($i == $page_number){
                        $active="active";
                      }else{
                        $active="";
                      }
                      echo '<li class="page-item" class='.$active.'><a class="page-link" href="adminList.php?search='.$search.'&page='.$i.'">'.$i.'</a></li>';
                      # code...
                    }
                    if($total_page>$page_number){
                    echo '<li class="page-item"><a class="page-link"  href="adminList.php?search='.$search.'&page='.($page_number+1).'">next</a></li>';
                    echo "</ul>";
                  }
                }



                   ?>

                            
                        </nav>

                   
            </div>
            </div>
            
</div>





<?php include("layout/beforePagination.php");?>
<?php include("layout/afterPagination.php");?>

<link href="phq/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="phq/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
   <script src="{{asset('phq/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('phq/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('phq/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('phq/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>

    <script>
       
        $(document).ready(function(){
           // alert('boss');
            $('#sample_1').DataTable({
            "iDisplayLength": 10,
            "aLengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "all"]
            ]
        });  
        });
    </script>
