@extends('admin.index')

@section('title') تعديل محامى @stop

@section('page')

<!-- Main content -->

	<div class="content-wrapper">



		<!-- Page header -->

		<div class="page-header">

			<div class="page-header-content">

				<div class="page-title">

					<h4><i class="icon-arrow-right6 position-right"></i> <span class="text-semibold">المحامين</span> - تعديل محامى</h4>

				</div>

			</div>



			<div class="breadcrumb-line">

				<ul class="breadcrumb">

					<li><a href="{{route('lawyers.index')}}">المحامين</a></li>

					<li>تعديل محامى</li>

				</ul>

			</div>

		</div>

		<!-- /page header -->





		<!-- Content area -->

		<div class="content">



			<!-- Input group addons -->

			<div class="panel panel-flat table-responsive">

				<div class="panel-body">

					<form action="{{ route('lawyers.update' , $info->id) }}" class="form-horizontal" method="post" enctype="multipart/form-data">
						{{ method_field("PUT") }}
						@if(Session::has('error'))

						<div class="alert alert-warning">{{Session::get('error')}}</div>

						@elseif(Session::has('true'))

						<div class="alert alert-success">تم التعديل بنجاح</div>

						@endif

						<fieldset class="content-group">

							<legend class="text-bold">المحامى</legend>

							<div class="form-group">
								<label class="control-label col-lg-2">القسم</label>
								<div class="col-lg-10">
									<div class="input-group">

										<select name="category_id" class="form-control">
											<option value="0" selected disabled>حدد القسم </option>
											@foreach($categories as $cat)
												<option {{ $info->category_id == $cat->id ? 'selected' : '' }} value="{{ $cat->id }}">{{ $cat->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="form-group">

								<label class="control-label col-lg-2">اسم المحامى</label>

								<div class="col-lg-10">

									<div class="input-group">
									<input type="text" required class="form-control" value="{{ $info->fullname }}" name="fullname">
									</div>

								</div>

							</div>


							<div class="form-group">

								<label class="control-label col-lg-2">البريد الإلكترونى</label>

								<div class="col-lg-10">

									<div class="input-group">



									<input type="email" value="{{ $info->email }}" required class="form-control" name="email">

									</div>

								</div>

							</div>

							<div class="form-group">

								<label class="control-label col-lg-2">أرقام التواصل</label>

								<div class="col-lg-10">

									<div class="input-group">
										@foreach($info->phones as $phone)
										<div class="row" style="margin-bottom:10px;">
											<div class="col-sm-10">
												<div class="input-group">
												<input type="text" required class="form-control" value="{{ $phone }}" name="phones[]">
												</div>
											</div>
											<div class="col-sm-1">
												<i class="fa fa-plus add_phone"></i>
											</div>
											<div class="col-sm-1">
												<i class="fa fa-minus remove_phone"></i>
											</div>
										</div>
										@endforeach
									</div>

								</div>

							</div>


							<div class="form-group">

								<label class="control-label col-lg-2">العنوان</label>

								<div class="col-lg-10">

									<div class="input-group">



										<input type="text" value="{{ $info->address }}" required class="form-control" name="address">

									</div>

								</div>

							</div>



							<div class="form-group">

								<label class="control-label col-lg-2">نبذة مختصرة</label>

								<div class="col-lg-10">

									<div class="input-group">
									<textarea required class="form-control" name="brief">{{ $info->brief }}</textarea>

									</div>

								</div>

							</div>


							<div class="form-group">
    							<label class="control-label col-lg-2">المنطقة</label>
    							<div class="col-lg-10">
    								<div class="col-sm-6">
    									<div class="input-group">

    										<select required data-live-search="true" class="form-control" name="country_id" id="country">
    											@foreach($country as $ct)
    											<option @if($info->country_id==$ct->id) selected @endif value="{{$ct->id}}">{{$ct->name}}
    											</option>
    											@endforeach
    										</select>
    									</div>
    								</div>
    								<div class="col-sm-6">
    									<div class="input-group area_content">

    										<select required class="form-control" name="area_id" id="area">
    											@foreach($area as $ar)
    											<option value="{{$ar->id}}" @if($ar->id==$info->area_id) selected @endif > {{$ar->name}}
    											</option>
    											@endforeach
    										</select>
    									</div>
    								</div>
    							</div>
    						</div>



							{{ csrf_field() }}

						</fieldset>



						<div class="text-right">

							<button type="submit" class="btn btn-primary">حفظ<i class="icon-arrow-left13 position-right"></i></button>

						</div>

					</form>

				</div>

			</div>

			<!-- /input group addons -->



		</div>

		<!-- /content area -->



	</div>

	<!-- /content wrapper -->

	<script>
		$('body').on('click' , '.add_phone' , function(){
			var content = $(this).closest('.row').html();
			$(this).closest('.row').parent().append("<div class='row' style='margin-bottom:10px;'>"+ content +"</div>");
			$("[name='phones[]']").last().val("");
		});

		$('body').on('click' , '.remove_phone' , function(){
			$(this).closest('.row').remove();
		});
	</script>

@stop
