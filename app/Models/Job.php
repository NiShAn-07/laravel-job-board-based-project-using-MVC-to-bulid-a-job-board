<?php

namespace App\Models;


class Job 
{
    public static function all()
    {

    return [
        [
            "title" => "Laravel Developer",
            "company" => "Tech Solutions",
            "location" => "New York, NY",
            "description" => "We are looking for a skilled Laravel developer to join our team."
        ],
        [
            "title" => "Frontend Engineer",
            "company" => "Web Innovations",
            "location" => "San Francisco, CA",
            "description" => "Seeking a creative frontend engineer with experience in React.js."
        ],
        [
            "title" => "Backend Developer",
            "company" => "Data Systems",
            "location" => "Austin, TX",
            "description" => "Join our backend team to work on scalable web applications."
        ]
    ];
    }
}
