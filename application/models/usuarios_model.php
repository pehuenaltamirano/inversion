<?php

class Usuarios_model extends CI_Model{

    function verificar($usuario="",$password=""){
        $this->db->select("usuario_id");
        $this->db->where("usuario",$usuario);
        $this->db->where("password",$password); 
        $this->db->limit(1);

        $res=$this->db->get("usuarios");
        if($res->num_rows()){
            $temp=$res->row_array(); //result_array() para muchos resultados
            $this->actualiza_ult_login($temp["usuario_id"]);
            return $temp["usuario_id"];
        }else{
                return false;
        }
    }

    function obtener($usuario_id=""){
        $this->db->where("usuario_id",$usuario_id);
        $this->db->limit(1);
        $res=$this->db->get("usuarios");
        return $res->row_array();
    }


    function nueva($usuario="",$password=""){
            $this->db->set("usuario",$usuario);
            $this->db->set("password",$password);
            $this->db->insert("usuarios");
            return $this->db->instert_id();
    }

    function borrar($usuario_id=""){
            $this->db->where("usuario_id",$usuario_id);
            $this->db->limit(1);
            $this->db->delete("usuarios");
            return $this->db->affected_rows();
    }

    function listar(){
            $this->db->order_by("usuario_id","desc");
            $res=$this->db->get("usuarios");
            return $res->result_array();
    }

    public function actualiza_ult_login($usuario_id=""){
        $this->db->where("usuario_id",$usuario_id);
        $this->db->limit(1);
        $this->db->set("ultlogin","NOW()",false);
        $this->db->update("usuarios");
    }

    public function cambiarpass($idu="",$pw=""){
        $this->db->where("usuario_id",$idu);
        $this->db->limit(1);
        $this->db->set("password",$pw);
        $this->db->update("usuarios");
        redirect("auth");
    }

    public function nombrenuevo($usuario=""){
        $this->db->select("usuario_id");
        $this->db->where("usuario",$usuario); 
        $this->db->limit(1);
        $res=$this->db->get("usuarios");
        if($res->num_rows()){
             $temp=$res->row_array();
             $this->actualiza_ult_login($temp["usuario_id"]);
 
             return $temp["usuario_id"];
        }else{
             return false;
        }
     }

     public function emailnuevo($email=""){
        $this->db->select("usuario_id");
        $this->db->where("email",$email); 
        $this->db->limit(1);
        $res=$this->db->get("usuarios");
        if($res->num_rows()){
             $temp=$res->row_array();
             $this->actualiza_ult_login($temp["usuario_id"]);
 
             return $temp["usuario_id"];
        }else{
             return false;
        }
     }

     function agregarnuevo($usuario="",$password="",$email=""){
        $this->db->set("usuario",$usuario);
        $this->db->set("password",$password);
        $this->db->set("email",$email);
        $this->db->insert("usuarios");
    }

}

?>