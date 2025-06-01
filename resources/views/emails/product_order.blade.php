<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle commande de produit</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="padding: 20px 0;">
                <img src="{{ asset('images/logo.png') }}" alt="Logo de l'entreprise" style="max-height: 80px;">
            </td>
        </tr>
        <tr>
            <td align="center">
                <table role="presentation" cellpadding="20" cellspacing="0" width="600" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
                    <tr>
                        <td>
                            <h2 style="color: #333333;">Nouvelle commande reçue</h2>

                            <p><strong>Produit:</strong> {{ $order['product'] }}</p>
                            <p><strong>Nom:</strong> {{ $order['name'] }}</p>
                            <p><strong>Email:</strong> {{ $order['email'] }}</p>
                            <p><strong>Téléphone:</strong> {{ $order['phone'] ?? 'Non renseigné' }}</p>
                            <p><strong>Quantité:</strong> {{ $order['quantity'] }}</p>

                            @if(!empty($order['message']))
                                <p><strong>Message:</strong></p>
                                <p style="white-space: pre-wrap; background-color: #f9f9f9; padding: 10px; border-left: 4px solid #007BFF;">{{ $order['message'] }}</p>
                            @endif

                            <hr style="border: none; border-top: 1px solid #ddd; margin: 20px 0;">
                            <p style="font-size: 12px; color: #888;">🕒 Reçu le {{ now()->format('d/m/Y H:i') }}</p>
                        </td>
                    </tr>
                </table>
                <p style="font-size: 12px; color: #999; margin-top: 10px;">Cet email a été généré automatiquement depuis le formulaire de commande.</p>
            </td>
        </tr>
    </table>
</body>
</html>
