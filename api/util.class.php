<?php
	function throwError($message){
		die("{'status': 0, 'message': '{$message}'}");
	}
	
	function jsonToSql($arr){
			$keys = '';
			$values = '';
			foreach(array_keys($arr) as $key){
				$keys .= '`'.$key.'`,';
				if(gettype($arr[$key]) == "string"){
					$values .= '"'.$arr[$key].'",';
				}
				else
					$values .= $arr[$key].',';
			}
			$keys = substr($keys, 0, -1);
			$values = substr($values, 0, -1);
			return array(
				"keys" => $keys,
				"values" => $values
			);
	}
?>