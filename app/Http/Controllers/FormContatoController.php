<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormContatoController extends Controller
{
    private $nome;
    private $email;
    private $mensagem;

    public function __construct(Request $request)
    {
        $this->nome = $request->nome;
        $this->email = $request->email;
        $this->mensagem = $request->mensagem;
    }

    public function sendEmail()
    {
        $data = array(
            'nome'      => $this->nome,
            'email'     => $this->email,
            'mensagem'  => $this->mensagem
        );


        Mail::to(config('mail.from.address'))
            ->send(new SendMail($data));
    }
}
