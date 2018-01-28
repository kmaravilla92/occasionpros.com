<?php

namespace App\Models\Entities;

use App\Models\Entities\Traits\ModelTraits;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use ModelTraits;

    public function setSlug($slug_field = 'slug', $raw_slug = '')
    {
    	if(!isset($this->{$slug_field})) {
    		throw new Exception("{$slug_field} is not a field in this modal" . __CLASS__ );
    	}
        
    	$record_count = $this->where($slug_field, $raw_slug)->get();
    	if($record_check){
    		// slug exists
    		$increment = $record_count + 1;
    		$raw_slug = $raw_slug.' '. ($increment);
    		$this->{$slug_field} = $new_slug = str_slug($raw_slug, '-');
    	}

    	return $this;
    }
    
    public static function getHashidConnection(Model $model)
	{
		return 'main';
	}
}