<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Button;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{   
    protected $colors = [
        'pink'      => 'Pink',
        'yellow'    => 'Yellow',
        'red'       => 'Red',
        'blue'      => 'Blue',
        'green'     => 'Green',
        'orange'    => 'Orange',
        'purple'    => 'Purple',
        'brown'     => 'Brown',
        'magenta'   => 'Magenta',
        'cyan'      => 'Cyan'
    ];

    public function index()
    {
        $desiredNumOfButtons = 9;
        $buttons = Button::all();

        $currentNumButtons = $buttons->count();
        while ($currentNumButtons < $desiredNumOfButtons) {
            $buttons->push(
                ['id' => null, 'title' => 'Click to add a new link', 'link' => 'create', 'color' => 'gray']
            );
            $currentNumButtons++;
        }
        return view('mainGrid', ['buttons' => $buttons, 'pageTitle' => "Dashboard"]);
    }
    
    public function create()
    {
        $button = (object) ['title' => '', 'link' => '', 'color' => 'pink'];
        return view('form', ['button' => $button, 'colors' => $this->colors, 'pageTitle' => "Create a button", 'buttonText' => "Create"]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:2|max:255',
            'link' => ['required','url','regex:/^https:\/\/.+$/'],
            'color' => 'required|string|min:2|max:255',
        ]);

        if ($validator->fails()) { return redirect()->back()->withErrors($validator)->withInput(); }

        $input = $request->all();
        Button::create($input);
        return redirect()->route('main')->with('success', 'Button successfuly created.');
    }

    public function edit( $id )
    {
        $button = Button::find($id);
        return view('form', ['button' => $button, 'colors' => $this->colors, 'pageTitle' => "Edit a button", 'buttonText' => "Update"]);
    }

    public function chooseButtonToEdit()
    {
        $buttons = Button::all();
        return view('grid', ['buttons' => $buttons, 'pageTitle' => "Choose a button to edit", 'action' => "edit"]);
    }

    public function chooseButtonToDelete()
    {
        $buttons = Button::all();
        return view('grid', ['buttons' => $buttons, 'pageTitle' => "Choose a button to delete", 'action' => "delete"]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:2|max:255',
            'link' => ['required','url','regex:/^https:\/\/.+$/'],
            'color' => 'required|string|min:2|max:255',
        ]);

        if ($validator->fails()) { return redirect()->back()->withErrors($validator)->withInput(); }

        $button = Button::findOrFail($id);

        $button->title = $request->input('title');
        $button->link = $request->input('link');
        $button->color = $request->input('color');
        $button->save();

        return redirect()->route('main')->with('success', 'Button successfully updated.');;
    }

    public function destroy(Request $request, $id)
    {
        $button = Button::findOrFail($id);
        $button->delete(); 
        return redirect()->route('main')->with('success', 'Button successfuly deleted.');;
    }
}