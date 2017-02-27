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
        $eventi = Event::all();
        $setting = Setting::all();
        // impostazioni globali
        $datastring .= $setting[0]->dimensione_caratteri.$separatore.$setting[0]->indentazione.$separatore.$setting[0]->spaziatura_eventi;
        $datastring .= PHP_EOL;
        // eventi

        foreach ($eventi as $evento) {
          $datastring .= $evento->tempoStopMenouno.$separatore.
                         $evento->tempoStopMenodue.$separatore.
                         $evento->tempoStopMenotre.$separatore.
                         $evento->visualizzaOgni.$separatore.
                         $evento->dataOraVisibile.$separatore.
                         $evento->locandina.$separatore.
                         $evento->fullScreen.$separatore.
                         $evento->colorData.$separatore.
                         $evento->dataEvento.$separatore.
                         $evento->oraEvento.$separatore.
                    		 $evento->colorEvento.$separatore.
                         $evento->titoloEvento.$separatore.
                    		 $evento->colorCommenti.$separatore.
                    		 $evento->commentoUno.$separatore.
                    		 $evento->commentoDue.$separatore.
                    		 $evento->commentoTre.$separatore.
                    		 $evento->tempoStopDef.$separatore.PHP_EOL;;

        }        
        Storage::disk('public')->put('dataeventpanel.txt', $datastring);
    }
}
