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
			$file = $request->file_excel;
            $fileExtension          = $file->getClientOriginalExtension();
            $fileName               = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileNameDestination    = uniqid($fileName).".".$fileExtension;
			$file->move(public_path('upload_excel'), $fileNameDestination);
			return $this->responseAPI(false, $fileNameDestination, 'Thành công', 200);
		}else{
			return $this->responseAPI(true, [], 'Thất bại', 404);
		}
	}

	public function executeExcel(Request $request){
		$template 	= $request->input('template', '');
		$excel    	= $request->input('name_excel', '');
		$fileExcel 	= public_path('upload_excel')."/".$excel;
		$templateOrigin = public_path()."/".$template.".xlsx";

		if(!file_exists($fileExcel) || !file_exists($templateOrigin)){
			return $this->responseAPI(true, [], 'File excel không tồn tại', 404);
		}

		$originExcel 	= fastexcel()->import($templateOrigin)->first();
		$dataExcel 		= fastexcel()->import($fileExcel);
		if(count($dataExcel) == 0){
			return $this->responseAPI(true, [], 'File excel không có dữ liệu', 404);
		}
		
		foreach($dataExcel as $index => $excel){
			if($index == 0){
				$compare = array_diff(array_keys($originExcel), array_keys($excel));
				if(count($compare) > 0){
					return $this->responseAPI(true, [], 'File excel không khớp định dạng template', 500);
				}
			}
			$data = $excel;
			$html = view($template, compact('data'))->render();
			ProcessPodcast::dispatch($html);	
		}

	}

	public function responseAPI($error, $data, $message, $code){
		return response()
                ->json([
                    'error'   => $error,
                    'data'    => $data,
                    'message' => $message,
                ], $code);
	}
}