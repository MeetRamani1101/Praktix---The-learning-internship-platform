<?php
session_start();
require_once 'config/db.php';
require_once 'app/core/Router.php';

$router = new Router();

// Public pages
$router->get('',               'HomeController', 'index');
$router->get('about',          'PageController', 'about');
$router->get('contact',        'PageController', 'contact');
$router->post('contact',       'PageController', 'contactSubmit');
$router->get('partner',        'PageController', 'partner');
$router->post('partner',       'PageController', 'partnerSubmit');

// Auth
$router->get('login',          'AuthController', 'loginPage');
$router->post('login',         'AuthController', 'loginSubmit');
$router->get('register',       'AuthController', 'registerPage');
$router->post('register',      'AuthController', 'registerSubmit');
$router->get('logout',         'AuthController', 'logout');
$router->post('google-login',  'AuthController', 'googleLogin');

// Programs
$router->get('programs',       'ProgramController', 'index');
$router->get('program',        'ProgramController', 'show');
$router->get('enroll',         'ProgramController', 'enroll');

// Internships
$router->get('internships',    'InternshipController', 'index');
$router->get('internship',     'InternshipController', 'show');
$router->post('apply',         'InternshipController', 'apply');

// Experts
$router->get('experts',        'ExpertController', 'index');
$router->get('expert',         'ExpertController', 'show');
$router->get('expert-register','ExpertController', 'registerPage');
$router->post('expert-register','ExpertController','registerSubmit');

// Dashboard
$router->get('dashboard',      'DashboardController', 'index');

// Search
$router->get('search-programs',    'ProgramController',    'search');
$router->get('search-internships', 'InternshipController', 'search');

$router->dispatch();
