<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public function __invoke(Request $request)
    {
        // Sacar las notificaciones que no han sido leidas
        $notificaciones = auth()->user()->unreadNotifications;

        //Limpiar las notificaciones
        auth()->user()->unreadNotifications->markAsRead();

        //Pasar los notificaciones no leidas obtenidas a la vista
        return view('notificaciones.index',[
            'notificaciones' => $notificaciones
        ]);
    }
}
