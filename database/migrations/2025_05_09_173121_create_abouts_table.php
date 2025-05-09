<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            // 1. Company Overview
            $table->string('company_name');
            $table->string('company_tagline')->nullable();
            $table->text('company_description')->nullable();
            $table->integer('founding_year')->nullable();
            $table->integer('employee_count')->nullable();
            $table->json('operational_regions')->nullable(); // ['North America', 'Europe']
            $table->string('headquarters_location')->nullable();

            // 2. Mission & Vision
            $table->text('mission_statement')->nullable();
            $table->text('vision_statement')->nullable();
            $table->json('long_term_goals')->nullable(); // ["Expand into renewable energy"]

            // 3. Core Values
            $table->json('core_values')->nullable(); // ["Safety First", "Innovation"]
            $table->json('value_descriptions')->nullable(); // {"Safety First": "We prioritize..."}

            // 4. History & Milestones
            $table->json('history_timeline')->nullable(); // [{"year": 1995, "event": "Founded"}]
            $table->json('key_achievements')->nullable(); // ["First AI implementation"]

            // 5. Key Services/Products
            $table->json('main_services')->nullable(); // ["Industrial Automation"]
            $table->json('main_products')->nullable(); // ["Hydraulic Presses"]
            $table->string('product_brochure_url')->nullable();

            // 6. Industry Expertise
            $table->json('industries_served')->nullable(); // ["Automotive", "Aerospace"]
            $table->json('specializations')->nullable(); // ["Precision Engineering"]
            $table->integer('years_in_industry')->nullable();

            // 7. Facilities & Technology
            $table->json('facilities_locations')->nullable(); // ["Texas Plant"]
            $table->json('manufacturing_capabilities')->nullable(); // ["5-Axis CNC"]
            $table->json('technology_investments')->nullable(); // ["IoT Integration"]

            // 8. Certifications & Compliance
            $table->json('certifications')->nullable(); // ["ISO 9001"]
            $table->json('regulatory_compliance')->nullable(); // ["EPA Standards"]
            $table->boolean('is_safety_certified')->default(false);

            // 9. Leadership Team
            $table->json('executive_team')->nullable(); // [{"name": "John Doe", "role": "CEO"}]
            $table->json('management_photos')->nullable(); // ["/storage/team/ceo.jpg"]

            // 10. Client/Case Studies (Optional)
            $table->json('notable_clients')->nullable(); // ["Boeing", "Tesla"]
            $table->json('case_study_urls')->nullable(); // ["/case-studies/automation"]

            // 11. Safety & Sustainability Commitments
            $table->json('safety_policies')->nullable(); // ["Zero-Incident Policy"]
            $table->json('sustainability_goals')->nullable(); // ["Carbon Neutral by 2030"]
            $table->boolean('is_eco_friendly')->default(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('abouts');
    }
};
