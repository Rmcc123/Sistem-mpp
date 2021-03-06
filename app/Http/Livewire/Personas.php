<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Persona;


class Personas extends Component
{
    //definimos variables
    public $personas, $mostrar,
     $dni, 
     $apepaterno,
     $apematerno, 
     $nombres, 
     $namecomplet, 
     $fechanac, 
     $sexo, 
     $direcreal,
     $departamento,
     $provincia,
     $distrito,
     $celprin,
     $email, 
     $estacivil,
     $profesion,
     $grainstruc,
     $ruc,
     $discapac,
     $estadoreg,
     $observac,
     $id_mostrar,
     $id_persona;
     
    public $modal = false; 
    public $modal1 = false; 
    


    public function render()
    {
        
        $this->personas = Persona::all();
        return view('livewire.personas');
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal()
    {
        $this->modal = true;
    }

    public function cerrarModal()
    {
        $this->modal = false;
    }

    public function abrirModal1()
    {
        $this->modal1 = true;
    }

    public function cerrarModal1()
    {
        $this->modal1 = false;
    }

    public function limpiarCampos()
    {
        $this->dni = '';
        $this->apepaterno = '';
        $this->apematerno = '';
        $this->nombres = '';
        $this->namecomplet = '';
        $this->fechanac = '';
        $this->sexo = '';
        $this->direcreal = '';
        $this->departamento = '';
        $this->provincia = '';
        $this->distrito = '';
        $this->celprin = '';
        $this->email = '';
        $this->estacivil = '';
        $this->profesion = '';
        $this->grainstruc = '';
        $this->ruc = '';
        $this->discapac = '';
        $this->estadoreg = '';
        $this->observac = '';
        $this->id_persona = '';
    }

    public function editar($id)
    {
        $persona = Persona::findOrFail($id);
        $this->id_persona = $id;
        $this->dni = $persona->dni;
        $this->apepaterno = $persona->apepaterno;
        $this->apematerno = $persona->apematerno;
        $this->nombres = $persona->nombres;
        $this->namecomplet = $persona->namecomplet;
        $this->fechanac = $persona->fechanac;
        $this->sexo = $persona->sexo;
        $this->direcreal = $persona->direcreal;
        $this->departamento = $persona->departamento;
        $this->provincia = $persona->provincia;
        $this->distrito = $persona->distrito;
        $this->celprin = $persona->celprin;
        $this->email = $persona->email;
        $this->estacivil = $persona->estacivil;
        $this->profesion = $persona->profesion;
        $this->grainstruc = $persona->grainstruc;
        $this->ruc = $persona->ruc;
        $this->discapac = $persona->discapac;
        $this->estadoreg = $persona->estadoreg;
        $this->observac = $persona->observac;
        $this->abrirModal();

    }

    public function borrar($id)
    {
        Persona::find($id)->delete();
    }

    public function guardar()
    {
        Persona::updateOrCreate(['id'=>$this->id_persona],
            [
                'dni' => $this->dni,
                'apepaterno' => $this->apepaterno,
                'apematerno' => $this->apematerno,
                'nombres' => $this->nombres,
                'namecomplet' => $this->namecomplet,
                'fechanac' => $this->fechanac,
                'sexo' => $this->sexo,
                'direcreal' => $this->direcreal,
                'departamento' => $this->departamento,
                'provincia' => $this->provincia,
                'distrito' => $this->distrito,
                'celprin' => $this->celprin,
                'email' => $this->email,
                'estacivil' => $this->estacivil,
                'profesion' => $this->profesion,
                'grainstruc' => $this->grainstruc,
                'ruc' => $this->ruc,
                'discapac' => $this->discapac,
                'estadoreg' => $this->estadoreg,
                'observac' => $this->observac,
            ]);
        $this->cerrarModal();
        $this->limpiarCampos();

    }
    
    public function detalles($id)
    {
    $persona = Persona::find($id);
    $this->id_persona = $id;
    $this->dni = $persona->dni;
    $this->apepaterno = $persona->apepaterno;
    $this->apematerno = $persona->apematerno;
    $this->nombres = $persona->nombres;
    $this->namecomplet = $persona->namecomplet;
    $this->fechanac = $persona->fechanac;
    $this->sexo = $persona->sexo;
    $this->direcreal = $persona->direcreal;
    $this->departamento = $persona->departamento;
    $this->provincia = $persona->provincia;
    $this->distrito = $persona->distrito;
    $this->celprin = $persona->celprin;
    $this->email = $persona->email;
    $this->estacivil = $persona->estacivil;
    $this->profesion = $persona->profesion;
    $this->grainstruc = $persona->grainstruc;
    $this->ruc = $persona->ruc;
    $this->discapac = $persona->discapac;
    $this->estadoreg = $persona->estadoreg;
    $this->observac = $persona->observac;
    $this->abrirModal1();
    
    }
}
