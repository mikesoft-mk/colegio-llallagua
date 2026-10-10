<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class EstadoDocenteActualizado extends Notification
{
    use Queueable;

    public function __construct(private readonly bool $activo)
    {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        $estado = $this->activo ? 'activo' : 'inactivo';

        return [
            'titulo' => 'Estado de cuenta actualizado',
            'mensaje' => "Tu cuenta de docente ahora está $estado.",
            'tipo' => $this->activo ? 'success' : 'warning',
            'url' => route('profesor.panel'),
        ];
    }
}
