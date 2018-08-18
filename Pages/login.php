<?php
return function ($request, $response, $service, $app) {
	$message = '';
	if (isset($_POST['login'])) {
		$login = $_POST['login'];
		if (
			$login['email'] != '' &&
			$login['password'] != ''
		) {
			$query =$app->db()->prepare (
				'SELECT * FROM user WHERE email = :email'
			);
			$query->execute ([
				'email' => $login['email']
			]);
			$user = $query->fetch();
			if ($user) {
				if (
					password_verify(
						$login['password'],
						$user['password']
					)
				) {
					$_SESSION['user-id'] = $user['id'];
					die('Вы вошли в систему');
				} else {
					$message = 'Неверный пароль';
				}
			} else {
				$message = 'Такой e-mail не загрегистрирован!';
			}
			$service->render(
				'views/login.php',
				['login' => $login, 'message' => $message]
			);
		}
	} else {
		$login = ['email' => '', 'password' => ''];
		$service->render('views/login.php', ['login' => $login, 'message' => '']);
	}
};
