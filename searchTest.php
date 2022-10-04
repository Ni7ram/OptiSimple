<?php

	$array = array(
	    ['value' => 'Hola', 'nombre' => 'Hola', 'apellido' => 'Carlos', "url" => "#"], ['value' => 'Carlos', 'nombre' => 'Romero', 'apellido' => 'Carlos', "url" => "#"], ['value' => 'Chau', 'nombre' => 'Chaucio', 'apellido' => 'Carlos', "url" => "#"]
	);

	echo stripslashes(json_encode($array)); 

?>