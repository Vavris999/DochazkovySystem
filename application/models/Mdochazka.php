<?php
class Mdochazka extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

   function getZamestnanci() {
        $this->db->select('*');
        $this->db->from('osoba');
        $this->db->join('pozice', 'osoba.idPozice=pozice.idPozice', 'inner');      
        $data = $this->db->get()->result();
        return $data;
    }

    function getPozice() {
        $this->db->select('*');
        $this->db->from('pozice');    
        $data = $this->db->get()->result();
        return $data;
    }

    function getPozic($id) {
        $this->db->select('*');
        $this->db->from('pozice');
        $this->db->where('idPozice', $id);
        $data = $this->db->get()->result();
        return $data;
    }

    function getZamestnanec($id) {
        $this->db->select('*');
        $this->db->from('osoba');
        $this->db->join('pozice', 'osoba.idPozice=pozice.idPozice', 'inner');
        $this->db->where('idOsoba', $id);
        $data = $this->db->get()->result();
        return $data;
    }

    function getDochazka($id) {
        $this->db->select('prichodDoPrace,osoba.idOsoba,osoba.jmeno,osoba.prijmeni,odchodZPrace,prichodKLekari,odchodOdLekare,prichodNaObed,odchodZObedu,idDochazka');
        $this->db->from('dochazka');
        $this->db->join('osoba', 'dochazka.idOsoba=osoba.idOsoba', 'right');
        $this->db->order_by('prichodDoPrace', 'ASC');
        $this->db->where('osoba.idOsoba', $id);
        $data = $this->db->get()->result();
        return $data;
    }

    function getDochazkaZamestnance($id) {
        $this->db->select('*');
        $this->db->from('dochazka');
        $this->db->order_by('prichodDoPrace', 'ASC');
        $this->db->where('dochazka.idDochazka', $id);
        $data = $this->db->get()->result();
        return $data;
    }

    function addZamestnanec($jmeno,$prijmeni,$pozice){
         $data = array(
            'jmeno' => $jmeno,
            'prijmeni' => $prijmeni,
            'idPozice' => $pozice
        );
        $this->db->insert('osoba', $data);
    }
    
    function addPozice($pozice){
        $data = array(
           'Nazev' => $pozice
        );
        $this->db->insert('pozice', $data);
    }

    function addDochazka($idOsoba,$prichodDoPrace,$odchodZPrace,$prichodKLekari,$odchodOdLekare,$prichodNaObed,$odchodZObedu){
        $data = array(
            'prichodDoPrace' => $prichodDoPrace,
            'odchodZPrace' => $odchodZPrace,
            'prichodKLekari' => $prichodKLekari,
            'odchodOdLekare' => $odchodOdLekare,
            'prichodNaObed' => $prichodNaObed,
            'odchodZObedu' => $odchodZObedu,
            'idOsoba' => $idOsoba,
        );
        $this->db->insert('dochazka', $data);
    }
    
    function editDochazka($idDochazka,$prichodDoPrace,$odchodZPrace,$prichodKLekari,$odchodOdLekare,$prichodNaObed,$odchodZObedu){
        $data = array(
            'prichodDoPrace' => $prichodDoPrace,
            'odchodZPrace' => $odchodZPrace,
            'prichodKLekari' => $prichodKLekari,
            'odchodOdLekare' => $odchodOdLekare,
            'prichodNaObed' => $prichodNaObed,
            'odchodZObedu' => $odchodZObedu
        );
        $this->db->where('idDochazka', $idDochazka);
        $this->db->update('dochazka', $data);
    }

    public function editZamestnance($id, $jmeno, $prijmeni, $poziceID) {
        $data = array(
            'jmeno' => $jmeno,
            'prijmeni' => $prijmeni,
            'idPozice' => $poziceID,
        );
        $this->db->where('idOsoba', $id);
        $this->db->update('osoba', $data);
    }

    public function editPozice($id, $nazevPozice) {
        $data = array(
            'Nazev' => $nazevPozice
        );
        $this->db->where('idPozice', $id);
        $this->db->update('pozice', $data);
    }
    
    public function delZamestnanec($idZamestnance) {
        $this->db->where('idOsoba', $idZamestnance);
        $this->db->delete('osoba');
    }

    public function delDochazkaZamestnanec($idZamestnance) {
        $this->db->where('idOsoba', $idZamestnance);
        $this->db->delete('dochazka');
        
    }
    public function delDochazka($idDochazka) {
        $this->db->where('idDochazka', $idDochazka);
        $this->db->delete('dochazka');
        
    }
    public function delPozice($idPozice) {
        $this->db->where('idPozice', $idPozice);
        $this->db->delete('pozice');
        
    }

}