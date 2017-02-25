<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use Storage;
use Illuminate\Support\Facades\Input;


class UploadController extends Controller {

	public function __construct()
	{

	}

	public function store(Request $request)
	{
		$name = $_FILES['myfile']['name'];
		$file = $request->file('myfile')->getRealPath();
		Storage::disk('uploads')->put($name, file_get_contents($file));
		$locandina_id = $request->locandina_id;
		return response()->json(["msg" => "Upload effettuato con successo.", "data" => $name, "locandina_id" => $locandina_id]);
	}



}
