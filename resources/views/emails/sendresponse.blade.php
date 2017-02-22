<!DOCTYPE html>
<html>
     <head>
          <meta charset=utf-8>
     </head>
     <body>

    Risposta Test Genoma:
    <br><br>
    <b>Nome e Cognome:</b> {{ $datarisp[0]->nome }} {{ $datarisp[0]->cognome }}
    <br>
    <b>Sesso:</b> {{ $datarisp[0]->sesso }}
    <br>
    <b>Data Nascita:</b> {{ \Carbon\Carbon::parse($datarisp[0]->data_nascita)->format('d-m-Y')  }}
    <br>
    <b>Stringa:</b> <br>
     <?php echo $datarisp[1]; ?>

<br><br>

  <table style="width:100%">
  <tbody>
  <tr>
    <td style="border-bottom: 1px solid #a7d9e5;  padding: 0 0 2px 0;" colspan="2">
          <span style="font-size: 13px; font-family: 'arial'; font-weight: bold;">
          </span> &nbsp;
        <span style="display: none !important;">
          <span style="font-size: 11px; font-family: 'arial'; ">
          </span>,
        </span>
      </span>
    </td>
  </tr>
</tbody></table>

     </body>
</html>
