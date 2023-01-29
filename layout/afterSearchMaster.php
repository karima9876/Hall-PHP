<ul class="header-account dropdown default-dropdown" xmlns:color="http://www.w3.org/1999/xhtml">

    <!--@if (Auth::guest()) -->
        <div class="login">
            <a href="login.php"> <span>Login <i class="icon-calendar3"></i></span></a>
        </div>
    <!--   @else
           <div class="login" role="button" data-toggle="dropdown" aria-expanded="true">

               <strong class="text-lowercase">{{ Auth::user()->username }} </strong>
           </div>


           <ul class="custom-menu">
               <li><a href="{{ route('logout') }}"><i class="fa fa-unlock-alt"></i> Logout</a></li>
           </ul>
       @endif -->
</ul>
<!-- /Account -->








</div>

<div class="row justify-content-colter">
