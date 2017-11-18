<?php
namespace Project\App\ORM\User;

use Project\App\ORM\Model\Repository;
use Project\App\ORM\User;

use PHPixie\AuthLogin\Repository as LoginUserRepository;

class UserRepository extends Repository implements LoginUserRepository
{
	/**
	 * Fields a user by his id
	 * @param $id
	 * @return \PHPixie\ORM\Models\Type\Database\Implementation\Entity
	 */
	public function getById($id)
	{
		return $this->query()
			->in($id)
			->findOne();
	}

	/**
	 * Searches for a user by something that is considered his login.
	 * @param string $login
	 * @return mixed
	 */
	public function getByLogin($login)
	{
		return $this->query()
			->where('email', $login)
			->findOne();
	}
}