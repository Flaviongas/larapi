<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
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
    public function create(Request $request)
    {
        $ISBN = $request->ISBN;
        $title = $request->title;
        $author = $request->author;
        $year = $request->year;
        $editorial = $request->editorial;
        $price = $request->price;

        $new_book = new Books();
        $new_book->ISBN = $ISBN;
        $new_book->title = $title;
        $new_book->author = $author;
        $new_book->year = $year;
        $new_book->editorial = $editorial;
        $new_book->price = $price;
        $new_book->save();

        return "Se agregó un nuevo libro con ID: " . $new_book->id;
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $option = $request->option;
        $data = $request->data;
        if ($option == 1) {
            // ISBN
            $result = Books::where('ISBN', (int)$data)
                ->get();
            return $result;
        } elseif ($option == 2) {
            // Name
            $result = Books::where('$text', ['$search' => "'$data'"])
                ->get();
            return $result;
        } else {
            return Books::get();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $ISBN = (int)$request->ISBN;
        $option = $request->option;
        $data = $request->data;
        /*return $request;*/
        switch ($option) {
            case 1:
                // Change ISBN
                $result = Books::where('ISBN', $ISBN)
                    ->get()[0];
                $result->ISBN = (int)$data;
                $result->save();
                return $result;
                break;

            case 2:
                // Change title
                $result = Books::where('ISBN', $ISBN)
                    ->get()[0];
                $result->title = $data;
                $result->save();
                return $result;
                break;
            case 3:
                // Change author
                $result = Books::where('ISBN', $ISBN)
                    ->get()[0];
                $result->author = $data;
                $result->save();
                return $result;
                break;
            case 4:
                // Change year
                $result = Books::where('ISBN', $ISBN)
                    ->get()[0];
                $result->year = (int)$data;
                $result->save();
                return $result;
                break;
            case 5:
                // Change editorial
                $result = Books::where('ISBN', $ISBN)
                    ->get()[0];
                $result->editorial = $data;
                $result->save();
                return $result;
                break;
            case 6:
                // Change precio
                $result = Books::where('ISBN', $ISBN)
                    ->get()[0];
                $result->price = (int)$data;
                $result->save();
                return $result;
                break;
            default:
                return "Opción no válida";
        }
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $option = $request->option;
        $data = $request->data;
        if ($option == 1) {
            // ISBN
            $result = Books::where('ISBN', (int)$data)
                ->limit(1)->delete();
            return "Se eliminaron " . $result . " documentos";
        } elseif ($option == 2) {
            // Name
            $result = Books::where('$text', ['$search' => "'$data'"])
                ->limit(1)->delete();
            return "Se eliminaron " . $result . " documentos";
        }
    }
}
