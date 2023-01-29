


@include('layout.beforeSearchMaster')

<div class="social clear">
    <div class="searchbtn clear">

    </div>
</div>




@include('layout.afterSearchMasterUserAdmin')







<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <div class="report">Report List</div>
        @if(isset($rts[0]))
            @foreach($rts as $report)
        <div class="samepost clear">
            <h2><a href="#">{{$report->rtitle}}</a></h2>

            <img width="100" src="{{asset('/uploads/personalPhotos/'.$report->photo)}}"  alt="">

            <h6><a href="{{url('particularProfile').'?id='.$report->uid}}">{{$report->username}}   </a>  Asked: {{\Carbon\Carbon::parse($report->updated_at)->diffForhumans()}}   </h6>

            <ul id="menu">

                @if($userTable->userType==1)

                <li><a> .......</a>
                    <ul>
                        <li><a href="{{url('reports/delete').'?id='.$report->id}}">delete</a></li>

                    </ul>
                </li>
                  @endif
            </ul>

            <h1>  </h1>
            <div>
                <p>
                    {{$report->rcontent}}
                </p>
            </div>
            @if($report->rfile!=null)
            <h5><a download="true" href="{{asset(\Illuminate\Support\Facades\Storage::url($report->rfile))}}">---click Image/Pdf</a></h5>
           @endif


            <div class="leftmore clear">

            </div>
            <div class="readmore clear">

            </div>
        </div>
             @endforeach
        @endif




    </div>




</div>














<script>
    $('#sample_1').DataTable({
        "iDisplayLength": 10,
        "aLengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "all"]
        ]
    });

    $(document).ready(function(){
        $('.form-horizontal').on('submit', function(e){
            $(this).css('opacity', '0.5');
            $('.submit').attr('disabled', true);
            $('#loader').removeClass('hide');
        });
    });


</script>

@include('layout.beforePagination')

@include('layout.afterPagination')

