<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\EventUser;
use DataTables;
use Yajra\DataTables\Html\Builder;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!request()->type) {
            return redirect('home');
        }
        $events = Events::where('type', request()->type)->get();
        return view('backend.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!request()->type) {
            return redirect('home');
        }
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Events::create([
            'name' => $request->name,
            'type' => $request->type,
            'date' => $request->date,
            'state' => $request->state,
            'location' => $request->location,
            'price_type' => json_encode(array_filter($request->price_type)),
            'price' => json_encode(array_filter($request->price)),
            'description' => $request->description,
        ]);

        return redirect()->route('event.index')->with('message', 'Event Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Builder $builder, $id)
    {
        if (request()->ajax()) {
            return DataTables::of(EventUser::query()->where('event_id', $id))
                ->addIndexColumn()
                ->editColumn('receipt_url', function ($row) {
                    return "<div class=''>
                            <a type='button' class='btn btn-sm rounded-pill btn-outline-youtube' target='_blank' href='$row->receipt_url'>
                             <i class='bx bx-window-open'></i> Open
                            </a>
                          </div>";
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d,M yy, h:m:s A');
                })
                ->rawColumns(['receipt_url'])
                ->toJson();
        }
        $html = $builder->columns([
            [
                'data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => 'SL', 'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
            ],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email'],
            ['data' => 'paid_amount', 'name' => 'paid_amount', 'title' => 'Paid Amount'],
            ['data' => 'paid_for', 'name' => 'paid_for', 'title' => 'Paid For'],
            ['data' => 'receipt_url', 'name' => 'receipt_url', 'title' => 'receipt_url'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Time'],
        ]);
        return view('backend.event.view', compact('html'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Events::find($id);
        return view('backend.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $event = Events::find($id);
        $event->name      = $request['name'];
        $event->price_type      = json_encode(array_filter($request->price_type));
        $event->price      = json_encode(array_filter($request->price));
        $event->date      = $request['date'];
        $event->description = $request['description'];
        $event->state = $request['state'];
        $event->location = $request['location'];

        $event->save();
        return redirect()->route('event.index')->with('message', 'Event Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $event)
    {
        $event->delete();
        return redirect()->back()->with('message', 'Event Deleted Successfully');
    }
}
