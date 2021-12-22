<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
  use HasFactory;
	protected $table = 'tbl_jobcard';
    protected $primaryKey = 'id';
    protected $fillable = ['advisor_id','owner_name' ,'owner_phone' ,'owner_addrs' ,'fuel_reading' ,'odo_reading' ,'make_model' ,'regn_no' ,'vin' ,'color_trim' ,'engine_no' ,'date_in' ,'time_in' ,'date_out' ,'date_due_out','date_last_visit','spare_wheel' ,'jack' ,'jack_handle' ,'tool_kit' ,'music_system' ,'wheel_caps' ,'caution_reflector' ,'pen_drive' ,'others_inventory' ,'req_repairs','sugg_repairs','payment_mode' ,'insurance' ,'additional_info' ,'rsa' ,'amc' ,'battery_info'];
}
