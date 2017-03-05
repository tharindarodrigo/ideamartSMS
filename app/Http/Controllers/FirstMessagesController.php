<?php

namespace App\Http\Controllers;

use App\FirstMessage;
use Illuminate\Http\Request;


class FirstMessagesController extends Controller
{
    private $view;

    public function __construct()
    {
        $this->view = 'control-panel.firstMessages.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd('Hi');
        $firstMessages = FirstMessage::all();
        return view($this->view . 'index', compact('firstMessages'));
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
        $firstMessage = new FirstMessage();
        $this->validate($request, FirstMessage::$rules);

        $firstMessage->ascendant_id = $request->ascendant_id;
        $firstMessage->message = $request->message;

        try {
            if ($firstMessage->save()) {
                $request->session()->flash('global', ['class' => 'success', 'message' => 'Created FirstMessage Successfully!']);
                return redirect()->route('first-messages.index');
            }

            $request->session()->flash('global', ['class' => 'danger', 'message' => 'There was an error creating FirstMessage']);
            return redirect()->back();

        } catch (QueryException $e) {
            $request->session()->flash('global', ['class' => 'danger', 'message' => 'Cannot Enter duplicate Entry For same Day']);
            return redirect()->back();
        }
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
            $firstMessage = FirstMessage::findOrFail($id);
            return view($this->view . 'show', compact('firstMessage'));
        } catch (ModelNotFoundException $e) {

            session()->flash('global', ['class' => 'danger', 'message' => $e->getFirstMessage()]);
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
        $firstMessage = FirstMessage::findOrFail($id);
        return view('control-panel.firstMessages.edit', compact('firstMessage'));
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

            $this->validate($request, FirstMessage::$rules);

            $firstMessage = FirstMessage::find($id);

            $firstMessage->ascendant_id = $request->ascendant_id;
            $firstMessage->message = $request->message;

            try {
                if ($firstMessage->update()) {

                    $request->session()->flash('global', ['class' => 'success', 'message' => 'Updated Successfully']);
                    return redirect()->route('first-messages.index');
                }

                $request->session()->flash('global', ['class' => 'danger', 'message' => 'There was an error updating FirstMessage']);
                return redirect()->back();

            } catch (QueryException $e) {
                $request->session()->flash('global', ['class' => 'danger', 'message' => 'Cannot Enter duplicate Entry For same Day']);
                return redirect()->back();
            }


        } catch (ModelNotFoundException $e) {

            $request->session()->flash('global', ['class' => 'danger', 'message' => $e->getFirstMessage()]);
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

            $firstMessage = FirstMessage::findOrFail($id);

            if ($firstMessage->delete()) {
                $request->session()->flash('global', ['class' => 'success', 'message' => 'Successfully deleted record']);

                return redirect()->route('first-messages.index');
            }

            $request->session()->flash('global', ['class' => 'danger', 'message' => 'There was a problem deleting the record']);
            return redirect()->route('first-messages.index');

        } catch (ModelNotFoundException $e) {

            $request->session()->flash('global', ['class' => 'danger', 'message' => $e->getFirstMessage()]);
            return redirect()->back();
        }
    }

}
