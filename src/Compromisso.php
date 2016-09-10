<?php

namespace agenda;
use agenda\Controller;

class Compromisso extends Controller{
    
    public function getLista($request, $response, $args){
        $sql = "SELECT * FROM compromisso";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $todos ='{"result":'. json_encode($stmt->fetchAll()).'}';
    
    return $todos;
    }
    
    public function getBusca($request, $response, $args){
         $sql = "SELECT * FROM compromisso where id =:id";
         $stmt = $this->db->prepare($sql);
         $stmt->bindParam("id",$args["id"]);
         $stmt->execute();
         $todos ='{"result":'. json_encode($stmt->fetchObject()).'}';
    
    return $todos;
    }
    
    public function excluir($request, $response, $args){
        $sql = "DELETE FROM compromisso WHERE id =:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam("id",$args["id"]);
        $stmt->execute();
        $todos ='{"result":'. json_encode("excluído com sucesso").'}';
    
    return $todos;
    }
    
    public function salvar($request, $response, $args){
        $agenda = json_decode($request->getBody());
     if($agenda->id!="")
         $sql = "UPDATE compromisso SET titulo=:titulo, descricao=:descricao, data=:data, hora=:hora where id = :id";
     else
        $sql = "INSERT INTO compromisso (titulo, descricao, data, hora) VALUES (:titulo, :descricao, :data, :hora)"; 

        try{
          $this->db->beginTransaction();
          $stmt = $this->db->prepare($sql);
          if($agenda->id!="")
            $stmt->bindParam("id", $agenda->id);
          $stmt->bindParam("titulo", $agenda->titulo);
          $stmt->bindParam("descricao", $agenda->descricao);
          $stmt->bindParam("data", $agenda->data);
          $stmt->bindParam("hora", $agenda->hora);
          $stmt->execute();
       
            $this->db->commit(); 
            return "ok";
        } catch (Exception $ex) {
            $this->db->roolback();
            throw new Exception($ex->getMessage());
        }
    }
}

