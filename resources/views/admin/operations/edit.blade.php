@extends('admin.index')
@section('title') تعديل نوع عملية @stop
@section('page')
<!-- Main content -->
	<div class="content-wrapper">

		<!-- Page header -->
		<div class="page-header">
			<div class="page-header-content">
				<div class="page-title">
					<h4><i class="icon-arrow-right6 position-right"></i> <span class="text-semibold">أنواع العمليلت</span> - تعديل نوع عملية</h4>
				</div>
			</div>

			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="{{route('operations.index')}}">أنواع العمليلت</a></li>
					<li>تعديل نوع عملية</li>
				</ul>
			</div>
		</div>
		<!-- /page header -->


		<!-- Content area -->
		<div class="content">

			<!-- Input group addons -->
			<div class="panel panel-flat table-responsive">
				<div class="panel-body">
					<form action="{{ route('operations.update',$info->id) }}" class="form-horizontal" method="post">
						@if(Session::has('error'))
						<div class="alert alert-warning">{{Session::get('error')}}</div>
						@elseif(Session::has('true'))
						<div class="alert alert-success">تم التعديل بنجاح</div>
						@endif
						{{ method_field('PUT') }}
						<fieldset class="content-group">
							<legend class="text-bold">النوع عملية</legend>

							<div class="form-group">
								<label class="control-label col-lg-2">اسم الخدمة</label>
								<div class="col-lg-10">
									<div class="input-group">

										<input type="text" value="{{$info->name}}" required class="form-control" name="name">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-2">حدد خصائص الخدمة</label>
								<div class="col-lg-10">
									<div class="input-group">

										<select name="props[]" class="form-control" multiple>
											<option @if(in_array('peroid',$operations)) selected @endif value="peroid">مدة التجهيز</option>
											<option @if(in_array('price',$operations)) selected @endif value="price">السعر</option>
											<option @if(in_array('start_price',$operations)) selected @endif value="start_price">فتح المزاد بمبلغ</option>
											<option @if(in_array('end_date',$operations)) selected @endif value="end_date">تاريخ انهاء المزاد</option>
										</select>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-2">عرض اعﻻنات الخدمة فى الصفحة الرئيسية</label>
								<div class="col-lg-10">
									<div class="input-group">
										<input id="switches" @if($info->home) checked @endif type="checkbox" name="home" value='1'>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-2">عدد الاعﻻنات فى الرئيسية</label>
								<div class="col-lg-10">
									<div class="input-group">

										<input value="{{$info->home_num}}" type="number" required class="form-control" name="home_num">
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
@stop