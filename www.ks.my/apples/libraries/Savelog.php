<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SaveLog{
/**
* Запись логов
* 
* @param string $file Имя файла
* @param string|array $log Сам лог
* @param boolean $array Массив?
*/
	static function add($file, $log, $array = null)
	{
		$path = $_SERVER['DOCUMENT_ROOT'] . $file;
		$fd = fopen($path, "a");

		if (!$array)
		{
			if ($fd)
			{
				$str = "[" . date("Y-m-d H:i:s", time()) . "]" . $log;
				fwrite($fd, $str . "\n");
				fclose($fd);
			}
		}
		else
		{
			if ($fd)
			{
				fwrite($fd, "[" . date("Y-m-d H:i:s", time()) . "]\n");
				ob_start();
				print_r($log);
				$var = ob_get_contents();
				ob_end_clean();
				fputs($fd, $var . "\n\n");
				fclose($fd);
			} 
		}
	}
}