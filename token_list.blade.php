
<!DOCTYPE html>
<html>
<head>
    <link media="screen" href="{{asset('css/main.css')}}" />
    <link media="print" href="{{asset('css/print.css')}}" />
    <!--<link rel="stylesheet" type="text/css" href="{{asset('css/token_list.css')}}">-->
    <link type="text/css" rel="stylesheet" href="{{asset('/loginRegister/css/bootstrap.min.css')}}" />

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{asset('/loginRegister/js/bootstrap.min.js')}}" type="text/javascript"></script>
</head>
<body>

    <?php
            /*
            function createPageStart(){
                echo '
                    <page size="A4">
                        <div class="container">
                ';
            }
            function createPageEnd(){
                echo '
                        </div>
                    </page>
                ';
            }*/
    ?>

            <?php $num=1;$end_num=1;$token_per_page=2;?>
            @foreach($tokens as $token)
                <?php $user_info=DB::table('users')->where('student_id','=',$token->student_id)->get();$info=null;?>
                @foreach($user_info as $info)
                @endforeach
                <?php $token_num=$token->$meal_time_quantity;

                if ($meal_time_quantity=="morning_meal_quantity")
                    {
                        $token_type="Morning Meal Token";
                    }
                elseif ($meal_time_quantity=="launch_meal_quantity")
                    {
                        $token_type="Launch Meal Token";
                    }
                else
                    {
                        $token_type="Dinner Meal Token";
                    }
                while($token_num!=0){
                    /*
                    if ($num==1||($num/$token_per_page>=1&&$num%$token_per_page==0)){
                        $end_num=1;
                        createPageStart();
                    }*/
                    echo "
                        <h5 style='text-align: center'>".$num.".".$token_type."(".$token->date.") Sheikh Rehena Hall, BSMRSTU.  Student ID:".$info->student_id."</h5>

                    <hr>
                    ";
                    /*
                    $end_num++;
                    if ($end_num/$token_per_page==1){
                        createPageEnd();
                    }
                    */
                    $num++;
                    $token_num=$token_num-1;
                }
                ?>
            @endforeach

</body>

</html>