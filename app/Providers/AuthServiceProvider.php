<?php

namespace App\Providers;

use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Personaliza el correo de verificación
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject(Lang::get('Verica tu cuenta en ' . env('APP_NAME')))
                ->greeting('Hola ' . $notifiable->name . ':')
                ->line('Para verificar su dirección de correo electrónico, haga click en el siguiente botón.')
                ->action('Verificar Email', $url)
                ->line('Si no ha solicitado esta cuenta, no es necesario realizar ninguna otra acción e ignore este mensaje.')
                ->salutation(new HtmlString('Saludos.<br>El equipo de ' . '<strong>' . env('APP_NAME') . '</strong>'));
        });
    }
}
