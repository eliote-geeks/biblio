<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ebooks = Ebook::all();
        return view('ebook.ebook', compact('ebooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bookId = $request->book;
        $type = $request->type;

        $ebook = Ebook::create([
            'book_id' => $bookId,
            'type' => $type,
        ]);

        if ($request->file('path')) {
            $request->validate([
                'path' => 'required|mimes:pdf|max:10240', // Maximum 10MB for PDF files
            ]);

            $pdfFile = $request->file('path');
            $pdfFilename = $pdfFile->getClientOriginalName(); // Récupère le nom de fichier d'origine
            $pdfPath = 'pdfs/' . $pdfFilename;

            $pdfContent = file_get_contents($pdfFile);
            Storage::disk('public')->put($pdfPath, $pdfContent);

            $ebook->update([
                'path' => $pdfPath,
            ]);
        }


        return to_route('ebook.index')->with('message', 'ebook created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ebook $ebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ebook $ebook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ebook $ebook)
    {
        $ebook->update($request->all());

        return to_route('ebook.index')->with('message', 'Ebook updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ebook $ebook)
    {
        $ebook->delete();
        return to_route('ebook.index')->with('message', 'Ebook deleted successfully');
    }
}
