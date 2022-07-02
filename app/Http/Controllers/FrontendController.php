<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\News;
use App\Models\Students;
use App\Models\Pages;
use App\Models\RecommendedPlayer;
use App\Models\Sliders;
use App\Models\Statics;
use App\Models\Subscriber;
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

    public function viewEvent($name, $id)
    {
        $event = Events::find($id);
        return view('frontend.events.view', compact('event'));
    }
    public function players()
    {
        if (request()->has('q') && request()->q !== '') {
            $q = request()->q;
            $players = Students::where('name', 'LIKE', "%$q%")->paginate(50);
        } else {
            $players = Students::paginate(50);
        }

        $pageInfo = Pages::where('page_slug', 'player')->first();
        return view('frontend.players.index', compact('players', 'pageInfo'));
    }
    public function playerProfile($name, $id)
    {
        $player = Students::find($id);
        return view('frontend.players.profile', compact('player'));
    }
    public function leaderboard($id)
    {

        $slug = schoolLevel()->firstWhere('slug', $id);

        $pageInfo = Pages::where('page_slug', 'leader')->first();
        $leaderboards = Students::query();
        $leaderboards->where('school_level', $slug->id);

        $top_exit_velocityx = Students::where('school_level', $slug->id)->with('statics')->get()->map(function ($row) {
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
    public function viewBlogs($name, $id)
    {
        $blog = News::find($id);
        $recentNews = News::orderBy('created_at', "desc")->limit(6)->get();
        return view('frontend.blogs.view', compact('blog', 'recentNews'));
    }
    public function subscribe(Request $request)
    {
        if ($request->method() == 'POST') {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:subscribers'],
            ]);
            $rplayer =  new Subscriber();
            $rplayer->email = $request->email;
            $rplayer->save();
            return "Thank You For Subscribing";
        }
        $pageInfo = Pages::where('page_slug', 'subscribe')->first();
        return view('frontend.subscribe', compact('pageInfo'));
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
