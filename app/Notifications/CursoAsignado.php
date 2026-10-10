<?php

namespace App\Notifications;

use App\Models\Curso;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CursoAsignado extends Notification
{
    use Queueable;

    public function __construct(private readonly Curso $curso)
    {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'titulo' => 'Nuevo curso asignado',
            'mensaje' => "Se te asignó el curso {$this->curso->grado}.",
            'tipo' => 'primary',
            'url' => route('profesor.panel', ['id_curso' => $this->curso->id]),
        ];
    }
}
