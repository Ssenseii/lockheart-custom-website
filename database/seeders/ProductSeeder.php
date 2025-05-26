<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $products = [
            [
                'name' => 'Caisson à 3 tiroirs - Rangement pratique et élégant',
                'slug' => 'caisson-a-3-tiroirs-rangement-pratique-et-elegant',
                'price' => 100.00,
                'category' => "Bois",
                'short_description' => 'Caisson de rangement robuste avec 3 tiroirs spacieux, parfait pour organiser vos affaires avec style.',
                'description' => '<p>Ce caisson à 3 tiroirs offre une solution de rangement optimale pour votre espace. Fabriqué avec des matériaux durables, il combine fonctionnalité et design moderne. Les tiroirs coulissent parfaitement et peuvent supporter des charges importantes. Idéal pour la chambre, le bureau ou le salon.</p>',
                'specifications' => [
                    ['key' => 'Matériau', 'value' => 'Bois massif/MDF'],
                    ['key' => 'Couleur', 'value' => 'Blanc/Noir/Naturel'],
                    ['key' => 'Dimensions', 'value' => 'L60 x P40 x H45 cm'],
                    ['key' => 'Poids max par tiroir', 'value' => '15 kg'],
                ],
                'features' => [
                    ['value' => '3 tiroirs spacieux avec poignées intégrées'],
                    ['value' => 'Montage facile avec notice incluse'],
                    ['value' => 'Finition lisse et résistante'],
                    ['value' => 'Adapté à tous les intérieurs'],
                ],
                'material' => 'Bois/MDF',
                'color' => 'Blanc/Noir/Naturel',
                'warranty' => '2 ans',
                'dimensions' => [
                    'length' => 60,
                    'width' => 40,
                    'height' => 45,
                ],
                'shipping_details' => 'Livraison en 3-5 jours ouvrés. Emballage sécurisé pour protéger votre meuble pendant le transport.',
            ],
            [
                'name' => 'Étagères en bois - Élégance naturelle pour votre décoration',
                'slug' => 'etageres-en-bois-elegance-naturelle-pour-votre-decoration',
                'price' => 100.00,
                'category' => "Bois",
                'short_description' => 'Étagères murales en bois massif pour afficher vos objets décoratifs et livres avec style.',
                'description' => '<p>Ces étagères en bois apportent une touche naturelle et chaleureuse à votre intérieur. Leur design minimaliste s\'adapte à tous les styles de décoration. Parfaites pour exposer vos livres, plantes ou objets de décoration. Installation facile avec le matériel fourni.</p>',
                'specifications' => [
                    ['key' => 'Matériau', 'value' => 'Bois massif (chêne ou pin)'],
                    ['key' => 'Couleur', 'value' => 'Naturel/Teinté'],
                    ['key' => 'Dimensions', 'value' => 'L80 x P25 x H4 cm'],
                    ['key' => 'Charge maximale', 'value' => '20 kg par étagère'],
                ],
                'features' => [
                    ['value' => 'Bois naturel avec veinures visibles'],
                    ['value' => 'Finition protectrice et résistante'],
                    ['value' => 'Design épuré et intemporel'],
                    ['value' => 'Kit de fixation inclus'],
                ],
                'material' => 'Bois massif',
                'color' => 'Naturel/Teinté',
                'warranty' => '1 an',
                'dimensions' => [
                    'length' => 80,
                    'width' => 25,
                    'height' => 4,
                ],
                'shipping_details' => 'Livraison en 2-4 jours ouvrés. Emballage renforcé pour protection optimale.',
            ],
            [
                'name' => 'Labo cuisine - Espace de travail professionnel pour passionnés de cuisine',
                'slug' => 'labo-cuisine-espace-de-travail-professionnel-pour-passionnes-de-cuisine',
                'price' => 100.00,
                'category' => "Acier",
                'short_description' => 'Table de cuisine multifonction avec rangements intégrés, idéale pour les chefs amateurs et professionnels.',
                'description' => '<p>Ce labo cuisine transforme votre espace en un véritable atelier culinaire. Avec ses plans de travail spacieux, ses rangements pratiques et ses finitions résistantes, il répondra à toutes vos exigences. Conçu pour les passionnés de cuisine qui veulent allier performance et esthétique.</p>',
                'specifications' => [
                    ['key' => 'Matériau', 'value' => 'Bois stratifié et acier inoxydable'],
                    ['key' => 'Couleur', 'value' => 'Blanc/Noir/Bois'],
                    ['key' => 'Dimensions', 'value' => 'L150 x P60 x H90 cm'],
                    ['key' => 'Composants', 'value' => 'Plan de travail, tiroirs, étagères'],
                ],
                'features' => [
                    ['value' => 'Surface résistante aux taches et à la chaleur'],
                    ['value' => 'Tiroirs coulissants à fermeture douce'],
                    ['value' => 'Espace de rangement optimisé'],
                    ['value' => 'Design ergonomique pour un confort d\'utilisation'],
                ],
                'material' => 'Bois stratifié/Acier inox',
                'color' => 'Blanc/Noir/Bois',
                'warranty' => '3 ans',
                'dimensions' => [
                    'length' => 150,
                    'width' => 60,
                    'height' => 90,
                ],
                'shipping_details' => 'Livraison en 5-7 jours ouvrés. Livraison et montage disponibles en option.',
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
