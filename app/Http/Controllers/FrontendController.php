<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\News;
use App\Models\Students;
use App\Models\Pages;
use App\Models\RecommendedPlayer;
use App\Models\Sliders;
use App\Models\Statics;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class FrontendController extends Controller
{
    public function index()
    {
        $events = Events::where('date', '>=', Carbon::now()->toDateTimeString())->where('type', 'showcase')->orderBy('date', 'asc')->take(5)->get();
        $sliders = Sliders::all();
        $news = News::where('is_featured', true)->orderBy('created_at', "desc")->limit(4)->get();
        $pageInfo = Pages::where('page_slug', 'home')->first();
        return view('frontend.index', compact('events', 'news', 'pageInfo', 'sliders'));
    }

    public function events($type)
    {
        $events = Events::where('type', $type)->where('date', '>=', Carbon::now()->toDateTimeString())->orderBy('date', 'asc')->paginate(20);
        $pageInfo = Pages::where('page_slug', 'event')->first();
        // dd($pageInfo->title);
        return view('frontend.events.index', compact('events', 'pageInfo'));
    }

    public function viewEvent($id)
    {
        $event = Events::find($id);
        return view('frontend.events.view', compact('event'));
    }
    public function players()
    {
        $players = Students::paginate(50);
        $pageInfo = Pages::where('page_slug', 'player')->first();
        return view('frontend.players.index', compact('players', 'pageInfo'));
    }
    public function playerProfile($id)
    {
        $player = Students::find($id);
        return view('frontend.players.profile', compact('player'));
    }
    public function leaderboard($id)
    {

        $pageInfo = Pages::where('page_slug', 'leader')->first();
        $leaderboards = Students::query();
        $leaderboards->where('school_level', $id);

        // $top_exit_velocity = Students::with('statics')->get()->sortBy('statics.top_cb_velocity');
        // $top_exit_velocity = Students::with('statics')->get()->map(function ($row) {
        //     $data = new Collection();
        //     $xdata
        //     $collection = collect([
        //         ['id' => $row->id, 'age' => (int)($row->statics->top_exit_velocity)],

        //     ]);
        //     $data->push($row->id, (int)($row->statics->top_exit_velocity));
        //     return $data;
        // });
        $top_exit_velocityx = Students::where('school_level', $id)->with('statics')->get()->map(function ($row) {
            $xdata = array();
            array_push($xdata, ['id' => $row->id, 'top_exit_velocity' => (int)($row->statics->top_exit_velocity), 'data' => $row, 'statics' => $row->statics]);
            $collection = collect($xdata);
            return $collection->all()[0];
        });
        $top_exit_velocity = collect($top_exit_velocityx->sortBy([['top_exit_velocity', 'desc']])->take(15));

        return view('frontend.leaderboard.index', compact('leaderboards', 'pageInfo', 'top_exit_velocity'));
    }
    public function blogs()
    {
        $pageInfo = Pages::where('page_slug', 'news')->first();
        $blogs = News::latest()->paginate(20);
        return view('frontend.blogs.index', compact('pageInfo', 'blogs'));
    }
    public function viewBlogs($id)
    {
        $blog = News::find($id);
        $recentNews = News::orderBy('created_at', "desc")->limit(6)->get();
        return view('frontend.blogs.view', compact('blog', 'recentNews'));
    }
    public function subscribe()
    {

        return view('frontend.subscribe');
    }
    public function privacyPolicy()
    {
        $pageInfo = Pages::where('page_slug', 'policy')->first();
        return view('frontend.policy', compact('pageInfo'));
    }
    public function tos()
    {
        $pageInfo = Pages::where('page_slug', 'tos')->first();

        return view('frontend.tos', compact('pageInfo'));
    }
    public function recommendPlayer(Request $request)
    {
        if ($request->method() == 'POST') {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:recommended_players'],
                'by' => ['required', 'string', 'email'],

            ]);
            $rplayer =  new RecommendedPlayer();
            $rplayer->email = $request->email;
            $rplayer->name = $request->name;
            $rplayer->by = $request->by;
            $rplayer->save();
            return "Thank you for recommending the player";
        }
        $pageInfo = Pages::where('page_slug', 'recommend-a-player')->first();

        return view('frontend.recommendPlayer', compact('pageInfo'));
    }
    public function aboutUs()
    {
        $pageInfo = Pages::where('page_slug', 'aboutus')->first();
        $blogs = News::latest()->paginate(20);
        return view('frontend.aboutus', compact('pageInfo', 'blogs'));
    }
}
