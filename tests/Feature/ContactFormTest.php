<?php

namespace Tests\Feature;

use App\Http\Livewire\ContactForm;
use App\Mail\ContactFormMailable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    /** @test */ 
    public function page_contains_contact_form_livewire_component()
    {
        $this->get('/contact')
            ->assertSeeLivewire('contact-form');
    }

    /** @test */ 
    public function contact_form_sends_out_an_email()
    {
        Mail::fake();

        Livewire::test(ContactForm::class)
            ->set('name', 'Luka')
            ->set('email', 'someguy@gmail.com')
            ->set('phone', '+9955513253325300')
            ->set('message', 'Test Body for the email test')
            ->call('submitForm')
            ->assertSee('Mail has been sent');

        Mail::assertSent(function(ContactFormMailable $mail) {
            $mail->build();

            return $mail->hasTo('lukachochua@gmail.com') &&
                $mail->subject === 'Contact from Luka Chochua' &&
                $mail->replyTo('someguy@gmail.com');
        });
    }

    /** @test */ 
    public function contact_form_name_field_is_required()
    {
        Livewire::test(ContactForm::class)
        ->set('email', 'someguy@gmail.com')
        ->set('phone', '+9955513253325300')
        ->set('message', 'Test Body for the email test')
        ->call('submitForm')
        ->assertHasErrors(['name'=>'required']);
    }

    /** @test */ 

    public function contact_form_message_field_has_minimum_charecters()
    {
        Livewire::test(ContactForm::class)
        ->set('message', 'abc')
        ->call('submitForm')
        ->assertHasErrors(['message'=>'min']);
    }
}
