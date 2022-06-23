@extends('frontEnd.weblayouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
	.form-elements {
		margin-top: 10px;
	}

	#frm-add-data .form-group {
		margin-left: 13px;
	}
</style>
<div id="" class="about-us" style="margin-bottom: -250px">
	<div class="container ">
		<div class="col-lg-12 align-self-center show-up header-text">
			<div class="row">
				<div style="overflow-x:auto;">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								
								<div class="col-lg-6">
									<div class="box" style="border-radius: 5px;background-color: #F0EFEB">
										<i class="fa fa-key" style="padding-top: 20px;padding-bottom: 20px;padding-left: 30px;"></i>&nbsp Login Details

										{!! Form::open(['url'=>url('/profiles', $profile['id']), 'method'=>'PUT', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
										<div class="row">
											<div class="col-md-12">
												<div class="panel panel-default">
													<div class="box-body">
														<div class="col-md-12">
															<div class="box-body col-md-12">     {{-- kiri --}}
																<div class="form-group">
																	<div class="col-md-12">
																		<div class="col-md-12" style="padding-top: 20px">
																			{!! Form::label('Name:', '') !!}
																			<div class="input-group">
																				<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
																				<input type="text" class="form-control  has-feedback  " value="{{$profile['name']}}" id="name" name="name" required>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<div class="col-md-12">
																		<div class="col-md-12">
																			{!! Form::label('Login Email:', '') !!}
																			<div class="input-group">
																				<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
																				<input type="text" class="form-control  has-feedback  " value="{{$profile['email']}}" id="email" name="email" required>
																			</div>
																		</div>
																	</div>
																</div>

																<div class="form-group">
																	<div class="box-footer">
																		{!! Form::submit('Update', ['class'=>'btn btn-default','style'=>'background-color:#32CD32;border-radius:5px;width:80px;color: white']) !!}
																	</div>
																</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									{!! Form::close()!!}

									<div class="col-lg-6">
										<div class="box" style="border-radius: 5px;background-color: #F0EFEB">
											<i class="fa fa-key" style="padding-top: 20px;padding-bottom: 20px;padding-left: 30px;"></i>&nbsp Change Password
											{!! Form::open(['url'=>url(''), 'method'=>'PUT', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}
											<div class="row">
												<div class="col-md-12">
													<div class="panel panel-default">
														<div class="box-body">
															<div class="col-md-12">
																<div class="box-body col-md-12">     {{-- kiri --}}
																	<div class="form-group">
																		<div class="col-md-12">
																			<div class="col-md-12"style="padding-top: 20px">
																				{!! Form::label('Password:', '') !!}
																				<div class="input-group">
																					<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
																					<input type="text" class="form-control  has-feedback  " value="" id="password" name="password" required>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="col-md-12">
																			<div class="col-md-12">
																				{!! Form::label('Confirm Password:', '') !!}
																				<div class="input-group">
																					<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
																					<input type="text" class="form-control  has-feedback  " value="" id="confirm_password" name="confirm_password" required>
																				</div>
																			</div>
																		</div>
																	</div>

																	<div class="form-group">
																		<div class="col-md-12">
																			<div class="col-md-12">

																				<div class="form-actions">
																					<div class="row">
																						<div class="col-md-offset-4 col-md-9">
																							<button type="button" onclick="updateLogin();return false;" class="btn green"><i
																								class="fa fa-check"></i> {{trans('Update')}}</button>

																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												{!! Form::close()!!}
											</div>
										</div>



							{{-- <div class="col-lg-6">
								<i class="fa fa-key"></i>Login Details
								<hr>
								<div class="col-lg-10 align-center">
									<div class="row">
										<div class="col-lg-3">
											Name : 
										</div>
										<div class="col-lg-3">
											<input type="" name=""> 
										</div>
									</div>
								</div>
								<hr>
							</div>
							<div class="col-lg-6">
								<i class="fa fa-key"></i>Change Password
								<hr>

								<hr>
							</div> --}}
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection()