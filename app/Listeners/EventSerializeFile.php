<?php

namespace App\Listeners;

use App\Events\SerializeFile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use App\Event;
use App\Setting;
use Storage;

class EventSerializeFile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SerializeFile  $event
     * @return void
     */
    public function handle(SerializeFile $event)
    {
        $datastring = '';
        $separatore = '||';
        $eventi = Event::orderBy('dataEvento', 'asc')->get();
        $setting = Setting::all();
        setlocale(LC_ALL, 'Italian'); //windows
        // setlocale(LC_TIME, 'it_IT'); // linux
        foreach ($eventi as $evento) {

          // impostazioni globali
          $datastring .= $setting[0]->spaziatura_eventi.$separatore; //0

          // eventi
          $datastring .= $evento->tempoStopDef.$separatore. //1
                         $evento->tempoStopMenouno.$separatore.
                         $evento->tempoStopMenodue.$separatore.
                         $evento->tempoStopMenotre.$separatore.
                         $evento->visualizzaOgni.$separatore. //5
                         Carbon::parse($evento->dataEvento)->format('d-m-Y').$separatore.
                         $evento->dataOraVisibile.$separatore.
                         $evento->locandina.$separatore. //8
                         $evento->fullScreen.$separatore. //9
                         $evento->colorData.$separatore. //10
                         strftime("%#d %B %Y", strtotime($evento->dataEvento)).$separatore.
                         $evento->oraEvento.$separatore. //12
                     		 $evento->colorEvento.$separatore. //13
                         $evento->titoloEvento.$separatore. //14
                     		 $evento->colorCommenti.$separatore. //15
                     		 $evento->commentoUno.$separatore. //16
                     		 $evento->commentoDue.$separatore. //17
                     		 $evento->commentoTre.$separatore. //18
                         $evento->indentazioneDataEvento.$separatore.
                         $evento->sizefontDataEvento.$separatore.
                         $evento->indentazioneTitolo.$separatore. //21
                         $evento->sizefontTitolo.$separatore. //22
                         $evento->titoloEventoRigadue.$separatore. //23
                         $evento->indentazioneCommentoUno.$separatore. //24
                         $evento->sizefontCommentoUno.$separatore. //25
                         $evento->colorCommentiDue.$separatore. //26
                         $evento->indentazioneCommentoDue.$separatore. //27
                         $evento->sizefontCommentoDue.$separatore. //28
                         $evento->colorCommentiTre.$separatore. //29
                         $evento->indentazioneCommentoTre.$separatore. //30
                         $evento->sizefontCommentoTre. //31
                         PHP_EOL;

        }

        Storage::disk('public')->put('info.txt', $datastring);

        shell_exec('');

    }
}
