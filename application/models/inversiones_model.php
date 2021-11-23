<?php
class Inversiones_model extends CI_Model{
    function listar(){
        $this->db->order_by("inversion_id","desc");
        return $this->db->get("inversiones")->result_array();
    }

    function listarporusuario($usuario_id=""){
        $this->db->where("usuario_id",$usuario_id);
        return $this->db->get("inversiones")->result_array();

    }

    function obtener_ultimo(){
        $this->db->order_by("inversion_id","desc");
        $this->db->limit(1);
        return $this->db->get("inversiones")->row_array();
    }


    function agregar($monto="",$usuario_id="",$nombre=""){

        $this->db->set("monto",$monto);
        $this->db->set("usuario_id",$usuario_id);
        $this->db->set("nombre",$nombre);
        $this->db->insert("inversiones");
    }

    function borrar($inversion_id=""){
        $this->db->where("inversion_id",$inversion_id);
        $this->db->limit(1);
        $this->db->delete("inversiones");
        //return $this->db->affected_rows();
    }

    public function cambiarbalance($inversion_id="",$monto="")
    {
        $this->db->where("inversion_id",$inversion_id);
        $this->db->limit(1);
        $this->db->set("resultado",$monto);
        $this->db->update("inversiones");
    }

    public function traerultima($usuario_id="")
    { $this->db->where("usuario_id",$usuario_id);
        $this->db->order_by("inversion_id","desc");
        $this->db->limit(1);
        return $this->db->get("inversiones")->row_array();
    }


}
?>