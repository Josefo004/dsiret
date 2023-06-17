<?php

namespace App\Http\Controllers\Estadisticas;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        function procesarD(&$lista, $tt){
            foreach ($lista as $item) {
                //$person->edad=Carbon::parse($person->fecha_nac)->age;
                $item->porcentaje = ($item->total*100)/$tt;
            }
        }
        $formsTotal = Form::count();
        $formsByGenero = DB::select("SELECT gen.gen_descripcion as descripcion, COUNT(per.gender_id) as total
        FROM forms frm, persons per, genders gen
        WHERE frm.person_id = per.id AND
              per.gender_id = gen.id
        GROUP BY gen.gen_descripcion;");

        $formsByMunicipio = DB::select("SELECT mun.mun_descripcion as descripcion, COUNT(per.municipio_id) as total
        FROM forms frm, persons per, municipios mun
        WHERE frm.person_id = per.id AND
              per.municipio_id = mun.id
        GROUP BY mun.mun_descripcion;");

        $formsByNivelE = DB::select("SELECT rec.for_descripcion as descripcion, COUNT(frm.person_id) as total
        FROM forms frm, records rec
        WHERE frm.record_id = rec.id
        GROUP BY rec.for_descripcion;");

        $formsByLanguaje = DB::select("SELECT lan.descripcion as descripcion, COUNT(frm.id) as total
        FROM forms frm, forms_languages frl, languages lan
        WHERE frm.id = frl.form_id AND
              frl.language_id = lan.id AND
              frl.language_id = (SELECT fll.language_id FROM forms_languages fll WHERE fll.form_id = frm.id ORDER by fll.id ASC LIMIT 1)
        GROUP BY lan.descripcion;");

        $formsByOcupaciones = DB::select("SELECT pro.pro_descripcion as descripcion, COUNT(frm.id) as total
        FROM forms frm, forms_professions frp, professions pro
        WHERE frm.id = frp.form_id AND
              frp.profession_id = pro.id AND
              frp.profession_id = (SELECT fpp.profession_id FROM forms_professions fpp WHERE fpp.form_id = frm.id ORDER by fpp.id ASC LIMIT 1)
        GROUP BY pro.pro_descripcion;");

        $formsByEdad = DB::select("SELECT
        CASE WHEN ((YEAR(frm.created_at)-YEAR(per.fecha_nac) + IF(DATE_FORMAT(frm.created_at,'%m-%d') > DATE_FORMAT(per.fecha_nac,'%m-%d'), 0 , -1 )) BETWEEN 0 AND 17) THEN 'De 0 a 17 años' ELSE
            CASE WHEN ((YEAR(frm.created_at)-YEAR(per.fecha_nac) + IF(DATE_FORMAT(frm.created_at,'%m-%d') > DATE_FORMAT(per.fecha_nac,'%m-%d'), 0 , -1 )) BETWEEN 18 AND 25) THEN 'De 18 a 25 años' ELSE
                CASE WHEN ((YEAR(frm.created_at)-YEAR(per.fecha_nac) + IF(DATE_FORMAT(frm.created_at,'%m-%d') > DATE_FORMAT(per.fecha_nac,'%m-%d'), 0 , -1 )) BETWEEN 26 AND 32) THEN 'De 26 a 32 años' ELSE
                    CASE WHEN ((YEAR(frm.created_at)-YEAR(per.fecha_nac) + IF(DATE_FORMAT(frm.created_at,'%m-%d') > DATE_FORMAT(per.fecha_nac,'%m-%d'), 0 , -1 )) BETWEEN 33 AND 40) THEN 'De 33 a 40 años' ELSE
                        CASE WHEN ((YEAR(frm.created_at)-YEAR(per.fecha_nac) + IF(DATE_FORMAT(frm.created_at,'%m-%d') > DATE_FORMAT(per.fecha_nac,'%m-%d'), 0 , -1 )) BETWEEN 41 AND 50) THEN 'De 41 a 50 años' ELSE
                            CASE WHEN ((YEAR(frm.created_at)-YEAR(per.fecha_nac) + IF(DATE_FORMAT(frm.created_at,'%m-%d') > DATE_FORMAT(per.fecha_nac,'%m-%d'), 0 , -1 )) > 50) THEN 'De mas de 50 años'
                            END
                        END
                    END
                END
            END
        END descripcion,
        COUNT(frm.id) as total
        FROM forms frm, persons per
        WHERE frm.person_id = per.id
        GROUP BY descripcion;");

        procesarD($formsByGenero,$formsTotal);
        procesarD($formsByMunicipio,$formsTotal);
        procesarD($formsByNivelE,$formsTotal);
        procesarD($formsByLanguaje,$formsTotal);
        procesarD($formsByOcupaciones,$formsTotal);
        procesarD($formsByEdad,$formsTotal);

        // @dump($formsTotal);
        // @dump($formsByGenero);
        // @dump($formsByMunicipio);
        // @dump($formsByNivelE);
        // @dump($formsByLanguaje);
        // @dump($formsByOcupaciones);
        // @dump($formsByEdad);
        return view('estadisticas.index', compact('formsTotal','formsByGenero','formsByMunicipio','formsByNivelE','formsByLanguaje','formsByOcupaciones','formsByEdad') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
