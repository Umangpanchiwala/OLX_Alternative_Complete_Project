@extends('user/layout')
@section('content')

<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border border">
                    <h3 class="bg-gray p-4">Register Now</h3>
                    
                    <form method="POST" action="{{ route('registration.registration_process') }}" id=frmRegistration>
                        
                        @csrf
                        <fieldset class="p-4">
                            @if (Session::has('fail'))
                    <div class="alert-danger container d">{{Session::get('fail')}}</div>                        
                    @endif
                            <input type="name" name="name" placeholder="Name*" required class="border p-3 w-100 my-2">
                            <div id="name_error" class="field_error"></div>
                            <input type="email" name="email" placeholder="Email*" required class="border p-3 w-100 my-2">
                            <div id="email_error" class="field_error"></div>
                            <input type="password" name="password" placeholder="Password*" required class="border p-3 w-100 my-2">
                            <div id="password_error" class="field_error"></div>
                            <!-- <div class="loggedin-forgot d-inline-flex my-3">
                                <input type="checkbox" id="registering" class="mt-1">
                                <label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="terms-condition.html">Terms & Conditions</a></label>
                            </div> -->
                            <button id=btnregister type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Register Now</button>
                            @csrf
                        </fieldset>
                    </form>
                </div>
                <div id="thank_you_msg" class="field_error"></div>
            </div>
        </div>
    </div>
</section>

@endsection
<script>
jQuery('#frmRegistration').submit(function(e){
  e.preventDefault();
  jQuery('.field_error').html('');
  jQuery.ajax({
    url:'registration_process',
    data:jQuery('#frmRegistration').serialize(),
    type:'post',
    success:function(result){
      if(result.status=="error"){
        jQuery.each(result.error,function(key,val){
          jQuery('#'+key+'_error').html(val[0]);
        });
      }
      if(result.status=="success"){
        jQuery('#frmRegistration')[0].reset();
        jQuery('#thank_you_msg').html(result.msg);
      }
    }
});
});
</script>