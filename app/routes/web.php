<?php
return [
    "GET" => [
        "/" => "HomeController@index | HOME_VIEW",
        "/about/" => "HomeController@getAbout | ABOUT_VIEW",
        "/post/{name}" => "PostController@index | POST_USER",
        "/post/{name}/{title}" => "PostController@getTitle | POST_VIEW"
    ],
    "POST" => [

    ]
];