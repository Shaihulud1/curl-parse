<?php
	function request($method, $path, $params){
		if($method == 'GET'){
			$command = '?'.http_build_query($params)
		}
		$url = 'http://my.webinar.ru/'.$path.$command;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		if($method == 'POST'){
			curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		}
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

	//создание
	$create = request("POST",'api0/Create.php', [
													'key' => 'ключ апи',
													'name' => 'Название',
													'time' => '1300116550',
													'description' => 'описание',
													'access' => 1,
												]);
	//редактирование
	$update = request("POST",'api0/Update.php', [
												'key' => 'ключ апи',
												'name' => 'Название',
												'time' => '1300116550',
												'description' => 'описание',
												'event_id' => 54, //id вебинара
												'access' => 1,
											]);
	//регистрация админа
	$reg = request("POST",'api0/Register.php', [
												'key' => 'ключ апи',
												'event_id' => 54, //id вебинара
												'username' => 'Vasya',
												'description' => 'описание',
												'role' => 'administrator',
												'email' => 'mail@gmail.com'
											]);
	//регистрация пользователя
	$reg = request("POST",'api0/Register.php', [
												'key' => 'ключ апи',
												'event_id' => 54, //id вебинара
												'username' => 'Vasya',
												'description' => 'описание',
												'role' => 'user',
												'email' => 'mail@gmail.com'
											]);        

