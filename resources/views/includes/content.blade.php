        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
              <div class="page-title">
  
                <div class="title_left">
                  <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
                    <div class="input-group">
                      <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button">بحث!</button>
                      </span>
                      <input type="text" class="form-control" placeholder="بحث عن ...">
                    </div>
                  </div>
                </div>
  
                <div class="title_left">
                  <h3>إدارة <small>{{ $parent }}</small></h3>
                </div>
              </div>
  
              <div class="clearfix"></div>
  
              @yield('content')
            </div>
          </div>
          <!-- /page content -->