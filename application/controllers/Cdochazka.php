<?php

class Cdochazka extends CI_Controller {
   public function __construct() {
        parent::__construct();
        $this->load->model('Mdochazka');
        $this->layout->setLayout('layout/layout_main'); 
    }

    //pomocí metody z modelu získá údaje o zaměstnancích 
    public function vypisZamestnancu(){  
        $data["title"] = "Seznam zaměstnanců";
        $data["main"] = "zamestnanci";
        $data['udajeZamestnanec'] = $this->Mdochazka->getZamestnanci();

        $this->layout->generate($data);
    }
    //zobrazí formulář s docházkou zaměstnance
    public function zobrazitDochazku($id){
        $data["title"] = "Docházka zaměstnance";
        $data["main"] = "zobrazitDochazku";
        $data['dochazka'] = $this->Mdochazka->getDochazka($id);
        $this->layout->generate($data);        
    }
   //zobrazí formulář pro přidání docházky zaměstnance
   public function pridatDochazku($id){
        $data["title"] = "Přidat docházku";
        $data["main"] = "pridatDochazku";
        $data['zamestnanec'] = $this->Mdochazka->getZamestnanec($id);

        $this->layout->generate($data);
   }
   
   //odešle údaje pro přidání docházky do modelu
    public function pridejDochazku() {
        $data['idOsoba'] = $this->input->post('idOsoba');
        $data['prichodDoPrace'] = $this->input->post('prichodDoPrace');
        $data['odchodZPrace'] = $this->input->post('odchodZPrace');
        $data['prichodKLekari'] = $this->input->post('prichodKLekari');
        $data['odchodOdLekare'] = $this->input->post('odchodOdLekare');
        $data['prichodNaObed'] = $this->input->post('prichodNaObed');
        $data['odchodZObedu'] = $this->input->post('odchodZObedu');
        $data['pridatDochazku'] = $this->Mdochazka->addDochazka($data['idOsoba'],$data['prichodDoPrace'],$data['odchodZPrace'],$data['prichodKLekari'],$data['odchodOdLekare'],$data['prichodNaObed'],$data['odchodZObedu']);

        $this->session->set_flashdata('pridano','Zaměstnanci '.$data['jmeno']." ".$data['prijmeni']." byla přidána docházka");
        redirect(base_url('vypisZamestnancu'));
    }
    //zobrazí formulář pro úpravu docházky
    public function upravitDochazku($id){
        $data['title'] = 'Upravit dochazku';
        $data['main'] = 'upravitDochazku';
        $data['dochazka'] = $this->Mdochazka->getDochazkaZamestnance($id);

        $this->layout->generate($data);
    }
    
   //odešle údaje pro úpravu docházky do modelu
   public function upravDochazku() {
        $data['idDochazka'] = $this->input->post('idDochazka');
        $data['idOsoba'] = $this->input->post('idOsoba');
        $data['prichodDoPrace'] = $this->input->post('prichodDoPrace');
        $data['odchodZPrace'] = $this->input->post('odchodZPrace');
        $data['prichodKLekari'] = $this->input->post('prichodKLekari');
        $data['odchodOdLekare'] = $this->input->post('odchodOdLekare');
        $data['prichodNaObed'] = $this->input->post('prichodNaObed');
        $data['odchodZObedu'] = $this->input->post('odchodZObedu');
        $data['upravitDochazku'] = $this->Mdochazka->editDochazka($data['idDochazka'],$data['prichodDoPrace'],$data['odchodZPrace'],$data['prichodKLekari'],$data['odchodOdLekare'],$data['prichodNaObed'],$data['odchodZObedu']);

        $this->session->set_flashdata('upraveno','Zaměstnanci byla upravena docházka');
        redirect(base_url('zobrazitDochazku/'.$data['idOsoba']));
    }

    public function smazatDochazku($idDochazky) {
        $this->Mdochazka->delDochazka($idDochazky);
        $this->session->set_flashdata('smazan','Docházka byl smazán');
        redirect(base_url('vypisZamestnancu'));
    }


}

