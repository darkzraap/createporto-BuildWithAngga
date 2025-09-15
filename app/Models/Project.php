<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
      'id'  

    ];

        public function tools(){
        return $this->belongsToMany(tool::class, 'project_tools','project_id','tool_id')->wherePivotNull('deleted_at')->withPivot('id');
    }

      public function screenshots(){
        return $this->hasMany(ProjectScreenshots::class, 'project_id' , 'id');
      }

}