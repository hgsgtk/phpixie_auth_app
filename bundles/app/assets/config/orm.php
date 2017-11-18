<?php

return array(
    'models' => array(
        /*modelGeneratorPlaceholder*/
    ),
    'relationships' => [
    	[
			'type' => 'oneToMany',
			'owner' => 'user',
			'items' => 'message'
		]
	]
);