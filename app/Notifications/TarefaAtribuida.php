<?php

namespace App\Notifications;

use App\Models\Tarefa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TarefaAtribuida extends Notification
{
    use Queueable;

    private $tarefa;

    /**
     * Create a new notification instance.
     */
    public function __construct(Tarefa $tarefa)
    {
        $this->tarefa = $tarefa;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('Uma nova Tarefa, foi Atribuida para você.')
                    ->action('Tarefa', url('/api/tarefas/' . $this->tarefa->id))
                    ->line('Tarefa : ' . $this->tarefa->titulo)
                    ->line('Descricao: ' . $this->tarefa->descricao)
                    ->salutation("LZProjects " . now()->diffForHumans());
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
