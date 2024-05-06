<?php

namespace App\Http\Controllers;


use App\Models\Book;
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
        $ebooks = Ebook::orderBy('id')->get();
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
        $book = new Book();
        $book->category_id = $request->category_id;
        $book->type = 'ebook';
        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->cover_path = $request->cover_path;

        if($request->status)
            $book->status = $request->status;
        else
            $book->status = 'inactive';

        $book->save();



        $ebook = new Ebook();
        $ebook->type = '/';
        $ebook->book_id = $book->id;
       

        if ($request->file('path')) {
            $request->validate([
                'path' => 'required|mimes:pdf|max:10240', // Maximum 10MB for PDF files
            ]);

            $pdfFile = $request->file('path');
            $pdfFilename = $pdfFile->getClientOriginalName(); // Récupère le nom de fichier d'origine
            $pdfPath = 'pdfs/' . $pdfFilename;

            $pdfContent = file_get_contents($pdfFile);
            Storage::disk('public')->put($pdfPath, $pdfContent);

            $ebook->path = $pdfPath;
            $ebook->save();
        }
        toastr()->success('Ebook created successfully.');


        return to_route('ebook.index')->with('message', 'ebook created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ebook $ebook)
    {
        $filePath = storage_path('app/public/pdfs/' . $ebook->path);

        return response()->download($filePath);
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
        $book = Book::findOrFail($ebook->book->id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->category_id = $request->category_id;
        $book->description = $request->description;
        $book->save;

        if ($request->hasFile('path')) {
            $request->validate([
                'path' => 'required|mimes:pdf|max:10240', // Maximum 10MB for PDF files
            ]);

            $pdfFile = $request->file('path');
            $pdfFilename = $pdfFile->getClientOriginalName(); // Récupère le nom de fichier d'origine
            $pdfPath = 'pdfs/' . $pdfFilename;

            $pdfContent = file_get_contents($pdfFile);
            Storage::disk('public')->put($pdfPath, $pdfContent);

            // Supprimez l'ancien PDF s'il existe
            if ($ebook->path) {
                Storage::disk('public')->delete($ebook->path);
            }

            $ebook->update([
                'path' => $pdfPath,
            ]);
        }
          toastr()->success('Ebook Updated successfully.');


        return to_route('ebook.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ebook $ebook)
    {
        $ebook->delete();
        toastr()->warning('Ebook deleted successfully.');
        return to_route('ebook.index')->with('message', 'Ebook deleted successfully');
    }
}
