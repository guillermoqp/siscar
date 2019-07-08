<?php Class Vacaciones_model extends CI_Model {
    /*Read the data from DB */
    public function getEvents($inicio,$fin,$fk_dominio) {
        $sql = "SELECT * FROM vacaciones WHERE vacaciones.start BETWEEN ? AND ? AND fk_dominio = ? ORDER BY vacaciones.start ASC";
        return $this->db->query($sql,array($inicio,$fin,$fk_dominio))->result();
    }
    /*Create new vacaciones */
    public function addEvent($nombre,$inicio,$fin,$descripcion,$color,$allDay,$fk_dominio,$fk_empleado) {
        $sql = "INSERT INTO vacaciones (title,vacaciones.start,vacaciones.end,description, color, allDay, fk_dominio, fk_empleado) VALUES (?,?,?,?,?,?,?,?)";
        $this->db->query($sql, array($nombre,$inicio,$fin,$descripcion,$color,$allDay,$fk_dominio,$fk_empleado));
        return ($this->db->affected_rows()!=1)?false:true;
    }
    /*Update  event */
    public function updateEvent($nombre,$descripcion,$color,$id_vacaciones,$fk_empleado) {
        $sql = "UPDATE vacaciones SET title = ?, description = ?, color = ?, fk_empleado = ? WHERE id = ?";
        $this->db->query($sql, array($nombre,$descripcion,$color,$fk_empleado,$id_vacaciones));
        return ($this->db->affected_rows()!=1)?false:true;
    }
    /*Delete event */
    public function deleteEvent($id_vacaciones) {
        $sql = "DELETE FROM vacaciones WHERE id = ?";
        $this->db->query($sql, array($id_vacaciones));
        return ($this->db->affected_rows()!=1)?false:true;
    }
    /*Update  event */
    public function dragUpdateEvent($inicio,$fin,$id_vacaciones) {
        //$date=date('Y-m-d h:i:s',strtotime($_POST['date']));
        $sql = "UPDATE vacaciones SET  vacaciones.start = ? ,vacaciones.end = ? WHERE id = ?";
        $this->db->query($sql, array($inicio,$fin,$id_vacaciones));
        return ($this->db->affected_rows()!=1)?false:true;
    }
}