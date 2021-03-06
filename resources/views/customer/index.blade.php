@extends('layouts.master')
@section('content')

<div style="font-size: 15px !important;" class="container">
	@if(Auth::user()->can('add_customer'))
	<a style="margin: 5% 0% 3% 0%; " href="javascript:;" class="btn btn-dark btn-add">
		Add customer
	</a>

	@endif
	<h4  style="margin: 1% 0% 3% 0%; ">Customers</h4>
	{{-- <button class="btn btn-dark btn-add">Add customer</button> --}}
	<div class="table-responsive">
		<table id="customers-table" class="table table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Thumbnail</th>
					<th>Mobile</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
		</table>
		</div>
		{{-- Modal show chi tiết customer --}}
		@if(Auth::user()->can('show_customer'))
		<div class="modal fade" id="modal-show">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Show customer</h4>
					</div>
					<div class="modal-body" >
						<div style="width: 30%;height: 30%; margin: auto;">
							<img id="thumbnail_show" style="margin: 5% auto 5%; width: 100%; height: 100%; border-radius: 50%;" src="" alt="avatar">
						</div>
						<div style="font-size: 15px; margin: 3% auto 3%; text-align: left;">
							<table  style="text-align: center;width:70%; margin:auto;" class="table">

								<tr>
									<td>Action :</td>
									<td>Value :</td>
								</tr>
								<tr>
									<td>Id :</td>
									<td><p id="customer_id"></p></td>
								</tr>
								<tr>
									<td>Name :</td>
									<td><p id="customer_name"></p></td>
								</tr>
				                <tr>
				                  <td>Address :</td>
				                  <td><p id="customer_address"></p></td>
				                </tr>
				                <tr>
				                  <td>Mobile :</td>
				                  <td><p id="customer_mobile"></p></td>
				                </tr>
				                <tr>
				                  <td>Birthday :</td>
				                  <td><p id="customer_birthday"></p></td>
				                </tr>
								<tr>
									<td>Email :</td>
									<td><p id="customer_email"></p></td>
								</tr>
								<tr>
									<td>Level :</td>
									<td><p id="customer_level"></p></td>
								</tr>
								
							
							</table>
							
							
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		@endif
		{{-- modal add  --}}
		@if(Auth::user()->can('add_customer'))
		<div class="modal fade" id="modal-add">
			<div style="width: 70%;" class="modal-dialog">
				<div class="modal-content">

					<form action="" id="form-add" method="POST" role="form" enctype="multipart/form-data" >
						@csrf


						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Add customer</h4>
						</div>
						<div style="width: 30%;float: left; margin: 5%; text-align: center;" >
							<div style="width: 80%;height: 80%; margin: auto;">
								<img style="margin: 5% 0% 5% 0% ; width: 100%; height: 100%; border-radius: 50%;" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
							</div>
							<div class="clear"></div>
                			<span id="span_thumbnail_add"></span>
							
							<div class="form-group " >
								<input type="file" class="form-control text-center center-block file-upload" name ="thumbnail" id="thumbnail_add"  placeholder="Thumbnail">
								
							</div>
						</div>
						<div style="width: 58%;float: left;" class="modal-body">
							<div class="form-group">
								<label for="">* Name</label>
								<input type="text" class="form-control" id="name_add"  name ="name" placeholder="Name">
								<span id="span_name_add"></span>
							</div>
							<div class="form-group">
								<label for="">* Birthday</label>
								<input type="date" class="form-control" id="birthday_add" name ="birthday" placeholder="Birthday">
								<span id="span_birthday_add"></span>
							</div>
							<div class="form-group">
								<label for="">* Address</label>
								<input type="text" class="form-control" id="address_add" name ="address" placeholder="Address">
								<span id="span_address_add"></span>
							</div>
							<div class="form-group">
								<label for="">* Mobile</label>
								<input type="text" class="form-control" id="mobile_add" name ="mobile" placeholder="Mobile">
								<span id="span_mobile_add"></span>
							</div>
							<div class="form-group">
								<label for="">* Email</label>
								<input type="email" class="form-control" id="email_add" name ="email" placeholder="Email">
								<span id="span_email_add"></span>
							</div>
							<div class="form-group">
								<label for="">* Password</label>
								<input type="password" class="form-control" id="password_add"  name ="password" placeholder="Password">
								<span id="span_password_add"></span>
							</div>
						</div>
						<div class="clear"></div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit"  class="btn btn-primary">Add</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		@endif
		{{-- modal update  --}}
		@if(Auth::user()->can('update_customer'))
		<div class="modal fade" id="modal-update">
			<div style="width: 70%;" class="modal-dialog">
				<div class="modal-content">

					<form action="" id="form-update" method="POST" role="form">
						@csrf
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Edit customer</h4>
						</div>
						<div style="width: 30%;float: left; margin: 5%; text-align: center;" >
								<div style="width: 80%;height: 80%; margin: auto;">
										<img style="margin: 5% 0% 5% 0% ; width: 100%; height: 100%; border-radius: 50%;" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" id="img_thumbnail_update" class="avatar img-circle img-thumbnail" alt="avatar">
									
								</div>
								<div class="clear"></div>
                				<span id="span_thumbnail_add"></span>
                				<div  class="form-group">
								
								<input type="file"  class="form-control text-center center-block file-upload" name ="thumbnail" id="customer_thumbnail_update"  placeholder="Thumbnail">
								<span id="span_thumbnail_update"></span>
							</div>
						</div>
						<div style="width: 58%;float: left;" class="modal-body">
							
							
							<input type="hidden" name="_method" id="put_update" value="put">
							<input type="hidden" name="id" id="customer_id_update">
							
							<div class="form-group">
								<label for="">* Name</label>
								<input type="text" class="form-control" id="customer_name_update" name ="name" placeholder="Name">
								<span id="span_name_update"></span>

							</div>
							<div class="form-group">
								<label for="">* Birthday</label>
								<input type="date" class="form-control" id="customer_birthday_update" name ="birthday" placeholder="Birthday">
								<span id="span_birthday_update"></span>
							</div>
							<div class="form-group">
								<label for="">* Address</label>
								<input type="text" class="form-control" id="customer_address_update" name ="address" placeholder="Address">
								<span id="span_address_update"></span>
							</div>
							<div class="form-group">
								<label for="">* Mobile</label>
								<input type="text" class="form-control" id="customer_mobile_update" name ="mobile" placeholder="Mobile">
								<span id="span_mobile_update"></span>
							</div>
							<div class="form-group">
								<label for="">* Email</label>
								<input type="email" class="form-control" id="customer_email_update" name ="email" placeholder="Email">
								<span id="span_email_update"></span>
							</div>
							
							<div class="form-group">
								<label for="">* Password</label>
								<input type="password" class="form-control" id="customer_password_update" name ="password" placeholder="Password">
								<span id="span_password_update"></span>
							</div>
						</div>
						<div class="clear"></div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit"  class="btn btn-primary">Add</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		@endif
	</div>


	
	@endsection
	@section('js')
	<script type="text/javascript" src="/js/mainCustomer.js"></script>
	
	@endsection