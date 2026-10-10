<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificacionController extends Controller
{
    public function marcarComoLeida(Request $request, DatabaseNotification $notificacion): RedirectResponse
    {
        $notificacion = $request->user()
            ->notifications()
            ->whereKey($notificacion->id)
            ->firstOrFail();

        $notificacion->markAsRead();

        return redirect()->to($notificacion->data['url'] ?? route('home'));
    }
}
