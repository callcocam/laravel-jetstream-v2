<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Table\Columns\Traits;


trait HasView
{

    /**
     * @var
     */
    protected $view;

    /**
     * The name of the model variable passed to the view.
     *
     * @var string
     */
    protected $viewModelName;

    /**
     * @param $view
     * @param  string  $viewModelName
     *
     * @return $this
     */
    public function view($view, $viewModelName = 'model'): self
    {
        if ($this->hasComponents()) {
            return $this;
        }

        $this->view = $view;

        $this->viewModelName = $viewModelName;

        return $this;
    }

    /**
     * @return bool
     */
    public function isView(): bool
    {
        return view()->exists($this->view);
    }

    /**
     * @return string
     */
    public function getViewModelName()
    {
        return $this->viewModelName;
    }
}
