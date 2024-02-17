<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'college_department',
        'research_group',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function isDirector()
    {
        return $this->role === 1;
    }

    public function isResearcher()
    {
        return $this->role === 3;
    }

    public function isReviewer()
    {
        return $this->role === 4;
    }
    
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_reviewers', 'reviewer_id', 'project_id');
    }

    public function aprojects()
    {
        return $this->hasMany(ProjectsModel::class);
    }

    public function reviewedProjects()
    {
        return $this->belongsToMany(ProjectsModel::class, 'project_reviewer', 'user_id', 'project_id')
                    ->wherePivot('role', 4)
                    ->withPivot('role');
    }

    public function reviewDecisions()
    {
        return $this->hasMany(ReviewDecisionModel::class);
    }

    public function reviews()
    {
        return $this->hasMany(ReviewModel::class);
    }

    public function submittedProjects()
    {
        return $this->hasMany(ProjectsModel::class, 'user_id');
    }

    public function accessRequest()
    {
        return $this->hasMany(AccessRequest::class);
    }
    
    // public function projects()
    // {
    //     return $this->belongsToMany(Project::class, 'user_id');
    // }

}
