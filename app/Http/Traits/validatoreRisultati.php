<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use App\Validatore;

define('S_EOF', 0);
define('S_ALTRI', 1);
define('S_9_32', 2);
define('S_10_13', 3);
define('S_9_32_NC', 4);

define('EV_13_10', '0');
define('EV_9_32', '1');
define('EV_EOF', '2');
define('EV_ALTRI', '3');

// ------------------------ Luigi
define('BASE', '1');
define('ALGORITMO', '0');
define('CODICE', '3');
define('R1', '4');
define('R2', '5');
define('R3', '6');
define('DESCR', '7');
define('SCORE', 8);
define('PATOLOGIA', 10);
define('idPATOLOGIA', 9);
define('FILTRO', 12);
define('idFILTRO', 11);
define('L', 1);
define('R', 2);
define('PANNELLO', 13);
define('SOTTOPANNELLO', 14);
define('NOME_PANNELLO', 15);
define('NOME_SOTTOPANNELLO', 16);

define('APOE_CODICE', 0);
define('APOE_VAR_INIT', 1);
define('APOE_VAR_END', 7);

define('MYSQL', 1);

// ---------------------------------------
// define('debug', '1');

trait validatoreRisultati {

    // use Helpers;

    private $FSM = array();
    private $FSMnc = array();
    private $RifTblIndex = -1; // Luigi
    private $Index = 0;
    private $Indicenc = 0;
    private $Indice = 0;
    private $Stringanc = "";
    private $StrEmpty = "";
    private $CurrentScore = 10000;
    private $ContatoreMessaggi = 0;
    private $OutStr = "";
    private $IndiceRiga = 0;
    private $Stringa = "";
    private $ArrayAnalisi = array();
// ------------------------------------ Luigi
// APOe
    private $ApoeTblIndex = 0;
    private $TabApoe = Array();
    private $ApoEVariante = Array("", "");
    private $SubIndice = array(-1, -1);
    private $TabellaDebug = "";
    private $DispTabApoE = "";
// ------------------------------------
    private $DescrizioneCodice = array();
    private $parts = array();
    private $errorValidator = false;
    // private $CurrentScore = 10000;
    // private $ContatoreMessaggi = 0;
    // private $OutStr = "";
    // private $IndiceRiga = 0;
    private $sFiltro = "";
    private $sPatologia = "";
    private $idFiltro = 0;
    private $idPatologia = 0;
    private $Versione = "0.0.9";
    private $VersioneTbl = "";
    private $IndicePannelloFrom = Array();
    private $IndicePannelloTo = Array();
    private $IndiceSottoPannelloFrom = Array();
    private $IndiceSottoPannelloTo = Array();
    private $ChiavePannello = Array();
    private $ChiaveSottoPannello = Array();
    private $ContatoreFiltri = 0;
    private $ListaFiltri = Array();
    private $sListaFiltri = Array();
    private $NomePannello = Array();
    private $NomeSottoPannello = Array();

    public function __construct() {
        $this->FSM[0] = array(S_10_13, S_9_32, S_EOF, S_ALTRI);
        $this->FSM[1] = array(S_10_13, S_9_32, S_EOF, S_ALTRI);
        $this->FSM[2] = array(S_10_13, S_9_32, S_EOF, S_ALTRI);
        $this->FSM[3] = array(S_EOF, S_EOF, S_EOF, S_ALTRI);

        $this->FSMnc[0] = array(S_10_13, S_9_32, S_EOF, S_ALTRI);
        $this->FSMnc[1] = array(S_10_13, S_9_32_NC, S_EOF, S_ALTRI);
        $this->FSMnc[2] = array(S_10_13, S_9_32, S_EOF, S_ALTRI);
        $this->FSMnc[3] = array(S_EOF, S_EOF, S_EOF, S_ALTRI);
        $this->FSMnc[4] = array(S_10_13, S_9_32_NC, S_EOF, S_ALTRI);

        $this->ArrayAnalisi[0] = "";
        $this->DescrizioneCodice[0] = "";
    }

