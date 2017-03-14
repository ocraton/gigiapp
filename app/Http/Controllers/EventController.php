<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Event;
use App\Setting;
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
		$this->deleteOldEvents();
		$eventi = Event::orderBy('dataEvento', 'desc')->get();
		event(new SerializeFile());
		return view('admin.events.index', compact('eventi'));
	}

	public function create()
	{
		$settings = Setting::all();
		return view('admin.events.create', compact('settings'));
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
			$evento->dataOraVisibile = empty($request->dataOraVisibile_1) ? 0 : 1;
			$evento->indentazioneDataEvento = $request->indentazioneDataEvento_1 ;
			$evento->sizefontDataEvento = $request->sizefontDataEvento_1 ;
			$evento->tempoStopMenouno = $request->tempoStopMenouno_1 ;
			$evento->tempoStopMenodue = $request->tempoStopMenodue_1 ;
			$evento->tempoStopMenotre = $request->tempoStopMenotre_1 ;
			$evento->titoloEvento = $request->titoloEvento_1 ;
			$evento->colorEvento = $request->colorEvento_1 ;
			$evento->indentazioneTitolo = $request->indentazioneTitolo_1 ;
			$evento->sizefontTitolo = $request->sizefontTitolo_1 ;
			$evento->titoloEventoRigadue = $request->titoloEventoRigadue_1 ;
			$evento->commentoUno = $request->commentoUno_1 ;
			$evento->colorCommenti = $request->colorCommenti_1 ;
			$evento->indentazioneCommentoUno = $request->indentazioneCommentoUno_1 ;
			$evento->sizefontCommentoUno = $request->sizefontCommentoUno_1 ;
			$evento->commentoDue = $request->commentoDue_1 ;
			$evento->colorCommentiDue = $request->colorCommentiDue_1 ;
			$evento->indentazioneCommentoDue = $request->indentazioneCommentoDue_1 ;
			$evento->sizefontCommentoDue = $request->sizefontCommentoDue_1 ;
			$evento->commentoTre = $request->commentoTre_1 ;
			$evento->colorCommentiTre = $request->colorCommentiTre_1 ;
			$evento->indentazioneCommentoTre = $request->indentazioneCommentoTre_1 ;
			$evento->sizefontCommentoTre = $request->sizefontCommentoTre_1 ;
			$evento->fullScreen = empty($request->fullScreen_1) ? 0 : 1;
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


	private function deleteOldEvents(){

			$eventi = Event::all();

			foreach ($eventi as $evento) {
					$arrayLocandine = $this->updateArrayLocandine();
					if(Carbon::parse($evento->dataEvento)->format('Y-m-d') < Carbon::today()->format('Y-m-d') && $evento->dataOraVisibile == 1) {
							 try {
									$evento->delete();
									$indexes = array_keys($arrayLocandine, $evento->locandina);
									if(count($indexes) < 2){
											Storage::disk('uploads')->delete($evento->locandina);
									}
									event(new SerializeFile());
							 } catch (Exception $e) {}
					}
			}

	}

	private function updateArrayLocandine(){
		$eventi_image = Event::select('locandina')->get();
		$arrayLocandine = [];
		foreach ($eventi_image as $evntimg) {
			array_push($arrayLocandine, $evntimg->locandina);
		}
		return $arrayLocandine;
	}

}
