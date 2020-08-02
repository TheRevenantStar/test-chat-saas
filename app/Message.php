<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'messages';
  /**
   * The primary key associated with the table.
   *
   * @var string
   */
  protected $primary_key = 'id';
  /**
   * The "type" of the auto-incrementing ID.
   *
   * @var string
   */
  protected $key_type = 'integer';
  /**
   * Indicates if the IDs are auto-incrementing.
   *
   * @var bool
   */
  public $incrementing = true;
  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'guild_id', 'user_id'
  ];
  /**
    * Get the Users that are part of this Guild
    */
  public function user()
  {
    return $this->belongsTo('App\User', 'user_id', 'id');
  }
  /**
    * Get Messages sent to Guild
    */
  public function guild()
  {
    return $this->belongsTo('App\Guild', 'guild_id', 'id');
  }
}
