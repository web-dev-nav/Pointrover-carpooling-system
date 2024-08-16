<?php

namespace App\Models;
use CodeIgniter\Model;

class EmailModel extends Model
{

    protected $email;

    public function __construct()
    {
        // Initialize the Email library
        $this->email = \Config\Services::email();
    }

    public function sendEmailVerification($fromEmail, $randomCode, $type, $tripId)
    {
        // Set email parameters
        $this->email->setTo($fromEmail);
        $this->email->setFrom('noreply@pointrover.com', 'Pointrover.com');
        $this->email->setSubject('Activate Your Posted Trip');

        // Load the HTML email template
        $emailTemplate = view('email_template/send_verification_code', [
            'randomCode' => $randomCode,
            'type' => $type,
            'trip_id' => $tripId
        ]);

        // Set the email message with the HTML template
        $this->email->setMessage($emailTemplate);

        // Attempt to send the email
        if ($this->email->send()) {
            return true;
        } else {
            // Debug email sending errors
            echo $this->email->printDebugger(['headers']);
            return false;
        }
    }

    public function sendEmailForget($email, $subject, $message)
    {
        // Set email parameters
        $this->email->setTo($email);
        $this->email->setFrom('noreply@pointrover.com', 'Pointrover.com');
        $this->email->setSubject($subject);

        // Set the email message with the HTML template
        $this->email->setMessage($message);

        // Attempt to send the email
        if ($this->email->send()) {
            return true;
        } else {
            // Debug email sending errors
            echo $this->email->printDebugger(['headers']);
            return false;
        }
    }
}
