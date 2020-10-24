<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Table\Columns\Traits;


trait Attributes
{
    protected array $attributes = [];

    /**
     * @param $id
     * @return $this
     */
    public function id($id){

        $this->__set('id', $id);

        return $this;
    }

    /**
     * @param $class
     * @return $this
     */
    public function class($class){

        $this->__set('class', $class);

        return $this;
    }

    /**
     * @param $attribute
     * @param $value
     * @return $this
     */
    protected function setAttribute($attribute, $value){

        $this->attributes[$attribute] = $value;

        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @return array
     */
    public function attribute($key)
    {
        if(isset($this->attributes[$key])){
            return $this->attributes[$key];
        }
       return false;
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     * @return Attributes
     */
    public function setAttributes(array $attributes)
    {
        foreach ($attributes as $key => $value){

            $this->setAttribute($key, $value);
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function isCustomAttribute()
    {
        return false;
    }


}
