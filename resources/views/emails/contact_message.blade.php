<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouveau message de contact</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="padding: 20px 0;">
                <img src="{{ asset('images/logo_aladam.png') }}" alt="Logo de l'entreprise" style="max-height: 80px;">
            </td>
        </tr>
        <tr>
            <td align="center">
                <table role="presentation" cellpadding="20" cellspacing="0" width="600" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
                    <tr>
                        <td>
                            <h2 style="color: #333333;">Nouveau message de contact</h2>
                            <br />
                            <p><strong>Nom:</strong> {{ $contact['name'] }}</p>
                            <p><strong>Email:</strong> {{ $contact['email'] }}</p>
                            <p><strong>Sujet:</strong> {{ $contact['subject'] }}</p>
                            <p><strong>Message:</strong></p>
                            <p style="white-space: pre-wrap; background-color: #f9f9f9; padding: 10px; border-left: 4px solid #007BFF;">{{ $contact['message'] }}</p>
                            <hr style="border: none; border-top: 1px solid #ddd; margin: 20px 0;">
                            <p style="font-size: 12px; color: #888;">🕒 Envoyé le {{ now()->format('d/m/Y H:i') }}</p>
                        </td>
                    </tr>
                </table>
                <p style="font-size: 12px; color: #999; margin-top: 10px;">Cet email a été généré automatiquement depuis le formulaire de contact.</p>
            </td>
        </tr>
    </table>
</body>
</html>
