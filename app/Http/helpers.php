<?php

/*Genera il pulsante per la cancellazione
 */
function delete_form($routeParams, $label = 'Cancella')
{
    $form = Form::open(['method' => 'DELETE', 'url' => $routeParams]);
    $form .= Form::submit($label, ['class' => 'btn btn-danger']);
    return $form .= Form::close();
}

/*Genera il link per la cancellazione
 */
function delete_form_link($routeParams, $label = 'Cancella', $confirmmsg = 'Cancellare elemento?')
{
    $form = Form::open(['method' => 'DELETE', 'url' => $routeParams, 'class' => 'pull-left']);
    $form .= "&nbsp;";
    $form .= Form::submit($label, ['class' => 'linkdestroy', '' => 'confirmDelUsr("'.$confirmmsg.'")']);
    return $form .= Form::close();
}

function getDefaultDateFormat()
{
  return DEFAULTDATAFORMAT;
}


function searchInArrayObject($array, $propertyval, $propertyname){

    $search = false;
    foreach($array as $struct) {
            if ($propertyval == $struct->$propertyname) {
                $search = true;
                break;
            }
    }
    return $search;

}
