<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Guild extends Model
{
  use Notifiable;
  use SoftDeletes;
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'guilds';
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
      'user_id', 'display_name'
  ];
  /**
    * Get the Users that are part of this Guild
    */
  public function users()
  {
    return $this->hasMany('App\User');
  }
  /**
    * Get Messages sent to Guild
    */
  public function messages()
  {
    return $this->hasMany('App\Message');
  }
}
