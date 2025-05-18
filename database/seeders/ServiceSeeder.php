<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Aménagement professionnel',
                'slug' => 'amenagement-professionnel',
                'category' => 'Amenagement',
                'short_description' => 'Spécialiste en aménagement des espaces de travail au Maroc',
                'description' => 'Aladam Group est spécialiste en aménagement des espaces de travails au Maroc. Nous proposons des services d\'agencement de vos bureaux et magasins selon des conceptions sur mesure adaptées à vos besoins. Notre objectif est de vous livrer des lieux ergonomiques professionnels qui vous fourniront un maximum d\'effort pour une meilleure productivité.',
                'features' => [
                    'Conception sur mesure',
                    'Optimisation de l\'espace',
                    'Solutions ergonomiques',
                    'Matériaux de qualité',
                    'Respect des délais',
                    'Équipe professionnelle'
                ],
                'workflow_steps' => [
                    '1. Consultation initiale',
                    '2. Évaluation des besoins',
                    '3. Proposition de conception',
                    '4. Validation du client',
                    '5. Réalisation des travaux',
                    '6. x'
                ],
                'price' => null,
                'discount_price' => null,
                'pricing_note' => 'Devis personnalisé disponible sur demande',
                'image_url' => 'services/amenagement-pro.jpg',
                'gallery' => [
                    'services/gallery/amenagement-pro-1.jpg',
                    'services/gallery/amenagement-pro-2.jpg',
                    'services/gallery/amenagement-pro-3.jpg'
                ],
                'video_url' => null,
                'testimonials' => [
                    [
                        'name' => 'Karim B.',
                        'company' => 'Société XYZ',
                        'content' => 'Excellent travail sur nos bureaux, espace parfaitement optimisé.'
                    ]
                ],
                'case_studies' => [
                    [
                        'title' => 'Bureaux modernes à Casablanca',
                        'description' => 'Transformation complète d\'un espace ouvert en bureaux fonctionnels'
                    ]
                ],
                'faqs' => [
                    [
                        'question' => 'Quel est le délai moyen pour un projet?',
                        'answer' => 'Variable selon la taille, généralement 2-6 semaines'
                    ]
                ],
                'cta_text' => 'Besoin d\'un espace de travail optimisé?',
                'cta_button_label' => 'Demander un devis',
                'cta_button_url' => '/contact',
                'trust_badges' => [
                    'badges/certified.png',
                    'badges/quality.png'
                ],
                'tags' => ['bureau', 'amenagement', 'professionnel', 'casablanca'],
                'seo_title' => 'Aménagement professionnel au Maroc | Aladam Group',
                'seo_description' => 'Expert en aménagement d\'espaces professionnels sur mesure à Casablanca. Conceptions ergonomiques pour bureaux et commerces.',
                'seo_keywords' => ['amenagement bureau', 'espace professionnel', 'agencement entreprise', 'maroc'],
                'meta' => [
                    'og:image' => 'services/amenagement-pro-og.jpg',
                    'twitter:card' => 'summary_large_image'
                ]
            ],
            [
                'title' => 'Aménagement particulier',
                'slug' => 'amenagement-particulier',
                'category' => 'Amenagement',
                'short_description' => 'Aménagement d\'intérieur pour votre appartement, villa ou maison',
                'description' => 'Aladam Group réalise tous vos aménagements d\'intérieur pour votre appartement, villa ou votre maison au Maroc. Nous vous proposons l\'agencement de vos logements privés pour plus de confort pour vous et votre famille. Nous vous offrons des conceptions uniques et sur mesure, capables d\'optimiser votre espace et de le rendre plus fonctionnel et attractif.',
                'features' => [
                    'Solutions personnalisées',
                    'Optimisation de l\'espace',
                    'Grand choix de matériaux',
                    'Suivi de projet détaillé',
                    'Respect du budget',
                    'Conseils d\'experts'
                ],
                'workflow_steps' => [
                    '1. Visite du lieu',
                    '2. Écoute de vos besoins',
                    '3. Proposition de design',
                    '4. Sélection des matériaux',
                    '5. Réalisation des travaux',
                    '6. Finitions et livraison'
                ],
                'price' => null,
                'discount_price' => null,
                'pricing_note' => 'Forfaits disponibles selon la surface',
                'image_url' => 'services/amenagement-part.jpg',
                'gallery' => [
                    'services/gallery/amenagement-part-1.jpg',
                    'services/gallery/amenagement-part-2.jpg'
                ],
                'video_url' => null,
                'testimonials' => [
                    [
                        'name' => 'Leila M.',
                        'content' => 'Notre appartement transformé avec goût et professionnalisme.'
                    ]
                ],
                'case_studies' => [],
                'faqs' => [
                    [
                        'question' => 'Pouvez-vous travailler avec mes meubles existants?',
                        'answer' => 'Oui, nous intégrons vos éléments existants dans le nouveau design'
                    ]
                ],
                'cta_text' => 'Prêt à transformer votre intérieur?',
                'cta_button_label' => 'Contactez-nous',
                'cta_button_url' => '/contact',
                'trust_badges' => [
                    'badges/certified.png',
                    'badges/eco-friendly.png'
                ],
                'tags' => ['maison', 'appartement', 'villa', 'interieur'],
                'seo_title' => 'Aménagement intérieur résidentiel | Aladam Group',
                'seo_description' => 'Spécialiste en aménagement d\'intérieur pour particuliers au Maroc. Conceptions sur mesure pour appartements et villas.',
                'seo_keywords' => ['amenagement maison', 'interieur maroc', 'design appartement'],
                'meta' => [
                    'og:image' => 'services/amenagement-part-og.jpg'
                ]
                ],
            [
                'title' => 'Cloison',
                'slug' => 'cloison',
                'category' => 'Amenagement',
                'short_description' => 'Solutions de cloisonnement pour espaces professionnels et particuliers',
                'description' => 'Savoir poser une cloison est indispensable en matière de travaux intérieurs. Nous proposons plusieurs types de solutions: Cloison BA13 : Une cloison en Placoplatre. Très pratique, facile à poser et peu coûteux, ce modèle de cloison reste le plus répandu en matière de cloison intérieure. Cloison Vitrée : Une cloison en verre a le grand avantage de cloisonner un espace sans pour autant capturer la lumière. Cloison Grillagée : Les cloisons modulaires grillagées ne réduisent pas l\'éclairage, ainsi la circulation et la protection sont parfaitement assurées.',
                'features' => [
                    'Cloison BA13 (standard, hydrofuge, ignifuge)',
                    'Cloison vitrée sur mesure',
                    'Cloison modulaire grillagée',
                    'Installation rapide et propre',
                    'Solutions acoustiques'
                ],
                'workflow_steps' => [
                    '1. Analyse des besoins',
                    '2. Choix du type de cloison',
                    '3. Prise de mesures',
                    '4. Fabrication sur mesure',
                    '5. Installation professionnelle',
                    '6. Finitions'
                ],
                'price' => 350,
                'discount_price' => 300,
                'pricing_note' => 'Prix au m², hors options particulières',
                'image_url' => 'services/cloison.jpg',
                'gallery' => [
                    'services/gallery/cloison-1.jpg',
                    'services/gallery/cloison-2.jpg',
                    'services/gallery/cloison-3.jpg'
                ],
                'video_url' => 'https://youtube.com/embed/exemplecloison',
                'testimonials' => [],
                'case_studies' => [],
                'faqs' => [
                    [
                        'question' => 'Quelle cloison pour une salle de bain?',
                        'answer' => 'Nous recommandons le BA13 hydrofuge pour les pièces humides'
                    ]
                ],
                'cta_text' => 'Besoin de diviser un espace?',
                'cta_button_label' => 'Demander conseil',
                'cta_button_url' => '/contact',
                'trust_badges' => ['badges/quality.png'],
                'tags' => ['cloison', 'separation', 'placo', 'verre'],
                'seo_title' => 'Installation de cloisons au Maroc | Aladam Group',
                'seo_description' => 'Expert en pose de cloisons BA13, vitrées et modulaires pour professionnels et particuliers. Solutions sur mesure.',
                'seo_keywords' => ['cloison maroc', 'pose placo', 'cloison vitrée casablanca'],
                'meta' => []
            ],
            [
                'title' => 'Faux Plafond',
                'slug' => 'faux-plafond',
                'category' => 'Amenagement',
                'short_description' => 'Solutions de plafonds suspendus esthétiques et fonctionnels',
                'description' => 'En architecture, un plafond suspendu, généralement appelé à raison faux plafond, est un plafond situé sous le plafond principal. Il est généralement constitué de matériaux légers comme des plaques de plâtre fixés sur une structure métallique. Le plafond suspendu a un rôle qui peut être esthétique : masquer les imperfections et irrégularités d\'un plafond, cacher une poutraison ou des équipements.',
                'features' => [
                    'Plaques de plâtre standards ou techniques',
                    'Structure métallique robuste',
                    'Cache les imperfections',
                    'Dissimule les gaines techniques',
                    'Améliore l\'acoustique',
                    'Éclairage intégré possible'
                ],
                'workflow_steps' => [
                    '1. Diagnostic du plafond existant',
                    '2. Choix des matériaux',
                    '3. Installation de la structure',
                    '4. Pose des plaques',
                    '5. Finitions et peinture'
                ],
                'price' => 400,
                'discount_price' => 350,
                'pricing_note' => 'Prix au m² pour hauteur standard',
                'image_url' => 'services/faux-plafond.jpg',
                'gallery' => [
                    'services/gallery/faux-plafond-1.jpg',
                    'services/gallery/faux-plafond-2.jpg'
                ],
                'video_url' => null,
                'testimonials' => [],
                'case_studies' => [],
                'faqs' => [
                    [
                        'question' => 'Peut-on installer des spots dans un faux plafond?',
                        'answer' => 'Oui, nous intégrons tous types d\'éclairage'
                    ]
                ],
                'cta_text' => 'Un plafond moderne pour votre espace?',
                'cta_button_label' => 'Devis gratuit',
                'cta_button_url' => '/contact',
                'trust_badges' => ['badges/certified.png'],
                'tags' => ['plafond', 'suspendu', 'placo', 'amenagement'],
                'seo_title' => 'Installation de faux plafonds à Casablanca | Aladam',
                'seo_description' => 'Pose professionnelle de plafonds suspendus en plaques de plâtre. Solutions pour cacher les imperfections et gaines techniques.',
                'seo_keywords' => ['faux plafond', 'plafond suspendu', 'placo plafond'],
                'meta' => []
            ],
            [
                'title' => 'Revêtement Mural & Sol',
                'slug' => 'revetement-mural-sol',
                'category' => 'Finition',
                'short_description' => 'Solutions complètes pour vos murs et sols',
                'description' => 'Pour les murs : Nos peintres réalisent de la peinture en intérieur et en extérieur. Ils effectuent grâce à leur savoir-faire des peintures décoratives. Nous posons également du papier peint, de la toile de verre et tout type de revêtement mural. Pour les sols : Un revêtement de sol est un matériau de construction, naturel ou manufacturé, qui couvre le sol. Comme tout autre revêtement, il sert de protection ou de décoration mais il est spécifiquement adapté pour résister aux passages. Nous travaillons avec différentes matières : terre, végétal, bois, céramique, textile, PVC ou résine synthétique.',
                'features' => [
                    'Peinture intérieure/extérieure',
                    'Pose de papier peint et toile de verre',
                    'Revêtements sols divers',
                    'Conseils en choix de matériaux',
                    'Préparation des supports',
                    'Finitions impeccables'
                ],
                'workflow_steps' => [
                    '1. État des lieux des supports',
                    '2. Choix des matériaux',
                    '3. Préparation des surfaces',
                    '4. Application des revêtements',
                    '5. Finitions et nettoyage'
                ],
                'price' => null,
                'discount_price' => null,
                'pricing_note' => 'Tarifs variables selon les matériaux choisis',
                'image_url' => 'services/revetement.jpg',
                'gallery' => [
                    'services/gallery/revetement-1.jpg',
                    'services/gallery/revetement-2.jpg',
                    'services/gallery/revetement-3.jpg'
                ],
                'video_url' => null,
                'testimonials' => [],
                'case_studies' => [],
                'faqs' => [
                    [
                        'question' => 'Quel revêtement pour une pièce humide?',
                        'answer' => 'Nous recommandons des peintures spéciales ou des revêtements vinyliques'
                    ]
                ],
                'cta_text' => 'Des murs et sols comme neufs?',
                'cta_button_label' => 'Estimer mon projet',
                'cta_button_url' => '/contact',
                'trust_badges' => ['badges/quality.png', 'badges/eco-friendly.png'],
                'tags' => ['peinture', 'sol', 'mur', 'papier peint'],
                'seo_title' => 'Revêtements muraux et de sols | Aladam Group',
                'seo_description' => 'Expert en pose de revêtements muraux (peinture, papier peint) et de sols (bois, carrelage, PVC) à Casablanca.',
                'seo_keywords' => ['peinture maroc', 'revetement sol', 'papier peint casablanca'],
                'meta' => []
            ],
            [
                'title' => 'Climatisation',
                'slug' => 'climatisation',
                'category' => 'Installation',
                'short_description' => 'Solutions de climatisation pour tous vos espaces',
                'description' => 'La climatisation est la technique qui consiste à modifier, contrôler et réguler les conditions climatiques (température, humidité, niveau de poussières, etc.) d\'un local pour des raisons de confort (automobile, bureaux, maisons individuelles) ou pour des raisons techniques (laboratoires médicaux, locaux de fabrication de composants électroniques, salles informatiques, etc.). Aladam Group vous offre une prestation globale, de la conception et l\'installation à la maintenance de tous systèmes de climatisation.',
                'features' => [
                    'Installation de systèmes split/multi-split',
                    'Climatisation centrale',
                    'Contrôle de température et humidité',
                    'Solutions économes en énergie',
                    'Maintenance préventive',
                    'Maintenance préventive'
                ],
                'workflow_steps' => [
                    '1. Étude des besoins',
                    '2. Proposition technique',
                    '3. Installation professionnelle',
                    '4. Mise en service',
                    '5. Formation utilisateur',
                    '6. Contrat de maintenance'
                ],
                'price' => null,
                'discount_price' => null,
                'pricing_note' => 'Tarifs selon puissance et technologie',
                'image_url' => 'services/climatisation.jpg',
                'gallery' => [
                    'services/gallery/climatisation-1.jpg',
                    'services/gallery/climatisation-2.jpg'
                ],
                'video_url' => null,
                'testimonials' => [
                    [
                        'name' => 'Youssef K.',
                        'content' => 'Installation rapide et système très silencieux, très satisfait.'
                    ]
                ],
                'case_studies' => [],
                'faqs' => [
                    [
                        'question' => 'Quelle puissance pour une pièce de 20m²?',
                        'answer' => 'Environ 7000 BTU, mais cela dépend de l\'orientation et de l\'isolation'
                    ]
                ],
                'cta_text' => 'Besoin d\'un confort thermique optimal?',
                'cta_button_label' => 'Demander un devis',
                'cta_button_url' => '/contact',
                'trust_badges' => ['badges/certified.png', 'badges/technician.png'],
                'tags' => ['climatisation', 'ventilation', 'confort', 'temperature'],
                'seo_title' => 'Installation climatisation Casablanca | Aladam',
                'seo_description' => 'Expert en installation et maintenance de systèmes de climatisation pour particuliers et professionnels au Maroc.',
                'seo_keywords' => ['climatisation maroc', 'installation clim', 'entretien climatiseur'],
                'meta' => []
            ],
            [
                'title' => 'Électricité',
                'slug' => 'electricite',
                'category' => 'Installation',
                'short_description' => 'Installation et rénovation électrique conforme aux normes',
                'description' => 'Aladam Group réalise tous vos travaux d\'électricité en courant fort et faible, en extérieur comme en intérieur. Nos équipes d\'électricien installent des tableaux électriques, câblage, interrupteurs, prises, luminaires, disjoncteurs, climatiseurs, radiateurs, etc. Ils travaillent essentiellement sur des chantiers de rénovation électrique conformément aux normes de sécurité.',
                'features' => [
                    'Installation électrique neuve',
                    'Rénovation complète',
                    'Mise aux normes',
                    'Courant fort et faible',
                    'Tableaux électriques',
                    'Dépannage urgent'
                ],
                'workflow_steps' => [
                    '1. Diagnostic électrique',
                    '2. Proposition conforme aux normes',
                    '3. Installation sécurisée',
                    '4. Tests et vérifications',
                    '5. Mise en service',
                    '6. Attestation de conformité'
                ],
                'price' => null,
                'discount_price' => null,
                'pricing_note' => 'Tarification selon la complexité de l\'installation',
                'image_url' => 'services/electricite.jpg',
                'gallery' => [
                    'services/gallery/electricite-1.jpg',
                    'services/gallery/electricite-2.jpg'
                ],
                'video_url' => null,
                'testimonials' => [],
                'case_studies' => [],
                'faqs' => [
                    [
                        'question' => 'Quelles sont les normes électriques au Maroc?',
                        'answer' => 'Nous travaillons selon la norme NM IEC 60364 et ses amendements'
                    ]
                ],
                'cta_text' => 'Projet électrique à réaliser?',
                'cta_button_label' => 'Contactez notre électricien',
                'cta_button_url' => '/contact',
                'trust_badges' => ['badges/certified.png', 'badges/safety.png'],
                'tags' => ['electricite', 'installation', 'securite', 'normes'],
                'seo_title' => 'Électricien professionnel à Casablanca | Aladam',
                'seo_description' => 'Installation et rénovation électrique conforme aux normes marocaines. Courant fort et faible pour particuliers et professionnels.',
                'seo_keywords' => ['electricien casablanca', 'installation electrique', 'normes electricité maroc'],
                'meta' => []
            ],
            [
                'title' => 'Plomberie',
                'slug' => 'plomberie',
                'category' => 'Installation',
                'short_description' => 'Services complets de plomberie pour particuliers et professionnels',
                'description' => 'Aladam Group a des qualifiés en plomberie et pouvons intervenir pour de nombreux travaux. Que ce soit dans l\'urgence ou pour des travaux précis dont vous avez besoin, on est disponible pour vous délivrer de nombreux services. Nos plombiers peuvent se charger de la réalisation complète de votre plomberie.',
                'features' => [
                    'Installation sanitaire complète',
                    'Dépannage urgent',
                    'Dépannage urgent',
                    'Chauffage central',
                    'Détection de fuites',
                    'Maintenance préventive'
                ],
                'workflow_steps' => [
                    '1. Diagnostic des besoins',
                    '2. Proposition technique',
                    '3. Choix des matériaux',
                    '4. Installation professionnelle',
                    '5. Tests d\'étanchéité',
                    '6. Nettoyage final'
                ],
                'price' => null,
                'discount_price' => null,
                'pricing_note' => 'Forfait dépannage disponible',
                'image_url' => 'services/plomberie.jpg',
                'gallery' => [
                    'services/gallery/plomberie-1.jpg',
                    'services/gallery/plomberie-2.jpg'
                ],
                'video_url' => null,
                'testimonials' => [
                    [
                        'name' => 'Samira E.',
                        'content' => 'Intervention rapide pour une fuite le week-end, très professionnel.'
                    ]
                ],
                'case_studies' => [],
                'faqs' => [
                    [
                        'question' => 'Disponibles pour les urgences?',
                        'answer' => 'Oui, service d\'urgence 24/7 pour les problèmes critiques'
                    ]
                ],
                'cta_text' => 'Problème de plomberie?',
                'cta_button_label' => 'Appelez-nous',
                'cta_button_url' => '/contact',
                'trust_badges' => ['badges/technician.png', 'badges/emergency.png'],
                'tags' => ['plomberie', 'sanitaire', 'fuite', 'depannage'],
                'seo_title' => 'Plombier professionnel Casablanca | Services 24/7',
                'seo_description' => 'Installation et dépannage plomberie pour particuliers et entreprises. Interventions rapides sur Casablanca et région.',
                'seo_keywords' => ['plombier casablanca', 'depannage plomberie', 'reparation fuite'],
                'meta' => []
            ],
            [
                'title' => 'Menuiserie',
                'slug' => 'menuiserie',
                'category' => 'Fabrication',
                'short_description' => 'Menuiserie intérieure et extérieure sur mesure',
                'description' => 'Aladam Group réalise vos travaux de menuiserie intérieure et extérieure en neuf ou en rénovation; Nous fournissons et installons : Fenêtres, porte fenêtre, Velux - Porte d\'entrée, porte intérieure - Volet roulant, volet battant - Porte de garage (sectionnelle, coulissante, basculante, ...) - Vernissage - etc.',
                'features' => [
                    'Fenêtres et portes-fenêtres',
                    'Portes d\'entrée et intérieures',
                    'Volets roulants et battants',
                    'Portes de garage',
                    'Vernissage et traitement',
                    'Sur mesure et standard'
                ],
                'workflow_steps' => [
                    '1. Prise de mesures',
                    '2. Choix des matériaux (bois, PVC, alu)',
                    '3. Fabrication sur mesure',
                    '4. Installation professionnelle',
                    '5. Ajustements et finitions',
                    '6. Conseils d\'entretien'
                ],
                'price' => null,
                'discount_price' => null,
                'pricing_note' => 'Devis selon les matériaux et dimensions',
                'image_url' => 'services/menuiserie.jpg',
                'gallery' => [
                    'services/gallery/menuiserie-1.jpg',
                    'services/gallery/menuiserie-2.jpg',
                    'services/gallery/menuiserie-3.jpg'
                ],
                'video_url' => null,
                'testimonials' => [],
                'case_studies' => [],
                'faqs' => [
                    [
                        'question' => 'Quel matériau pour une porte d\'entrée?',
                        'answer' => 'Le bois pour l\'esthétique, l\'alu pour la sécurité, ou le PVC pour l\'entretien facile'
                    ]
                ],
                'cta_text' => 'Besoin de menuiserie sur mesure?',
                'cta_button_label' => 'Estimer mon projet',
                'cta_button_url' => '/contact',
                'trust_badges' => ['badges/quality.png', 'badges/craftsman.png'],
                'tags' => ['menuiserie', 'fenetre', 'porte', 'bois', 'alu'],
                'seo_title' => 'Menuiserie sur mesure à Casablanca | Aladam',
                'seo_description' => 'Fabrication et installation de menuiserie intérieure/extérieure en bois, PVC et aluminium. Fenêtres, portes et volets sur mesure.',
                'seo_keywords' => ['menuiserie maroc', 'fenetre sur mesure', 'porte casablanca'],
                'meta' => []
            ],
            [
                'title' => 'Multiservices',
                'slug' => 'multiservices',
                'category' => 'Divers',
                'short_description' => 'Solutions complètes pour vos besoins techniques et décoratifs',
                'description' => 'Aladam Group vous propose: Réalisation de tous travaux de système audiovisuel et sonorisation ; informatique et téléphonique. Installation de système de détection incendie et vidéo de surveillance. Décoration des espaces et locaux. N\'hésitez pas à nous contacter pour nous faire part de vos besoins, nous serons ravis de pouvoir répondre à toutes vos questions.',
                'features' => [
                    'Systèmes audiovisuels et sonorisation',
                    'Réseaux informatiques et téléphoniques',
                    'Détection incendie',
                    'Vidéosurveillance',
                    'Décoration intérieure',
                    'Solutions sur mesure'
                ],
                'workflow_steps' => [
                    '1. Identification des besoins',
                    '2. Étude technique',
                    '3. Proposition de solution',
                    '4. Installation par nos techniciens',
                    '5. Formation utilisateur',
                    '6. Support après-vente'
                ],
                'price' => null,
                'discount_price' => null,
                'pricing_note' => 'Tarification selon la nature et l\'ampleur du projet',
                'image_url' => 'services/multiservices.jpg',
                'gallery' => [
                    'services/gallery/multiservices-1.jpg',
                    'services/gallery/multiservices-2.jpg'
                ],
                'video_url' => null,
                'testimonials' => [],
                'case_studies' => [],
                'faqs' => [
                    [
                        'question' => 'Pouvez-vous gérer un projet complet?',
                        'answer' => 'Oui, nous coordonnons tous les corps de métier pour les projets multiservices'
                    ]
                ],
                'cta_text' => 'Un projet complexe à réaliser?',
                'cta_button_label' => 'Parlez-nous de votre projet',
                'cta_button_url' => '/contact',
                'trust_badges' => ['badges/certified.png', 'badges/technician.png', 'badges/quality.png'],
                'tags' => ['multiservices', 'securite', 'informatique', 'decoration'],
                'seo_title' => 'Services techniques et décoratifs | Aladam Group',
                'seo_description' => 'Solutions complètes pour vos projets techniques (audiovisuel, sécurité) et décoratifs à Casablanca. Une seule équipe pour tous vos besoins.',
                'seo_keywords' => ['multiservices casablanca', 'installation securite', 'sonorisation maroc'],
                'meta' => []
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
