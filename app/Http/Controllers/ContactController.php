<?php

namespace App\Http\Controllers;

use App\Contact_model;
use App\Contact;
use Redirect;
use Validator;
use Illuminate\Support\Facades\Input;


use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contact_edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();


        $rules = [
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'adresse' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            /* 'comment' => 'required',*/
        ];

        $messages = [
            'last_name.required' => 'Nom est obligatoire',
            'first_name.required' => 'Prénom est obligatoire',
            'email.required' => 'Email est obligatoire',
            'email.email' => 'Veuillez insérer un email',
            'phone.required' => 'Email est obligatoire',
            'phone.digits' => 'Veuillez insérer un numéro de 10 chiffre',
            'adresse.required' => 'Adresse est obligatoire',
            'postal_code.required' => 'Code postal est obligatoire',
            'city.required' => 'Ville est obligatoire',
        ];

        $validation = Validator::make($data, $rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput($data);
        } else {


        $contact = Contact::find($id);
        $contact->last_name = $request->get('last_name');
        $contact->first_name =  $request->get('first_name');
        $contact->email = $request->get('email');
        $contact->phone = $request->get('phone');
        $contact->adresse = $request->get('adresse');
        $contact->postal_code = $request->get('postal_code');
        $contact->city = $request->get('city');
        $contact->comment = $request->get('comment');
        $contact->save();

        return redirect('/home')->with('success', 'Contact est modifié');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
    

        return redirect()->route('home')->with('success', 'Un contact est supprimé avec succès');
    }

    public function contacts()
    {
        return view('contact',[
            'message_confirm' => Input::get( 'message' )
        ]);
    }

    public function contact_add(Request $request)
    {

        $data = $request->all();


        $rules = [
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'adresse' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            /* 'comment' => 'required',*/
        ];

        $messages = [
            'last_name.required' => 'Nom est obligatoire',
            'first_name.required' => 'Prénom est obligatoire',
            'email.required' => 'Email est obligatoire',
            'email.email' => 'Veuillez insérer un email',
            'phone.required' => 'Email est obligatoire',
            'phone.digits' => 'Veuillez insérer un numéro de 10 chiffre',
            'adresse.required' => 'Adresse est obligatoire',
            'postal_code.required' => 'Code postal est obligatoire',
            'city.required' => 'Ville est obligatoire',
        ];

        $validation = Validator::make($data, $rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput($data);
        } else {
            $contact = Contact::find($request->id);
            if(!$contact)
                $contact = new Contact();
            $contact->last_name = $request->last_name;
            $contact->first_name = $request->first_name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->adresse = $request->adresse;
            $contact->postal_code = $request->postal_code;
            $contact->city = $request->city;
            $contact->comment = $request->comment;
            $contact->save();

            return view('contact_confirm',[
                'contact' => $contact
            ]);

        
        }
    }

    public function confirm_save()
    {
        return Redirect::route('contacts')->with('message', 'Enregistré avec succès');  
    }

    public function confirm_edit($id)
    {
        $contact=Contact::find($id);
        return view('contact_confirm_edit',[
            'contact' => $contact
        ]);
    }
}
