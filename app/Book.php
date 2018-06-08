<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Book extends Model
{
	use Sortable;


    protected $fillable = [ 'title', 'author', 'image_url', 'priority', 'publication_date' ];


	public $sortable = ['title', 'author', 'publication_date'];
}