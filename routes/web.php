<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
// Page d'accueil
$router->get('/', [
    'as' => 'home', 'uses' => 'MainController@home'
]);
// Page d'un quiz
$router->get('/quiz/{id}', [
    'as' => 'quiz_show', 'uses' => 'QuizController@quiz'
]);

// Page d'inscription
$router->get('/signup', [
    'as' => 'signup', 'uses' => 'UserController@signupForm'
]);
$router->post('/signup', [
    'as' => 'signup_post', 'uses' => 'UserController@signupRec'
]);


// Page de connexion
$router->get('/signin', [
    'as' => 'signin', 'uses' => 'UserController@signinForm'
]);
$router->post('/signin-check', [
    'as' => 'signin_post', 'uses' => 'UserController@signinCheck'
]);