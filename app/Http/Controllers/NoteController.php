<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    //Show the notes and description
    public function index(){
        //Get all data from note model
        $notes = Note::orderBy('id','desc')->get();

        //Pass the data to the view
        return view('index',compact('notes'));
    }

    //Return to the create note page showing create form
    public function createForm() {
        return view('create_form');
    }

    //Create new note
    public function createNote(Request $request) {
        //validate incoming request data
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        //Create a new note using the validated data
        $note = Note::create([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);

        //Redirect or return response
        return redirect()->route('index')->with('success','Note created successfully');
    
    }

    public function edit($id) {
        //Find the note by its id
        $note = Note::findOrFail($id);

        // Return the edit view with the note data
        return view('edit', compact('note'));
    }

    public function update(Request $request, $id){
    
    // Validate the incoming data
    $validated = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
    ]);

    // Find the note by id and update it
    $note = Note::findOrFail($id);
    $note->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
    ]);
    $note->save(); // Save the changes to the database

    // Redirect back with a success message
    return redirect()->route('index')->with('success', 'Note updated successfully');
    }


    // Delete note

    public function destroy($id)
    {
        // Find the note by ID
        $note = Note::findOrFail($id);

        // Delete the note
        $note->delete();


        // Redirect back to the index page
        return redirect()->route('index')->with('success','Note deleted successfully');
    }



    

}
