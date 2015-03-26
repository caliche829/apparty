<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	|  following language lines contain  default error messages used by
	|  validator class. Some of se rules have multiple versions such
	| as  size rules. Fe free to tweak each of se messages here.
	|
	*/

	"accepted"         => "El campo ':attribute' debe ser aceptado.",
	"active_url"       => "El campo ':attribute' no es una URL valida.",
	"after"            => "El campo ':attribute' debe ser una fecha posterior a :date.",
	"alpha"            => "El campo ':attribute' solo debería contener letras.",
	"alpha_dash"       => "El campo ':attribute' solo debería contener letras, numeros, y guiones.",
	"alpha_num"        => "El campo ':attribute' solo debería contener letras y numeros,.",
	"array"            => "El campo ':attribute' debe ser un arreglo.",
	"before"           => "El campo ':attribute' debe ser una fecha anterior a :date.",
	"between"          => array(
		"numeric" => "El campo ':attribute' debe estar entre :min y :max.",
		"file"    => "El campo ':attribute' debe estar entre :min y :max kilobytes.",
		"string"  => "El campo ':attribute' debe estar entre :min y :max caracteres.",
		"array"   => "El campo ':attribute' debe tener entre :min y :max elementos.",
	),
	"confirmed"        => "El campo ':attribute' confirmación no coincide.",
	"date"             => "El campo ':attribute' no es una fecha valida.",
	"date_format"      => "El campo ':attribute' no coincide con el formato :format.",
	"different"        => "El campo ':attribute' y :or deben ser diferentes.",
	"digits"           => "El campo ':attribute' debe tener :digits digitos.",
	"digits_between"   => "El campo ':attribute' debe tener entre :min y :max digitos.",
	"email"            => "El campo ':attribute' formato es invalido.",
	"exists"           => "El campo ':attribute' es invalido.",
	"image"            => "El campo ':attribute' debe ser una imagen.",
	"in"               => "El campo ':attribute' es invalido.",
	"integer"          => "El campo ':attribute' debe ser un número entero.",
	"ip"               => "El campo ':attribute' debe ser una dirección IP valida.",
	"max"              => array(
		"numeric" => " El campo ':attribute' no debería ser mayor a :max.",
		"file"    => " El campo ':attribute' no debería pesar más de :max kilobytes.",
		"string"  => " El campo ':attribute' no debería tener más de :max caracteres.",
		"array"   => " El campo ':attribute' no debería tener más de :max elementos.",
	),
	"mimes"            => " El campo ':attribute' debe ser una archivo de tipo: :values.",
	"min"              => array(
		"numeric" => " El campo ':attribute' debe ser mínimo :min.",
		"file"    => " El campo ':attribute' debe ser de al menos :min kilobytes.",
		"string"  => " El campo ':attribute' debe tener al menos :min caracteres.",
		"array"   => " El campo ':attribute' debe tener al menos :min elementos.",
	),
	"not_in"           => "El campo ':attribute' es invalido.",
	"numeric"          => "El campo ':attribute' debe ser un número.",
	"regex"            => "El campo ':attribute' tiene un formato invalido.",
	"required"         => "El campo ':attribute' es requerido.",
	"required_if"      => "El campo ':attribute' es requerido cuando :or es :value.",
	"required_with"    => "El campo ':attribute' es requerido cuando :values está presente.",
	"required_without" => "El campo ':attribute' es requerido cuando :values no está presente.",
	"same"             => "El campo ':attribute' y :or deben coincidir.",
	"size"             => array(
		"numeric" => "El campo ':attribute' debe ser :size.",
		"file"    => "El campo ':attribute' debe pesar :size kilobytes.",
		"string"  => "El campo ':attribute' debe tener :size caracteres.",
		"array"   => "El campo ':attribute' debe contener :size elementos.",
	),
	"unique"           => "El campo ':attribute' ya existe.",
	"url"              => "El formato del campo ':attribute' es invalido.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Rules
	|--------------------------------------------------------------------------
	|
	| Custom rules created in app/validators.php
	|
	*/
	"alpha_spaces"     => "El campo :attribute debe contener letras y/o espacios.",



	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using 
	| convention "attribute.rule" to name  lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	|  following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply hps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
