<?php 
namespace Anzuann\VisitorsCounter\Models;

use Illuminate\Database\Eloquent\Model;


class VisitorsCounter extends Model {
	protected $fillable = ['browserId','userAgent','browserVersion','browserName','os','osVersion'];
}
