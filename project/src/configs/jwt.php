<?php

return [
	'issuer' => [getenv('APP_URL')],
	'algorithm' => 'HS256',
	'secret_key' => getenv('JWT_SECRET')
];
