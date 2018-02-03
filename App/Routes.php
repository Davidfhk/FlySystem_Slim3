<?php

$app->group('/flysystem', function(){

	$this->post('','FlysystemController:readWrite');
	$this->put('','FlysystemController:updateContent');
	$this->delete('','FlysystemController:deleteFileFtp');
})->add('CheckFileMw');

