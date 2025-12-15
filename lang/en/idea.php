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
        'unspecified' => 'Unspecified',
    ],
    'steps' => [
        'step1' => [
            'subtitle' => "What is your idea`s field?",
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
                ['code' => 'LB', 'name' => 'Lebanon'],
                ['code' => 'TN', 'name' => 'Tunisia'],
                ['code' => 'DZ', 'name' => 'Algeria'],
                ['code' => 'JO', 'name' => 'Jordan'],
                ['code' => 'SA', 'name' => 'Saudi Arabia'],
                ['code' => 'QA', 'name' => 'Qatar'],
                ['code' => 'OM', 'name' => 'Oman'],
                ['code' => 'MA', 'name' => 'Morocco'],
                ['code' => 'LY', 'name' => 'Libya'],
                ['code' => 'SD', 'name' => 'Sudan'],
                ['code' => 'PS', 'name' => 'Palestine'],
                ['code' => 'IQ', 'name' => 'Iraq'],
                ['code' => 'IR', 'name' => 'Iran'],
                ['code' => 'TR', 'name' => 'Turkey'],
                ['code' => 'NAF', 'name' => 'North Africa'],
                ['code' => 'LEV', 'name' => 'Levant'],
                ['code' => 'GULF', 'name' => 'Gulf countries'],
                ['code' => 'AE', 'name' => 'United Arab Emirates'],
                ['code' => 'KW', 'name' => 'Kuwait'],
                ['code' => 'BH', 'name' => 'Bahrain'],
                ['code' => 'EG', 'name' => 'Egypt'],
                ['code' => 'AM_AU', 'name' => 'America and Australia continent'],
                ['code' => 'CSA', 'name' => 'Central and Southern Africa'],
                ['code' => 'EU', 'name' => 'European Union'],
                ['code' => 'CN', 'name' => 'China'],
                ['code' => 'IN_PK', 'name' => 'India and Pakistan'],
                ['code' => 'MENA', 'name' => 'Middle East and North Africa'],
                ['code' => 'ME', 'name' => 'Middle East'],
                ['code' => 'YE', 'name' => 'Yemen'],
                ['code' => 'SY', 'name' => 'Syria'],
                ['code' => 'MR', 'name' => 'Mauritania'],
                ['code' => 'SO', 'name' => 'Somalia'],
                ['code' => 'DJ', 'name' => 'Djibouti'],
                ['code' => 'KM', 'name' => 'Comoros']
            ],
        ],
        'step3' => [
            'subtitle' => 'The estimated cost of implementing the idea',

            'types' => [
                'one-time' => 'One-time Costs',
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
        'step4' => [
            'subtitle' => 'The expected profits from implementing the idea',

            'types' => [
                'one_time' => 'One-time Profits',
                'annual'   => 'Annual Profits',
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
        'step5' => [
            'subtitle' => 'Requirements for implementing the idea',
            'company' => 'Establishing a company',
            'office_spaces' => 'Office spaces',
            'staff' => 'Specialized Employees',
            'workers' => 'Unprofessional workers',
            'executive_spaces' => 'Executive Spaces',
            'equipment' => 'Devices and Equipment',
            'software' => 'Software and applications',
            'website' => 'Website',
        ],
        'step6' => [
            'subtitle' => 'Distribution of the capital required to implement the idea',
            'fields' => [
                'company' => 'Establishing a company',
                'assets' => 'Fixed Assets',
                'salaries' => 'Monthly Salaries',
                'operating' => 'Operating Expenses',
                'other' => 'Other',
            ],
            'placeholder' => 'Enter amount %',
            'total' => 'Total',
            'perfect' => 'Perfect! The distribution is balanced.',
            'must_equal' => 'The total must equal 100%.',
        ],
        'step7' => [
            'subtitle' => 'Your contribution to implementing the idea is:',
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
        'step8' => [
            'title' => 'Submit Idea',
            'subtitle' => 'Your specific requirements in exchange for the idea',
            'profit_share' => 'A share of the profits',
            'one_time_sum' => 'A one-time sum of money',
            'profit_plus_sum' => 'A share of the profits + a sum of money',
            'choose_one' => 'You must choose at least one option (profits, one-time money, or combo).',
            'combo_complete' => 'If you choose A share of the profits + a sum of money, you must fill amount in dollars, SR, and choose a percentage.',

            'choose_one' => 'Please choose at least one type of return.',
            'only_one_currency' => 'Please enter the amount in only one currency (either SAR or USD).',
            'combo_percentage_required' => 'For combo return, you must enter the percentage along with the amount in one currency.',
            'combo_currency_required' => 'For combo return, you must enter the amount in one currency together with the percentage.',

            // for show in summary
            'profit_share' => 'Profit share',
            'fixed_amount' => 'Fixed amount',
            'combo' => 'Profit share + Fixed amount',


        ],
        'step9' => [
            'subtitle' => 'Summary of the idea and its files',
            'placeholder' => 'Write a clear summary of your idea',
            'confidential_info' => 'If there is any important and confidential information about the idea, we advise you not to mention it clearly in this summary to preserve your rights and protect it from being stolen by others.',
            'max_characters' => '2000 characters maximum',
            'file_format' => 'File format must be Word, Excel, PDF, or images',

            'first_time_question' => 'property rights',
            'show_public' => 'I would like to show it to the public',
            'keep_private' => 'keep Private',

            'selected_file' => 'Selected File',
            'delete_file' => 'Delete',
            'delete_confirm' => 'Are you sure you want to Delete ?',
        ],
        'step10' => [
            'title' => 'Summary of your distinguished idea',
            'project' => 'The project',
            'classification' => 'Idea classification',
            'capital' => 'The required capital amount',
            'expected_profit' => 'The expected profit',
            'best_countries' => 'The best countries to implement the idea',
            'contact_way' => 'The preferred way to contact you is',
            'resources' => 'Requirements for implementing the idea',
            'contribution' => 'You will contribute by',
            'returns' => 'Your requirements are',
            'capital_distribution' => 'Distribution of the required capital',
            'attachments' => 'Attached files',
            'summary' => 'Idea summary',
        ],

    ],
    'currency' => [
        'dollar' => 'Dollars',
        'sar' => 'SAR',
    ],
    'form' => [
        'previous' => 'Previous',
        'next' => 'Next',
        'finish' => 'Submit Your Idea',
        'edit' => 'I would like to review my informations',

    ],
    'validation' => [
        'step1' => [
            'idea_field' => 'You must choose One of those Fields'
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
            'contribute_type' => 'You must select a valid contribution type',
            'staff' => 'You must specify the staff type when contribution is capital',
            'staff_person_money' => 'You must specify the staff type when contribution is both',
            'money_amount' => 'You must enter a valid money amount (minimum 1)',
            'money_percent' => 'You must enter a valid money percentage (1–100)',
            'person_money_amount' => 'You must enter a valid personal money amount (minimum 1)',
            'person_money_percent' => 'You must enter a valid personal money percentage (1–100)',

            'money_required_one' => 'You must enter either amount or percentage',
            'money_both_prohibited' => 'You cannot enter both amount and percentage',
            'person_money_required_one' => 'You must enter either personal amount or percentage',
            'person_money_both_prohibited' => 'You cannot enter both personal amount and percentage',
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

            'visibility_required' => 'Please select a visibility option first.',
            'visibility_in'       => 'The selected visibility option is invalid.',
        ],

    ],
    'summary' => [
        'page_title' => 'Details For your Idea',
        'welcome_title' => 'Mr.',
        'welcome_message' => 'Your idea has been added to the Ideas Fund. We hope you find the right partner to implement it according to your requirements.',
        'matching_title' => 'The list below contains investment offers that match or are close to the requirements of implementing your idea. We hope you find the suitable one:',
        'investor_field_title' => 'Investor in Sector:',
        'capital_offered' => 'Offered Capital',
        'desired_country' => 'Preferred execution in:',
        'resources_title' => 'The following resources are available:',
        'resources_empty' => 'No additional resources available.',
        'btn_more' => 'More',
        'btn_show_more' => 'Show More',
        'loading' => 'Loading...',
        'no_offers' => 'There are currently no investment offers fully matching your idea, but you will be notified once an interested investor appears.',
        'contact_owner' => 'Contact the idea owner',
        'title' => 'Idea summary',

    ],
    'index' => [
        'page_title' => 'Ideas Fund',
        'idea_field_title' => 'The idea is in the sector:',
        'contributions_title' => 'Contribution to implementing the idea',
        'capital_offered' => 'Offered capital',
        'desired_country' => 'Preferred execution in',
        'resources_title' => 'The following resources are available:',
        'resources_empty' => 'No additional resources available.',
        'contributions_empty' => 'No contributions available.',
        'btn_more' => 'More',
        'no_ideas' => 'No ideas available at the moment.',
        'btn_show_more' => 'Show More',
        'loading' => 'Loading...',

        // Filters
        'filter_field' => 'Field of the idea you are looking for',
        'filter_countries' => 'Preferred countries',
        'filter_cost' => 'Estimated cost to execute the idea',
        'filter_contribution' => 'Your contribution to executing the idea',
        'filter_requirements' => 'Your special requirements for the idea',
        'filter_implementation' => 'Idea implementation requirements',
        'filter_distribution' => 'Required capital distribution',
        'filter_expected_profit' => 'Expected profits',

        'one_time_cost' => 'One-time Cost',
        'annual_cost' => 'Annual Cost',

        'btn_search' => 'Search',
        'reset' => 'Reset',
        'filters' => 'Filters',
    ],
];
