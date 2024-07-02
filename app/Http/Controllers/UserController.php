<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store()
    {
        //validation des données récupérées 
        $validateData = request()->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        // on vérifie qu'il n'y ait pas de caractères spéciaux
        $name = $validateData['name'];
        $email = $validateData['email'];
        $password = $validateData['password'];

        DB::beginTransaction();
        
        try {
            //on créé le user avec selon le modèle User et on save dans la Base de données
            $user = User::create([
                'name' => $name, 
                'email' => $email, 
                'password' => $password
            ]);

            //confirmation de la transaction
            DB::commit();

            // on renvoi la réponse en JSON au front
            return response()->json(['success' => 'User created successfully', 'user' => $user], 201);
            
        } catch(Exception $ex){ // si le try ne fonctionne pas
            DB::rollBack(); //alors ça rollback
            $errorMessage = $ex->getMessage(); // Récupération du message d'erreur
            return response()->json(['error' => $errorMessage], 500); // Par exemple, renvoyer une réponse JSON avec le message d'erreur et le code HTTP 500
        }
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //validation
        $validateData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email'
        ]);

        // $data = request()->all();
        
        $userName = $validateData['name'];
        $userEmail = $validateData['email'];
        
        // dd($userId);
        DB::beginTransaction();

        try{
            // Mettre à jour les attributs de l'utilisateur avec les nouvelles valeurs
                $user->name = $userName;
                $user->email = $userEmail;
            // Enregistrer les modifications dans la base de données
                $user->save();
            DB::commit(); //enregistrement de l'opération
        }
        catch(Exception $ex){ // si le try ne fonctionne pas
            DB::rollBack(); //alors ça rollback
            $errorMessage = $ex->getMessage(); // Récupération du message d'erreur
            return response()->json(['error' => $errorMessage], 500); // Par exemple, renvoyer une réponse JSON avec le message d'erreur et le code HTTP 500
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try{
            $user->delete(); //delete

            return response()->json(['success' => 'User deleted successfully', 'user' => $user], 201);

        }
        catch(Exception $ex){ // si le try ne fonctionne pas
            $errorMessage = $ex->getMessage(); // Récupération du message d'erreur
            return response()->json(['error' => $errorMessage], 500); // Par exemple, renvoyer une réponse JSON avec le message d'erreur et le code HTTP 500
        }
    }
}
