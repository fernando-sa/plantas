<?php
namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

use App\Repositories\Interfaces\UsersInterface;
use App\User;

class UsersRepository implements UsersInterface{
    
	private $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}


    public function findCarerForSize(string $size) : Collection{
        $authUser = Auth::user();

        if($size == 'big')
            return $this->getCarersQuery()->where('maxPlantSize', 'big');
        if($size != 'small')
            return $this->getCarersQuery()->whereIn('maxPlantSize', ['big', 'medium']);

        return $this->getCarersQuery()->where('city', $authUser->city)->where('id', '!=', $authUser->id)->get();
    }

    public function getCarersQuery() : Builder
    {
        return $this->model->where('isCarer', 1);
    }
}