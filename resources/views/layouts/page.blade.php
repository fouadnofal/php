<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    @include('includes.head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        {{-- right menu --}}
        @include('includes.rightCol')

        {{-- Top --}}
        @include('includes.top')


        @include('includes.content')

        @include('includes.footer')
      </div>
    </div>

    @include('includes.jsFooter')

  </body>
</html>