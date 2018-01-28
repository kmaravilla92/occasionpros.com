<?php

namespace App\Models\Entities;

class ProfessionalSelectedCategory extends BaseModel
{

    protected $table = 'professional_selected_categories';

    public $timestamps = false;

    protected $guarded = [];

    public function professionalInfo()
    {
    	return $this->hasOne(ProfessionalInformation::class, 'id', 'professional_information_id');
    }

    public function professionalCategory()
    {
    	return $this->hasMany(ProfessionalCategory::class, 'id', 'professional_category_id');
    }
}
