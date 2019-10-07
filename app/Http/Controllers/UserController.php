<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;

use App\Utils\UserSession;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function profile()
    {
        return view('profile');
    }

    public function signinForm()
    {
        return view('signin-form');
    }
    public function signinCheck(Request $request)
    {
        // On récupére les données qui viennent du formulaire
        $email = $request->input('email');
        $password = $request->input('password');
        // On s'en sert pour récupérer l'utilisateur qui a cet email
        $user = User::where('email', $email)->first();
        // Il manque un bout ici. on devrait vérifier si $user est null au cas où y'aurait pas de résultat
        // On vérifie maintenant que le mot de passe est bon
        if (password_verify($password, $user->password)) {
            // Si l'utilisateur a fourni le bon mot de passe et le bon email, on le connecte
            UserSession::connect($user);
            // La connexion est faite, on redirige l'utilisateur vers la page admin
            return redirect()->route('home');
        }
        // Eventuellement (ce n'est pas codé ici), on pourrait afficher un message ou retourner une vue indiquant que les identifiants ne sont pas bons
    }




    public function signupForm()
    {
        return view('signup');
    }
    public function signupRec(Request $request)
    {
        // dump($request->getMethod());
        // dump($request);
        // dump($request->password, $request->password_verification);
        // yes!! it works !!

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordCheck = $request->input('password_verification');

        // On initialise une varibale $errors comme un tableau vide
        $errors = [];
        
        $newUser = new User();

        if (empty($firstname) == false && empty($lastname) == false) {
            $newUser->firstname = $firstname;
            $newUser->lastname = $lastname;
        } else {
            $errors[] = 'Le nom d\'utilisateur est vide';
        }

        if (
            filter_var($email, FILTER_VALIDATE_EMAIL) !== false &&
            User::where('email', $email)->count() == 0
            // Autre solution avec ->doesntExist() qui rtourne true au lieu ->count()
        ) {
            $newUser->email = $email;
        } else {
            $errors[] = 'Ce courriel n\'est pas correct';
        }

          // On vérifie que les deux mots de passe sont identiques avant de l'ajouter hashé
          if ($password == $passwordCheck && empty(trim($password)) == false) {
            $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
            $newUser->password = $passwordHashed;
        } else {
            $errors[] = 'Les mots de passe doivent être identiques et non vides';
        }

        if (count($errors) > 0) {
            return view('signup', [
                'errors' => $errors,
                'username' => $username,
                'email' => $email
            ]);
        }

        $newUser->save();

        return redirect()->route('home');
            
    }

    

    public function signout()
    {
        // On demande la déconnexion
        // La méthode s'occupe d'enlever les informations sur l'utilisateur dans $_SESSION
        UserSession::disconnect();
        // On redirige l'utilisateur sur la page d'accueil
        return redirect()->route('home');
    }
}