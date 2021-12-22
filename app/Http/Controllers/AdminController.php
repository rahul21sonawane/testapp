<?php
namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;
use DataTables;
use Illuminate\Support\Str; 
use Validator;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.jobCardList');
    }
	
	public function getJobcard(Request $request)
    {
		if(Auth::id())
		{
			$advisor_id = Auth::id();	
		}	
		if(request()->ajax())
		{
		  if(!empty($request->mobile_no))
		  {
		    $data = DB::table('tbl_jobcard')
			 ->select('id','advisor_id','owner_name','owner_phone','vin',DB::raw('CONCAT(date_in," ", time_in) AS in_time'),'date_out','created_at')
			->where('advisor_id',$advisor_id)
			->where('owner_phone', $request->owner_phone)
			->orderBy('date_in', 'asc')
			->get();
		  }
		  if(!empty($request->vin))
		  {
		    $data = DB::table('tbl_jobcard')
			 ->select('id','advisor_id','owner_name','owner_phone','vin',DB::raw('CONCAT(date_in," ", time_in) AS in_time'),'date_out','created_at')
			->where('advisor_id',$advisor_id)
			->where('vin', $request->vin)
			->orderBy('date_in', 'asc')
			->get();
		  }
		  else
		  {
		    $data = DB::table('tbl_jobcard')
			 ->select('id','advisor_id','owner_name','owner_phone','vin',DB::raw('CONCAT(date_in," ", time_in) AS in_time'),'date_out','created_at')
			 ->where('advisor_id',$advisor_id)
			 ->orderBy('date_in', 'asc')
			 ->get();
		  }
		  
		  return datatables()->of($data)->addIndexColumn()->addColumn('action', function($row){
				   $btn = '<a href="'.url('admin/edit/'.base64_encode($row->id)).'" class="edit btn btn-primary btn-sm">Edit</a> <a href="'.url('admin/view/'.base64_encode($row->id)).'" class="edit btn btn-primary btn-sm">View</a>';
					return $btn;
			})->make(true);
		}
	}	
	
	public function create(Request $request)
	{
		$JobNo = DB::table('tbl_jobcard')->max('id');
		return View('admin.jobCreate')->with(compact('JobNo'));
	}
	
	public function storeJobcard(Request $request)
	{
		  $validated = $request->validate([
            'owner_name' => 'required|string|max:255',
            'owner_phone' => 'required|integer|min:11',
			'owner_addrs' => 'required|string',
        	'fuel_reading' => 'required',
            'odo_reading' => 'required',
        	'make_model' => 'required',
            'regn_no' => 'required',
            'vin' => 'required',
            'color_trim' => 'required',
            'engine_no' => 'required',
            'date_in' => 'required|date_format:Y-m-d',
			'time_in' => 'required|date_format:H:i',
			'date_out' => 'required|date_format:Y-m-d',
            'date_due_out' => 'required|date_format:Y-m-d',
            'date_last_visit' => 'required|date_format:Y-m-d',
			'spare_wheel' => 'required',
			'jack' => 'required',
			'jack_handle' => 'required',
			'tool_kit' => 'required',
			'music_system' => 'required',
			'wheel_caps' => 'required',
			'caution_reflector' => 'required',
			'pen_drive' => 'required',
			'others_inventory' => 'required',
			'req_repairs' =>'required|array|min:1',
			'sugg_repairs' =>'required|array|min:1',
			'payment_mode' => 'required',
			'insurance' => 'required',
			'additional_info' => 'required',
			'rsa' => 'required',
			'amc' => 'required',
			'battery_info' => 'required',
			'terms' => 'required',
		]);
		if(Auth::id())
		{
			$advisor_id = Auth::id();	
		}
		$req_repairs = implode(', ', $request->req_repairs);
		$sugg_repairs = implode(', ',$request->sugg_repairs);
	
		$data = array();
		$data = $request->all();
		$data['advisor_id'] = $advisor_id;
		$data['req_repairs'] = $req_repairs;
		$data['sugg_repairs'] = $sugg_repairs;
		
	   Admin::create($data);
       return redirect()->route('admin');
	}
	public function edit(Request $request,$id)
	{
		$id= base64_decode($id);
		$jobData = Admin::find($id);
		
		if($_POST)
		{
			$validated = $request->validate([
            'owner_name' => 'required|string|max:255',
            'owner_phone' => 'required|integer|min:11',
			'owner_addrs' => 'required|string',
        	'fuel_reading' => 'required',
            'odo_reading' => 'required',
        	'make_model' => 'required',
            'regn_no' => 'required',
            'vin' => 'required',
            'color_trim' => 'required',
            'engine_no' => 'required',
            'date_in' => 'required|date_format:Y-m-d',
			'time_in' => 'required|date_format:H:i',
			'date_out' => 'required|date_format:Y-m-d',
            'date_due_out' => 'required|date_format:Y-m-d',
            'date_last_visit' => 'required|date_format:Y-m-d',
			'spare_wheel' => 'required',
			'jack' => 'required',
			'jack_handle' => 'required',
			'tool_kit' => 'required',
			'music_system' => 'required',
			'wheel_caps' => 'required',
			'caution_reflector' => 'required',
			'pen_drive' => 'required',
			'others_inventory' => 'required',
			'req_repairs' =>'required|array|min:1',
			'sugg_repairs' =>'required|array|min:1',
			'payment_mode' => 'required',
			'insurance' => 'required',
			'additional_info' => 'required',
			'rsa' => 'required',
			'amc' => 'required',
			'battery_info' => 'required',
			'terms' => 'required',
			]);
			
			if(Auth::id())
			{
				$advisor_id = Auth::id();	
			}
			$req_repairs = implode(', ', $request->req_repairs);
			$sugg_repairs = implode(', ',$request->sugg_repairs);
			
			$data = array();
			$data = $request->all();
			$data['advisor_id'] = $advisor_id;
			$data['req_repairs'] = $req_repairs;
			$data['sugg_repairs'] = $sugg_repairs;
			Admin::findOrFail($id)->update($data);
			
			return redirect()->route('admin');
			
		}	
		return View('admin.jobEdit')->with(compact('jobData'));
	}
	
	public function view(Request $request,$id)
	{
		$id= base64_decode($id);
		$jobData = Admin::find($id);
		return View('admin.jobView')->with(compact('jobData'));
	}	
}