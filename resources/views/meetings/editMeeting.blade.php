@extends('layouts.page')

@section('content')
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>{{ $title }}</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									@if ($errors->any())
                              <div class="alert alert-danger">
                                    <ul>
                                   @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                                     @endforeach
                                    </ul>
                                </div>
                                      @endif
									  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('meeting.update', $meeting->id) }}" method="POST">
										@csrf
										@method('put')

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="meetingName">اسم الإجتماع<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="meetingName" name="meetingName" required="required" class="form-control" value=@isset($meeting) {{ $meeting->meetingName }}@endisset>
												@error('meetingName')
													<small><code>{{ $message }}</code></small>
												@enderror
											</div>
										</div>
                    					<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="meetingTime">موعد الإجتماع <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="time" id="meetingTime" name="meetingTime" required="required" class="form-control"value=@isset($meeting) {{ $meeting->meetingTime }}@endisset>
												@error('meetingTime')
												<small><code>{{ $message }}</code></small>
												@enderror
											</div>
										</div>
                                 		<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="place">المكان <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="place" name="place" required="required" class="form-control" value=@isset($meeting) {{ $meeting->meetingPlace }}@endisset>
												@error('meetingPlace')
												<small><code>{{ $message }}</code></small>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label for="userID" class="col-form-label col-md-3 col-sm-3 label-align">أمين الخدمة </label>
											<div class="col-md-6 col-sm-6 ">
												<select name="userID" id="userID">
													<option value="">اختر اسم امين الخدمة</option>
													@foreach ($users as $user)

                                                    <option value="{{$user->id}}" @selected(old('userID',$meeting->userID) == $user->id)>{{$user->userName}}</option>

                                                    @endforeach
													@error('userID')
													<small><code>{{ $message }}</code></small>
													@enderror


													
												</select>
											</div>
										</div>

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
												<button type="submit" class="btn btn-success">Update</button>
												{{-- <form method="POST" action="{{ route('user.store') }}">
													@csrf
													@method('POST')
													<button type="submit" class="btn btn-primary" >Add</button> --}}
												 </form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /page content -->
@endsection