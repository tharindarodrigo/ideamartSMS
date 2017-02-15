<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    private $view;

    public function __construct()
    {
        $this->view = 'control-panel.messages.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd('Hi');
        $messages = Message::all();
        return view($this->view . 'index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new Message();
        $this->validate($request, Message::$rules);

        $message->ascendant_id = $request->ascendant_id;
        $message->date = $request->date;
        $message->message = $request->message;

        if ($message->save()) {
            $request->session()->flash('global', ['class' => 'success', 'message' => 'Created Message Successfully!']);
            return redirect()->route('messages.index');
        }

        $request->session()->flash('global', ['class' => 'danger', 'message' => 'There was an error creating Message']);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $message = Message::findOrFail($id);
            return view($this->view . 'show', compact('message'));
        } catch (ModelNotFoundException $e) {

            session()->flash('global', ['class' => 'danger', 'message' => $e->getMessage()]);
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = Message::findOrFail($id);
        return view('control-panel.messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $this->validate($request, Message::$rules);

            $message = Message::find($id);

            $message->ascendant_id = $request->ascendant_id;
            $message->date = $request->date;
            $message->message = $request->message;

            if ($message->update()) {

                $request->session()->flash('global', ['class' => 'success', 'message' => 'Updated Successfully']);
                return redirect()->route('messages.index');
            }

            $request->session()->flash('global', ['class' => 'danger', 'message' => 'There was an error updating Message']);
            return redirect()->back();

        } catch (ModelNotFoundException $e) {

            $request->session()->flash('global', ['class' => 'danger', 'message' => $e->getMessage()]);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {

            $message = Message::findOrFail($id);

            if ($message->delete()) {
                $request->session()->flash('global', ['class' => 'success', 'message' => 'Successfully deleted record']);

                return redirect()->route('messages.index');
            }

            $request->session()->flash('global', ['class' => 'danger', 'message' => 'There was a problem deleting the record']);
            return redirect()->route('messages.index');

        } catch (ModelNotFoundException $e) {

            $request->session()->flash('global', ['class' => 'danger', 'message' => $e->getMessage()]);
            return redirect()->back();
        }
    }
}
