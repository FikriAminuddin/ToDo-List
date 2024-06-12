<?php

namespace App\Models; // Defines the namespace for the Task model

use Illuminate\Database\Eloquent\Factories\HasFactory; // Imports HasFactory trait
use Illuminate\Database\Eloquent\Model; // Imports Model class

class Task extends Model // Declares the Task model which extends Model
{
    use HasFactory; // Uses the HasFactory trait for factory support

    protected $fillable = ['title', 'description', 'is_completed']; // Defines fillable fields for mass assignment
}
