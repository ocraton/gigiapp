<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;


class EventController extends Controller {

	public function __construct()
	{

	}

	public function index()
	{
		return 'index eventi';
	}

	public function create()
	{
		return view('admin.events.create');
	}

	public function store(Request $request)
	{
		dd($request->all());
		flash()->success('Inserimento avvenuto');
		return redirect('/settings/create');
	}

	public function edit()
	{
		return view('admin.events.edit');
	}

	public function update()
	{
		return 'Events update!!';
	}

}
