<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Table\Components;

use App\Http\Livewire\Table\Component;

use App\Http\Livewire\Table\Traits\WithParameters;

class Delete extends Component
{
    use WithParameters;
    /**
     * Link constructor.
     *WithParameters.php
     * @param $text
     */
    public function __construct($text = false)
    {
        if ($text) {
            $this->options['text'] = $text;
        }

        $this->class('cursor-pointer ml-6 text-sm text-red-500 focus:outline-none');
    }

    /**
     * @param $text
     *
     * @return self
     */
    public static function make($text = false): self
    {
        return new static($text);
    }

    /**
     * @param $text
     *
     * @return self
     */
    public function text($text): self
    {
        return $this->setAttribute('text', $text);
    }

    /**
     * @param $class
     *
     * @return $this
     */
    public function class($class): self
    {
        return $this->setAttribute('class', $class);
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function id($id): self
    {
        return $this->setAttribute('id', $id);
    }

    /**
     * @param $icon
     *
     * @return $this
     */
    public function icon($icon): self
    {
        return $this->setOption('icon', $icon);
    }

    /**
     * @param $href
     *
     * @return $this
     */
    public function href($href): self
    {
        return $this->setAttribute('href', $href);
    }

    /**
     * @return string
     */
    public function view(): string
    {
        return table_view('delete');
    }
}
