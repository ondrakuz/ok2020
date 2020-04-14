<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use \Exception;

class RepositoryBase {

    /**
     * Returns list of records by given WHERE clause of framework Laravel* 
     *
     * @param [type] ...$whereClause
     * @return void
     */
    protected function getMultipleRecords(...$whereClause)
    {
        $this->assertTableIsSet();
        $this->assertColumnsAreSet();
        
        $dataObjects = DB::table($this->table)
        ->where(...$whereClause)
        ->select(array_merge($this->columns, ["id"]))
        ->get();
        return $dataObjects->toArray();
    }
    
    /**
     * Returns only primary keys of records by WHERE clause
     *
     * @param [type] $whereClause
     * @return void
     */
    public function getMultipleRecordsPrimaryKeys($whereClause) {
        return array_map(function($dataObject) {
            return $dataObject->id;
        }, $this->getMultipleRecords($whereClause));
    }
    
    /**
     * Returns list of records by given WHERE clause
     *
     * @param [type] $whereClause
     * @return void
     */
    public function getRecordList($whereClause)
    {
        $dataObjectList = [];
        $recordPKs = $this->getMultipleRecordsPrimaryKeys($whereClause);
        foreach($recordPKs as $pk) {
            $dataObject = $this->getRecord($pk);
            $dataObjectList[] = $dataObject;
        }
        return $dataObjectList;
    }
    
    /**
     * Return one record of defined columns by primary key from defined table
     *
     * @param integer $id
     * @return void
     */
    public function getRecord(int $id)
    {
        $this->assertTableIsSet();
        $this->assertColumnsAreSet();

        $dataObject = (object)DB::table($this->table)
                        ->where("id", $id)
                        ->select($this->columns)
                        ->get();
        return $dataObject;
    }

    /**
     * Does INSERT or UPDATE of record (according to if is primary key in $dataObject)
     *
     * @param object $dataObject
     * @return void
     */
    public function storeRecord(object $dataObject)
    {
        $this->assertTableIsSet();
        $this->assertColumnsAreSet();

        $fields = $this->prepareFieldArray($dataObject);

        if(isset($dataObject->id)) {
            DB::table($this->table)->where("id", $dataObject->id)->update($fields);
            return $dataObject->id;
        } else {
            //return DB::table($this->table)->insertGetId($fields);
            $id = DB::table($this->table)->insertGetId($fields);
            $dataObject->id = $id;
            return $id;
        }
    }

    /**
     * Delete record by primary key
     *
     * @param integer $id
     * @return void
     */
    public function deleteRecord(int $id)
    {
        $this->assertTableIsSet();
        $this->assertColumnsAreSet();

        DB::table($this->table)->where("id", $id)->delete();
    }

    /**
     * Prepare record to save to DB, non-set attributes are automaticaly set to NULL value
     *
     * @param [object] $dataObject
     * @return void
     */
    private function prepareFieldArray($dataObject)
    {
        $fields = [];
        foreach($this->columns as $column) {
            if(isset($dataObject->{$column})) {
                $fields[$column] = $dataObject->{$column};
            } else {
                $fields[$column] = null;
            }
        }
        return $fields;
    }

    /**
     * Check, if is set name of class table
     *
     * @return void
     */
    protected function assertTableIsSet()
    {
        if(isset($this->table) == false)
            throw new Exception("Table name is not specified.");
    }

    /**
     * Check, if is set list of columns 
     *
     * @return void
     */
    private function assertColumnsAreSet()
    {
        if(isset($this->columns) == false)
            throw new Exception("Columns are not specified.");
        if(is_array($this->columns) == false)
            throw new Exception("Columns field is not an array.");
    }
}
