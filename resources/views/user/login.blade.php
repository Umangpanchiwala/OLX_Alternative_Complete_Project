@extends('user/layout')
@section('content')

<section class="login py-5 border-top-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-8 align-item-center">
        <div class="border">
          {{-- <div class="alert alert-success" role="alert">
                        {{ session('msg') }}
        </div> --}}
        <h3 class="bg-gray p-4">Login Now</h3>
        <form method="post" action="{{route('login.login_process')}}" id="frmLogin">
          <fieldset class="p-4">
            @if (Session::has('success'))
            <div class="alert success">{{Session::get('success')}}</div>
            @endif
            @if (Session::has('fail'))
            <div class="alert-danger">{{Session::get('fail')}}</div>
            @endif
            @if (Session::has('status'))
            <div class="alert-danger">{{Session::get('status')}}</div>  
            @endif
            <input type="text" name="str_login_email" placeholder="Username" class="border p-3 w-100 my-2">
            <input type="password" name="str_login_password" placeholder="Password" class="border p-3 w-100 my-2">
            <!-- <div class="loggedin-forgot">
                                    <input type="checkbox" id="rememberme">
                                    <label for="rememberme" class="pt-3 pb-2">Keep me logged in</label>
                            </div> -->

            <button type="submit" class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3" id="btnlogin">Log in</button>
            <a class="mt-3 d-block  text-primary" href="#">Forget Password?</a>
            <a class="mt-3 d-inline-block text-primary" href="{{asset('user/register')}}">Register Now</a>
          </fieldset>
          @csrf
        </form>
      </div>
    </div>
  </div>
  </div>
</section>
@endsection
<script>
  jQuery('#frmLogin').submit(function(e) {
    jQuery('#login_msg').html("");
    e.preventDefault();
    jQuery.ajax({
      url: '/login_process',
      data: jQuery('#frmLogin').serialize(),
      type: 'post',
      success: function(result) {
        if (result.status == "error") {
          jQuery('#login_msg').html(result.msg);
        }
        if (result.status == "success") {
          window.location.href = '/'
          //jQuery('#frmLogin')[0].reset();
          //jQuery('#thank_you_msg').html(result.msg);
        }
      }
    });
  });
</script>