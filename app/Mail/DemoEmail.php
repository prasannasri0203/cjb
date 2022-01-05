<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DemoEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $request;

    public function __construct($request)
    {
        $this->request = $request;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->from('xyz@gmail.com')
        ->view('mails.demo')
        ->subject('Login Mail')
        ->with([
            'demoName' => $this->request->name,
            'demoEmail' => $this->request->email,
            'demoPassword' => $this->request->password,
        ]);

    }
}
