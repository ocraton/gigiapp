<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;


class UploadController extends Controller {

	public function __construct()
	{

	}

	public function store(Request $request)
	{
		$name = $_FILES['myfile']['name'];
		$size = $_FILES['myfile']['size'];
		$path = public_path()."\upload";
		move_uploaded_file( $name , $path."\".$name );
		return response()->json(  array("msg" => "Upload effettuato con successo.", "data" => $name) );
	}



}
