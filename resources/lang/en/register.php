<?php

return [
    'welcome-title' => 'Register',
    'welcome-slogan' => 'Welcome to ' . env('APP_NAME'),
    'name-label' => 'Name',
    'name-placeholder' => 'John',
    'user-label' => 'Email',
    'user-placeholder' => 'user@example.com',
    'password-label' => 'Password',
    'password-placeholder' => 'Enter your password',
    'password-confirmation-label' => 'Confirm Password',
    'password-confirmation-placeholder' => 'Confirm your password',
    'submit-label' => 'Register <i data-feather="log-in" class="ml-1"></i>',
    'footer' => 'Already have an account? <a href="' . route('login') .'">Sign in</a>.',
];
