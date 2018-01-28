<?php

namespace App\Models\Entities;

class ProfessionalInformation extends BaseModel
{

    protected $guarded = [];

    protected $appends = [
        'overall_rating',
        'overall_rating_float'
    ];

    protected $hidden = ['testimonials'];

    public function owner()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function selectedCategories()
    {
    	return $this->hasMany(ProfessionalSelectedCategory::class, 'professional_information_id', 'user_id');
    }

    public function eventBids()
    {
        return $this->hasMany(ProfessionalBidEvent::class,'professional_id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'created_for', 'user_id');
    }

    public function getMediaAttribute($value)
    {
        return json_decode($value);
    }

    public function getOverallRatingAttribute()
    {
        return $this->testimonials->avg('rating');
    }

    public function getOverallRatingFloatAttribute()
    {
        $rating = $this->getOverallRatingAttribute();
        return number_format($rating,1);
    }

    public function getGeneralInfoProgressPercentageAttribute()
    {
        $infoKeys = self::getGeneralInfoKeysList();
        $total = count($infoKeys);
        $filledUpField = 0;
        foreach($infoKeys as $field => $label) {
            if(isset($this->{$field}) && !empty($this->{$field})){
                $filledUpField++;
            }
        }
        
        $progressPercentage = ($filledUpField / $total) * 100;
        return round($progressPercentage);
    }

    public static function getGeneralInfoKeysList()
    {
        return [
            'business_name' => 'What is your business name?',
            'city_based' => 'What city are you based out of?',
            'willing_distance_to_travel' => 'What distance are you willing to travel?',
            'years_of_experience' => 'How many years experience?',
            'has_liability_insurance' => 'Do you have liability insurance?',
            'separation_from_other_pros' => 'What separates you from other pros?',
            'additional_services_provided' => 'Are there any additional services you provide?',
            'reference_upon_request' => 'Can you provide references upon request?',
            'require_deposit' => 'Do you require a deposit beforehand?',
            'advance_booking_amount' => 'How far in advance should clients book your services?',
            'languages_can_speak' => 'What languages do you speak?',
            'can_provide_cultural_services' => 'Do you provide any bi-lingual or cultural services?'
        ];
    }

    public function isDJ()
    {
        return $this->selectedCategories->with('professionalCategory')->where('professionalCategory.title','DJs')->get();
    }
}