    public function validaRisultato($TestoIncollato) {

        $CurPanIndex = 0;
        $CurSubPanIndex = 0;
        $OldF = -1;
        $OldS = -1;
        if (!defined('MYSQL')) {
            // Simulazione locale !! (no db)

            $file_handle = fopen("tabella.txt", "rb");

            while (!feof($file_handle)) {
                $line = fgets($file_handle);

                if ($this->RifTblIndex < 0) {
                    $this->VersioneTbl = $line;
                    $this->RifTblIndex = 0;
                } else {
                    $z = explode('|', $line);
                    if (count($z) > 1) {
                        $this->parts[$this->RifTblIndex] = $z;

                        if ($z[PANNELLO] != $OldF) {
                            if ($OldF == -1) {
                                $this->IndicePannelloFrom[$CurPanIndex] = $this->RifTblIndex;
                                $OldF = $z[PANNELLO];
                                $this->ChiavePannello[$CurPanIndex] = (int) $z[PANNELLO];
                                $this->NomePannello[$CurPanIndex] = $z[NOME_PANNELLO];
                            } else {
                                $this->IndicePannelloTo[$CurPanIndex] = $this->RifTblIndex - 1;
                                $CurPanIndex++;
                                $this->IndicePannelloFrom[$CurPanIndex] = $this->RifTblIndex;
                                $OldF = $z[PANNELLO];
                                $this->ChiavePannello[$CurPanIndex] = (int) $z[PANNELLO];
                                $this->NomePannello[$CurPanIndex] = $z[NOME_PANNELLO];
                            }
                        }
                        if ($z[SOTTOPANNELLO] != $OldS) {
                            if ($OldS == -1) {
                                $this->IndiceSottoPannelloFrom[$CurSubPanIndex] = $this->RifTblIndex;
                                $OldS = $z[SOTTOPANNELLO];
                                $this->ChiaveSottoPannello[$CurSubPanIndex] = (int) $z[SOTTOPANNELLO];
                                $this->NomeSottoPannello[$CurSubPanIndex] = $z[NOME_SOTTOPANNELLO];
                            } else {
                                $this->IndiceSottoPannelloTo[$CurSubPanIndex] = $this->RifTblIndex - 1;
                                $CurSubPanIndex++;
                                $this->IndiceSottoPannelloFrom[$CurSubPanIndex] = $this->RifTblIndex;
                                $OldS = $z[SOTTOPANNELLO];
                                $this->ChiaveSottoPannello[$CurSubPanIndex] = (int) $z[SOTTOPANNELLO];
                                $this->NomeSottoPannello[$CurSubPanIndex] = $z[NOME_SOTTOPANNELLO];
                            }
                        }
                        $this->RifTblIndex++;
                    }
                }
                // $this->RifTblIndex++;
            }
            $this->IndicePannelloTo[$CurPanIndex] = $this->RifTblIndex - 1;
            $this->IndiceSottoPannelloTo[$CurSubPanIndex] = $this->RifTblIndex - 1;
            fclose($file_handle);
            $file_handle = fopen("TabellaAPOE.txt", "rb");

            while (!feof($file_handle)) {

                $line_of_text = strtoupper(fgets($file_handle));
                $z = explode('|', $line_of_text);
                if (count($z) > 1) {
                    $this->TabApoe[$this->ApoeTblIndex] = $z;
                    $this->ApoeTblIndex++;
                }
            }
            fclose($file_handle);
        } else {
            //U tilizzo MySQL
            $file_handle = Validatore::select('tabella')->where('APOE', 0)->whereNull('validity_end')->first()->toArray();
            if (!isset($file_handle))
                $file_handle = Validatore::select('tabella')->where('APOE', 0)->where('validity_end', '>=', date("Y-m-d"))->first()->toArray();

            if (!isset($file_handle)) {
                $response['result_debug'] = '';
                $response['result'] = '';
                $response['error'] = 'ERRORE: tabella non trovata';
                return $response;
            }

            $line_of_text = preg_split('/\n|\r/', $file_handle['tabella'], -1, PREG_SPLIT_NO_EMPTY);

            foreach ($line_of_text as $line) {
                if ($this->RifTblIndex < 0) {
                    $this->VersioneTbl = $line;
                    $this->RifTblIndex = 0;
                } else {
                    $z = explode('|', $line);
                    if (count($z) > 1) {
                        $this->parts[$this->RifTblIndex] = $z;

                        if ($z[PANNELLO] != $OldF) {
                            if ($OldF == -1) {
                                $this->IndicePannelloFrom[$CurPanIndex] = $this->RifTblIndex;
                                $OldF = $z[PANNELLO];
                                $this->ChiavePannello[$CurPanIndex] = (int) $z[PANNELLO];
                                $this->NomePannello[$CurPanIndex] = $z[NOME_PANNELLO];
                            } else {
                                $this->IndicePannelloTo[$CurPanIndex] = $this->RifTblIndex - 1;
                                $CurPanIndex++;
                                $this->IndicePannelloFrom[$CurPanIndex] = $this->RifTblIndex;
                                $OldF = $z[PANNELLO];
                                $this->ChiavePannello[$CurPanIndex] = (int) $z[PANNELLO];
                                $this->NomePannello[$CurPanIndex] = $z[NOME_PANNELLO];
                            }
                        }
                        if ($z[SOTTOPANNELLO] != $OldS) {
                            if ($OldS == -1) {
                                $this->IndiceSottoPannelloFrom[$CurSubPanIndex] = $this->RifTblIndex;
                                $OldS = $z[SOTTOPANNELLO];
                                $this->ChiaveSottoPannello[$CurSubPanIndex] = (int) $z[SOTTOPANNELLO];
                                $this->NomeSottoPannello[$CurSubPanIndex] = $z[NOME_SOTTOPANNELLO];
                            } else {
                                $this->IndiceSottoPannelloTo[$CurSubPanIndex] = $this->RifTblIndex - 1;
                                $CurSubPanIndex++;
                                $this->IndiceSottoPannelloFrom[$CurSubPanIndex] = $this->RifTblIndex;
                                $OldS = $z[SOTTOPANNELLO];
                                $this->ChiaveSottoPannello[$CurSubPanIndex] = (int) $z[SOTTOPANNELLO];
                                $this->NomeSottoPannello[$CurSubPanIndex] = $z[NOME_SOTTOPANNELLO];
                            }
                        }
                        $this->RifTblIndex++;
                    }
                }
            }

            $this->IndicePannelloTo[$CurPanIndex] = $this->RifTblIndex - 1;
            $this->IndiceSottoPannelloTo[$CurSubPanIndex] = $this->RifTblIndex - 1;

            // Elimino tutti gli spazi dalla fine e all'inizio di ogni riga e ricreo $TestoIncollato
            $splitTesto = preg_split('/\n|\r/', $TestoIncollato, -1, PREG_SPLIT_NO_EMPTY);
            $TestoIncollato = '';
            foreach ($splitTesto as $testo) {
                $TestoIncollato .= trim($testo) . PHP_EOL;
            }

            // APOE
            unset($file_handle);
            unset($line_of_text);
            $file_handle = Validatore::select('tabella')->where('APOE', 1)->whereNull('validity_end')->first()->toArray();
            if (!isset($file_handle))
                $file_handle = Validatore::select('tabella')->where('APOE', 1)->where('validity_end', '>=', date("Y-m-d"))->first()->toArray();

            if (!isset($file_handle)) {
                $response['result_debug'] = '';
                $response['result'] = '';
                $response['error'] = 'ERRORE: tabella non trovata';
                return $response;
            }

            $line_of_text = preg_split('/\n|\r/', $file_handle['tabella'], -1, PREG_SPLIT_NO_EMPTY);
            foreach ($line_of_text as $line) {
                $line = strtoupper($line);
                $z = explode('|', $line);
                if (count($z) > 1) {
                    $this->TabApoe[$this->ApoeTblIndex] = $z;
                    $this->ApoeTblIndex++;
                }
            }
        }
        // -------------------------------------- Luigi
        // Ricerca
        // Separazione pannelli
        $ArrayTestoIncollato = explode("$$", $TestoIncollato);
        $NumOfTabs = (int) count($ArrayTestoIncollato) - 1;
        // Analisi Foglio/Pannello
        //
        $response['result_debug'] = '';
        $response['result'] = '';
        $response['error'] = false;
        for ($np = 0; $np < $NumOfTabs; $np++) {
            $SubPan = explode("||", $ArrayTestoIncollato[$np]);
            $pannello = $SubPan[0];
            $sottopanello = $SubPan[1];
            $TestoIncollato = $SubPan[2];

            if ($pannello > 0) {
                $lIndice = $this->CercaChiavePannello($pannello);
                $this->OutStr = $this->OutStr . $this->NomePannello[(int) $lIndice] . PHP_EOL;
            }
            if ($sottopanello > 0) {
                $lIndice = $this->CercaChiaveSottoPannello($sottopanello);
                $this->OutStr = $this->OutStr . $this->NomeSottoPannello[(int) $lIndice] . PHP_EOL;
            }

            $this->ParseString($TestoIncollato);
            $this->ParseStringnc($TestoIncollato);

            for ($i = 0; $i < $this->Indice; $i++) {
                $x = $this->ArrayAnalisi[$i];
                $this->ArrayAnalisi[$i] = explode(':', $x);
            }
            for ($i = 0; $i < $this->Indice; $i++) {
                $r = $this->SearchOnTable($i, $this->Index, $pannello, $sottopanello);
                $this->ArrayAnalisi[$i][2] = $r;
                if ($r != "") {
                    $this->ArrayAnalisi[$i][3] = $this->parts[$this->Index][DESCR];
                    $this->UpdateResult($i, $this->Index);
                } else {
                    if ($this->Index >= 0) {
                        $this->ArrayAnalisi[$i][3] = "-";
                        $this->UpdateResult($i, -1);
                    } else {
                        $this->ArrayAnalisi[$i][3] = "Codice non trovato";
                        $this->errorValidator = true;
                    }
                }
            }

            $result_debug = "<table class=\"table table-striped table-bordered dataTable no-footer\" >";
            if ($pannello > 0) {
                $lIndice = $this->CercaChiavePannello($pannello);
                $VarInTable = $this->NomePannello[$lIndice];
            }
            if ($sottopanello > 0) {
                $lIndice = $this->CercaChiaveSottoPannello($sottopanello);
                $VarInTable = $this->NomeSottoPannello[$lIndice];
            }
            $result_debug .= "<tr colspan=3><h3>" . $VarInTable . "</h3></tr>";
            for ($i = 0; $i < $this->Indice; $i++) {
                if ($i % 2 == 0) {
                    // $td="<td style=\"vertical-align: middle; background-color: rgb(153, 153, 153);\">";
                    $td = "<td>";
                } else {
                    // $td="<td style=\"vertical-align: middle; background-color: rgb(200,200,200);\">";
                    $td = "<td>";
                }
                if ($this->ArrayAnalisi[$i][3] == "Codice non trovato")
                    $td = "<td style=\"vertical-align: middle; background-color: rgb(255,0,0);\">";

                $result_debug .= "<tr>";
                $result_debug .= $td;
                $result_debug .= $this->DescrizioneCodice[$i];
                $result_debug .= "</td>";

                $result_debug .= $td;
                $result_debug .= $this->ArrayAnalisi[$i][2];
                $result_debug .= "</td>";
                $result_debug .= "</td>";
                $result_debug .= $td;
                $result_debug .= $this->ArrayAnalisi[$i][3];
                $result_debug .= "</td>";
                $result_debug .= "</tr>";
            }
            $result_debug .= "</table>";
            $result_debug .= $this->TabellaDebug;
            if (!defined('MYSQL'))
                print $result_debug;

            $Separatore = "|";
            $result = $this->getVersioneAlgoritmo() . $Separatore .
                    $this->getVersioneTabella() . $Separatore .
                    $this->getTabellaRiassuntiva() . $Separatore;
            // $this->getIdFiltro() . $Separatore .
            // $this->getFiltroDescr() . $Separatore .
            // $this->getIdPatologia() . $Separatore .
            // $this->getPatologiaDescr();

            $response['result_debug'] = $response['result_debug'] . $result_debug;
            // $response['result'] = $response['result'] . $result;
            $response['result'] = $result;
            if ($response['error'] == false)
                $response['error'] = $this->errorValidator;
        }
        $response['id_patologia'] = $this->getIdPatologia();
        $response['nome_patologia'] = $this->getPatologiaDescr();
        $response['id_filtro'] = $this->getIdFiltro();
        $response['nome_filtro'] = $this->getFiltroDescr();


        return $response;
    }

// Separa array $this->ArrayAnalisi sui ':'

