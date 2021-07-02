<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CrudController extends Controller
{
    public function __construct()
    {
        //
    }

    public function user()
    {
        return 'Offers Page';
    }
    public function getAll()
    {
        // $offers = Offer::select(
        //     'id',
        //     'price',
        //     'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
        //     'details_' . LaravelLocalization::getCurrentLocale() . ' as details'
        // )->get();
        $offers = Offer::select('id', 'price', 'name', 'details')->get();

        return view('offers.all', compact('offers')); // return collection
    }

    public function create()
    {
        return view('offers.create');
    }
    public function store(OfferRequest $request)
    {


        // $rules = $this->getRules();
        // $message = $this->getMessages();
        // //     Validator::make(argu , argu , argu);
        // $validator = Validator::make($request->all(), $rules, $message);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInputs($request->all());
        // }

        Offer::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details,
        ]);
        return back()->with(['success' => 'تم اضافة العرض بنجاح ي وحش']);
    }

    public function show($id)
    {
    }

    // protected function getRules()
    // {
    //     return $rules = [
    //         'name' => 'required|max:50|',
    //         'price' => 'required|numeric',
    //         'details' => 'required|max:255'
    //     ];
    // }

    // protected function getMessages()
    // {
    //     return $messages =
    //         [
    //             'name.required' => __('messages.offer name required'),
    //             'name.max' => __('messages.name max'),
    //             'price.required' => __('messages.price required'),
    //             'price.numeric' => __('messages.price numeric'),
    //             'price.max' => __('messages.price max'),
    //             'details.required' => __('messages.details required')
    //         ];
    // }
}
