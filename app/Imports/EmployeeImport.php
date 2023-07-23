<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Temporary;
use App\Post;
use App\Pension_branch;
use App\Eps;
use App\Arl;
use App\Enterprise;
use App\DocumentType;
use App\Contry;
use App\Departament;
use App\City;

/* Ejemplo de archivo *.xlsx  o csv para importar empleados      2022.nov.28

name	,lastname	,id_document_type,	document_number,	telephone,	email,	sex,	address,	sangre,	id_eps,	id_arl,	id_country,	id_departament,	id_city,	post,	afiliation_date_eps,	afiliation_date_arl,	id_enterprise,	id_pension
Prof. Brenden Welch III	, Eduardo Grimes,	CC,	60306814,	632654,	Leann Heaney,	M,	Dr. Annamae Hessel PhD,	O +,	Nueva Eps,	Sura,	COLOMBIA,	NORTE DE SANTANDER,	CUCUTILLA,	INGENIERO,	2022-01-01,	2022-01-15,	REDSUELVA,	PORVENIR
Marianna Corwin	, Zena Keeling,	CC,	60306815,	632654,	Dr. Flo Hodkiewicz,	M,	Chaz Eichmann MD,	A +,	Cruz Verde,	Sura,	COLOMBIA,	NORTE DE SANTANDER,	CUCUTA,	TESTER,	2022-01-02,	2022-01-14,	REDSUELVA,	PORVENIR
Rubye Gerlach	, Humberto Mosciski,	CC,	60306816,	632654,	Jamal Walsh,	M,	Ardith Dicki,	-,	Nueva Eps,	Sura,	COLOMBIA,	NORTE DE SANTANDER,	PAMPLONA,	TECNICO,	2022-01-03,	2022-01-13,	REDSUELVA,	PORVENIR

*/

class EmployeeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        global $fileerror, $line, $good, $bad;



        $line = $line + 1;

        $merr='';
        if ( $row['name']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Nombre  vacio"."\n"; }
        if ( $row['lastname']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Apellido  vacio"."\n"; }
        if ( $row['telephone']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Teléfono  vacio"."\n"; }

/*
            Valida si existe el registro en la tabla de paises y ciudades
*/

        $mdocumenttype   = strtoupper( $row['id_document_type'] );
        if ( is_null($mdocumenttype) || $mdocumenttype=='' )
            {
                $iddocumenttype['id']  = 1;
                $mdocumenttype   = "-";
            }

        $mdocumenttype = strtoupper( $row['id_document_type'] );
        if ( !( $iddocumenttype = DocumentType::where( 'name', '=', $mdocumenttype )->first() ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Tipo documento no existe"."\n"; }


        $mcargo   = strtoupper( $row['namepost'] );
        if ( is_null($mcargo) || $mcargo=='' )
            {
                $idcargo['id']  = 1;
                $mcargo   = "-";
            }

        if ( !( $idcargo = Post::where( 'namepost', '=', $mcargo )->first() ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Cargo no existe"."\n"; }

        $mid_pension   = strtoupper( $row['id_pension'] );
        if ( is_null($mid_pension) || $mid_pension=='' )
            {
                $idpension['id']  = 1;
                $mid_pension   = "-";
            }

        if ( !( $idpension = Pension_branch::where( 'pension', '=', $mid_pension )->first() ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['id_pension']." Pension no existe"."\n"; }

        $mcargo   = strtoupper( $row['namepost'] );
        if ( is_null($mcargo) || $mcargo=='' )
            {
                $idcargo['id']  = 1;
                $mcargo   = "-";
            }

        if ( !( $idcargo = Post::where( 'namepost', '=', $mcargo )->first() ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Cargo no existe"."\n"; }

        $meps   = strtoupper( $row['id_eps'] );
        if ( is_null($meps) || $meps=='' )
            {
                $ideps['id']  = 1;
                $meps   = "-";
            }

        if ( !( $ideps = Eps::where( 'name', '=', $meps )->first() ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Eps no existe"."\n"; }

        $marl   = strtoupper( $row['id_arl'] );
        if ( is_null($marl) || $marl=='' )
            {
                $idarl['id']  = 1;
                $marl   = "-";
            }

        if ( !( $idarl = Arl::where( 'name', '=', $marl )->first() ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Arl no existe"."\n"; }

        $idsangre = strtoupper( $row['sangre'] );


// dd( $ideps['id'] );
        $menterprise   = strtoupper( $row['id_enterprise'] );
        if ( is_null($menterprise) || $menterprise=='' )
            {
                $identerprise['id']  = 1;
                $menterprise   = "-";
            }

        if ( !( $identerprise = Enterprise::where( 'name_enterprise', '=', $menterprise )->first() ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['id_enterprise']." Empresa no existe"."\n"; }

        $idcountry=0;
        $iddepartament=0;
        $idcity=0;

        $midcountry   = strtoupper( $row['id_country'] );
        if ( !( $idcountry = Contry::where( 'name', '=', $midcountry )->first() ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Pais no existe"."\n"; }

        $middepartament   = strtoupper( $row['id_departament'] );
        if ( !( $iddepartament = Departament::where( 'name', '=', $middepartament )->first() ) )
           { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Departamento no existe"."\n"; }

        $midcity   = strtoupper( $row['id_city'] );
        if ( !( $idcity = City::where( 'name', '=', $midcity )->first() ) )
           { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Ciudad no existe"."\n"; }
//dd( $midcity , $idcity['id'] );

        if ( $midcountry!='-' && $midcity!='-' && !( $u = City::join('departaments','departaments.id','=','citys.id_departament')
            ->join('contrys','contrys.id', '=', 'departaments.id_contry')
           ->where('contrys.name','=',$midcountry)
           ->Where('citys.name','=',$midcity)->first() ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." ciudad no pertenece a Pais"."\n"; }

        if ( $middepartament!='-' && !( $iddepartament = Contry::join('departaments','contrys.id','=','departaments.id_contry')
            ->where('contrys.name','=',$midcountry)
            ->Where('departaments.name','=',$middepartament)->first() ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Departamento/Estado no pertenece a Pais"."\n"; }

/*         if ( $midcity!='-' && $middepartament!='-' && $midcountry!='-' && !( $idcity = City::join('departaments','departaments.id','=','citys.id_departament')
            ->join('contrys','contrys.id', '=', 'departaments.id_contry')
            ->where('contrys.name','=',$midcountry)
            ->Where('departaments.name','=',$middepartament)
            ->where('citys.name','=',$midcity)->first() ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Ciudad, departamento no consistente con el Pais"."\n"; }
 */
        if ( ( $row['namepost']=='') )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Definir cargo del empleado "."\n"; }

        if ( $row['id_country']=='' || $row['id_departament']=='' || $row['id_city']=='' )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Diligenciar completo pais, departamento y ciudad"."\n"; }

        if ( ($row['namepost']!='' && ($row['name']=='' || $row['lastname']=='' || $row['id_document_type']==''
            || $row['document_number']=='' || $row['telephone']=='' || $row['email']==''
            || $row['sex']=='' || $row['address']==''
            || $row['id_country']=='' || $row['id_departament']=='' || $row['id_city']=='' )) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." como Empleado debe diligenciar todos los campos"."\n"; }

        /* Dejar pasar lo básico de la persona  */
        if ( $row['name']!=NULL && $row['lastname']!=NULL )
            { $row['telephone']      =($row['telephone']==NULL?'requerido':   $row['telephone'] );
              $row['email']          =($row['email']==NULL?'requerido':       $row['email'] );
            }

        $idobservation['id']    = '';

/*                Visualiza si existe un mensaje de error
*/

// dd($merr);
//return $merr;

if ( $merr!="")
{
    $filerr = file_put_contents( public_path().'/'.$fileerror ,$merr.PHP_EOL, FILE_APPEND  | LOCK_EX );
    $bad = $bad + 1;
    return;
}
else
$good = $good + 1;

//dd( $ideps['id'] , $idarl['id'] , $idsangre );
// dd( $midcity , $idcity['id'] );
            return new temporary([
                'name'                  => $row['name'],
                'lastname'              => $row['lastname'],
                'id_document_type'  => $iddocumenttype['id'],
                'document_number'       => $row['document_number'],

                'telephone'             => $row['telephone'],
                'email'                 => $row['email'],
                'sex'                   => $row['sex'],
                'address'               => $row['address'],
                'civil_state'               => $row['civil_state'],

                'sangre'                => $row['sangre'],
                'id_eps'                => $ideps['id'],
                'id_arl'                => $idarl['id'],

                'id_city'           => $idcity['id'],

                'post_id'               => $idcargo['id'],

                'affiliation_date_eps'  => $row['afiliation_date_eps'],
                'affiliation_date_arl'  => $row['afiliation_date_arl'],
                'id_enterprise'         => $identerprise['id'],
                'id_pension_branch'     => $idpension['id'],

        ]);

    }
}
