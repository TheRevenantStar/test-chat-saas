<?php

namespace App\Http\Controllers;

use App\Guild;
use App\Message;
use App\User;
use Auth;
use Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
  /**
   * Create a new controller instance, with Auth middleware.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the chat dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    return view('home');
  }

  /**
   * Get JSON of Guilds
   *
   * @return Response
   */
  public function guilds(Request $request)
  {
    return Guild::all()
      ->where( 'user_id', Auth::user()->id )
      ->mapWithKeys(function ($item){
        return [$item['id'] => $item ];
      })
      ->toJson();
  }

  /**
   * Get JSON of Guild's Messages
   *
   * @return Response
   */
  public function guildMessages(Request $request, string $guild)
  {
    return Message::all()
      ->where( 'guild_id', $guild )
      ->sortBy('created_at')
      ->toJson();
  }

  /**
   * Send Message to Guild
   *
   * @param Request $request
   * @param string $guild guild from URL
   * @return Response
   */
  public function messageSend(Request $request, string $guild)
  {
    // IRL we'd do error checking here (malformed, invalid, etc).
    // IRL we'd check that the sending user is actually in this guild.
    $msg = new App\Message;
    $msg->user_id = Auth::user()->id;
    $msg->guild_id = $guild;
    $msg->content = $request->input('content');
    $msg->save();
    Event::fire('tcsaas.messageSent', [$msg]);
  }
}
