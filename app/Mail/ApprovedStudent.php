<?php

namespace App\Mail;

use App\Models\Admin\Event;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class ApprovedStudent extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $student; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
        $id_evento = $student->id_evento; 
        $event = DB::table('events')->find($id_evento);
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.aproved-student')
        ->subject('Participante Aprobado');
    }
}
