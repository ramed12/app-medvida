<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(){
        return $this->model->get();
    }

    public function allWithPaginate($paginate)
    {
        return $this->model->paginate($paginate);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $key)
    {
        return tap($this->model->find($key))->update($data);
    }

    public function find($key)
    {
        return $this->model->findOrFail($key);
    }

    public function findIn($key, $field = null)
    {
        return $this->model->whereIn(((is_null($field)) ? $this->model->getKeyName() : $field), $key)->get();
    }

    public function whereSimple($field, $value)
    {
        return $this->model->where($field, $value);
    }

    public function first($request, $data)
    {
        $fillable  = $this->model->getFillable();
        $relations = $this->model->getRelations();
        $model     = $this->model;

        foreach ($data as $field => $filter) {

            if (in_array($field, $fillable)) {

                switch ($field) {
                    case 'created_at':
                    case 'updated_at':
                    case 'deleted_at':
                        if ($request->input($field)) {
                            $model->whereDate($field, $filter);
                        }
                        break;
                    case 'name':
                        if ($request->input($field)) {
                            $model->where($field, "like", "%" . $filter . "%");
                        }
                        break;
                    default:
                        if ($request->input($field)) {
                            $model->where($field, $filter);
                        }
                        break;
                }
            } else {
                if ($request->input($field)) {
                    $model->whereRelation($relations[$field][0], $relations[$field][1] . '.' . $field, $filter)->get();
                }
            }
        }

        return $model->first();
    }

    public function list($request, $orderByField = null, $orderByOrder = null, $paginate = null)
    {
        
        $fillable  = $this->model->getFillable();
        $relations = $this->model->getRelations();
        $model     = $this->model->orderBy($orderByField, $orderByOrder);
        foreach ($request->except(['per_page', 'order_by_field', 'order_by_order']) as $field => $filter) {

            if (in_array($field, $fillable)) {

                switch ($field) {
                    case 'created_at':
                    case 'updated_at':
                    case 'deleted_at':
                        if ($request->input($field)) {
                            $model->whereDate($field, $filter);
                        }
                        break;
                    case 'name':
                        if ($request->input($field)) {
                            $model->where($field, "like", "%" . $filter . "%");
                        }
                        break;
                    case 'email':
                        if ($request->input($field)) {
                            $model->where($field, "like", "%" . $filter . "%");
                        }
                        break;
                    default:
                        if ($request->input($field)) {
                            $model->where($field, $filter);
                        }
                        break;
                }
            } else {

                if (isset($relations[$field][0])) {
                    $model->whereRelation($relations[$field][0], $relations[$field][1] . '.' . $field, $filter)->get();
                }
            }
        }

        return (!is_null($paginate) && $paginate > 0) ? $model->paginate($paginate) : $model->get();
    }

    public function destroy($key){
        return tap($this->find($key))->delete();
    }

    public function createOrUpdate($data, $key)
    {
        return $this->model->updateOrCreate([
            $key => $data[$key]
        ], $data);
    }

    public function createWithStorage($data, $file = [], $storage = null)
    {
        
        if(!empty($file)){
            if(count($file) > 0){
                foreach($file as $item){ 
                    if(!empty($item['file'])){
                        $name = $item['file']->getClientOriginalName();
                        $data[$item['name']]->move(public_path("storage/".$storage), time().'-'.$name);
                        $data[$item['name']] = "storage/".$storage."/".time().'-'.$name;
                    }
                }
            }
        }

        return $this->model->create($data);
    }

    public function updateWithStorage($data, $key, $file = [], $storage = null)
    {
        $response = $this->model->find($key);

        if(!empty($file)){
            if(count($file) > 0){
                foreach($file as $item){ 
                    if(!empty($item['file'])){
                        $fillableName = $item['name'];           
                        if (file_exists(public_path($response[$fillableName]))) {
                            unlink(public_path($response[$fillableName]));
                        }
                        if($item['file'] != null){
                            $name = $item['file']->getClientOriginalName();
                            $data[$item['name']]->move(public_path("storage/".$storage), time().'-'.$name);
                            $data[$item['name']] = "storage/".$storage."/".time().'-'.$name;
                        }
                    }
                }
            }

        }

        return $response->update($data);
    }

    public function report($request, $orderByField, $orderByOrder)
    {


        $fillable  = $this->model->getFillable();
        $relations = $this->model->getRelations();
        $model     = $this->model->orderBy($orderByField, $orderByOrder);
        foreach ($request->except(['per_page', 'order_by_field', 'order_by_order']) as $field => $filter) {

            if (in_array($field, $fillable)) {

                switch ($field) {
                    case 'created_at':
                    case 'updated_at':
                    case 'deleted_at':
                        if ($request->input($field)) {
                            $model->whereDate($field, $filter);
                        }
                        break;
                    case 'name':
                        if ($request->input($field)) {
                            $model->where($field, "like", "%" . $filter . "%");
                        }
                        break;
                    default:
                        if ($request->input($field)) {
                            $model->where($field, $filter);
                        }
                        break;
                }
            } else {

                if (isset($relations[$field][0])) {
                    $model->whereRelation($relations[$field][0], $relations[$field][1] . '.' . $field, $filter)->get();
                }
            }
        }

        return $model->get();
    }
}