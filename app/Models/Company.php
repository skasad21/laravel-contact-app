<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // If i have custom table name
    //protected $table = "my_table";
    use HasFactory;

    //protected $guarded = [];
    protected $fillable = ['name','address','email','website'];

    public function contacts(){
        return $this->hasMany(Contact::class);
    }
}