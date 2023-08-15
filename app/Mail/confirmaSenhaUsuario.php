<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class confirmaSenhaUsuario extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $user;
     public $senha;
    public function __construct(User $user, $senha)
    {
        $this->user = $user;
        $this->senha = $senha;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject("Senha atualizadada");
        $this->to($this->user->email, $this->user->nome);
        return $this->view('usuario.email.confirmaSenhaUsuario', ["user" => $this->user, "senha" => $this->senha]);
    }
}
