<?php

namespace Project\App\HTTP;

use PHPixie\AuthLogin\Providers\Password;
use PHPixie\HTTP\Request;
use PHPixie\Validate\Form;
use Project\App\ORM\User\UserRepository;
use PHPixie\App\ORM\User;

class Auth extends Processor
{

	/**
	 * default Action
	 * @param $request
	 * @return \PHPixie\HTTP\Responses\Response|\PHPixie\Template\Container
	 */
	public function defaultAction($request)
	{
		if ($this->user()) {
			return $this->redirect('app.frontpage');
		}

		$components = $this->components();

		$template = $components->template()->get('app:login', [
			'user' => $this->user()
		]);

		$loginForm = $this->loginForm();
		$template->loginForm = $loginForm;

		if ($request->method() !== 'POST') {
			return $template;
		}

		$data = $request->data();

		$loginForm->submit($data->get());

		if ($loginForm->isValid() && $this->processLogin($loginForm)) {
			return $this->redirect('app:frontpage');
		}

		return $template;
	}


	/**
	 * Login processing
	 * @param $loginForm
	 * @return bool
	 */
	protected function processLogin($loginForm)
	{
		$user = $this->passwordProvider->login(
			$loginForm->email,
			$loginForm->password
		);

		if ($user === null) {
			$loginForm->result()->addMessageError('Invalid email or password');
			return false;
		}

		return true;
	}

	/**
	 * Logout
	 * @return \PHPixie\HTTP\Responses\Response
	 */
	public function logoutAction()
	{
		$domain = $this->components()->auth()->domain();
		$domain->forgetUser();

		return $this->redirect('app.frontpage');
	}

	/**
	 * Build login form
	 * @return Form
	 */
	protected function loginForm()
	{
		$validate = $this->components()->validate();
		$validator = $validate->validator();

		$document = $validator->rule()->addDocument();

		$document->valueField('email')
			->required('Email is required.');

		$document->valueField('password')
			->required('Password is required.');

		return $validate->form($validator);
	}

	/**
	 * password auth provider that we configured in /assets/config/auth.php
	 * @return mixed
	 */
	protected function passwordProvider()
	{
		$domain = $this->components()->auth()->domain();
		return $domain->provider('password');
	}
}