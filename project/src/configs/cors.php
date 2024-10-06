<?php

/*
|--------------------------------------------------------------------------
| Cross-Origin Resource Sharing (CORS) Configuration
|--------------------------------------------------------------------------
|
| Here you may configure your settings for cross-origin resource sharing
| or "CORS". This determines what cross-origin operations may execute
| in web browsers. You are free to adjust these settings as needed.
| 
| Remove the # to enable the setting
|
| To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
|
*/

return [
	/*
	 * Specific domains that are allowed to access your resources.
	 */
	'allow_origin' => '*',

	/*
	 * The HTTP methods that are allowed for CORS requests.
	 */
	'allow_methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'],

	/*
	 * Headers that are allowed in CORS requests.
	 */
	'allow_headers' => [
		'Content-Type',
		'Access-Control-Allow-Headers',
		'Authorization',
		'X-Requested-With',
		'Origin',
		'Accept',
		'X-CSRF-Token'
	],

	/*
	 * Headers that browsers are allowed to access.
	 */
	 'expose_headers' => ['Content-Length', 'Content-Range', 'X-Custom-Header'],

	/*
	 * The maximum time (in seconds) the results of a preflight request can be cached.
	 */
	'max_age' => 3600,

	/*
	 * Indicates whether the request can include user credentials.
	 */
	'allow_credentials' => true,

	/*
	 * Another toggle for allowing credentials, ensuring clarity.
	 */
	'supports_credentials' => true
];
