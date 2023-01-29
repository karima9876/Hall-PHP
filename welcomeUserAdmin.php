
<?php session_start();
if (!isset($_SESSION['student_id']))
    header('location:index.php');
?>
<?php include ("layout/beforeSearchMaster.php");?>
<div class="social clear">
    <div class="searchbtn clear">


    </div>
</div>
<?php include("layout/afterSearchMasterUserAdmin.php");?>














<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <div class="hall">Sheikh Rehena Hall</div>
        <div class="bsmrstu">Bangabandhu Sheikh Mujibur Rahman Science&Technology University</div>
        <div class="home-wrap">
            <!-- home slick -->
            <div id="home-slick">
                <!-- banner -->



                <div class="banner banner-1">
                    <img width="400px" src="public/slidor/img/srh1.jpg"/>

                </div>
                <div class="banner banner-1">
                    <img width="400px" src="public/slidor/img/srh5.jpg"/>

                </div>
                <div class="banner banner-1">
                    <img width="400px" src="public/slidor/img/srh3.jpg"/>

                </div>
                <div class="banner banner-1">
                    <img width="400px" src="public/slidor/img/srh4.jpg"/>
                </div>

                <!-- /banner -->


            </div>
            <!-- /home slick -->
        </div>
        <!-- /home wrap -->





    </div>


</div>










<?php include("layout/beforePagination.php");?>
<?php include("layout/afterPagination.php");?>


