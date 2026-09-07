<?php

return [

	'user_class' => 'App\Models\User',

	'excel_view' => 'consultant-manager::excel.',

	'notification_via' => ['mail', 'database'],

	'export_disk' => 's3',

	'permissions' => [
		'consultant-except-abilities' => [],
		'consultee-except-abilities' => [],
		'consultant-availability-except-abilities' => [],
		'consultant-team-member-except-abilities' => [],
		'consultant-record-template-except-abilities' => [],
		'consultation-service-except-abilities' => [],
		'consultation-price-except-abilities' => [],
		'consultation-intake-form-except-abilities' => [],
		'consultation-session-except-abilities' => [],
		'consultation-sessionservice-except-abilities' => [],
		'consultation-payment-except-abilities' => [],
		'consultation-evaluation-except-abilities' => [],
		'consultee-record-except-abilities' => [],
		'consultee-record-category-except-abilities' => [],
		'consultee-record-item-except-abilities' => [],
		'consultee-record-response-except-abilities' => [],
		'consultation-chat-except-abilities' => [],
		'consultation-chat-message-except-abilities' => [],
		'consultation-appointment-except-abilities' => [],
		'consultation-appointmentattendee-except-abilities' => [],
		'consultation-advice-except-abilities' => [],
		'consultation-post-except-abilities' => [],
		'consultation-post-attachment-except-abilities' => [],
	],

	'search-options' => [
		'filtersPath' => 'vendor' . DIRECTORY_SEPARATOR . 'innoboxrr' . DIRECTORY_SEPARATOR . 'consultant-manager' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Filters',
		'filtersNamespace' => 'Innoboxrr\ConsultantManager\Models\Filters',
	],
	
];