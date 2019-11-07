



@if(request()->session()->has('noti'))
<div id="noti" class="alert alert-{{ session('noti.alert') }}" role="alert">
       {{ session('noti.message') }}
</div>
@endif

<style>

.alert{
    width: 20% !important;
    position: fixed;
    bottom:0;
    right: 0;
    margin-bottom:50px;
    z-index: 500;
    text-align: center;
} 

</style>

<script type="application/javascript">
     
    setTimeout(function() {
      $('div#noti').fadeOut();
    }, 2000 );

    </script>

