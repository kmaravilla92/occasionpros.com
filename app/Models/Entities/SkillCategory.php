<?php

namespace App\Models\Entities;

class SkillCategory extends BaseModel
{
    protected $table = 'skills_categories';

    public function subCategories()
    {
        return $this->hasMany(self::class);
    }
}
