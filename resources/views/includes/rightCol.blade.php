<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="#" class="site_title"><i class="fa fa-book"></i> <span>مارجرجس الفردوس</span></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="{{asset('assets/images/profile-img.png')}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>مرحباً,</span>
          <h2>{{ Auth::user()->fullName }}</h2>
        </div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                  <div class="menu_section">
                      <h3>القائمة الرئيسية</h3>
                      <ul class="nav side-menu">
                        @if (Auth::user()->userRole == 'superAdmin')
                          <li><a><i class="fa fa-users"></i> المستخدمين <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                  <li><a href="{{ route('user.index') }}">قائمة المستخدمين</a></li>
                                  <li><a href="{{ route('user.create') }}">إضافة مستخدم</a></li>
                                  <li><a href="{{ route('user.trashed') }}">مستخدمين تم مسحهم</a></li>
                              </ul>
                          </li>
                        @endif

                          <li><a><i class="fa fa-users"></i> المخدومين <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                  <li><a href="{{ route('served.index') }}">قائمة المخدومين</a></li>
                                  <li><a href="{{ route('served.create') }}">إضافة مخدوم</a></li>
                                  <li><a href="{{ route('served.trashed') }}">مخدومين تم مسحهم</a></li>                              
                              </ul>
                          </li>

                          <li><a><i class="fa fa-users"></i> الاجتماعات <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('meeting.index') }}">قائمة الاجتماعات</a></li>
                                <li><a href="{{ route('meeting.create') }}">إضافة اجتماع</a></li>
                                <li><a href="{{ route('meeting.trashed') }}">اجتماعات تم مسحها</a></li>
                                
                            </ul>
                        </li>

                      </ul>
                  </div>

              </div>
              <!-- /sidebar menu -->
    </div>
  </div>