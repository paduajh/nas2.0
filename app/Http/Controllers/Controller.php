<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function checkPermission($permission,$user = null,$msg = "Voce nao tem acesso a esse recurso") {
        if($user instanceof User)
            abort_unless($user->can($permission),403,$msg);
        else
            abort_unless(Auth::user()->can($permission),403,$msg);
    }
}
