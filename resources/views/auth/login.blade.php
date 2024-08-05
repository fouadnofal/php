<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    @include('includes.loginHead')
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <p style="text-align: center;"><img src="{{asset('assets/images/profile-img.png')}}" alt=""></p>
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <h1 style="text-align: center;">الدخول</h1>
              <div>
                <input type="text" name="userName" class="form-control" placeholder="اسم المستخدم" required="" />
                @error('userName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="كلمة السر" required="" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
                <div class="col-6" >
                  <button class="btn btn-primary w-100" type="submit">دخول</button>
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-book"></i></i> كنيسة مارجرجس</h1>
                  <p>كافة الحقوق محفوظة - كنيسة مارجرجس الفردوس</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
