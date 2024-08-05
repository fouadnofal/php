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
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('served.store') }}" method="POST">
										@csrf

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="fullName">الإسم بالكامل<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="fullName" name="fullName" class="form-control" value="{{ old('fullName') }}">
												@error('fullName')
												<small><code>{{ $message }}</code></small>
												@enderror
											</div>
										</div>
										
                    					<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">الايميل <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
												@error('email')
												<small><code>{{ $message }}</code></small>
												@enderror
											</div>
										</div>
                                 		
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">الموبايل </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="mobile" name="mobile" class="form-control" value="{{ old('mobile') }}">
												@error('mobile')
												<small><code>{{ $message }}</code></small>
												@enderror
											</div>
										</div>
										<div class="item form-group">
											<label for="father" class="col-form-label col-md-3 col-sm-3 label-align">أب الإعتراف </label>
											<div class="col-md-6 col-sm-6 ">
												<input id="father" class="form-control" type="text" name="father" value="{{ old('father') }}">
												@error('father')
												<small><code>{{ $message }}</code></small>
												@enderror
											</div>
										</div>

                    					<div class="item form-group">
											<label for="address" class="col-form-label col-md-3 col-sm-3 label-align">العنوان </label>
											<div class="col-md-6 col-sm-6 ">
												<input id="address" class="form-control" type="text" name="address" value="{{ old('address') }}">
												@error('address')
												<small><code>{{ $message }}</code></small>
												@enderror
											</div>
										</div>

                    					<div class="item form-group">
											<label for="dob" class="col-form-label col-md-3 col-sm-3 label-align">تاريخ الميلاد </label>
											<div class="col-md-6 col-sm-6 ">
												<input id="dob" class="form-control" type="date" name="dob" value="{{ old('dob') }}">
												@error('dob')
												<small><code>{{ $message }}</code></small>
												@enderror
											</div>
										</div>

										<div class="item form-group">
											<label for="meeting_id" class="col-form-label col-md-3 col-sm-3 label-align">دور المستخدم </label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" id="meeting_id" name="meeting_id" value="{{old('meeting_id')}}">
													@error('meeting_id')
													<small><code>{{ $message }}</code></small>
													@enderror

													<option value="">برجاء اختيار اسم الإجتماع</option>
													@foreach ($meetings as $meeting)	
														<option value="{{ $meeting->id }}">{{ $meeting->meetingName }}</option>												
													@endforeach
												</select>
											</div>
										</div>

										<div class="item form-group">
											<label for="servant" class="col-form-label col-md-3 col-sm-3 label-align"></label>
										</div>


										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">إلغاء</button>
												<button type="submit" class="btn btn-success" name="save" value="1">حفظ</button>
												<button type="submit" class="btn btn-success" name="saveAdd" value="1">حفظ وإضافة جديد</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /page content -->
@endsection