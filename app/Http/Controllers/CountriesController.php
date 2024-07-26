<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function index(Request $request){
        $search = $request->search['value'];
        $columsForOrderBy = ['id','name','order_number','created_at','updated_at'];
        $orderByColumn = $request->order[0]['column'];
        $orderDirection = $request->order[0]['dir'];

        $query = Countries::when($search,function($query) use ($search){

                    $query->where('name','like',"%$search%");

        })
            ->orderBy($columsForOrderBy[$orderByColumn], $orderDirection);
        $total = $query->count();

        //aply pagination
        $products = $query->skip($request->start)->take($request->leght)->get();

        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' =>$total,
            'recordsFiltred' => $total,
            'data' => $products,

        ]);
    }

    public function search ($query)
    {
        return Countries::select("name")
        ->where('name','LIKE','%' . $query .'%')
        ->get();
    }
}
