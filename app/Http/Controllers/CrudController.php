<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Active;
use App\Models\PrivatePerson;
use App\Models\LegalPerson;
use App\Models\Local;
use App\Models\Person;
use Illuminate\Http\Request;

class CrudController extends Controller
{   
    // A action *main* seria a rota principal:
    public function main() {
        //A variável $actives serve para a permissão do envio de todos os dados da tabela actives no banco de dados para a home, onde fica a verificação desses dados dos ativos.
        $actives = Active::all();
        return view('home', ['actives' => $actives]);   
    }
    //Action da rota que leva para a view do formulário de criação dos ativos:
    public function create() {
        return view('crud.create');
    }
    //Action da rota que permite o armazenamento dos dados dos ativos no banco:
    public function store(Request $request) {
        $person = new Person;
        $person->person_name = $request->name_person; 
        $person->person_type = $request->type_person;
        $person->save();
        $personId = $person->id;
        if ( $request->type_person === "Físico" ) {
            $privatePerson = new PrivatePerson;
            $privatePerson->person_id = $personId;
            $privatePerson->person_cpf = $request->cpf_person;  
            $privatePerson->save();
        } else if ( $request->type_person === "Jurídico" ) {
            $legalPerson = new LegalPerson;
            $legalPerson->person_id = $personId;
            $legalPerson->person_cnpj = $request->cnpj_person;
            $legalPerson->save();
        }
        
        $local = new Local;
        $local->active_street = $request->street;
        $local->active_street_number = $request->street_number;
        $local->active_city = $request->city;
        $local->active_state = $request->state;
        $local->active_country = $request->country;
        $local->save(); 
        $localId = $local->id;

        $active = new Active;
        $active->local_id = $localId;
        $active->person_id = $personId;
        $active->active_name = $request->name;
        $active->active_dscp = $request->description;
        $active->active_ctgr = $request->category;
        $active->active_date = $request->date;
        $active->active_value = $request->value;
        $active->active_local = $request->type;

        $active->save();

        return redirect('/');
    }
    //Action da rota que realiza a exclusão dos registros no banco e redireciona para a rota principal, onde contém a verificação dos:
    public function destroy($id) {
        Active::findOrFail($id)->delete();
        return redirect('/');
    }
    //Action da rota que redireciona para o formulário de atualização dos ativos do banco:
    public function edit($id) {
        $active = Active::findOrFail($id);
    
        return view('crud.edit', ['active' => $active]);
    }
    //Action da rota que atualiza os registros dos bancos e redireciona para a página de verificação dos ativos
    public function update(Request $request) {
        $localData = [
            'active_street' => $request->street,
            'active_street_number' => $request->street_number,
            'active_city' => $request->city,
            'active_state' => $request->state,
            'active_country' => $request->country,
        ];
        Local::findOrFail($request->local_id)->update($localData);

        $personData = [
            'person_name' => $request->name_person,
            'person_type' => $request->type_person
        ];
        Person::findOrFail($request->person_id)->update($personData);
        $activeData = [
            'active_name' => $request->name,
            'active_dscp'=> $request->description,
            'active_ctgr' => $request->category,
            'active_date' => $request->date,
            'active_value' => $request->value,
            'active_local' => $request->type,
        ];

        Active::findOrFail($request->id)->update($activeData);
        return redirect('/');
    }
}
