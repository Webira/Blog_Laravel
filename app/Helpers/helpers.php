<?php

function userFullName(){
    return auth()->user()->surname." ". auth()->user()->name;
}

function contains($container,$contenu){
    return Str::contains($container, $contenu);
}


function getRolesName(){
    $rolesName = "";
    $i = 0;
    foreach(auth()->user()->roles as $role){
        $rolesName .= $role->name;

        if($i < sizeof(auth()->user()->roles) - 1){
            $rolesName .=",";
        }        
        $i++;
    }
    return $rolesName;
}

function getrolename($user)
{
    
   $user = \App\User::find($user);
   return $user->roles->first()->name;
}

