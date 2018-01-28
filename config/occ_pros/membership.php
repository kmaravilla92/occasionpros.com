<?php

return [
	'prices_num_rep' => [
		'monthly' => 1,
		'quarterly' => 3,
		'half_year' => 6
	],
	'frequency_interval' => [
		'monthly' => 1,
		'quarterly' => 3,
		'half_year' => 6
	],
	'packages' => [
		'free' => [
			'title' => 'Free',
			'max_bid' => 6,
			'max_bid_remaining' => 6,
			'max_categories' => 7,
			'max_categories_remaining' => 7,
			'max_travel_distance' => 100, // MILES
			'max_audio' => 3,
			'max_audio_remaining' => 3,
			'max_video' => 3,
			'max_video_remaining' => 3,
			'max_photos' => 25,
			'max_photos_remaining' => 25,
			'prices' => [
				'monthly' => [
					'amount' => 9.99
				],
				'quarterly' => [
					'amount' => 0
				],
				'half_year' => [
					'amount' => 0
				]
			]
		],
		'bronze' => [
			'title' => 'Pro Basic', // Bronze
			'max_bid' => 6,
			'max_bid_remaining' => 6,
			'max_categories' => 7,
			'max_categories_remaining' => 7,
			'max_travel_distance' => 100, // MILES
			'max_audio' => 3,
			'max_audio_remaining' => 3,
			'max_video' => 3,
			'max_video_remaining' => 3,
			'max_photos' => 25,
			'max_photos_remaining' => 25,
			'prices' => [
				'monthly' => [
					'amount' => 9.99 
				],
				'quarterly' => [
					'amount' => 55
				],
				'half_year' => [
					'amount' => 99.99
				]
			]
		],
		'silver' => [
			'title' => 'Silver',
			'max_bid' => 13,
			'max_bid_remaining' => 13,
			'max_categories' => 13,
			'max_categories_remaining' => 13,
			'max_travel_distance' => 200, // MILES
			'max_audio' => 6,
			'max_audio_remaining' => 6,
			'max_video' => 6,
			'max_video_remaining' => 6,
			'max_photos' => 40,
			'max_photos_remaining' => 40,
			'prices' => [
				'monthly' => [
					'amount' => 39.99
				],
				'quarterly' => [
					'amount' => 110
				],
				'half_year' => [
					'amount' => 199
				]
			]
		],
		'gold' => [
			'title' => 'Gold',
			'max_bid' => 20,
			'max_bid_remaining' => 20,
			'max_categories' => 20,
			'max_categories_remaining' => 20,
			'max_travel_distance' => 200, // MILES
			'max_audio' => 6,
			'max_audio_remaining' => 6,
			'max_video' => 6,
			'max_video_remaining' => 6,
			'max_photos' => 40,
			'max_photos_remaining' => 40,
			'prices' => [
				'monthly' => [
					'amount' => 59.99
				],
				'quarterly' => [
					'amount' => 165
				],
				'half_year' => [
					'amount' => 299.95
				]
			]
		]
	]
];