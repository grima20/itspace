<?php
namespace application\models;
use application\core\Model;
class Main extends Model{
    public $status;
    public $result;

    public function loadinfo($data){
        $pc = [
            'f1' => isset($data['dist']) ? $data['dist'] : 0,
            'f2' => isset($data['dr'])? date("Y", strtotime($data['dr'])): 1990,
            'f3' => isset($data['voz'])? $data['voz'] : 0,
            'f4' => isset($data['pol'])? $data['pol'] : 0,
            'f5' => isset($data['sem'])? $data['sem'] : 0,
            'f6' => isset($data['naci'])? $data['naci']: 0,
            'f7' => isset($data['obr'])? $data['obr'] : 0,
            'f8' => isset($data['prof'])?$data['prof']:0,
            'f9' => isset($data['rab'])?$data['rab']:0,
            'f10' => isset($data['napen'])? $data['napen']: 0,
            'f11' => isset($data['badrab'])?$data['badrab']:0,
            'f12' => isset($data['smok'])?$data['smok']: 0,
            'f13' => isset($data['smok_time'])? $data['smok_time']:0,
            'f14' =>isset($data['smok_count'])? $data['smok_count']:0,
            'f15' => isset($data['smok_let'])?$data['smok_let']:0,
            'f16' => isset($data['smok_stop'])?$data['smok_stop']: 0,
            'f17' => isset($data['alko'])?$data['alko']: 0,
            'f18' => isset($data['alko_voz'])?$data['alko_voz']:0,
            'f19' => isset($data['alko_razmer'])?$data['alko_razmer']: 0,
            'f20' => isset($data['alko_regu'])?$data['alko_regu']:0,
            'f21' => isset($data['alko_por'])?$data['alko_por']:0,
            'f22' =>isset($data['alko_let'])?$data['alko_let']:0,
            'f23' => isset($data['alko_stop'])?$data['alko_stop']:0,
        ];
        $url = 'http://88.82.169.252:8587?f1='.$pc['f1'].'&f2='.$pc['f2'].'&f3='.$pc['f3'].'&f4='.$pc['f4'].'&f5='.$pc['f5'].'&f6='.$pc['f6'].'&f7='.$pc['f7'].'&f8='.$pc['f8'].'&f9='.$pc['f9'].'&f10='.$pc['f10'].'&f11='.$pc['f11'].'&f11='.$pc['f11'].'&f12='.$pc['f12'].'&f13='.$pc['f13'].'&f14='.$pc['f14'].'&f15='.$pc['f15'].'&f16='.$pc['f16'].'&f17='.$pc['f17'].'&f18='.$pc['f18'].'&f19='.$pc['f19'].'&f20='.$pc['f20'].'&f21='.$pc['f21'].'&f22='.$pc['f22'].'&f23='.$pc['f23'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        $params = [
            '_dist' => isset($data['dist']) ? $data['dist'] : 0,
            '_dr' => isset($data['dr'])? $data['dr'] : 0,
            '_voz' => isset($data['voz'])? $data['voz'] : 0,
            '_pol' => isset($data['pol'])? $data['pol'] : 0,
            '_sem' => isset($data['sem'])? $data['sem'] : 0,
            '_naci' => isset($data['naci'])? $data['naci']: 0,
            '_obr' => isset($data['obr'])? $data['obr'] : 0,
            '_prof' => isset($data['prof'])?$data['prof']:0,
            '_rab' => isset($data['rab'])?$data['rab']:0,
            '_napen' => isset($data['napen'])? $data['napen']: 0,
            '_badrab' => isset($data['badrab'])?$data['badrab']:0,
            '_smok' => isset($data['smok'])?$data['smok']: 0,
            '_smok_time' => isset($data['smok_time'])? $data['smok_time']:0,
            '_smok_count' => isset($data['smok_count'])? $data['smok_count']:0,
            '_smok_let' => isset($data['smok_let'])?$data['smok_let']:0,
            '_smok_stop' => isset($data['smok_stop'])?$data['smok_stop']: 0,
            '_alko' => isset($data['alko'])?$data['alko']: 0,
            '_alko_voz' => isset($data['alko_voz'])?$data['alko_voz']:0,
            '_alko_razmer' => isset($data['alko_razmer'])?$data['alko_razmer']: 0,
            '_alko_regu' => isset($data['alko_regu'])?$data['alko_regu']:0,
            '_alko_por' => isset($data['alko_por'])?$data['alko_por']:0,
            '_alko_let' => isset($data['alko_let'])?$data['alko_let']:0,
            '_alko_stop' => isset($data['alko_stop'])?$data['alko_stop']:0
        ];
        $this->db->row('CALL insert_into_cardio(:_dist, :_dr, :_voz, :_pol, :_sem, :_naci, :_obr, :_prof, :_rab, :_napen, :_badrab, :_smok, :_smok_time, :_smok_count, :_smok_let, :_smok_stop, :_alko, :_alko_voz, :_alko_razmer, :_alko_regu, :_alko_por, :_alko_let, :_alko_stop)', $params);
        return $result;
    }
}