<?php

namespace App\Listeners;

use App\Events\SynchronizeInfoToDb;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use App\Event;
use App\Setting;
use Storage;

class EventSynchronizeInfoToDb
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
     * @param  SynchronizeInfoToDb  $event
     * @return void
     */
    public function handle(SynchronizeInfoToDb $event)
    {

    		$contents = trim(Storage::disk('public')->get('info.txt'));
    		$collection = collect();

        if($contents === '') {
            return null;
        }

        try {

          Event::truncate();

          $rows =  explode("\n", $contents);
          foreach ($rows as $fieldsrow) {
            $item = explode("||", $fieldsrow);
            $collection->push($item);
          }

          // ripopola la tabella
          foreach ($collection as $itemrow) {

            $evento = new Event;
            $data_evento = explode('-', $itemrow[6]);
            $evento->dataEvento = Carbon::createFromFormat('Y-m-d H:i:s', $data_evento[2].'-'.$data_evento[1].'-'.$data_evento[0].' '.$itemrow[12].':00')->toDateTimeString();
            $evento->indentazioneDataEvento = $itemrow[19];
            $evento->sizefontDataEvento = $itemrow[20];
            $evento->colorData = $itemrow[10];
            $evento->oraEvento = $itemrow[12];
            $evento->dataOraVisibile = $itemrow[7];
            $evento->tempoStopMenouno = $itemrow[2];
            $evento->tempoStopMenodue = $itemrow[3];
            $evento->tempoStopMenotre = $itemrow[4];
            $evento->titoloEvento = $itemrow[14];
            $evento->titoloEventoRigadue = $itemrow[23];
            $evento->indentazioneTitolo = $itemrow[21];
            $evento->sizefontTitolo = $itemrow[22];
            $evento->colorEvento = $itemrow[13];
            $evento->commentoUno = $itemrow[16];
            $evento->colorCommenti = $itemrow[15];
            $evento->indentazioneCommentoUno = $itemrow[24];
            $evento->sizefontCommentoUno = $itemrow[25];
            $evento->commentoDue = $itemrow[17];
            $evento->colorCommentiDue = $itemrow[26];
            $evento->indentazioneCommentoDue = $itemrow[27];
            $evento->sizefontCommentoDue = $itemrow[28];
            $evento->commentoTre = $itemrow[18];
            $evento->colorCommentiTre = $itemrow[29];
            $evento->indentazioneCommentoTre = $itemrow[30];
            $evento->sizefontCommentoTre = $itemrow[31];
            $evento->fullScreen = $itemrow[9];
            $evento->tempoStopDef = $itemrow[1];
            $evento->visualizzaOgni = $itemrow[5];
            $evento->locandina = $itemrow[8];
            $evento->save();
          }

          return $collection;

        } catch (Exception $e) {

          return null;

        }


    }
}
