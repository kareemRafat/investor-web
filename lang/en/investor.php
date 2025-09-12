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
            'subtitle' => "The amounts / resources you own and wish to invest or share in the business"
        ],
        'step4' => [
            'subtitle' => 'The contributions you would like to have in the distinguished idea',
            'sell' => 'I would like to sell the idea completely without any contribution to its implementation',
            'idea' => 'I will only contribute the idea',
            'capital' => 'I will contribute capital for implementing the idea',
            'personal' => 'I will personally contribute to implementing the idea',
            'both' => 'I will contribute with capital + I will personally contribute to implementing the idea',
            'full_time' => 'Full time',
            'part_time' => 'Part time',
            'supervision' => 'Supervision only',
            'amount' => 'Amount',
            'percent' => 'Percentage',
            'total_error' => 'The total percentage must equal 100%.',
        ],
        'step5' => [
            'subtitle' => 'Summary of the investment or participation proposed by you and its files',
            'placeholder' => 'Write a clear summary of your idea',
            
            'confidential_info' => 'If there is any important and confidential information about the idea, we advise you not to mention it clearly in this summary to preserve your rights and protect it from being stolen by others.',
            'max_characters' => '2000 characters maximum',
            'file_format' => 'File format must be Word, Excel, PDF, or images',

            'first_time_question' => 'Is this your first time submitting an idea?',
            'show_public' => 'I would like to show it to the public',
            'keep_private' => 'To use the website and to preserve the intellectual property rights',
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
            'company_required' => 'Please select whether you have a company or not.',
            'company_in' => 'Invalid option for company.',
            'staff_required' => 'Please select yes or no for specialized employees.',
            'workers_required' => 'Please select yes or no for unprofessional workers.',
            'spaces_required' => 'Please select yes or no for executive spaces.',
            'equipment_required' => 'Please select yes or no for devices and equipment.',
            'software_required' => 'Please select yes or no for software and applications.',
            'website_required' => 'Please select yes or no for website.',
            'number_min' => 'Number must be at least 1.',
            'number_workers_min' => 'Number of unprofessional workers must be at least 1.',
        ],
        'step4' => [
            'contribute_type'     => 'You must select a valid contribution type',
            'staff'               => 'You must specify the staff type when contribution is capital',
            'staff_person_money'  => 'You must specify the staff type when contribution is both',
            'money_amount'        => 'You must enter a valid money amount (minimum 1)',
            'money_percent'       => 'You must enter a valid money percentage (1–100)',
            'person_money_amount' => 'You must enter a valid personal money amount (minimum 1)',
            'person_money_percent' => 'You must enter a valid personal money percentage (1–100)',
        ],
        'step5' => [
            'summary_required' => 'A summary of the idea is required.',
            'summary_string'   => 'The summary must be text.',
            'summary_max'      => 'The summary must not exceed 2000 characters.',

            'attachments_file'  => 'Each attachment must be a valid file.',
            'attachments_mimes' => 'Attachments must be of type: pdf, doc, docx, xls, xlsx, jpg, jpeg, png.',
            'attachments_max'   => 'Each attachment must not exceed 10 MB.',

            'visibility_required' => 'Please select a visibility option first.',
            'visibility_in'       => 'The selected visibility option is invalid.',
        ],


    ]
];
