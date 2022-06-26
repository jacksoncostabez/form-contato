<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{
    public function index()
    {
        return view('contato.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'mensagem' => 'required'
        ]);

        //Programmer diferenciado faz isso kkk
        $contato = new FormContatoController($request);

        try {
            $contato->sendEmail();
            return back()->with('success', 'Obrigado por nos contactar');
        } catch (\Exception $error) {
            return back()->with("error", "Ocorreu um erro inesperado: {$error->getMessage()}");
        }

    }
}
