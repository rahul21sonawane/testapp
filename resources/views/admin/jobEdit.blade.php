@extends('layouts.app')
@section('content')
<div class="row">
	<div class="form-content">
        <div class="row">
	    <div class="col-md-12">
			<form method="POST" action="{{ url('admin/edit/'.base64_encode($jobData->id)) }}">	
			@csrf
			<!--First form-->
			<div class="form-content">
				<div class="form-group">
					<div class="input-group-text">Owner's / Driver's Name</div>
					<input type="text" class="form-control @error('owner_name') is-invalid @enderror" placeholder="Owner Name *" name="owner_name" value="{{ $jobData->owner_name }}"  autocomplete="owner_name" autofocus/>
					@error('owner_name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group">
				  <div class="input-group-text">Contact No.</div>
					<input type="text" class="form-control @error('owner_phone') is-invalid @enderror" placeholder="Contact  Number *" name="owner_phone" value="{{ $jobData->owner_phone }}"  autocomplete="owner_phone" autofocus/>
					@error('owner_phone')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group">
					<div class="input-group-text">Address</div>
					
					<input type="text" class="form-control @error('owner_addrs') is-invalid @enderror" placeholder="Address *" name="owner_addrs" value="{{ $jobData->owner_addrs }}"  autocomplete="owner_addrs" autofocus/>
					@error('owner_addrs')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>          
            <!--second form-->
			<div class="form-content">   
                <h1 class ="heading">JOB CARD</h1>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-sm-4 input-group-text">Job No</div>
						    <div class="col-sm-8">{{ $jobData->id }}</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4 input-group-text">Fuel Reading</div>
						    <div class="col-sm-8">
								<input type="text" class="form-control @error('fuel_reading') is-invalid @enderror" placeholder="fuel reading *" name="fuel_reading" value="{{ $jobData->fuel_reading }}"  autocomplete="fuel_reading" autofocus/>
								@error('fuel_reading')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror 
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4 input-group-text">Odometer Reading</div>
							<div class="col-sm-8">
								<input type="text" class="form-control @error('odo_reading') is-invalid @enderror" placeholder="Odometer Reading *" name="odo_reading" value="{{ $jobData->odo_reading }}"  autocomplete="odo_reading" autofocus/>
								@error('odo_reading')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror 
							</div>
						</div>
						
					</div>
				</div>
			</div>
            <!--third part-->
			<div class="form-content">   
                <div class="row">
					<div class="col-md-2"><!--col-sm-offset-1-->
						<div class="form-group">
							<input type="text" class="form-control @error('make_model') is-invalid @enderror" placeholder="Make & Model" name="make_model" value="{{ $jobData->make_model }}"  autocomplete="make_model" autofocus/>
							@error('make_model')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror 
						</div>
						<div class="form-group">
							<div class="input-group input-append date">
								<input autocomplete="off" type="text"  id="datePicker" class="form-control @error('date_in') is-invalid @enderror" placeholder="Date In" name="date_in" value="{{ $jobData->date_in }}"/>
								<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
							</div>
							@error('date_in')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror 
						</div>
					</div>
				    <div class="col-md-2">
						<div class="form-group">
							<input type="text" class="form-control @error('regn_no') is-invalid @enderror" placeholder="Regn No" name="regn_no" value="{{ $jobData->regn_no }}"  autocomplete="regn_no" autofocus/>
							@error('regn_no')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror 
						</div>
						<div class="form-group">
							<div  class="input-group input-append time" >
								<input  autocomplete="off" type="text" id="timePicker" class="form-control @error('time_in') is-invalid @enderror" placeholder="Time In" name="time_in" value="{{ $jobData->time_in }}"/>
								<span class="input-group-addon add-on"><span class="glyphicon glyphicon-time"></span></span>
							</div>
							@error('time_in')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror 
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<input type="text" class="form-control @error('vin') is-invalid @enderror" placeholder="VIN" name="vin" value="{{ $jobData->vin }}"  autocomplete="vin" autofocus/>
							@error('vin')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror 
						</div>
						<div class="form-group">
							<div class="input-group input-append date">
								<input autocomplete="off" type="text"  id="dueDatePicker" class="form-control @error('date_due_out') is-invalid @enderror" placeholder="Date Due Out" name="date_due_out" value="{{ $jobData->date_due_out }}"/>
								<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
							</div>
							@error('date_due_out')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror 
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							
							<input type="text" class="form-control @error('color_trim') is-invalid @enderror" placeholder="Color/ Trim" name="color_trim" value="{{ $jobData->color_trim }}"  autocomplete="color_trim" autofocus/>
							@error('color_trim')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror 
						</div>
						<div class="form-group">
							<div class="input-group input-append date">
								<input autocomplete="off" type="text"  id="dateOutPicker" class="form-control @error('date_out') is-invalid @enderror" placeholder="Date Out" name="date_out" value="{{ $jobData->date_out }}"/>
								<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
							</div>
							@error('date_out')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror 
						</div>
                    </div>
                    <div class="col-md-2">
						<div class="form-group">
							<input type="text" class="form-control @error('engine_no') is-invalid @enderror" placeholder="Engine No" name="engine_no" value="{{ $jobData->engine_no }}"  autocomplete="engine_no" autofocus/>
							@error('engine_no')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror 
						</div>
						<div class="form-group">
							<div class="input-group input-append date">
								<input autocomplete="off" type="text"  id="lastVisitPicker" class="form-control @error('date_last_visit') is-invalid @enderror" placeholder="Date Last Visit" name="date_last_visit" value="{{ $jobData->date_last_visit }}"/>
								<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
							</div>
							@error('date_last_visit')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror 
						</div>
                     </div>
                </div>
            </div>
            <!--fourth part Form with image-->
			<div class="form-content">  
                <h1 class ="heading">Inventory</h1>
                <div class="row">
					<div class="col-md-6">
						<div class="form-group row">
							<div class="col-sm-4 input-group-text">Spare Wheel</div>
						    <div class="col-sm-8">
								 <input type="text" class="form-control" id="spare_wheel"  name="spare_wheel"  value="{{ $jobData->spare_wheel }}">
								@error('spare_wheel')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror 
								 
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4 input-group-text">Jack</div>
						    <div class="col-sm-8">
								 <input type="text" class="form-control" id="jack"  name="jack" value="{{ $jobData->jack }}">
								@error('jack')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror 
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4 input-group-text">Jack Handle	</div>
						    <div class="col-sm-8">
								 <input type="text" class="form-control" id="jack_handle"  name="jack_handle"  value="{{ $jobData->jack_handle }}">
								@error('jack_handle')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror 
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4 input-group-text">Tool Kit</div>
						    <div class="col-sm-8">
								 <input type="text" class="form-control" id="tool_kit"  name="tool_kit" value="{{ $jobData->tool_kit }}">
								@error('tool_kit')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror 
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4 input-group-text">Music System</div>
						    <div class="col-sm-8">
								 <input type="text" class="form-control" id="music_system"  name="music_system" value="{{ $jobData->music_system }}">
								@error('music_system')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror 
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4 input-group-text">Wheel Caps</div>
						    <div class="col-sm-8">
								 <input type="text" class="form-control" id="wheel_caps"  name="wheel_caps"  value="{{ $jobData->wheel_caps }}">
								@error('wheel_caps')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror 
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4 input-group-text">Caution Reflector</div>
						    <div class="col-sm-8">
								 <input type="text" class="form-control" id="caution_reflector"  name="caution_reflector" value="{{ $jobData->caution_reflector }}">
								@error('caution_reflector')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror 
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4 input-group-text">Pen Drive</div>
						    <div class="col-sm-8">
								 <input type="text" class="form-control" id="pen_drive"  name="pen_drive" value="{{ $jobData->pen_drive }}">
								@error('pen_drive')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror 
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4 input-group-text">Others</div>
						    <div class="col-sm-8">
								 <input type="text" class="form-control" id="others_inventory"  name="others_inventory" value="{{ $jobData->others_inventory }}">
								@error('others_inventory')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror 
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<picture>
							  <source srcset="{{ asset('images/Inventory.png') }}" type="image/svg+xml">
							  <img src="{{ asset('images/Inventory.png') }}" class="img-fluid img-thumbnail" alt="Image not available">
							</picture>
						</div>
					</div>   
				</div>
			</div>
			
			
					  
            <!--fifth part-->
			<div class="form-content">  
				<div class="row">  
					 <table class="table table-bordered" id="item_table">
					  <tr >
					   <th>Requested Repairs</th>
					   <th>Suggested Repairs</th>
					   <th class="text-center"><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
					  </tr>
					  <?php 
							$req_repairs = explode(',', $jobData->req_repairs);
							$sugg_repairs = explode(',', $jobData->sugg_repairs);
							if(!empty($req_repairs))
							{
								for($i=0; $i< count($req_repairs); $i++)
								{
							?>		
								<tr>
								<td>
									<input type="text" value="<?=$req_repairs[$i]?>" name="req_repairs[]" class="form-control item_name" />
								</td>
								<td>
									<input type="text" value="<?=$sugg_repairs[$i]?>" name="sugg_repairs[]" class="form-control item_quantity" />
								</td>
								<td class="text-center">
									<button type="button" name="remove" class="text-centerbtn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button>
								</td>
								</tr>
						<?php		}
							}	
						?>
					  
					  <tr>
						<th>
							@error('req_repairs')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror 
						</th>
						<th>
							@error('sugg_repairs')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror 
						</th>
						<th></th>
					  </tr>
					 </table>
					 
				</div>	
			</div>	
			<!-- sixth part-->
			<div class="form-content">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label for="fname">Service Advisor's Name</label>
							<input type="text" class="form-control" placeholder="Advisors Name *"  value="{{ Auth::user()->name }}" readonly/>
						</div>
						<div class="form-group">
						  <label for="fname">Service Advisor's Mobile No.</label>
							<input type="text" name="advisor_mobile" class="form-control" placeholder="Advisors Mobile No *"  value="{{ Auth::user()->mobile }}" readonly/>
						</div>
						<div class="form-group">
						  <label for="fname">Mode of Payment</label>
							<input type="text" class="form-control" name="payment_mode" placeholder="Mode of Payment *"  value="{{ $jobData->payment_mode }}"/>
							@error('payment_mode')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror 
						</div>
						<div class="form-group">
						  <label for="fname">Insurance</label>
							<input type="text" class="form-control" name="insurance" placeholder="Insurance *"  value="{{ $jobData->insurance }}"/>
							@error('insurance')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror 
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label for="fname">Additional Information</label>
							<input type="text" class="form-control" name="additional_info" placeholder="Additional Information *"  value="{{ $jobData->additional_info }}"/>
							@error('additional_info')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror 
						</div>
						<div class="form-group">
						  <label for="fname">RSA</label>
							<input type="text" class="form-control" name="rsa" placeholder="RSA *"  value="{{ $jobData->rsa }}"/>
							@error('rsa')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror 
						</div>
					  <div class="form-group">
						  <label for="fname">AMC</label>
							<input type="text" class="form-control" name="amc" placeholder="AMC *"  value="{{ $jobData->amc }}"/>
							@error('amc')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror 
					  </div>
					  <div class="form-group">
						  <label for="fname">Battery Info</label>
							<input type="text" class="form-control" name="battery_info" placeholder="Battery Info *"  value="{{ $jobData->battery_info }}"/>
							@error('battery_info')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror 
						</div>
					</div>
				</div>
			</div>
            <!--seventh part-->
            <div class="form-content" style="border: none;">
				<div class="row">
					<div class="form-group col-md-12">
					  <label class="pull-left" for="fname">Signature of Service Advisor</label>
					  <label class="pull-right" for="fname">Signature of Customer</label>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<label for="fname">I hereby authorize the above mention job to be executedusingthe  material/parts.                          Also, i agree to all the terms & conditions mentioned overleaf.                      I have removed all my belongings from my car and workshop will not be responsible for any loss.</label>
						<div class="form-check">
						<input class="form-check-input" name="terms" type="checkbox" id="terms" value="true" {{ !old('terms') ?: 'checked' }}">
						  <label class="form-check-label" for="flexCheckDefault">
						   I, the undersigned, agree to the above work being undertaken.
						  </label>
						</div>
						@error('terms')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror 
					</div>
				</div>
				<!--<div class="row">
					<div class="form-group">
					  <label for="fname">Payment Method:</label>
						<input type="text" class="form-control" placeholder="Payment method" value=""/>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
					  <label for="fname">Supplementary or additional work:</label>
						<input type="text" class="form-control" placeholder="Supplementary or additional work" value=""/>
					</div>
				</div>-->
            </div>
			
		</div>
            <button type="submit" class="pull-right btnSubmit">Submit</button>
        </div>
	</form>	
    </div>
</div>
<script>
$(document).ready(function(){
	 $(document).on('click', '.add', function(){
	  var html = '';
	  html += '<tr>';
	  html += '<td><input type="text" name="req_repairs[]" class="form-control item_name" /></td>';
	  html += '<td><input type="text" name="sugg_repairs[]" class="form-control item_quantity" /></td>';
	  html += '<td class="text-center"><button type="button" name="remove" class="text-centerbtn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
	  $('#item_table').append(html);
	 });
	 
	 $(document).on('click', '.remove', function(){
	  $(this).closest('tr').remove();
	 });
	
	$('#dueDatePicker').datetimepicker({
		 format: 'Y-M-D',
	});	
	$('#dateOutPicker').datetimepicker({
		 format: 'Y-M-D',
	});
	$('#lastVisitPicker').datetimepicker({
		 format: 'Y-M-D',
	});
	$('#datePicker').datetimepicker({
            format: 'Y-M-D',
			
        }).on('changeDate', function(e) {
     });
	$('#timePicker').datetimepicker({
		 format: 'HH:mm'
	});
});
</script>
@endsection  