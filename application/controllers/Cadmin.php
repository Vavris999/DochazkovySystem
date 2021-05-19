<?php 
class Cadmin extends CI_Controller {
   public function __construct() {
        parent::__construct();
        $this->load->model('Mdochazka');
        $this->layout->setLayout('layout/layout_admin');
       
    }
    //vypíše zaměstnance
    public function vypisZamestnancuAdmin(){  
        $data["title"] = "Seznam zaměstnanců";
        $data["main"] = "zamestnanciAdmin";
        $data['udajeZamestnanec'] = $this->Mdochazka->getZamestnanci();

        $this->layout->generate($data);
    }
    //vypíše pozice
    public function vypisPozic(){  
        $data["title"] = "Seznam pozic";
        $data["main"] = "pozice";
        $data['pozice'] = $this->Mdochazka->getPozice();

        $this->layout->generate($data);
    }

    //zobrazí formulář pro přidaní pozice
    public function pridatPozici() {
        $data["title"] = "Přidat pozici";
        $data["main"] = "pridatPozici";

        $this->layout->generate($data);
    }
    //zobrazí formulář pro úpravu pozice
    public function upravitPozici($id){
        $data['title'] = 'Upravit pozici';
        $data['main'] = 'upravitPozici';
        $data['pozice'] = $this->Mdochazka->getPozic($id);

        $this->layout->generate($data);
   }
   //pošle data do modelu, který upraví pozici v databázi
   public function upravPozici(){
        $this->Mdochazka->editPozice($this->input->post('idPozice'),$this->input->post('Nazev'));
        $this->session->set_flashdata('upraven',"Pozice byla upravena");
        redirect(base_url('vypisPozic'));
}

      //odešle hodnoty pro přidání pozice do modelu
      public function pridejPozici() {
        $data['pozice'] = $this->input->post('pozice');
        $data['pridatPozici'] = $this->Mdochazka->addPozice($data['pozice']);

        $this->session->set_flashdata('pridano','Byla přidána pozice: '.$data['pozice']);
        redirect(base_url('vypisPozic'));
    }

    //zobrazí formulář pro přidaní zaměstnance
    public function pridatZamestnance() {
        $data["title"] = "Přidat zaměstnance";
        $data["main"] = "pridatZamestnance";
        $data['pozice'] = $this->Mdochazka->getPozice();

        $this->layout->generate($data);
    }
    //odešle hodnoty pro přidání zaměstnance do modelu
    public function pridejZamestnance() {
        $data['jmeno'] = $this->input->post('jmeno');
        $data['prijmeni'] = $this->input->post('prijmeni');
        $data['idPozice'] = $this->input->post('idPozice');
        $data['pridatZamestnance'] = $this->Mdochazka->addZamestnanec($data['jmeno'],$data['prijmeni'],$data['idPozice']);

        $this->session->set_flashdata('pridano','Byl přidán zaměstnanec: '.$data['jmeno']." ".$data['prijmeni']);
        redirect(base_url('vypisZamestnancuAdmin'));
    }
    //smaže zamestnance
    public function smazatZamestnance($idZamestnance) {
        $this->Mdochazka->delDochazkaZamestnance($idZamestnance);
        $this->Mdochazka->delZamestnanec($idZamestnance);
        $this->session->set_flashdata('smazan','Zaměstnanec byl smazán');
        redirect(base_url('vypisZamestnancuAdmin'));
    }
    //smaže zamestnance
    public function smazatPozici($idPozice) {
        $this->Mdochazka->delPozice($idPozice);
        $this->session->set_flashdata('smazan','Pozice byla smazána');
        redirect(base_url('vypisPozic'));
    }
    //zobrazí formulář pro úpravu zaměstnance
    public function upravitZamestnance($id){
        $data['title'] = 'Upravit zaměstnance';
        $data['main'] = 'upravitZamestnance';
        $data['pozice'] = $this->Mdochazka->getPozice();
        $data['zamestnanec'] = $this->Mdochazka->getZamestnanec($id);

        $this->layout->generate($data);
   }
   //pošle data do modelu, který upraví zaměstnance v databázi
   public function upravZamestnance(){
        $this->Mdochazka->editZamestnance($this->input->post('idOsoba'),$this->input->post('jmeno'), $this->input->post('prijmeni'), $this->input->post('idPozice'));
        $this->session->set_flashdata('upraven',"Zaměstnanec byl upraven");

        redirect(base_url('upravitZamestnance/' . $this->input->post('idOsoba')));
   }



}