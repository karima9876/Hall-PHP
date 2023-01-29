 <?php
session_start();
if (!isset($_SESSION['student_id']))
    header('location:index.php');

    $conn=mysqli_connect("localhost","root","","hallphp");
    $query = "select * , complain.id as id  from complain inner join student on complain.cStudent_id=student.student_id";
    $result = mysqli_query($conn,$query);
    //print_r($result);


     if (isset($_GET['id'])) {
        $id=$_GET['id'];
         //print_r($id);

          $query ="DELETE FROM complain where id='$id' ";
         $result= mysqli_query($conn,$query);
           header("location:reportList.php");


     }

?>




<?php include ("layout/beforeSearchMaster.php");?>
<div class="social clear">
    <!-- <div class="searchbtn clear">
            <input type="text" name="search"   value="" placeholder="Search keyword..."/>
            <input type="submit" name="submit" value="Search"/>
    </div> -->
</div>
<?php include("layout/afterSearchMasterUserAdmin.php");?>
<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <div>
           
        </div>
        <div class="report">Complain List</div>

        <div class="samepost clear">

            <?php 

                while ($row = mysqli_fetch_assoc($result)) {    ?>
                    
               

            

            <h2><a href="#"><?php echo $row['rtitle']?> </a></h2>

            <img width="100px" src="<?php echo $row['image'] ?>"/> </td>


            <h6><a href=""><?php echo $row['name']?>   </a>  Asked: <?php echo $row['time']?>  </h6>

            <ul id="menu">
                <li><a> .......</a>
                    <ul>
                     
                        <li> <a onclick="return confirm('Are You Sure?')"href="reportList.php?id=<?php echo $row['id']; ?>">Delete</a>

    </li>

                    </ul>
                </li>

            </ul>

            <h1>  </h1>
            <div>
                <p>
                    <?php echo $row['rcontent']?>

                </p>
            </div>
            <h5><a></a></h5>
            <div class="leftmore clear">
            </div>
            <div class="readmore clear">
            </div>
             <?php  } ?>
        </div>

       

        
    </div>
</div>

<?php include("layout/beforePagination.php");?>
<?php include("layout/afterPagination.php");?>

<?php 

    // if (isset('session')) {

    //     echo "Sucessfully Saved";
    // }

 ?>