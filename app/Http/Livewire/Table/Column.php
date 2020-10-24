<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Table;


use Illuminate\Support\Str;

class Column extends AbstractColumn
{

    public function __construct($text, $name = null)
    {
        $this->type('text');
        $this->text($text);
        $this->sortable(false);
        $this->searchable(false);
        $this->hidden(false);
        $this->class('');
        $this->name( $name ?? Str::snake(Str::lower($text)));
    }

    public static function make($text, $name = null){

       return new static($text, $name);
   }
}
