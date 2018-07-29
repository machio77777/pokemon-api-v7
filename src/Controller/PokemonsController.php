<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pokemons Controller
 */
class PokemonsController extends AppController
{
    public function view($zukanNo = null)
    {
        $pokemon = $this->Pokemons
                ->find()
                ->where(['zukan_no' => $zukanNo]);
        
        $this->set(compact('pokemon'));
        $this->set('_serialize', 'pokemon');
    }
}
