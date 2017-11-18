<?php
namespace Project\App\ORM;

use Project\App\ORM\Model\Entity;
use PHPixie\AuthLogin\Repository\User as LoginUser;

class User extends Entity implements LoginUser
{
	/**
	 * Returns the user's password hash.
	 * @return string|null
	 */
	public function passwordHash()
	{
		return $this->getField('passwordHash');
	}
}