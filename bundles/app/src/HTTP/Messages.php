<?php

namespace Project\App\HTTP;

use PHPixie\HTTP\Request;

/**
 * Lists the messages
 */
class Messages extends Processor
{
	/**
	 * @param Request $request HTTP request
	 * @return mixed
	 */
	public function defaultAction($request)
	{
		$components = $this->components();

		// create an ORM query for messages
		$messageQuery = $components->orm()->query('message')
			->orderDescendingBy('date');

		$pager = $components->paginateOrm()
			->queryPager($messageQuery, 10, ['user']);

		$page = $request->attributes()->get('page', 1);
		$pager->setCurrentPage($page);

		return $components->template()->get('app:messages', [
			'pager' => $pager
		]);
	}
}