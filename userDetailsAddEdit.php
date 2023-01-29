<?php
session_start();
if (!isset($_SESSION['student_id']))
    header('location:index.php');
            if(isset($_POST['Save']))
            {

              // print_r($_POST);

          $student_id=$_POST['student_id'];
                //print_r($rtitle);
                $email=$_POST['email'];
                $password=$_POST['password'];
                // $amount=$_POST['amount'];
                $userType="User";
                $name=$_POST['name'];
                $fname=$_POST['fname'];
                $mname=$_POST['mname'];
                $address=$_POST['address'];
                $department=$_POST['department'];
                $cnumber=$_POST['cnumber'];
                $gnumber=$_POST['gnumber'];
                $roomno=$_POST['roomno'];
                $blood_group=$_POST['blood_group'];
                

                //$photo=$_POST['photo'];
              //  $image=$_FILES['image'];
                $image=$_POST['image'];
                // print_r($image);
                 // $image_dir="pictures/";
                 // $target_file=$image_dir.basename($image);
                 print_r($target_file);

                $targetFile = 'pictures/' . basename($_FILES["image"]["name"]);

                 move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
                
              
                $conn=mysqli_connect("localhost","root","","hallphp");
                
              //  print_r($conn);
                 $query="INSERT INTO student(student_id,email,password,userType,name,fname,mname,address,department,cnumber,gnumber,roomno,blood_group,image) VALUES('$student_id','$email','$password','$userType','$name','$fname','$mname','$address','$department','$cnumber','$gnumber','$roomno','$blood_group','$targetFile')";
                
                 //  print_r($query);

               
               if(mysqli_query($conn,$query)){
                
                   echo '<script>alert("Successfully Add Student!!");location.href="userDetailsList.php"</script>';
                  
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
                    Add Student Form
				</span>

        <div class="containerChange">



            <div class="wrap-contact100">
                    <form class="contact100-form validate-form" method="POST" enctype="multipart/form-data" action="userDetailsAddEdit.php">
                   <!--  <input type="hidden" name="id" value=""> -->

                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Student ID:</span>
                    <input class="input100" type="text" name="student_id" value="" placeholder="Enter student id" required>
                    <span class="focus-input100"></span>
                </div>

                                  <div class="wrap-input100 validate-input">
                        <span class="label-input100">Email:</span>
                        <input class="input100" type="email" name="email"  value="" placeholder="Please, Enter Unique email">
                        <span class="focus-input100"></span>
                    </div>
                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Password:</span>
                    <input class="input100" type="password" name="password"   placeholder="Enter password">
                    <span class="focus-input100"></span>
                </div>
    

                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Name:</span>
                    <input class="input100" type="text" name="name" value="" placeholder="Enter name">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Father Name:</span>
                    <input class="input100" type="text" name="fname" value="" placeholder="Enter father name">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Mother Name:</span>
                    <input class="input100" type="text" name="mname" value="" placeholder="Enter mother name">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Address:</span>
                    <input class="input100" type="text" name="address" value="" placeholder="Enter address">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Department & Year:</span>
                    <input class="input100" type="text" name="department" value="" placeholder="Enter department">
                    <span class="focus-input100"></span>
                </div>
             
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Contact Number:</span>
                    <input class="input100" type="text" name="cnumber" value="" placeholder="Enter contact number">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Guardian Contact Number:</span>
                    <input class="input100" type="text" name="gnumber" value="" placeholder="Enter contact number">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Room No:</span>
                    <input class="input100" type="text" name="roomno" value="" placeholder="Enter room no" required>
                    <span class="focus-input100"></span>
                </div>
             
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Blood Group:</span>
                    <input class="input100" type="text" name="blood_group" value="" placeholder="Enter blood group">
                    <span class="focus-input100"></span>
                </div>


                
                 <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Photo:</span>
                    <input class="input100" type="file" name="image"  placeholder="Enter photo">

                        <!-- <img width="80" src=""  alt=""> -->

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