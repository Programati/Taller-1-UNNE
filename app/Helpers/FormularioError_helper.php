<?php
    //Aqui programararemos los SCRIP la vizualizacion de errores de cada campo del formulario de Registro
    function mostrar_error($validacion, $campo)
    {
        if($validacion->hasError($campo))
        {
            return $validacion->getError($campo); 
        }else
        {
            return false;
        }
    }
?>
