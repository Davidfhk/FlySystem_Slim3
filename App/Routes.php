<?php

$app->group('/flysystem', function(){

	$this->post('','FlysystemController:readWrite');
	$this->put('','FlysystemController:updateContent');
})->add('CheckFileMw');

