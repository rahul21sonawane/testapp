@extends('layouts.app')
@section('content')
<style>
.viewtble td,th {
	text-align: center;
	width: 20%;
} 
</style>
<div class="row">
	    <div class="row">
	    <div class="col-md-12">
			<!--First form-->
			<div class="form-content" style="padding-bottom:1%;">
			   <div class="row">
				<table class="col-md-12 table table-bordered viewtble" id="item_table">
				  <tr>
				   <th>Owner's / Driver's Name</th>
				   <th>Contact No</th>
				   <th>Address</th>
				  </tr>
				  <tr>	
					<td>{{ $jobData->owner_name }}</td>
					<td>{{ $jobData->owner_phone }}</td>
					<td>{{ $jobData->owner_addrs }}</td>
				  </tr>
				</table>  
				</div>          
			</div>          
            <!--second form-->
			<div class="form-content1">   
                <h4 class ="heading">JOB CARD</h4>
				<div class="">
					<table class="col-md-12 table table-bordered viewtble" id="item_table">
					  <tr>
					   <th>Job No</th>
					   <th>Fuel Reading</th>
					   <th>Odometer Reading</th>
					  </tr>
					  <tr>	
						<td>{{ $jobData->id }}</td>
						<td>{{ $jobData->fuel_reading }}</td>
						<td>{{ $jobData->odo_reading }}</td>
					  </tr>
					</table>  
				</div>
			</div>
            <!--third part-->
			<div class="form-content1">   
                <div class="">
					<table class="col-md-12 table table-bordered viewtble" id="item_table">
					  <tr>
					   <th>Make & Model</th>
					   <th>Regn No</th>
					   <th>VIN</th>
					   <th>Color/ Trim</th>
					   <th>Engine No</th>
					  </tr>
					  <tr>	
						<td>{{ $jobData->make_model }}</td>
						<td>{{ $jobData->regn_no }}</td>
						<td>{{ $jobData->vin }}</td>
						<td>{{ $jobData->color_trim }}</td>
						<td>{{ $jobData->engine_no }}</td>
					  </tr>
					</table>  
					<table class="col-md-12 table table-bordered viewtble" id="item_table">
					  <tr >
					   <th>Date In</th>
					   <th>Time In</th>
					   <th>Date Due Out</th>
					   <th>Date Out</th>
					   <th>Date Last Visit</th>
					  </tr>
					  <tr>	
						<td>{{ $jobData->date_in }}</td>
						<td>{{ $jobData->time_in }}</td>
						<td>{{ $jobData->date_due_out }}</td>
						<td>{{ $jobData->date_out }}</td>
						<td>{{ $jobData->date_last_visit }}</td>
					  </tr>
					</table>  
			    </div>
            </div>
           
		   <!--fourth part Form with image-->
			<div class="form-content1">  
                <h4 class ="heading">Inventory</h4>
                <div class="row">
					<div class="col-md-8">
						<table class="col-md-12 table table-bordered viewtble" id="item_table">
						  <tr>
						   <th>Spare Wheel</th>
						   <th>Jack</th>
						   <th>Jack Handle</th>
						   <th>Tool Kit</th>
						   <th>Music System</th>
						   <th>Wheel Caps</th>
						   <th>Caution Reflector</th>
						   <th>Pen Drive</th>
						   <th>Others</th>
						  </tr>
						  <tr>	
							<td>{{ $jobData->spare_wheel }}</td>
							<td>{{ $jobData->jack }}</td>
							<td>{{ $jobData->jack_handle }}</td>
							<td>{{ $jobData->tool_kit }}</td>
							<td>{{ $jobData->music_system }}</td>
							<td>{{ $jobData->wheel_caps }}</td>
							<td>{{ $jobData->caution_reflector }}</td>
							<td>{{ $jobData->pen_drive }}</td>
							<td>{{ $jobData->others_inventory }}</td>
						  </tr>
						</table>  
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<picture>
							  <source srcset="{{ asset('images/Inventory.png') }}" type="image/svg+xml">
							  <img  src="{{ asset('images/Inventory.png') }}" class="img-fluid img-thumbnail" alt="Image not available">
							</picture>
						</div>
					</div>   
				</div>
			</div>
			
			
					  
            <!--fifth part-->
			<div class="form-content1">  
				<div class="">  
					 <table class="table table-bordered viewtble" id="item_table">
					  <tr >
					   <th>Requested Repairs</th>
					   <th>Suggested Repairs</th>
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
									{{ $req_repairs[$i] }}
								</td>
								<td>
									{{ $sugg_repairs[$i]}}
								</td>
								</tr>
						<?php		}
							}	
						?>
					 </table>
					 
				</div>	
			</div>	
			<!-- sixth part-->
			<div class="form-content1">
				<div class="row">
					<div class="col-md-6">
						<table class="col-md-12 table table-bordered viewtble" id="item_table">
						  <tr >
						   <th>Service Advisor's Name</th>
						   <th>Service Advisor Mobile No</th>
						   <th>Mode of Payment</th>
						   <th>Insurance</th>
						  </tr>
						  <tr>	
							<td>{{ Auth::user()->name  }}</td>
							<td>{{ Auth::user()->mobile }}</td>
							<td>{{ $jobData->payment_mode }}</td>
							<td>{{ $jobData->insurance }}</td>
							</tr>
						</table>  
					</div>
					<div class="col-md-6">
						<table class="col-md-12 table table-bordered viewtble" id="item_table">
						  <tr >
						   <th>Additional Information</th>
						   <th>RSA</th>
						   <th>AMC</th>
						   <th>Battery Info</th>
						  </tr>
						  <tr>	
							<td>{{ $jobData->additional_info  }}</td>
							<td>{{ $jobData->rsa }}</td>
							<td>{{ $jobData->amc }}</td>
							<td>{{ $jobData->battery_info }}</td>
							</tr>
						</table> 
					</div>
				</div>
			</div>
            <!--seventh part-->
            <div class="form-content signature" style="border: none;">
				<div class="row">
					<div class="form-group col-md-12">
					  <label class="pull-left" for="fname">Signature of Service Advisor</label>
					  <label class="pull-right" for="fname">Signature of Customer</label>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<label for="fname">I hereby authorize the above mention job to be executedusingthe  material/parts.                          Also, i agree to all the terms & conditions mentioned overleaf.                      I have removed all my belongings from my car and workshop will not be responsible for any loss.</label>
					</div>
				</div>
		    </div>
		</div>
    </div>
</div>
<style type="text/css" media="print">
      @media print
      {
        @page {
           margin-top: 10;
           margin-bottom: 10;
        }
		.no-print, .no-print *
		{
			display: none !important;
		}
		.signature{
			margin-top:5% !important;
		}
      } 
	  .pagebreak { page-break-before: always; }
	  .form-content1{
		     padding: 2%;
			 border: 1px solid #ced4da;
			 margin-bottom: 2%;
	  }
</style>
@endsection  