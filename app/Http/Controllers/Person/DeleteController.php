<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\StoreRequest;
use App\Http\Requests\Person\UpdateRequest;
use App\Person;
use Illuminate\Http\Request;

class DeleteController extends Controller
{

    /**
     * @param Person $person
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function __invoke(Person $person)
    {



        $person->delete();

        return response([]);
    }
}
