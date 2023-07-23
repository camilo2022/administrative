<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Temporary;
use App\Post;
use App\Origin;
use App\DocumentType;
use App\Contry;
use App\Departament;
use App\City;

class UsersImport implements ToModel, WithHeadingRow
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


        $mcargo   = strtoupper( $row['post'] );
        if ( is_null($mcargo) || $mcargo=='' )
            {
                $idcargo['id']  = 1;
                $mcargo   = "-";
            }

        if ( !( $idcargo = Post::where( 'name', '=', $mcargo )->first() ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Cargo no existe"."\n"; }


        $mprocedencia   = strtoupper( $row['origin'] );
        if ( is_null($mprocedencia) || $mprocedencia=='' )
            {
                $idprocedencia['id']  = 1;
                $mprocedencia   = "-";
            }

        if ( !( $idprocedencia = Origin::where( 'source_income', '=', $mprocedencia )->first() ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Procedencia no existe"."\n"; }

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

        if ( $midcountry!='-' && $midcity!='-' && !( $u = City::join('departaments','departaments.id','=','citys.id_departament')
            ->join('contrys','contrys.id', '=', 'departaments.id_contry')
           ->where('contrys.name','=',$midcountry)
           ->Where('citys.name','=',$midcity)->first() ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." ciudad no pertenece a Pais"."\n"; }

        if ( $middepartament!='-' && !( $iddepartament = Contry::join('departaments','contrys.id','=','departaments.id_contry')
            ->where('contrys.name','=',$midcountry)
            ->Where('departaments.name','=',$middepartament)->first() ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Departamento/Estado no pertenece a Pais"."\n"; }

        if ( $midcity!='-' && $middepartament!='-' && $midcountry!='-' && !( $idcity = City::join('departaments','departaments.id','=','citys.id_departament')
            ->join('contrys','contrys.id', '=', 'departaments.id_contry')
            ->where('contrys.name','=',$midcountry)
            ->Where('departaments.name','=',$middepartament)
            ->where('citys.name','=',$midcity)->first() ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Ciudad, departamento no consistente con el Pais"."\n"; }

        if ( ($row['post']!='' && $row['origin']!='') || ($row['post']=='' && $row['origin']=='') )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Definir si es empleado o visitante"."\n"; }

        if ( $row['id_country']=='' || $row['id_departament']=='' || $row['id_city']=='' )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Diligenciar completo pais, departamento y ciudad"."\n"; }

        if ( ($row['post']!='' && ($row['name']=='' || $row['lastname']=='' || $row['id_document_type']==''
            || $row['document_number']=='' || $row['telephone']=='' || $row['email']==''
            || $row['sex']=='' || $row['address']==''
            || $row['id_country']=='' || $row['id_departament']=='' || $row['id_city']=='' )) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." como Empleado debe diligenciar todos los campos"."\n"; }

        if ( ($row['origin']!='' && $row['name']!='' && $row['lastname']!=''
            && ($row['telephone']=='' || $row['email']=='' ) ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." como visitante debe diligenciar nombre, apellido, telefono y email"."\n"; }

        /* Dejar pasar lo básico de la persona  */
        if ( $row['name']!=NULL && $row['lastname']!=NULL )
            { $row['telephone']      =($row['telephone']==NULL?'requerido':   $row['telephone'] );
              $row['email']          =($row['email']==NULL?'requerido':       $row['email'] );
            }

            $idsangre['id']         = '-';
            $idobservation['id']    = '';
            $ideps['id']            = 1;
            $idarl['id']            = 1;


/*                Visualiza si existe un mensaje de error
*/

/* dd($merr);
return $merr;
 */
        if ( $merr!="")
            {
                $filerr = file_put_contents( public_path().'\\'.$fileerror ,$merr.PHP_EOL, FILE_APPEND  | LOCK_EX );
                $bad = $bad + 1;
                return;
            }
        else
            $good = $good + 1;



            return new temporary([
                'name'                  => $row['name'],
                'lastname'              => $row['lastname'],
                'id_document_type'  => $iddocumenttype['id'],
                'document_number'       => $row['document_number'],
                'telephone'             => $row['telephone'],
                'email'                 => $row['email'],
                'sex'                   => $row['sex'],
                'address'               => $row['address'],
                'sangre'                => $idsangre['id'],
                'observation'           => $idobservation['id'],
                'id_eps'                => $ideps['id'],
                'id_arl'                => $idarl['id'],
                'id_city'           => $idcity['id'],

                'post_id'           => $idcargo['id'],
                'origin_id'         => $idprocedencia['id'],

        ]);

    }
}
