<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Table\Columns;

use App\Http\Livewire\Table\AbstractColumn;
use Illuminate\Support\Str;

class Status extends AbstractColumn
{
    public function __construct($text, $name = null)
    {
        $this->type('status');
        $this->view(table_view('status'));
        $this->text($text);
        $this->sortable(true);
        $this->searchable(false);
        $this->hidden(false);
        $this->class('');
        $this->name( $name ?? Str::snake(Str::lower($text)));
    }

    public static function make($text="Status", $name = null){

        return new static($text, $name);
    }
}
