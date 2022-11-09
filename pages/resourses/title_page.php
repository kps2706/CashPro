<?php

$url = isset($_GET['route']) ? $_GET['route'] : 'Home';

$page_title = 'Home';

switch ($url) {
    case 'incomeTax':
        # code...
        $page_title = 'Income Tax';
        break;
    case 'goalPlanner':
        # code...
        $page_title = 'Goal Panning';
        break;
    case 'invDetails':
        # code...
        $page_title = 'Investment Details';
        break;
    case 'mutualFunds':
        # code...
        $page_title = 'Mutual Funds';
        break;
    case 'stocks':
        # code...
        $page_title = 'Stocks';
        break;
    case 'secDetails':
        # code...
        $page_title = 'Security Details';
        break;
    case 'contact':
        # code...
        $page_title = 'Contact';
        break;
    case 'profile':
        # code...
        $page_title = 'Profile';
        break;
    case 'Services':
        # code...
        $page_title = 'Services';
        break;

    default:
        # code...
        $page_title = 'Home';
        break;
}