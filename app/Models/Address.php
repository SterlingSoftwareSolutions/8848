<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'first_name',
        'last_name',
        'company',
        'address_line_1',
        'address_line_2',
        'city',
        'zip',
        'state',
        'phone',
    ];

    public function user(){
        $this->belongsTo(User::class);
    }

    public static function rules($prefix = '', $required = false){
        // Default rules
        $rules = [
            'prefix_first_name' => 'string',
            'prefix_last_name' => 'string',
            'prefix_company' => 'string',
            'prefix_address_line_1' => 'string',
            'prefix_address_line_2' => 'string',
            'prefix_city' => 'string',
            'prefix_zip' => 'string',
            'prefix_state' => 'string',
            'prefix_phone' => 'string|min:10',
        ];

        $new_rules = [];

        foreach ($rules as $key => $value) {
            $new_key = str_replace('prefix_', $prefix, $key);
            $new_rules[$new_key] = $required ? 'required|' . $value : 'nullable|' . $value;
        }

        return $new_rules;
    }

    public function validated(){
        $rules = $this->rules('', true);
        $validator =  validator($this->toArray(), $rules);

        if(!$validator->fails()){
            return $validator->validated();
        } else{
            return false;
        }
    }
}
