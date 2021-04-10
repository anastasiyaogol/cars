<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('autos')
            ->leftJoin('users', 'users.id', '=', 'autos.user_id')
            ->select('autos.id','city','brand','model','color','issue_year','mileage','price','seller_name','seller_phone','img','users.name as user_name','fuel_id','transmission_id','type_id','description','user_id')
            ->leftJoin('fuels', 'fuels.id', '=', 'autos.fuel_id')
            ->select('autos.id','city','brand','model','color','issue_year','mileage','price','seller_name','seller_phone','img','users.name as user_name','fuels.name as fuel_name','transmission_id','type_id','description','user_id')
            ->leftJoin('transmissions', 'autos.transmission_id', '=', 'transmissions.id')
            ->select('autos.id','city','brand','model','color','issue_year','mileage','price','seller_name','seller_phone','img','users.name as user_name','fuels.name as fuel_name','transmissions.name as transmission_name','type_id','description','user_id')
            ->leftJoin('types', 'autos.type_id', '=', 'types.id')
            ->select('autos.id','city','brand','model','color','issue_year','mileage','price','seller_name','seller_phone','img','users.name as user_name','fuels.name as fuel_name','transmissions.name as transmission_name','types.name as type_name','description','user_id')
            ->get();

        return $users;
        return Auto::all();

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
     * @return array
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "user_id" => ["required"],
                "city" => ["required","min:2","max:50"],
                "brand" => ["required","min:1","max:50"],
                "model" => ["required","min:1","max:50"],
                "color" => ["required","min:3","max:50"],
                "issue_year" => ["required","min:4","max:4"],
                "mileage" => ["required","min:1","max:4"],
                "price" => ["required","min:1","max:8"],
                "seller_name" => ["required","min:1","max:50"],
                "seller_phone" => ["required","min:5","max:13"],
                "img" => ["required","max:255"],
                "fuel_id" => ["required","min:1","max:1"],
                "transmission_id" => ["required","min:1","max:1"],
                "type_id" => ["required","min:1","max:1"],
                "description" => ["required","min:1","max:1000"]
            ]
        );
        if ($validator->fails()) {
            return [
                "status" => false,
                "errors" => $validator->messages()
            ];
        };
        //Auto::create($request->all());
        $auto = Auto::create([
            "user_id" => $request->user_id,
            "city" => $request->city,
            "brand" => $request->brand,
            "model" => $request->model,
            "color" => $request->color,
            "issue_year" => $request->issue_year,
            "mileage" => $request->mileage,
            "price" => $request->price,
            "seller_name" => $request->seller_name,
            "seller_phone" => $request->seller_phone,
            "img" => $request->img->store('uploads','public'),
            "fuel_id" => $request->fuel_id,
            "transmission_id" => $request->transmission_id,
            "type_id" => $request->type_id,
            "description" => $request->description
        ]);

        return [
        "status" => true,
            "auto" => $auto
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auto = Auto::find($id);
        if (!$auto) {
            return response()->json([
                "status" => false,
                "message" => "Auto not find"
            ])->setStatusCode(404);
        }
        return $auto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function edit(Auto $auto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auto $auto): JsonResponse
    {

        $auto->update(["user_id" => $request->user_id,
            "city" => $request->city,
            "brand" => $request->brand,
            "model" => $request->model,
            "color" => $request->color,
            "issue_year" => $request->issue_year,
            "mileage" => $request->mileage,
            "price" => $request->price,
            "seller_name" => $request->seller_name,
            "seller_phone" => $request->seller_phone,
            "img" => $request->img->store('uploads','public'),
            "fuel_id" => $request->fuel_id,
            "transmission_id" => $request->transmission_id,
            "type_id" => $request->type_id,
            "description" => $request->description
        ]);
        return response()->json($auto,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auto $auto): JsonResponse
    {
        $auto->delete();
        return response()->json($auto, 204);
    }
}
