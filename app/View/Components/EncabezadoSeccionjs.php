<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EncabezadoSeccionjs extends Component
{
    private $icono;
    private $titulo;     
    private $botontexto;
    private $metodojs;
    private $permisoboton;

    /**
     * Create a new component instance.
     *
     * @param icono: De la forma 'fa fa-address-card', iconos de Font Awesome Free 5.13.0. No es obligatorio
     * @param titulo: No obligatorio
     * @param botontexto: Texto para el boton
     * @param ruta: route. Obligatorio
     * @param permisoboton: Permiso de boton de accion. Obligatorio
     * @return void
     */
    public function __construct($icono="", $titulo="Titulo", $botontexto='haz algo', $metodojs='', $permisoboton='todo')
    {
        $this->titulo = $titulo;        
        $this->icono = $icono;        
        $this->botontexto = $botontexto;
        $this->metodojs = $metodojs;
        $this->permisoboton = $permisoboton;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.encabezado-seccionjs', [
            'icono'=>$this->icono,
            'titulo'=>$this->titulo,
            'botontexto'=>$this->botontexto,
            'metodojs'=>$this->metodojs,
            'permisoboton'=>$this->permisoboton
            ]);          
    }
}
