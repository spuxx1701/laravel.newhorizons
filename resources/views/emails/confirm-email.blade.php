<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Horizons</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css' />

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        :root {
            --colorDeepSpace: #0e1015;
            --colorGreyBright: #c1c1c1;
            --colorGreyMedium: #5F5F5F;
            --colorGreyDark: #2c2c2c;
            --colorTealNeon: #00FFFF;
            --colorTealBright: #64C8C8;
            --colorTealDark: #498082;
            --colorPanelBackground: #2c2c2c;
            --colorPanelBorder: #5F5F5F;
            --brandingBarHeight: 2px;
            --headerToolbarHeight: 40px;
            --colorTextDefault: #f1f1f1;
            --colorTextHighlight: #ffffff;
            --colorTextLink: #64C8C8;
            --colorTextLinkHover: #00FFFF;
            --colorTextSubtitle: #c1c1c1;
        }

        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            font-family: Raleway;
            color: var(--colorTextDefault);
        }

        .outer {
            margin: auto;
            max-width: 800px;
            min-height: 400px;
            background-color: var(--colorDeepSpace);
        }

        .inner {
            padding: 10px;
        }

        .branding-bar {
            width: 100%;
            height: var(--brandingBarHeight);
            background-color: var(--colorTealNeon);
            position: relative;
            z-index: 3;
        }

        .header-toolbar {
            width: 100%;
            height: var(--headerToolbarHeight);
            background-color: var(--colorPanelBackground);
            border-bottom: 1px solid var(--colorPanelBorder);
            display: flex;
            position: relative;
            z-index: 4;
            align-items: center;
            justify-content: center;
        }

        .panel {
            padding: 25px;
            min-height: 50px;
            background-color: var(--colorPanelBackground);
            border: 1px solid var(--colorPanelBorder);
            border-radius: 1px;
        }

        .h-box {
            width: 100%;
            display: flex;
            flex-direction: row;
            overflow-y: hidden;
            align-items: center;
        }

        h1,
        .h1,
        h2,
        .h2,
        h3,
        .h3,
        h4,
        .h4,
        h5,
        .h5,
        h6,
        .h6 {
            margin-bottom: 0;
            margin-top: 0;
            color: var(--colorTextHighlight);
        }

        p {
            color: var(--colorTextDefault);
            margin: 5px 0 5px 0;
        }

        .highlighted {
            color: var(--colorTextHighlight);
        }

        .neon {
            color: var(--colorTealNeon);
        }


        a,
        a:link,
        a:visited {
            color: var(--colorTextLink);
            transition: 200ms;
            text-decoration: none;
        }

        a:hover,
        a:active {
            color: var(--colorTextLinkHover);
            text-decoration: none;
        }

        td {
            width: 100%;
            word-wrap: anywhere;
        }
    </style>

</head>

<body>
    <div class="outer">
        <div class="branding-bar"></div>
        <div class="header-toolbar">
            <a href="https://www.new-horizons-game.com">
                <h1 class="neon">New Horizons</h1>
            </a>
        </div>
        <div class="inner">
            <div class="panel">
                <h3>Herzlich Willkommen!</h3>
                <p>Wir freuen uns, dass Du ein Teil der Entwicklung von New Horizons sein möchtest. Wir haben Deine Registrierung erhalten. Die Kontodaten lauten folgenermaßen:</p><br>
                <table>
                    <tr>
                        <td>Benutzername:</td>
                    </tr>
                    <tr>
                        <td>
                            <h4>{{ $user->username }}</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>E-Mail:</td>
                    </tr>
                    <tr>
                        <td>
                            <h4>{{ $user->email }}</h4>
                        </td>
                    </tr>
                </table><br>
                <p>Damit Deine Registrierung abgeschlossen wird und Du Dein Konto verwenden kannst, musst Du Deine Anmeldung noch bestätigen. Klicke dazu einfach auf diesen Link:</p>
                <a href="https://www.new-horizons-game.com/verify?code={{ $verificationCode }}">https://www.new-horizons-game.com/verify?code={{ $verificationCode }}</a>
                <p>Bitte beachte, dass Du Deine Anmeldung innerhalb von 48 Stunden bestätigen musst. Geschieht das nicht, wird Dein Konto automatisch gelöscht.
                    Wenn Du die Anmeldung nicht selbst veranlasst hast oder doch kein Konto ertellen möchtest, musst Du nichts weiter tun und kannst diese E-Mail ignorieren.</p><br>
                <p>Wir freuen uns darauf, Dich bald im Sonnennsystem des 23. Jahrhunderts wiederzusehen! o7</p><br>
                <h4>Bis bald</h4>
                <h4>Spuxx aka Leo</h4>
            </div>
        </div>
    </div>
</body>

</html>