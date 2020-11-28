<?php
namespace application\models;
use application\core\Model;
class Main extends Model{
    public $status;
    public $result;
    public function deleteModel($data){
        $params = [
            'id' => $data['id']
        ];
        $this->db->row('CALL delete_drive(:id)', $params);
        $this->result = 'Успешно';
        $this->status = 'success';
    }
    public function insertModel($data){
        $params = [
            'name' => $data['name'],
            'date' => $data['date'],
            'color' => $data['color']
        ];
        $row = $this->db->row('CALL insert_drive(:name, :date, :color)', $params);
        $this->result = $row[0];
        $this->status = 'success';
    }
    public function updateModel($data){
        $params = [
          'id' => $data['id'],
          'name' => $data['name'],
          'date' => date("Y-m-d", strtotime($data['date'])),
          'color' => $data['color']
        ];
        $row=$this->db->row('CALL update_drive(:id, :name, :date, :color)',$params);

        $this->result = $row;
        $this->status = 'success';
    }
    public function selectModel($data){
        if(!is_int($data['order'])){
            $this->result = 'error';
            $this->status = 'success';
            return;
        }
        $params = [
            'order' => $data['order'],
            'limit' => $data['limit'],
            'offset' => $data['offset']
        ];
        $row = $this->db->row('CALL select_drive(:order, :limit, :offset)',$params);
        $this->result = $row;
        $this->status = 'success';
        return;
    }
}