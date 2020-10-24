<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Traits;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

trait Select
{

    protected $builder;

    abstract  public function columns();

    public function actions(){
        return [];
    }

    public function filter(){
        $builder = $this->query();
        //INICIA O FILTRO
        if ($this->searchEnabled && in_array($this->search_query,array_keys($this->updatesQueryString)) && !empty(trim($this->updatesQueryString[$this->search_query]))) {

            $builder->where(function (Builder $builder) {
                foreach ($this->columns() as $column) {
                    if (!is_string($column) && $column->searchable) {
                        if  (Str::contains($column->name, '.')) {
                            $relationship = $this->relationship($column->name);

                            $builder->orWhereHas($relationship->attribute, function (Builder $builder) use ($relationship) {

                                $builder->where($relationship->attribute, 'like', '%'.$this->updatesQueryString[$this->search_query].'%');
                            });
                        } else {
                            $builder->where($builder->getModel()->getTable().'.'.$column->name, 'like', '%'.$this->updatesQueryString[$this->search_query].'%');
                        }
                    }

                }
            });
        }
        //FINALIZA O FILTRO

        $column = $this->getUpdatesQueryString('column', 'created_at');

        $direction = $this->getUpdatesQueryString('direction', 'desc');

        if (Str::contains($column, '.')) {

            $relationship = $this->relationship($column);

            $column = $this->attribute($builder, $relationship->attribute, $relationship->attribute);

        } else {

            $column = sprintf('%s.%s',$this->getTable(),$column);

        }

        if($this->paginationEnabled):
            $results = $builder->orderBy($column, $direction)->paginate($this->getUpdatesQueryString($this->perPageName),["*"], $this->pageName);
        else:
            $results = $builder->orderBy($column, $direction)->get();
        endif;

        return $results;
    }


    protected function getUpdatesQueryString($key, $default=null){

        if(isset($this->updatesQueryString[$key]))
            return $this->updatesQueryString[$key];

        return $default;
    }
    private function getTable(){

        return $this->query()->getModel()->getTable();
    }
}
