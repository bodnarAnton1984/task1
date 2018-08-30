<?php

namespace App;

use Mail;

/**
 * Service for price.
 */
class MailService
{
    public function mailAfterRegistration($user) {

        $emails = $user['email'];
        Mail::send('emails.authorization', array('name' => $user['name'], 'email' => $user['email'] ), function($message) use ($emails)
        {
            $message->to($emails)->subject('Регистрация на сайте');
        });

        return 'вы зарегистрированы';

    }
}
