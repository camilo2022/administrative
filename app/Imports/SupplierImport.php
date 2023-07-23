<?php

namespace App\Imports;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Temposupplier;
use App\DocumentType;
use App\Contry;
use App\Departament;
use App\City;

use DB;

/* Ejemplo de archivo de importacion *.xlsx proveedores     2022.nov.30

name,	lastname,	id_document_type,	document_number,	telephone,	email,	sex,	address,	sangre,	observation,	id_eps,	id_arl,	id_city,	bonding,	sdate,	economic_activity,	legal_representative,	self_retaining,	great_contributor,	regime,	economic_activity_code,	economic_rate,	observation_economic_activity,	way_to_pay_days,	way_to_pay
uno,	NULL,	CC,	28111,	+1 (496) 19,	unoxetirir@mailinator.com,	F,	dir1Autem nisi ea minim	-	obs1,	2,	2,	CUCUTA,	1983-08-09,	1991-10-11,	acti1,	re1Voluptas omnis sint,	S,	N,	Común,	pre1Proident ab mollit,	e1Ut illo sunt quos qu,	obs1Suscipit qui dolor n,	30,	Contraentrega
dos,	NULL,	TI,	48222,	+1 (128) 528,	dosbunuxudar@mailinator.com,	M,	dir2Doloribus officiis q	-	obs2,	2,	2,	PAMPLONA,	1980-01-17,	1979-11-12,	acti2	re2Libero omnis similiq,	S,	N,	Común,	pre2Quibusdam velit quo,	e2Sint quasi temporibu,	obs2Fugiat occaecat aut,	30,	Contraentrega
tres,	NULL,	CE,	943333,	+1 (984) 288,	tresvifosyj@mailinator.com,	M,	dir3Mollit neque dolorem	-	obs3,	2,	2,	CUCUTILLA,	2016-01-01,	1970-12-13,	acti3,	re3Animi nesciunt qui,	N,	S,	Simplificado,	pre3Ea ad quis quisquam,	e3Eius voluptas qui mo,	obs3Enim quia voluptatem,	30,	Anticipada

*/


class SupplierImport implements ToModel, WithHeadingRow
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
        //dd( $row );
        if ( $row['name']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Nombre  vacio"."\n"; }
        if ( $row['lastname']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Apellido  vacio"."\n"; }
        if ( $row['id_document_type']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Tipo Documento  vacio"."\n"; }
        if ( $row['document_number']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Numero Documento  vacio"."\n"; }
         if ( $row['telephone']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Teléfono  vacio"."\n"; }
        if ( $row['email']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Email  vacio"."\n"; }
        if ( $row['sex']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Sexo  vacio"."\n"; }
        if ( $row['address']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Dirección  vacio"."\n"; }
        if ( $row['sangre']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Sangre  vacio"."\n"; }
        if ( $row['observation']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Observacion  vacio"."\n"; }
        if ( $row['id_eps']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Eps  vacio"."\n"; }
        if ( $row['id_arl']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Arl  vacio"."\n"; }
        if ( $row['id_city']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Ciudad  vacio"."\n"; }
        if ( $row['bonding']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Vinculacion  vacio"."\n"; }
        if ( $row['sdate']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Fecha  vacio"."\n"; }
        if ( $row['economic_activity']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Actividad Economica  vacio"."\n"; }
        if ( $row['legal_representative']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Representante Legal  vacio"."\n"; }

        if ( $row['retention_property']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Propiedad Retencion  vacio"."\n"; }
        // if ( $row['great_contributor']==NULL)
        //     { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Gran Contribuyente  vacio"."\n"; }

        if ( $row['regime']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Regimen  vacio"."\n"; }
        if ( $row['economic_activity_code']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Codigo de actividad  vacio"."\n"; }
        if ( $row['economic_rate']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Tarifa ICA  vacio"."\n"; }
        if ( $row['observation_economic_activity']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Observacion Activ Economica  vacio"."\n"; }
        if ( $row['way_to_pay_days']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Dias Forma de Pago  vacio"."\n"; }
        if ( $row['way_to_pay']==NULL)
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Forma de Pago  vacio"."\n"; }

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
        else
            $mdocumenttype = $iddocumenttype['id'];

        $idcountry=0;
        $iddepartament=0;
        $idcity=0;

        $midcity   = strtoupper( $row['id_city'] );
        if ( !( $idcity = City::where( 'name', '=', $midcity )->first() ) )
           { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." Ciudad no existe"."\n"; }
        //dd( $midcity, $idcity['id'] );
        $midcity = $idcity['id'];

        if ( (($row['name']=='' || $row['id_document_type']==''
            || $row['document_number']=='' || $row['telephone']=='' || $row['email']==''
            || $row['sex']=='' || $row['address']==''
            || $row['id_city']=='' )) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." como proveedor independiente debe diligenciar todos los campos"."\n"; }

        if ( ($row['name']!=''
            && ($row['telephone']=='' || $row['email']=='' ) ) )
            { $merr = $merr.date("F j, Y, g:i a").'  (Linea '.$line.') '.$row['document_number']." como empresa proveedor debe diligenciar nombre, telefono y email"."\n"; }


        if ( $merr!="")
            {   $filerr = file_put_contents( public_path().'/'.$fileerror ,$merr.PHP_EOL, FILE_APPEND  | LOCK_EX );
                $bad = $bad + 1;
                return;
            }
        else
            $good = $good + 1;

            return new temposupplier([
                'name'                  => $row['name'],
                'id_document_type'      => $mdocumenttype,
                'document_number'       => $row['document_number'],

                'telephone'             => $row['telephone'],
                'email'                 => $row['email'],
                'sex'                   => $row['sex'],
                'address'               => $row['address'],

//                'sangre'                => $row[''],
                'observation'           => $row['observation'],
                'id_eps'                => $row['id_eps'],
                'id_arl'                => $row['id_arl'],
                'id_city'               => $midcity,
                'bonding'	            => $row['bonding'],
                'sdate'                 => $row['sdate'],
                'economic_activity'     => $row['economic_activity'],
                'legal_representative'  => $row['legal_representative'],
                'retention_property'    => $row['retention_property'],
                // 'great_contributor'     => $row['great_contributor'],
                'regime'                => $row['regime'],
                'economic_activity_code'=> $row['economic_activity_code'],
                'economic_rate'         => $row['economic_rate'],
                'observation_economic_activity'=> $row['observation_economic_activity'],
                'way_to_pay_days'       => $row['way_to_pay_days'],
                'way_to_pay'            => $row['way_to_pay'],

        ]);

    }
}
