<?php
namespace App\Validation;
use App\Models\UsuarioModel;
use App\Models\PersonaModel;

class CustomRules{

  // Rule is to validate mobile number digits
  public function email_estado($userEmail){
    
    $usuario = new UsuarioModel();
    $persona = new PersonaModel();
    $p = $persona->where('email', $userEmail)->first();
    $u = $usuario->where('id_persona',$p['id_persona'])->where('activo', 1)->first();
    return $u != null;
  }
}