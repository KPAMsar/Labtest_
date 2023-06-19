<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\View;
use App\Models\User;


class LabtestFormMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    } 
  

    /**
     * Get the message envelope.
      */
    //  public function envelope(): Envelope
    //  {
    //      return new Envelope(
    //          subject: 'medical data',
    //      );
    //  }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: ('welcome')
    //     );
    // }

   

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    // public function attachments(): array
    // {
    //     return [];
    // }
    // function build(){

    //     $data = ['kkkk'.'ljkkh'];
    //     return $this->view('form',['user'=>$this->user, 'items'=>$data]);
    // }





    // return $this->subject(`{{}}Medical Report`)
    // ->view('form')
    // ->with([
    //     'name' => $this->data['name'],
    //     'email' => $this->data['email'],
    //     'XY' => $this->data['email'],
    //     'email' => $this->data['email'],
    //     'message' => $this->data['message'],
    //     'ctscan' =>$this->data['ctscan'],
    // ]);

    // public function build()
    // {
    //     $subject = 'Medical Report';
    //     $view = 'form';
    //     $data = $this->data;

    //     if (is_null($data)) {
    //         return null;
    //     }

    //     return $this->subject($subject)
    //     ->view($view)
    //     ->with($data);
    // }


    public function build()
    {
        $subject = $this->data['name'] . ' medical data';
        $view = 'form';
        $data = $this->data;

        if (is_null($data)) {
            return null;
        }

        return $this->subject($subject)
            ->view($view)
            ->with($data)
            ->from('your-email@example.com', 'dawn');
    }
    

 
}
