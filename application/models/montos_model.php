
<?php
class montos_model extends CI_Model{
    function listar(){
        $this->db->order_by("monto_id","desc");
        return $this->db->get("montos")->result_array();
    }
    function listarporusuario($usuario_id=""){
        $this->db->where("usuario_id",$usuario_id);
        $this->db->order_by("monto_id","desc");
        return $this->db->get("montos")->result_array();
    }

    function obtener_primero($inversion_id=""){
        $this->db->where("inversion_id",$inversion_id);
        $this->db->order_by("monto_id","asc");
        $this->db->limit(1);
        return $this->db->get("montos")->row_array();
    }

    function obtener_ultimo($inversion_id=""){
        $this->db->where("inversion_id",$inversion_id);
        $this->db->order_by("monto_id","desc");
        $this->db->limit(1);
        return $this->db->get("montos")->row_array();
    }

    function calcular_acumulado($inversion_id=""){
        $primero=$this->obtener_primero($inversion_id);
        $ultimo=$this->obtener_ultimo($inversion_id);
        if($primero and $ultimo){
            if($primero["monto_id"]==$ultimo["monto_id"]){
                return 0;
            }else{
                return $ultimo["monto"]-$primero["monto"];
            }
        }else{
            return 0;
        }
    }

    function agregar($monto=0,$inversion_id="",$usuario_id=""){
        $ultimo=$this->obtener_ultimo($inversion_id);
        if($ultimo){
            $this->db->set("diferencia",$monto-$ultimo["monto"]);
        }else{
            //Es inicio de fondo
            $this->db->set("diferencia",'NULL', false);
        }
        $this->db->set("monto",$monto);
        $this->db->set("inversion_id",$inversion_id);
        $this->db->set("usuario_id",$usuario_id);
        $this->db->insert("montos");
    }

    function borrar($monto_id=0){
        $this->db->where("monto_id",$monto_id);
        $this->db->limit(1);
        $this->db->delete("montos");
        return $this->db->affected_rows();
    }
}
?>