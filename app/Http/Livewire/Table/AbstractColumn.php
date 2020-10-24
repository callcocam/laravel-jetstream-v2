<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Table;

use App\Http\Livewire\Table\Columns\Traits\Attributes;
use App\Http\Livewire\Table\Columns\Traits\Components;
use App\Http\Livewire\Table\Columns\Traits\HasView;

class AbstractColumn
{
    use  Attributes, Components, HasView;

    /**
     * @param string $type
     * @return mixed
     */
    public function type($type = 'text')
    {
        return $this->__set('type', $type);
    }

    /**
     * @param $name
     * @return AbstractColumn
     */
    public function name($name): self
    {
        return $this->__set('name', $name);
    }

    /**
     * @param $text
     *
     * @return self
     */
    public function text($text): self
    {
        return $this->__set('text', $text);
    }

    /**
     * @param bool $html
     * @return self
     */
    public function html($html=false): self
    {
        return $this->__set('html', $html);
    }

    /**
     * @param bool $hidden
     * @return self
     */
    public function hidden($hidden=true): self
    {
        $this->__set('searchable', false);

        return $this->__set('hidden', $hidden);
    }

    /**
     * @param $width
     *
     * @return self
     */
    public function width($width): self
    {
        return $this->__set('width', $width);
    }

    /**
     * @param $class
     *
     * @return $this
     */
    public function class($class): self
    {
        return $this->__set('class', $class);
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function id($id): self
    {
        return $this->__set('id', $id);
    }

    /**
     * @param $icon
     *
     * @return $this
     */
    public function icon($icon): self
    {
        return $this->__set('icon', $icon);
    }

    /**
     * @param bool $sortable
     * @return $this
     */
    public function sortable($sortable=true): self
    {
        return $this->__set('sortable', $sortable);
    }

    /**
     * @param bool $sortable
     * @return $this
     */
    public function searchable($searchable=true): self
    {
        return $this->__set('searchable', $searchable);
    }


    public function __get($name)
    {
        return $this->{$name};
    }

    public function __set($name, $value)
    {
        $this->{$name} = $value;

        return $this;
    }
}
