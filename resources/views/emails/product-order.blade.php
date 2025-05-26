<!DOCTYPE html>
<html>

<head>
    <title>{{ $isCustomerCopy ? 'Confirmation de commande' : 'Nouvelle commande' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #f8f9fa;
            padding: 15px;
            text-align: center;
        }

        .content {
            padding: 20px;
            background-color: #fff;
        }

        .footer {
            margin-top: 20px;
            padding: 10px;
            text-align: center;
            font-size: 12px;
            color: #6c757d;
        }

        .order-details {
            margin: 20px 0;
        }

        .order-details th {
            text-align: left;
            padding-right: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>{{ $isCustomerCopy ? 'Confirmation de votre commande' : 'Nouvelle commande reçue' }}</h2>
        </div>

        <div class="content">
            @if ($isCustomerCopy)
                <p>Bonjour {{ $order['name'] }},</p>
                <p>Nous avons bien reçu votre demande de commande pour le produit
                    <strong>{{ $order['product'] }}</strong>. Voici un récapitulatif :
                </p>
            @else
                <p>Une nouvelle commande a été passée sur le site :</p>
            @endif

            <div class="order-details">
                <table>
                    <tr>
                        <th>Produit:</th>
                        <td>{{ $order['product'] }}</td>
                    </tr>
                    <tr>
                        <th>Quantité:</th>
                        <td>{{ $order['quantity'] }}</td>
                    </tr>
                    <tr>
                        <th>Date:</th>
                        <td>{{ $order['orderDate'] }}</td>
                    </tr>
                    <tr>
                        <th>Client:</th>
                        <td>{{ $order['name'] }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $order['email'] }}</td>
                    </tr>
                    <tr>
                        <th>Téléphone:</th>
                        <td>{{ $order['phone'] }}</td>
                    </tr>
                    <tr>
                        <th>Message:</th>
                        <td>{{ $order['message'] }}</td>
                    </tr>
                </table>
            </div>

            @if ($isCustomerCopy)
                <p>Nous traiterons votre demande dans les plus brefs délais et vous contacterons pour confirmer votre
                    commande.</p>
                <p>Merci pour votre confiance !</p>
            @else
                <p>Veuillez contacter le client dès que possible pour confirmer la commande.</p>
            @endif
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} {{ config('app.name') }}. Tous droits réservés.</p>
        </div>
    </div>
</body>

</html>
