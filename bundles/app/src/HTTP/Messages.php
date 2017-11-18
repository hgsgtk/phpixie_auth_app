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

		// Get all the messages
		$messages = $components->orm()->query('message')
			->orderDescendingBy('date')
			->find();

		// Render the template
		return $components->template()->get('a<pp:messages', [
			'messages' => $messages
		]);
	}
}