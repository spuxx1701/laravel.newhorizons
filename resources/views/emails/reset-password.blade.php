<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Horizons</title>
</head>

<body style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; color: #2c2c2c;">
    <h3>Passwort zurücksetzen</h3>
    <p>Moin! Wir haben für Deine Email-Adresse eine Anfrage zum Zurücksetzen des Passworts erhalten.</p>
    <p style="font-weight: 1000">E-Mail: {{ $passwordReset->email }}</p>
    <p>Falls Du Dein Passwort vergessen hast und ein neues vergeben möchtest, klicke einfach auf diesen Link:</p>
    <a href="{{ $frontendUrl }}/request/reset-password?code={{ $passwordResetCode }}">{{ $frontendUrl }}/request/reset-password?code={{ $passwordResetCode }}</a>
    <p>Bitte beachte, dass der Link nur 60 Minuten gültig ist. Falls Du diese Email nicht angefordert hast, musst Du nichts weiter unternehmen.</p><br>
    <p style="font-weight: 1000">Bis bald</p>
    <a href="https://www.new-horizons-game.com">Das Team von New Horizons</a>
</body>

</html>