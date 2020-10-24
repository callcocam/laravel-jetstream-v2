<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Traits;


trait Sorting
{
    /**
     * Sorting.
     */

    /**
     * The initial field to be sorting by.
     *
     * @var string
     */
    public $column = 'id';

    /**
     * The initial direction to sort.
     *
     * @var bool
     */
    public $direction = 'asc';

    /**
     * @param $attribute
     */
    public function sort($attribute): void
    {
        if ($this->column !== $attribute) {
            $this->direction = 'asc';
        } else {
            $this->direction = $this->direction === 'asc' ? 'desc' : 'asc';
        }

        $this->column = $attribute;

        $this->updatesQueryString['direction'] = $this->direction;
        $this->updatesQueryString['column'] = $this->column;
    }
}
