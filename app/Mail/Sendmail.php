<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

// use App\HoaDonChiTiet;
// use App\PhieuXuatKho;
// use App\PhieuXuatKhoChiTiet;
// use App\DonHangNo;
// use App\User;
// use App\HoaDon;
class Sendmail extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('layouts.mail.mailaccess');
    }
}
