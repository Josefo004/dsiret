<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Encabezado extends Component
{
    private $icono;
    private $titulo; 
    private $subtitulo;
    private $migadepan;    

    /**
     * Create a new component instance.
     *
     * @param icono: De la forma 'fa fa-address-card', iconos de Font Awesome Free 5.13.0. No es obligatorio
     * @param titulo: No obligatorio
     * @param subtitulo: No obligatorio
     * @param migadepan: de la forma 'roles' declarado en archivo routes/breadcrumbs, si no se desea 
     *                   mostrar, deja vacio Ej.: ''
     * @return void
     */
    public function __construct($icono="", $titulo="Titulo", $subtitulo="Subtitulo", $migadepan='')
    {
        $this->titulo = $titulo;
        $this->subtitulo = $subtitulo;
        $this->icono = $icono;
        $this->migadepan = $migadepan;                
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.encabezado',['icono'=>$this->icono,'titulo'=>$this->titulo, 'subtitulo'=>$this->subtitulo, 'migadepan'=>$this->migadepan]);
    }
}