    function SearchOnTable($IndiceAnalisi, &$Index, $pannello, $sottopannello) {
        // $this->RifTblIndex;
        // $this->parts;
        // $this->TabApoe;
        // $this->ApoEVariante;
        // $this->ArrayAnalisi;
        // $this->SubIndice;
        // $this->TabellaDebug;
        // $this->DispTabApoE;
        $StringaDaCercare = strtoupper($this->ArrayAnalisi[$IndiceAnalisi][0]);
        if (count($this->ArrayAnalisi[$IndiceAnalisi]) != 2) {
            $Index = -2;
            return "";
        }
        $Variante = strtoupper($this->ArrayAnalisi[$IndiceAnalisi][1]);
        $Index = -2;
        $xflg = 0;
        $from = $this->CercaFrom($pannello, $sottopannello);
        $to = $this->CercaTo($pannello, $sottopannello);
        // for ($i = 0; $i < $this->RifTblIndex; $i++) {
        for ($i = $from; $i <= $to; $i++) {
            if ($this->TipoRicerca($StringaDaCercare, $i) == 0) {
                switch ($this->parts[$i][ALGORITMO]) {
                    // la descrizione degli algoritmi è nella funzione TipoRicerca
                    case 1:
                    case 2:
                        $xflg = 1;
                    case 4:
                        // nel caso 4 la ricerca va eseguita su tutta la tabella
                        $this->Index = 0;
                        $j = R1;
                        $flg = 0;
                        while ($j <= R3 && $flg == 0) {
                            if (strcmp($this->parts[$i][$j], $Variante) == 0) {
                                $flg = 1;
                                $Index = $i;
                            }
                            $j++;
                        }
                        if ($flg == 1) { // trovata Variante
                            return $Variante;
                       // } else {
                       //     return "";
                        }
                        break;
                    case 3:
                        $xflg = 1;
                        $Index = 0;
                        $j = R1;
                        $flg = 0;
                        while ($j <= R3 && $flg == 0) {
                            if (strcmp($this->parts[$i][$j], $Variante) == 0) {
                                $flg = 1;
                                $Index = $i;
                            }
                            $j++;
                        }
                        if ($flg == 1) { // trovata Variante
                            // controlla sulla tabella $TabApoe la validità della variante
                            for ($k = 0; $k < 2; $k++) {
                                $len = $this->parts[$i][R] * -1;
                                $sub0 = substr($StringaDaCercare, $len);
                                $sub1 = substr($this->TabApoe[$k][APOE_CODICE], $len);
                                $iRet = strcmp($sub0, $sub1);
                                if ($iRet == 0) {
                                    // trovato genotipo in TabApoE
                                    // memorizza la variante degli alleli
                                    $this->ApoEVariante[$k] = $Variante;
                                    $this->SubIndice[$k] = $IndiceAnalisi;
                                    if ($this->ApoEVariante[0] != "" && $this->ApoEVariante[1] != "") {
                                        // ricerca combinazione Ex/Ey
                                        for ($v = APOE_VAR_INIT; $v <= APOE_VAR_END; $v++) {
                                            if ($this->TabApoe[0][$v] == $this->ApoEVariante[0] && $this->TabApoe[1][$v] == $this->ApoEVariante[1]) {


                                                // Trovata combinazione Ex/Ey
                                                $Variante = $this->TabApoe[2][$v];
                                                $this->DispTabApoE = $this->ArrayAnalisi[$this->SubIndice[0]][0] . " " . $this->ApoEVariante[0] . PHP_EOL;
                                                $this->DispTabApoE = $this->DispTabApoE . $this->ArrayAnalisi[$this->SubIndice[1]][1] . " " . $this->ApoEVariante[1] . PHP_EOL;
                                                $this->DispTabApoE = $this->DispTabApoE . " " . $Variante;
                                                $this->TabellaDebug = "<table border=\"1\"><tr><td>APOe</td></tr><tr><td>" . $this->ArrayAnalisi[$this->SubIndice[0]][0] . "</td><td>" . $this->ArrayAnalisi[$this->SubIndice[1]][0] . "</td></tr>";
                                                $this->TabellaDebug = $this->TabellaDebug . "<tr><td>" . $this->ApoEVariante[0] . "</td><td>" . $this->ApoEVariante[1] . "</td><td>" . $Variante . "</td></tr></table>";
                                                return $Variante;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        break;
                    case 5: // Nuovo APOE
                        $this->Index = 0;
                        $j = R1;
                        $flg = 0;
                        $j = stripos($Variante, "E4");
                        if ($j != 0) {
                            $flg = 1;
                            $Index = $i;
                            return $Variante;
                        }
                }
            }
        }
        return "";
    }

    function CercaChiavePannello($p) {
        $i = 0;
        $j = -1;
        while ($j < 0 && $i < count($this->ChiavePannello)) {
            if ($this->ChiavePannello[$i] == $p)
                $j = $i;
            $i++;
        }
        return $j;
    }

    function CercaChiaveSottoPannello($p) {
        $i = 0;
        $j = -1;
        while ($j < 0 && $i < count($this->ChiaveSottoPannello)) {
            if ($this->ChiaveSottoPannello[$i] == $p)
                $j = $i;
            $i++;
        }
        return $j;
    }

    function CercaFrom($pannello, $sottopannello) {
        $from = -1;
        if ($pannello >= 0) {
            $Indice = $this->CercaChiavePannello($pannello);
            $from = $this->IndicePannelloFrom[$Indice];
        } else {
            $Indice = $this->CercaChiaveSottoPannello($sottopannello);
            $from = $this->IndiceSottoPannelloFrom[$Indice];
        }
        return $from;
    }

    function CercaTo($pannello, $sottopannello) {
        $to = -1;
        if ($pannello >= 0) {
            $Indice = $this->CercaChiavePannello($pannello);
            $to = $this->IndicePannelloTo[$Indice];
        } else {
            $Indice = $this->CercaChiaveSottoPannello($sottopannello);
            $to = $this->IndiceSottoPannelloTo[$Indice];
        }
        return $to;
    }

    function ParseString($Testo) {
        // $this->FSM;
        // $this->Indice;
        $this->Indice = 0;
        $NewState = 0;
        $CurrrentState = 0;
        $lx = strlen($Testo);
        $this->Stringa = "";
        for ($i = 0; $i < $lx; $i++) {
            $a = substr($Testo, $i, 1);
            $Event = $this->SelectEvent(ord($a));
            $NewState = $this->FSM[$CurrrentState][$Event];
            $this->Action($NewState, $CurrrentState, $a);
            $CurrrentState = $NewState;
        }
        $Event = EV_EOF;
        $NewState = $this->FSM[$CurrrentState][$Event];
        $this->Action($NewState, $CurrrentState, $a);
    }

    function SelectEvent($a) {
        $Event = -1;
        if ($a > 127 || $a==0)
            $Event = EV_9_32;
        else {
            switch ($a) {
                case 10:
                case 13:
                    $Event = EV_13_10;
                    break;
                case 9:
                case 32:
                case 0xa0: // Spazio unificatore
                    $Event = EV_9_32;
                    break;
                default:
                    $Event = EV_ALTRI;
                    break;
            }
        }
        return $Event;
    }

    function Action($n, $c, $a) {
        // $this->ArrayAnalisi;
        // $this->Indice;
        // $this->Stringa;
        // $this->StrEmpty;
        switch ($c) {
            case S_ALTRI:
                switch ($n) {
                    case S_ALTRI:
                        $this->Stringa = $this->Stringa . $a;
                        break;
                    case S_EOF:
                    case S_10_13:
                        $this->ArrayAnalisi[$this->Indice] = $this->Stringa;
                        $this->Indice++;
                        $this->Stringa = "";
                        $this->StrEmpty = "";
                        break;
                }
                break;
            case S_9_32:
                switch ($n) {
                    case S_ALTRI:
                        $this->Stringa = $this->Stringa . $a;
                        break;
                    case S_EOF:
                    case S_10_13:
                        $this->ArrayAnalisi[$this->Indice] = $this->Stringa;
                        $this->Indice++;
                        $this->Stringa = "";
                }
                break;
            case S_10_13:
                switch ($n) {
                    case S_ALTRI:
                        $this->Stringa = $this->Stringa . $a;
                        break;
                }
                break;
            case S_EOF:
                switch ($n) {
                    case S_ALTRI:
                        $this->Stringa = $this->Stringa . $a;
                        break;
                }
                break;
        }
    }

    function ParseStringnc($Testo) {
        // $this->FSMnc;
        // $this->Indicenc;
        $this->Indicenc = 0;
        $NewState = 0;
        $CurrrentState = 0;
        $lx = strlen($Testo);
        $this->Stringanc = "";
        for ($i = 0; $i < $lx; $i++) {
            $a = substr($Testo, $i, 1);
            $Event = $this->SelectEvent(ord($a));
            $NewState = $this->FSMnc[$CurrrentState][$Event];
            $this->Actionnc($NewState, $CurrrentState, $a);
            $CurrrentState = $NewState;
        }
        $Event = EV_EOF;
        $NewState = $this->FSMnc[$CurrrentState][$Event];
        $this->Actionnc($NewState, $CurrrentState, $a);
    }

    function Actionnc($n, $c, $a) {
        // $this->DescrizioneCodice;
        // $this->Indicenc;
        // $this->Stringanc;
        // $this->StrEmpty;
        switch ($c) {
            case S_ALTRI:
                switch ($n) {
                    case S_ALTRI:
                        $this->Stringanc = $this->Stringanc . $a;
                        break;
                    case S_EOF:
                    case S_10_13:
                        $this->DescrizioneCodice[$this->Indicenc] = $this->Stringanc;
                        $this->Indicenc++;
                        $this->Stringanc = "";
                        $this->StrEmpty = "";
                        break;
                    case S_9_32_NC:
                        $this->StrEmpty = $this->StrEmpty . $a;
                        break;
                }
                break;
            case S_9_32:
                switch ($n) {
                    case S_ALTRI:
                        $this->Stringanc = $this->Stringanc . $a;
                        break;
                    case S_EOF:
                    case S_10_13:
                        $this->DescrizioneCodice[$this->Indicenc] = $this->Stringa;
                        $this->Indicenc++;
                        $this->Stringanc = "";
                }
                break;
            case S_10_13:
                switch ($n) {
                    case S_ALTRI:
                        $this->Stringanc = $this->Stringanc . $a;
                        break;
                }
                break;
            case S_EOF:
                switch ($n) {
                    case S_ALTRI:
                        $this->Stringanc = $this->Stringanc . $a;
                        break;
                }
                break;
            case S_9_32_NC:
                switch ($n) {
                    case S_ALTRI:
                        $this->Stringanc = $this->Stringanc . $this->StrEmpty . $a;
                        $this->StrEmpty = "";
                        break;
                    case S_EOF:
                    case S_10_13:
                        $this->ArrayAnalisi[$this->Indicenc] = $this->Stringanc;
                        $this->Indice++;
                        $this->Stringanc = "";
                        $this->StrEmpty = "";
                        break;
                    case S_9_32_NC:
                        $this->StrEmpty = $this->StrEmpty . $a;
                        break;
                }
                break;
        }
    }

    function TipoRicerca($StringaDaCercare, $Indice) {
        // $this->parts;
        $iRet = -1;
        $StringaSuTabella = $this->parts[$Indice][CODICE];
        $Algoritmo = $this->parts[$Indice][ALGORITMO];
        $StringaSuTabella = strtoupper($StringaSuTabella);
        switch ($Algoritmo) {
            case 1: // string compare
            case 3: // caso APOe
            case 4: // Esegue lo stesso confronto di 1
            case 5: // Nuovo algoritmo EPOE che sostituisce completamente il 3
                // In questo caso viene eseguito lo string compare e va cercato se tra le varienti c'è un E4
                // Confronta la parte destra e sinistra della stringa
                $len = $this->parts[$Indice][L];
                $sub0 = substr($StringaDaCercare, 0, $len);
                $sub1 = substr($StringaSuTabella, 0, $len);
                $iRet = strcmp($sub0, $sub1);
                if ($iRet == 0) {
                    $len = $this->parts[$Indice][R] * -1;
                    // $sub0 = substr($StringaDaCercare, 0, $len);
                    // $sub1 = substr($StringaSuTabella, 0, $len);                    // $sub0 = substr($StringaDaCercare, 0, $len);
                    $sub0 = substr($StringaDaCercare, $len);
                    $sub1 = substr($StringaSuTabella, $len);
                    $iRet = strcmp($sub0, $sub1);
                }
                break;
            case 2: // GSTM1, GSTT1
                $iRet = strncmp($StringaDaCercare, $StringaSuTabella, 5);
                // in questo caso vengono confrontati solo i primi 5 byte!!
                break;
        }
        return $iRet;
    }

    function UpdateResult($i, $Index) {
        // $this->parts;
        // $this->DescrizioneCodice;
        // $this->ContatoreMessaggi;
        // $this->OutStr;
        // $this->CurrentScore;
        // $this->ArrayAnalisi;
        // $this->IndiceRiga;
        // $this->sFiltro;
        // $this->sPatologia;
        // $this->idFiltro;
        // $this->idPatologia;
        if ($Index >= 0) {
            if ($this->parts[$Index][SCORE] < $this->CurrentScore) {
                $this->CurrentScore = $this->parts[$Index][SCORE];
                $this->idPatologia = $this->parts[$Index][idPATOLOGIA];
                //$this->idFiltro = $this->parts[$Index][idFILTRO];
                $this->sPatologia = $this->parts[$Index][PATOLOGIA];
                //$this->sFiltro = $this->parts[$Index][FILTRO];
                $this->IndiceRiga = $this->ContatoreMessaggi;
            }

            $this->Add2Filtro($this->parts[$Index][FILTRO], $this->parts[$Index][idFILTRO]);
        }
        $this->OutStr = $this->OutStr . $this->DescrizioneCodice[$i] . " " . $this->ArrayAnalisi[$i][2] . " " . $this->ArrayAnalisi[$i][3] . PHP_EOL;
        $this->ContatoreMessaggi++;
    }

    function Add2Filtro($sid, $id) {
        $j = -1;
        $i = 0;
        while ($i < $this->ContatoreFiltri && $j < 0) {
            if ($this->ListaFiltri[$i] == $id)
                $j = 0;
            $i++;
        }
        if ($j < 0) {
            $this->ListaFiltri[$this->ContatoreFiltri] = $id;
            $this->sListaFiltri[$this->ContatoreFiltri] = $sid;
            $this->ContatoreFiltri++;
        }
    }

    function getVersioneAlgoritmo() {
        // $this->Versione;
        return $this->Versione;
    }

    function getVersioneTabella() {
        // $this->VersioneTbl;
        return $this->VersioneTbl;
    }

    function getTabellaRiassuntiva() {
        // $this->OutStr;
        return $this->OutStr;
    }

    function getIdFiltro() {
        // la funzione restituisce l'ID winfood dell'allergia
        // $this->idFiltro;
        if (count($this->ListaFiltri) != 0)
            $this->idFiltro = implode(";", $this->ListaFiltri);
        else
            $this->idFiltro = 0;
        return $this->idFiltro;
    }

    function getIdPatologia() {
        // la funzione restituisce l'ID winfood della patologia/stato fisiologico
        // $this->idPatologia;
        return $this->idPatologia;
    }

    function getFiltroDescr() {
        // la funzione restituisce la descrizione del filtro
        // $this->sFiltro;
        if (count($this->sListaFiltri) != 0)
            $this->sFiltro = implode(";", $this->sListaFiltri);
        else
            $this->sFiltro = "-";
        return $this->sFiltro;
    }

    function getPatologiaDescr() {
        // la funzione restituisce la descrizione della  Patologia filtro
        // $this->sPatologia;
        if ($this->idPatologia == 0)
            $this->sPatologia = "-";
        return $this->sPatologia;
    }

}

// END OF CLASS

?>
