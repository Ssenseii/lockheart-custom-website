<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        // 1. Company Overview
        'company_name',
        'company_tagline',
        'company_description',
        'founding_year',
        'employee_count',
        'operational_regions', // JSON: ['North America', 'Europe', 'Asia']
        'headquarters_location',

        // 2. Mission & Vision
        'mission_statement',
        'vision_statement',
        'long_term_goals', // JSON: ["Expand into renewable energy", "Achieve zero waste by 2030"]

        // 3. Core Values
        'core_values', // JSON: ["Safety First", "Innovation", "Sustainability"]
        'value_descriptions', // JSON: {"Safety First": "We prioritize worker safety above all..."}

        // 4. History & Milestones
        'history_timeline', // JSON: [{"year": 1995, "event": "Founded in Detroit"}, ...]
        'key_achievements', // JSON: ["First to implement AI in manufacturing", ...]

        // 5. Key Services/Products
        'main_services', // JSON: ["Industrial Automation", "Heavy Machinery Repair"]
        'main_products', // JSON: ["Hydraulic Presses", "CNC Machines"]
        'product_brochure_url',

        // 6. Industry Expertise
        'industries_served', // JSON: ["Automotive", "Aerospace", "Oil & Gas"]
        'specializations', // JSON: ["Precision Engineering", "Large-Scale Fabrication"]
        'years_in_industry',

        // 7. Facilities & Technology
        'facilities_locations', // JSON: ["Texas Plant", "Germany HQ"]
        'manufacturing_capabilities', // JSON: ["5-Axis CNC", "Robotic Welding"]
        'technology_investments', // JSON: ["IoT Integration", "AI Quality Control"]

        // 8. Certifications & Compliance
        'certifications', // JSON: ["ISO 9001", "OSHA Compliant"]
        'regulatory_compliance', // JSON: ["EPA Standards", "EU Machinery Directive"]
        'is_safety_certified', // boolean

        // 9. Leadership Team
        'executive_team', // JSON: [{"name": "John Doe", "role": "CEO", "bio": "..."}, ...]
        'management_photos', // JSON: ["/storage/team/ceo.jpg", ...]

        // 10. Client/Case Studies (Optional)
        'notable_clients', // JSON: ["Boeing", "Tesla", "Siemens"]
        'case_study_urls', // JSON: ["/case-studies/automation-project", ...]

        // 11. Safety & Sustainability Commitments
        'safety_policies', // JSON: ["Zero-Incident Policy", "Monthly Safety Drills"]
        'sustainability_goals', // JSON: ["Carbon Neutral by 2030", "100% Recycled Materials"]
        'is_eco_friendly', // boolean
    ];

    protected $casts = [
        'operational_regions' => 'array',
        'long_term_goals' => 'array',
        'core_values' => 'array',
        'value_descriptions' => 'array',
        'history_timeline' => 'array',
        'key_achievements' => 'array',
        'main_services' => 'array',
        'main_products' => 'array',
        'industries_served' => 'array',
        'specializations' => 'array',
        'facilities_locations' => 'array',
        'manufacturing_capabilities' => 'array',
        'technology_investments' => 'array',
        'certifications' => 'array',
        'regulatory_compliance' => 'array',
        'executive_team' => 'array',
        'management_photos' => 'array',
        'notable_clients' => 'array',
        'case_study_urls' => 'array',
        'safety_policies' => 'array',
        'sustainability_goals' => 'array',
        'is_safety_certified' => 'boolean',
        'is_eco_friendly' => 'boolean',
    ];
}
