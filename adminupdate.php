<?php

            session_start();
if (!isset($_SESSION['student_id']))
    header('location:index.php');

              $conn=mysqli_connect("localhost","root","","hallphp");

                    if (isset($_GET['id'])) {
                     $id=$_GET['id'];
                    //print_r($id);

                    $query ="SELECT * FROM student where id='$id' ";
                    //print_r($query);
                     $result= mysqli_query($conn,$query);
                         $row = mysqli_fetch_assoc($result);
                    //print_r($row);
           }



            if(isset($_POST['Save']))
            {
              $id=$_POST['id'];
             // print_r($id);
              $student_id=$_POST['student_id'];
                // print_r($student_id);
                $email=$_POST['email'];
                  // print_r($email);
                $password=$_POST['password'];
                $userType='Admin';
                $name=$_POST['name'];
                // $fname=$_POST['fname'];
                // $mname=$_POST['mname'];
                $address=$_POST['address'];
                $department=$_POST['department'];
                $cnumber=$_POST['cnumber'];
                // $gnumber=$_POST['gnumber'];
                // $roomno=$_POST['roomno'];
                $blood_group=$_POST['blood_group'];
                $image=$_FILES["image"]["name"];
               
                  if(empty($_FILES["image"]["name"])){
                   //  print_r( $image);
                  //  print_r('hello');
                  $query ="SELECT * FROM student where id='$id'";
                            //print_r($query);
                  $result= mysqli_query($conn,$query);
                   $row = mysqli_fetch_assoc($result);
                     $target_file= $row['image'];


                  }else{

                     $image_dir="pictures/";
                    $target_file=$image_dir.basename($_FILES['image']['name']);
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                  }

                 // print_r($image);
                 
            
            


            
              
                
                $query="UPDATE  student 
                    SET  student_id='$student_id',
                email='$email',
                password='$password',
                name='$name',
                address='$address',
                department='$department',
                cnumber='$cnumber',
                blood_group='$blood_group',
                image='$target_file'
                 WHERE id='$id'";
                         
                        
               // print_r($query);
               
              if (mysqli_query($conn,$query)) {
                   

                  echo '<script>alert("Successfully Updated!!");location.href="adminList.php"</script>';
                }
                else{
                  echo "<script>alert('Unsuccessful!!');location.href='adminList.php';</script>";
                          
                 }
              }

                  
        ?>
          

<?php include ("layout/beforeSearchMaster.php");?>
<?php include ("layout/searchMaster.php");?>





<?php include("layout/afterSearchMasterUserAdmin.php");?>

<div class="features_area section_gap_change">


                <span class="contact100-form-title-1">
                    Edit Admin Form
                </span>

        <div class="containerChange">



            <div class="wrap-contact100">
                    <form class="contact100-form validate-form" method="POST" action="adminupdate.php"enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php if(!empty($row['id'])) echo $row['id']; ?>">

                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">ID:</span>
                    <input class="input100" type="text" name="student_id" value="<?php if(!empty($row['student_id'])) echo $row['student_id']; ?>" placeholder="Enter student id" required>
                    <span class="focus-input100"></span>
                </div>

                                  <div class="wrap-input100 validate-input">
                        <span class="label-input100">Email:</span>
                        <input class="input100" type="email" name="email"  value="<?php if(!empty($row['email'])) echo $row['email']; ?>" placeholder="Please, Enter Unique email">
                        <span class="focus-input100"></span>
                    </div>
            
                  <div class="wrap-input100 validate-input">
                    <span class="label-input100">Password:</span>
                    <input class="input100" type="password"  name="password"   value="<?php if(!empty($row['password'])) echo $row['password']; ?>" placeholder="Enter Amount">
                    <span class="focus-input100"></span>
                </div>
            

                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Name:</span>
                    <input class="input100" type="text" name="name" value="<?php if(!empty($row['name'])) echo $row['name']; ?>" placeholder="Enter name">
                    <span class="focus-input100"></span>
                </div>
                
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Address:</span>
                    <input class="input100" type="text" name="address" value="<?php if(!empty($row['address'])) echo $row['address']; ?>" placeholder="Enter address">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Department:</span>
                    <input class="input100" type="text" name="department" value="<?php if(!empty($row['department'])) echo $row['department']; ?>" placeholder="Enter department">
                    <span class="focus-input100"></span>
                </div>
             
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Contact Number:</span>
                    <input class="input100" type="text" name="cnumber" value="<?php if(!empty($row['cnumber'])) echo $row['cnumber']; ?>" placeholder="Enter contact number">
                    <span class="focus-input100"></span>
                </div>
             
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Blood Group:</span>
                    <input class="input100" type="text" name="blood_group" value="<?php if(!empty($row['blood_group'])) echo $row['blood_group']; ?>"  placeholder="Enter blood group">
                    <span class="focus-input100"></span>
                </div>



                <!-- $contents = pathinfo(storage_path().'/zOEh8zefUuHmOhlLY80UNNneTO5tJmv1ECfrwOpF.png');
                // img width="100px" src="asset('admin/uploads/'.$flower-image)}}

                //  dd( $contents['extension']);
                -->
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Photo:</span>
                    <input class="input100" type="file" name="image"  placeholder="Enter photo">
                    <!-- <input type="file" name="image"  class="form-control" placeholder="image" required> -->
                              <img width="100px" src="<?php if(!empty($row['image'])) echo $row['image'] ?>"/>


                    <span class="focus-input100"></span>
                </div>





                 <div class="container-contact100-form-btn">
                        <button type="submit" name="Save" class="contact100-form-btn1">
                        <span style="margin-top:12px">
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