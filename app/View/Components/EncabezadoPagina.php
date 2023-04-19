<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EncabezadoPagina extends Component
{
    private $icono;
    private $titulo; 
    private $subtitulo;
    private $modoTitulo;
    private $colTitulo;

    /**
     * Create a new component instance.
     *
     * @param icono: De la forma 'fa fa-address-card', iconos de Font Awesome Free 5.13.0. No es obligatorio
     * @param titulo: No obligatorio
     * @param subtitulo: No obligatorio
     * @param modoTitulo: L: En una sola linea (default)
     *                     ML: multiples lineas
     * @param colTitulo: Ancho de la columna segun sistema de grillas de Boostrap de 1 a 12
     *                   El resto de columnas se ajusta para acumular total 12
     *                   Por defecto 8
     * @return void
     */
    public function __construct($icono="", $titulo="Titulo", $subtitulo="Subtitulo", $modoTitulo='L', $colTitulo = 8)
    {
        $this->titulo = $titulo;
        $this->subtitulo = $subtitulo;
        $this->icono = $icono;
        $this->modoTitulo = $modoTitulo;
        $this->colTitulo = $colTitulo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.encabezado-pagina',[
            'icono'      => $this->icono,
            'titulo'     => $this->titulo, 
            'subtitulo'  => $this->subtitulo,
            'modoTitulo' => $this->modoTitulo,
            'colTitulo'  => $this->colTitulo
            ]);
    }
    
}
