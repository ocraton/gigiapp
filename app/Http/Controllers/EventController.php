<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use App\Events\SerializeFile;
use Storage;


class EventController extends Controller {

	public function __construct()
	{

	}

	public function index()
	{
		$eventi = Event::orderBy('dataEvento', 'desc')->get();
		event(new SerializeFile());
		return view('admin.events.index', compact('eventi'));
	}

	public function create()
	{
		return view('admin.events.create');
	}

	public function store(Request $request)
	{
		$requestall = array_slice($request->all(), 1);
		$currIndex = 1;
		$eventinput = [];

		foreach ($requestall as $key => $value) {

				$keyexpl = explode('_', $key);

				if($currIndex == $keyexpl[1])
				{					
						$eventinput[$currIndex][$keyexpl[0]] = $value;
				} else {
						$currIndex = $keyexpl[1];
						$eventinput[$currIndex][$keyexpl[0]] = $value;
				}

		}

		try {
			foreach ($eventinput as $evento_input) {
				Event::create($evento_input);
			}
			event(new SerializeFile());
			flash()->success('Inserimento avvenuto');
		} catch (Exception $e) {
			flash()->danger('Impossibile salvare');
		}

		return redirect('/events');
	}

	public function edit($id)
	{
		$evento = Event::findOrFail($id);
		return view('admin.events.edit', compact('evento'));
	}

	public function update(Request $request, $id)
	{
		try {
			$evento = Event::findOrFail($id);
			$evento->dataEvento = $request->dataEvento_1 ;
			$evento->colorData = $request->colorData_1;
			$evento->oraEvento = $request->oraEvento_1 ;
			$evento->dataOraVisibile = $request->dataOraVisibile_1 ;
			$evento->tempoStopMenouno = $request->tempoStopMenouno_1 ;
			$evento->tempoStopMenodue = $request->tempoStopMenodue_1 ;
			$evento->tempoStopMenotre = $request->tempoStopMenotre_1 ;
			$evento->titoloEvento = $request->titoloEvento_1 ;
			$evento->colorEvento = $request->colorEvento_1 ;
			$evento->commentoUno = $request->commentoUno_1 ;
			$evento->commentoDue = $request->commentoDue_1 ;
			$evento->commentoTre = $request->commentoTre_1 ;
			$evento->colorCommenti = $request->colorCommenti_1 ;
			$evento->fullScreen = $request->fullScreen_1 ;
			$evento->tempoStopDef = $request->tempoStopDef_1 ;
			$evento->visualizzaOgni = $request->visualizzaOgni_1 ;
			$evento->locandina = $request->locandina_1 ;
			$evento->save();
			event(new SerializeFile());
			flash()->success('Modifiche salvate');
		} catch (Exception $e) {
			flash()->danger('Impossibile salvare le modifiche');
		}

		return redirect('/events/'.$evento->id.'/edit');
	}


	public function destroy($id)
	{
		try {
			$evento = Event::findOrFail($id);
			Event::destroy($id);
			Storage::disk('uploads')->delete($evento->locandina);
			event(new SerializeFile());
			flash()->warning('Evento cancellato');
		} catch (Exception $e) {
			flash()->danger('Impossibile cancellare evento');
		}
		return redirect('events');
	}

}
