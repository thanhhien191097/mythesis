<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\GeneralInfo;
use PDF;
use DB;
use App\Jobs\TestAction;
use App\Jobs\ProcessPodcast;

class TemplateController extends BaseController
{
	public function index()
	{
		// ProcessPodcast::dispatch();
		// return TestAction::getData();
		$routeTemplate = route('homepage');
    	return '<a href="' . $routeTemplate . '" >Templates</a>'; 
	}

	public function templateList()
	{
		// Start
		// $info = GeneralInfo::all()->toArray();
		// $id = 3;
		// foreach($info as $i){
		// 	$email = $i['email'];
		// 	$job   = $i['job'];
		// 	$html = view("template3", compact('id','email','job'))->with('showDownload', false)->render();
		// 	ProcessPodcast::dispatch($html);	
		// }
		// End

		return view('homepage');
	}

	public function getTemplate($id)
	{
		$info = GeneralInfo::all()->toArray();
		return view("template{$id}", compact('id','info'));
	}


	public function downloadTemplate($id, Request $request)
	{
		echo "Email sent";
		
		// Start Huy
		$info = GeneralInfo::all()->toArray();
		foreach($info as $i){
			// $email = $i['email'];
			// $job   = $i['job'];
			$html = view("template{$id}", compact('id','i'))->with('showDownload', false)->render();
			ProcessPodcast::dispatch($html);	
		}
		// End Huy

		// $html = view("template{$id}", compact('id'))->with('showDownload', false)->render();
		// ProcessPodcast::dispatch($html);
		
		// return redirect()->back()->with('success', ['Thanh cong']);   
	}

	public function downloadPostTemplate(Request $request)
	{
		echo "Email sent";
		dd($request->input('cv'));
		// Start Huy
		$info = GeneralInfo::all()->toArray();
		foreach($request->input('cv') as $cv){
			// $email = $i['email'];
			// $job   = $i['job'];
			$html = view("template4", compact('info'))->with('showDownload', false)->render();
			ProcessPodcast::dispatch($html);	
		}
		// End Huy

		// $html = view("template{$id}", compact('id'))->with('showDownload', false)->render();
		// ProcessPodcast::dispatch($html);
		
		// return redirect()->back()->with('success', ['Thanh cong']);   
	}

	public function downloadTemplateExcel($template){
		return response()->download(public_path()."/".$template.".xlsx");
	}

	public function postExcel(Request $request){
		if($request->hasFile('file_excel')){
			dd("ZO");
		}
		dd("Kp");
	}
}