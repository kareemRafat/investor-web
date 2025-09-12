<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Idea
    |--------------------------------------------------------------------------
    */

    'common' => [
        'yes' => 'Yes',
        'no' => 'No',
        'number' => 'Number',
        'enter_number' => 'Enter number',
        'large' => 'Large',
        'small' => 'Small',
        'open_spaces' => 'Open spaces',
        'factory' => 'Factory',
        'land_space' => 'Land space',
        'industrial' => 'Industrial',
        'electronic' => 'Electronic',
        'other' => 'Other',
        'static' => 'Static',
        'dynamic' => 'Dynamic',
    ],
    'steps' => [
        'step1' => [
            'subtitle' => "The fields in which you would like to invest or participate",
            'options' => [
                'health'      => 'Health and beauty',
                'food'        => 'Restaurants and food',
                'industry'    => 'Industry',
                'marketing'   => 'Marketing and advertising',
                'public'      => 'Public services',
                'designs'     => 'Architectural and artistic designs',
                'agriculture' => 'Agriculture',
                'websites'    => 'Websites',
                'technology'  => 'Communications and technology',
                'tourism'     => 'Travel and Tourism',
                'mining'      => 'Mining',
                'media'       => 'Media and publishing',
                'games'       => 'Electronic Games',
                'banking'     => 'Financial and banking services',
                'other'       => 'Other',
                'retail'      => 'General trade and retail',
                'government'  => 'Government sector services',
                'transport'   => 'Storage and transportation',
                'vehicles'    => 'Vehicles and engines',
                'software'    => 'Software and applications',
                'entertainment' => 'Entertainment and leisure',
                'contracting'   => 'Contracting',
                'systems'       => 'Transportation systems',
                'education'     => 'Science and education',
                'realestate'    => 'Real estate and urban development',
                'environment'   => 'Environmental protection and sustainability',
            ],
        ],
        'step2' => [
            'subtitle' => 'The best countries /regions to implement the idea in (3 countries at most)',
            'options' => [
                'Lebanon',
                'Tunisia',
                'Algeria',
                'Jordan',
                'Saudi Arabia',
                'Qatar',
                'Oman',
                'Morocco',
                'Libya',
                'Sudan',
                'Palestine',
                'Iraq',
                'Iran',
                'Turkey',
                'North Africa',
                'Levant',
                'Gulf countries',
                'United Arab Emirates',
                'Kuwait',
                'Bahrain',
                'Egypt',
                'America and Australia continent',
                'Central and Southern Africa',
                'European Union',
                'China',
                'India and Pakistan',
                'Middle East and North Africa',
                'Middle East',
                'Yemen',
            ],
        ],
        'step3' => [
            'subtitle' => 'The estimated cost of implementing the idea',

            'types' => [
                'one_time' => 'One-time Costs',
                'annual'   => 'Annual Costs',
            ],

            'one_time_ranges' => [
                1 => '$1,000 to $5,000<br>(3,700 to 18,500 SAR)',
                2 => '$6,000 to $10,000<br>(22,200 to 37,000 SAR)',
                3 => '$51,000 to $100,000<br>(188,800 to 370,000 SAR)',
                4 => '$101,000 to $250,000<br>(374,000 to 925,750 SAR)',
                5 => '$1 million to $2 million<br>(3.7m to 7.4m SAR)',
                6 => '$2 million to $5 million<br>(7.4m to 18.5m SAR)',
                7 => '$50 million to $100 million<br>(185m to 370m SAR)',
            ],

            'annual_ranges' => [
                1 => '$11,000 to $20,000<br>(40,700 to 74,000 SAR)',
                2 => '$21,000 to $50,000<br>(77,700 to 185,000 SAR)',
                3 => '$251,000 to $500,000<br>(929,450 to 1,851,500 SAR)',
                4 => '$501,000 to $1,000,000<br>(1,855,000 to 3,700,000 SAR)',
                5 => '$5 million to $10 million<br>(18.5m to 37m SAR)',
                6 => '$10 million to $50 million<br>(37m to 185m SAR)',
                7 => 'More than $100 million<br>(More than 370m SAR)',
            ],
        ],
    ],
    'currency' => [
        'dollar' => 'Dollars',
        'sar' => 'SAR',
    ],
    'form' => [
        'previous' => 'Previous',
        'next' => 'Next',
        'finish' => 'Finish',
    ],
    'validation' => [
        'step1' => [
            'investor_field' => 'Investment field is Required'
        ],
        'step2' => [
            'countries' => 'You must Choose at least One country',
        ],
        'step3' => [
            'cost_type'  => 'You must select a valid cost type',
            'cost_range' => 'You must enter a valid cost range',
        ],
        'step4' => [
            'profit_type'  => 'You must select a valid profit type',
            'profit_range' => 'You must enter a valid profit range',
        ],
        'step5' => [
            'company'               => 'You must specify whether you have a company',
            'space_type'            => 'You must select a valid space type',
            'staff'                 => 'You must specify whether you have staff',
            'staff_number'          => 'You must enter a valid staff number (minimum 1)',
            'workers'               => 'You must specify whether you have workers',
            'workers_number'        => 'You must enter a valid workers number (minimum 1)',
            'executive_spaces'      => 'You must specify whether you have executive spaces',
            'executive_spaces_type' => 'You must select a valid executive space type',
            'equipment'             => 'You must specify whether you have equipment',
            'equipment_type'        => 'You must select a valid equipment type',
            'software'              => 'You must specify whether you have software',
            'software_type'         => 'You must select a valid software type',
            'website'               => 'You must specify whether you have a website',
        ],
        'step6' => [
            'company'   => 'You must enter a valid company percentage (0–100)',
            'assets'    => 'You must enter a valid assets percentage (0–100)',
            'salaries'  => 'You must enter a valid salaries percentage (0–100)',
            'operating' => 'You must enter a valid operating percentage (0–100)',
            'other'     => 'You must enter a valid other expenses percentage (0–100)',
        ],
        'step7' => [
            'contribute_type'     => 'You must select a valid contribution type',
            'staff'               => 'You must specify the staff type when contribution is capital',
            'staff_person_money'  => 'You must specify the staff type when contribution is both',
            'money_amount'        => 'You must enter a valid money amount (minimum 1)',
            'money_percent'       => 'You must enter a valid money percentage (1–100)',
            'person_money_amount' => 'You must enter a valid personal money amount (minimum 1)',
            'person_money_percent' => 'You must enter a valid personal money percentage (1–100)',
        ],
        'step8' => [
            'profit_only_percentage'   => 'Profit percentage must be one of the allowed values.',

            'one_time_dollar_numeric'  => 'One-time amount in USD must be a number.',
            'one_time_dollar_min'      => 'One-time amount in USD must be at least 1.',

            'one_time_sar_numeric'     => 'One-time amount in SAR must be a number.',
            'one_time_sar_min'         => 'One-time amount in SAR must be at least 1.',

            'combo_dollar_numeric'     => 'Combo amount in USD must be a number.',
            'combo_dollar_min'         => 'Combo amount in USD must be at least 1.',

            'combo_sar_numeric'        => 'Combo amount in SAR must be a number.',
            'combo_sar_min'            => 'Combo amount in SAR must be at least 1.',

            'combo_percentage'         => 'Combo percentage must be one of the allowed values.',
        ],
        'step9' => [
            'summary_required' => 'A summary of the idea is required.',
            'summary_string'   => 'The summary must be text.',
            'summary_max'      => 'The summary must not exceed 2000 characters.',

            'attachments_file'  => 'Each attachment must be a valid file.',
            'attachments_mimes' => 'Attachments must be of type: pdf, doc, docx, xls, xlsx, jpg, jpeg, png.',
            'attachments_max'   => 'Each attachment must not exceed 10 MB.',
        ],

    ]
];
