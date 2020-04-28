<?php
namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface UsersInterface{
    
    public function findCarerForSize(string $size) : Collection;
    public function getCarersQuery() : Builder;
}