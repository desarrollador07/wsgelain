<?php

namespace App\Http\Controllers;
use App\Models\estres;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class reportesController extends Controller
{

    public function CiudadReporte($idEmp)
    {
        $result = DB::select('SELECT emdciudad FROM vw_inf_detalle_x_empleado  where emdempresa = (?) ;',[$idEmp]);
        $array = array();
        $array2 = array();
        for($i = 0, $size = count($result); $i < $size; ++$i) {
        $x = $result[$i];
        $x2 = $result[$i++];
         $emdciudad = $x -> emdciudad;
        //$emdciu = strtoupper($emdciudad);
        $array2 = array("ciudad"=>$emdciudad);
        array_unique($array2);
        array_push($array,$array2); 
        

        
        }
        return $array;
        
        
    }
    public function ReporteExcelDetallado($idEmp)
    { 
        $result = DB::select('SELECT * FROM vw_inf_detalle_x_empleado  where emdempresa = (?);',[$idEmp]);
        //$result = DB::select('SELECT * FROM vw_inf_detalle_x_empleado  where emdempresa = (?) AND emdciudad = (?);',[$idEmp,$ciud]);
        //$result = DB::table('vw_inf_detalle_x_empleado')->where('mdempresa','=',$idEmp);
        
        $array = array();
        $array2 = array();
        $arraytotal = array();
        $arrayFin = array();
        $Resintr_lider_liderazgo = "";
        $Resintr_lider_relaciones = "";
        $Resintr_lider_retroalimenta = "";
        $Resintr_lider_rela_colabora = "";
        $Resintr_ctrl_rol = "";
        $Resintr_ctrl_capacita = "";
        $Resintr_ctrl_oportunidades = "";
        $Resintr_ctrl_cambio = "";
        $Resintr_ctrl_autonomia = "";
        $Resintr_deman_ambiental = "";
        $Resintr_deman_responsa = "";
        $Resintr_deman_consistencia = "";
        $Resintr_deman_emocionales = "";
        $Resintr_deman_jornada = "";
        $Resintr_deman_influencia = "";
        $Resintr_deman_cuantitativas = "";
        $Resintr_deman_carmental = "";
        $Resintr_recom_reconocimiento = "";
        $Resintr_recom_recompensas = "";
        $Resextralab_tiempof = "";
        $Resextralab_relafami = "";
        $Resextralab_comunicacion = "";
        $Resextralab_situacion_econo = "";
        $Resextralab_carvivienda = "";
        $Resextralab_influenciaent = "";
        $Resextralab_desplazamiento = "";
        $Resestres_fisiolo = "";
        $Resestres_comportamiento = "";
        $Resestres_intelectuales = "";
        $Resestres_psicoemocionales = "";

        $Resintr_total_liderazgo_rela = "";
        $Resintr_total_ctrl = "";
        $Resintr_total_deman = "";
        $Resintr_total_recompensas = "";
        $Resextralab_total = "";
        $Resestres_total = "";
        $Restotal_general = "";
        $Restotal_intralaboral_fin = "";
        $Restotal_extralaboral_fin = "";
        
         for($i = 0, $size = count($result); $i < $size; ++$i) {
            $x = $result[$i];
        $emdcedula = $x -> emdcedula;
        $emdnombres = $x -> emdnombres;
        $emdnom = strtoupper($emdnombres);
        $emdapellidos = $x -> emdapellidos;
        $emdape = strtoupper($emdapellidos);
        $emdciudad = $x -> emdciudad;
        $emdciu = strtoupper($emdciudad);
        $emdempresa = $x -> emdempresa;
        $arenombre = $x -> arenombre;
        $inaid = $x -> inaid;
        $intr_total_liderazgo_rela = $x -> intr_total_liderazgo_rela;


        $intr_lider_liderazgo = $x -> intr_lider_liderazgo;
        $intr_lider_relaciones = $x -> intr_lider_relaciones;
        $intr_lider_retroalimenta = $x -> intr_lider_retroalimenta;
        $intr_lider_rela_colabora = $x -> intr_lider_rela_colabora;
        $intr_total_liderazgo_rela_val = $x -> intr_total_liderazgo_rela_val;
        $intr_lider_liderazgo_val = $x -> intr_lider_liderazgo_val;
        $intr_lider_relaciones_val = $x -> intr_lider_relaciones_val;
        $intr_lider_retroalimenta_val = $x -> intr_lider_retroalimenta_val;
        $intr_lider_rela_colabora_val = $x -> intr_lider_rela_colabora_val;
        $intr_total_ctrl = $x -> intr_total_ctrl;

        $intr_ctrl_rol = $x -> intr_ctrl_rol;
        $intr_ctrl_capacita = $x -> intr_ctrl_capacita;
        $intr_ctrl_cambio = $x -> intr_ctrl_cambio;
        $intr_ctrl_oportunidades = $x -> intr_ctrl_oportunidades;
        $intr_ctrl_autonomia = $x -> intr_ctrl_autonomia;
        $intr_total_ctrl_val = $x -> intr_total_ctrl_val;
        $intr_ctrl_rol_val = $x -> intr_ctrl_rol_val;
        $intr_ctrl_capacita_val = $x -> intr_ctrl_capacita_val;
        $intr_ctrl_cambio_val = $x -> intr_ctrl_cambio_val;
        $intr_ctrl_oportunidades_val = $x -> intr_ctrl_oportunidades_val;
        $intr_ctrl_autonomia_val = $x -> intr_ctrl_autonomia_val;
        $intr_total_deman = $x -> intr_total_deman;
        
        $intr_deman_ambiental = $x -> intr_deman_ambiental;
        $intr_deman_emocionales = $x -> intr_deman_emocionales;
        $intr_deman_cuantitativas = $x -> intr_deman_cuantitativas;
        $intr_deman_influencia = $x -> intr_deman_influencia;
        $intr_deman_responsa = $x -> intr_deman_responsa;
        $intr_deman_carmental = $x -> intr_deman_carmental;
        $intr_deman_consistencia = $x -> intr_deman_consistencia;
        $intr_deman_jornada = $x -> intr_deman_jornada;
       
        $intr_total_deman_val = $x -> intr_total_deman_val;
        $intr_deman_ambientales_val = $x -> intr_deman_ambientales_val;
        $intr_deman_emocionales_val = $x -> intr_deman_emocionales_val;
        $intr_deman_cuantitativas_val = $x -> intr_deman_cuantitativas_val;
        $intr_deman_influencia_val = $x -> intr_deman_influencia_val;
        $intr_deman_responsa_val = $x -> intr_deman_responsa_val;
        $intr_deman_carmental_val = $x -> intr_deman_carmental_val;
        $intr_deman_consistencia_val = $x -> intr_deman_consistencia_val;
        $intr_deman_jornada_val = $x -> intr_deman_jornada_val;
        $intr_total_recompensas = $x -> intr_total_recompensas;

        $intr_recom_recompensas = $x -> intr_recom_recompensas;
        $intr_recom_reconocimiento = $x -> intr_recom_reconocimiento;

        $intr_total_recompensas_val = $x -> intr_total_recompensas_val;
        $intr_recom_recompensas_val = $x -> intr_recom_recompensas_val;
        $intr_recom_reconocimiento_val = $x -> intr_recom_reconocimiento_val;
        $extralab_total = $x -> extralab_total;
        
        $extralab_tiempof = $x -> extralab_tiempof;
        $extralab_relafami = $x -> extralab_relafami;
        $extralab_comunicacion = $x -> extralab_comunicacion;
        $extralab_situacion_econo = $x -> extralab_situacion_econo;
        $extralab_carvivienda = $x -> extralab_carvivienda;
        $extralab_influenciaent = $x -> extralab_influenciaent;
        $extralab_desplazamiento = $x -> extralab_desplazamiento;
        
        $extralab_total_val = $x -> extralab_total_val;
        $extralab_tiempof_val = $x -> extralab_tiempof_val;
        $extralab_relafami_val = $x -> extralab_relafami_val;
        $extralab_comunicacion_val = $x -> extralab_comunicacion_val;
        $extralab_situacion_econo_val = $x -> extralab_situacion_econo_val;
        $extralab_carvivienda_val = $x -> extralab_carvivienda_val;
        $extralab_influenciaent_val = $x -> extralab_influenciaent_val;
        $extralab_desplazamiento_val = $x -> extralab_desplazamiento_val;
        $estres_total = $x -> estres_total;
        
        $estres_fisiolo = $x -> estres_fisiolo;
        $estres_comportamiento = $x -> estres_comportamiento;
        $estres_intelectuales = $x -> estres_intelectuales;
        $estres_psicoemocionales = $x -> estres_psicoemocionales;
        $estres_total_val = $x -> estres_total_val;
        $estres_fisiolo_val = $x -> estres_fisiolo_val;
        $estres_comportamiento_val = $x -> estres_comportamiento_val;
        $estres_intelectuales_val = $x -> estres_intelectuales_val;
        $psicoemocionales_val = $x -> psicoemocionales_val;
        $total_general = $x -> total_general;
        $total_intralaboral_fin = $x -> total_intralaboral_fin;
        $total_extralaboral_fin = $x -> total_extralaboral_fin;
        $total_general_val = $x -> total_general_val;
        $total_intralaboral_fin_val = $x -> total_intralaboral_fin_val;
        $total_extralaboral_fin_val = $x -> total_extralaboral_fin_val;

        
        
            
            if($inaid != null){
             //intr_lider_liderazgo
            if($intr_lider_liderazgo == 0 or $intr_lider_liderazgo <= 3.8){
                $Resintr_lider_liderazgo = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_lider_liderazgo == 3.9 or $intr_lider_liderazgo <= 15.4){
                $Resintr_lider_liderazgo = "Riesgo bajo";
            }
            elseif($intr_lider_liderazgo == 15.5 or $intr_lider_liderazgo <= 30.8){
                $Resintr_lider_liderazgo = "Riesgo medio";
            }
            elseif($intr_lider_liderazgo == 30.9 or $intr_lider_liderazgo <= 46.2){
                $Resintr_lider_liderazgo = "Riesgo alto";
            }
            elseif($intr_lider_liderazgo == 46.3 or $intr_lider_liderazgo <= 100){
                $Resintr_lider_liderazgo = "Riesgo muy alto";
            }
            
            //intr_lider_relaciones
            if($intr_lider_relaciones == 0 or $intr_lider_relaciones <= 5.4){
               $Resintr_lider_relaciones = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_lider_relaciones == 5.5 or $intr_lider_relaciones <= 16.1){
                $Resintr_lider_relaciones = "Riesgo bajo";
            }
            elseif($intr_lider_relaciones == 16.2 or $intr_lider_relaciones <= 25){
                 $Resintr_lider_relaciones = "Riesgo medio";
            }
            elseif($intr_lider_relaciones == 25.1 or $intr_lider_relaciones <= 37.5){
               $Resintr_lider_relaciones = "Riesgo alto";
            }
            elseif($intr_lider_relaciones == 37.6 or $intr_lider_relaciones <= 100){
                $Resintr_lider_relaciones = "Riesgo muy alto";
            }
            
            //intr_lider_retroalimenta
            if($intr_lider_retroalimenta == 0 or $intr_lider_retroalimenta <= 10.0){
               $Resintr_lider_retroalimenta = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_lider_retroalimenta == 10.1 or $intr_lider_retroalimenta <= 25.0){
                $Resintr_lider_retroalimenta = "Riesgo bajo";
            }
            elseif($intr_lider_retroalimenta == 25.1 or $intr_lider_retroalimenta <= 40){
               $Resintr_lider_retroalimenta = "Riesgo medio";
            }
            elseif($intr_lider_retroalimenta == 40.1 or $intr_lider_retroalimenta <= 55.0){
                $Resintr_lider_retroalimenta = "Riesgo alto";
            }
            elseif($intr_lider_retroalimenta == 55.1 or $intr_lider_retroalimenta <= 100){
                $Resintr_lider_retroalimenta = "Riesgo muy alto";
            }
            
            //intr_lider_rela_colabora
            if($intr_lider_rela_colabora == 0 or $intr_lider_rela_colabora <= 13.9){
                $Resintr_lider_rela_colabora = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_lider_rela_colabora == 14.0 or $intr_lider_rela_colabora <= 25.0){
                $Resintr_lider_rela_colabora = "Riesgo bajo";
            }
            elseif($intr_lider_rela_colabora == 25.1 or $intr_lider_rela_colabora <= 33.3){
                $Resintr_lider_rela_colabora = "Riesgo medio";
            }
            elseif($intr_lider_rela_colabora == 33.4 or $intr_lider_rela_colabora <= 47.2){
                $Resintr_lider_rela_colabora = "Riesgo alto";
            }
            elseif($intr_lider_rela_colabora == 47.3 or $intr_lider_rela_colabora <= 100){
                $Resintr_lider_rela_colabora = "Riesgo muy alto";
            }
            
            //intr_ctrl_rol
            if($intr_ctrl_rol == 0 or $intr_ctrl_rol <= 0.9){
                $Resintr_ctrl_rol = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_ctrl_rol == 1.0 or $intr_ctrl_rol <= 10.7){
                $Resintr_ctrl_rol = "Riesgo bajo";
            }
            elseif($intr_ctrl_rol == 10.8 or $intr_ctrl_rol <= 21.4){
                 $Resintr_ctrl_rol = "Riesgo medio";
            }
            elseif($intr_ctrl_rol == 21.5 or $intr_ctrl_rol <= 39.3){
                $Resintr_ctrl_rol = "Riesgo alto";
            }
            elseif($intr_ctrl_rol == 39.4 or $intr_ctrl_rol <= 100){
                $Resintr_ctrl_rol = "Riesgo muy alto";
            }
            
            //intr_ctrl_capacita
            if($intr_ctrl_capacita == 0 or $intr_ctrl_capacita <= 0.9){
                $Resintr_ctrl_capacita = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_ctrl_capacita == 1.0 or $intr_ctrl_capacita <= 16.7){
                 $Resintr_ctrl_capacita = "Riesgo bajo";
            }
            elseif($intr_ctrl_capacita == 16.8 or $intr_ctrl_capacita <= 33.3){
                $Resintr_ctrl_capacita = "Riesgo medio";
            }
            elseif($intr_ctrl_capacita == 33.4 or $intr_ctrl_capacita <= 50.0){
               $Resintr_ctrl_capacita = "Riesgo alto";
            }
            elseif($intr_ctrl_capacita == 51.0 or $intr_ctrl_capacita <= 100){
                $Resintr_ctrl_capacita = "Riesgo muy alto";
            }
            
             //intr_ctrl_oportunidades
            if($intr_ctrl_oportunidades == 0 or $intr_ctrl_oportunidades <= 0.9){
                $Resintr_ctrl_oportunidades = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_ctrl_oportunidades == 1.0 or $intr_ctrl_oportunidades <= 6.3){
                $Resintr_ctrl_oportunidades = "Riesgo bajo";
            }
            elseif($intr_ctrl_oportunidades == 6.4 or $intr_ctrl_oportunidades <= 18.8){
                $Resintr_ctrl_oportunidades = "Riesgo medio";
            }
            elseif($intr_ctrl_oportunidades == 18.9 or $intr_ctrl_oportunidades <= 31.3){
                $Resintr_ctrl_oportunidades = "Riesgo alto";
            }
            elseif($intr_ctrl_oportunidades == 31.4 or $intr_ctrl_oportunidades <= 100){
                $Resintr_ctrl_oportunidades = "Riesgo muy alto";
            }
            
            //intr_ctrl_cambio
            if($intr_ctrl_cambio == 0 or $intr_ctrl_cambio <= 12.5){
                $Resintr_ctrl_cambio = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_ctrl_cambio == 12.6 or $intr_ctrl_cambio <= 25.0){
                $Resintr_ctrl_cambio = "Riesgo bajo";
            }
            elseif($intr_ctrl_cambio == 25.1 or $intr_ctrl_cambio <= 37.5){
                $Resintr_ctrl_cambio = "Riesgo medio";
            }
            elseif($intr_ctrl_cambio == 37.6 or $intr_ctrl_cambio <= 50.0){
                $Resintr_ctrl_cambio = "Riesgo alto";
            }
            elseif($intr_ctrl_cambio == 50.1 or $intr_ctrl_cambio <= 100){
                $Resintr_ctrl_cambio = "Riesgo muy alto";
            }
            
            //intr_ctrl_autonomia
            if($intr_ctrl_autonomia == 0 or $intr_ctrl_autonomia <= 8.3){
                $Resintr_ctrl_autonomia = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_ctrl_autonomia == 8.4 or $intr_ctrl_autonomia <= 25.0){
               $Resintr_ctrl_autonomia = "Riesgo bajo";
            }
            elseif($intr_ctrl_autonomia == 25.1 or $intr_ctrl_autonomia <= 41.7){
                 $Resintr_ctrl_autonomia = "Riesgo medio";
            }
            elseif($intr_ctrl_autonomia == 41.8 or $intr_ctrl_autonomia <= 58.3){
                $Resintr_ctrl_autonomia = "Riesgo alto";
            }
            elseif($intr_ctrl_autonomia == 58.4 or $intr_ctrl_autonomia <= 100){
                $Resintr_ctrl_autonomia = "Riesgo muy alto";
            }
            
            //intr_deman_ambiental
            if($intr_deman_ambiental == 0 or $intr_deman_ambiental <= 14.6){
                $Resintr_deman_ambiental = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_deman_ambiental == 14.7 or $intr_deman_ambiental <= 22.9){
                $Resintr_deman_ambiental = "Riesgo bajo";
            }
            elseif($intr_deman_ambiental == 23.0 or $intr_deman_ambiental <= 31.3){
                $Resintr_deman_ambiental = "Riesgo medio";
            }
            elseif($intr_deman_ambiental == 31.4 or $intr_deman_ambiental <= 39.6){
               $Resintr_deman_ambiental = "Riesgo alto";
            }
            elseif($intr_deman_ambiental == 39.7 or $intr_deman_ambiental <= 100){
                 $Resintr_deman_ambiental = "Riesgo muy alto";
            }
            
            //intr_deman_responsa
            if($intr_deman_responsa == 0 or $intr_deman_responsa <= 37.5){
                $Resintr_deman_responsa = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_deman_responsa == 37.6 or $intr_deman_responsa <= 54.2){
                $Resintr_deman_responsa = "Riesgo bajo";
            }
            elseif($intr_deman_responsa == 54.3 or $intr_deman_responsa <= 66.7){
               $Resintr_deman_responsa = "Riesgo medio";
            }
            elseif($intr_deman_responsa == 66.8 or $intr_deman_responsa <= 79.2){
                $Resintr_deman_responsa = "Riesgo alto";
            }
            elseif($intr_deman_responsa == 79.3 or $intr_deman_responsa <= 100){
                $Resintr_deman_responsa = "Riesgo muy alto";
            }
            
            //intr_deman_consistencia
            if($intr_deman_consistencia == 0 or $intr_deman_consistencia <= 15.0){
                $Resintr_deman_consistencia = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_deman_consistencia == 15.1 or $intr_deman_consistencia <= 25.0){
                $Resintr_deman_consistencia = "Riesgo bajo";
            }
            elseif($intr_deman_consistencia == 25.1 or $intr_deman_consistencia <= 35.0){
                $Resintr_deman_consistencia = "Riesgo medio";
            }
            elseif($intr_deman_consistencia == 35.1 or $intr_deman_consistencia <= 45.0){
                $Resintr_deman_consistencia = "Riesgo alto";
            }
            elseif($intr_deman_consistencia == 45.1 or $intr_deman_consistencia <= 100){
                $Resintr_deman_consistencia = "Riesgo muy alto";
            }
            
            //intr_deman_emocionales
            if($intr_deman_emocionales == 0 or $intr_deman_emocionales <= 16.7){
                $Resintr_deman_emocionales = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_deman_emocionales == 16.8 or $intr_deman_emocionales <= 25.0){
                $Resintr_deman_emocionales = "Riesgo bajo";
            }
            elseif($intr_deman_emocionales == 25.1 or $intr_deman_emocionales <= 33.3){
                $Resintr_deman_emocionales = "Riesgo medio";
            }
            elseif($intr_deman_emocionales == 33.4 or $intr_deman_emocionales <= 47.2){
                $Resintr_deman_emocionales = "Riesgo alto";
            }
            elseif($intr_deman_emocionales == 47.3 or $intr_deman_emocionales <= 100){
                $Resintr_deman_emocionales = "Riesgo muy alto";
            }
            
            //intr_deman_jornada
            if($intr_deman_jornada == 0 or $intr_deman_jornada <= 8.3){
                $Resintr_deman_jornada = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_deman_jornada == 8.4 or $intr_deman_jornada <= 25.0){
               $Resintr_deman_jornada = "Riesgo bajo";
            }
            elseif($intr_deman_jornada == 25.1 or $intr_deman_jornada <= 33.3){
                $Resintr_deman_jornada = "Riesgo medio";
            }
            elseif($intr_deman_jornada == 33.4 or $intr_deman_jornada <= 50.0){
                $Resintr_deman_jornada = "Riesgo alto";
            }
            elseif($intr_deman_jornada == 50.1 or $intr_deman_jornada <= 100){
                $Resintr_deman_jornada = "Riesgo muy alto";
            }
            
            //intr_deman_influencia
            if($intr_deman_influencia == 0 or $intr_deman_influencia <= 18.8){
                $Resintr_deman_influencia = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_deman_influencia == 18.9 or $intr_deman_influencia <= 31.3){
                $Resintr_deman_influencia = "Riesgo bajo";
            }
            elseif($intr_deman_influencia == 31.4 or $intr_deman_influencia <= 43.8){
                $Resintr_deman_influencia = "Riesgo medio";
            }
            elseif($intr_deman_influencia == 43.9 or $intr_deman_influencia <= 50.0){
                $Resintr_deman_influencia = "Riesgo alto";
            }
            elseif($intr_deman_influencia == 50.1 or $intr_deman_influencia <= 100){
                $Resintr_deman_influencia = "Riesgo muy alto";
            }
            
            //intr_deman_cuantitativas
            if($intr_deman_cuantitativas == 0 or $intr_deman_cuantitativas <= 25.0){
                $Resintr_deman_cuantitativas = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_deman_cuantitativas == 25.1 or $intr_deman_cuantitativas <= 33.3){
                $Resintr_deman_cuantitativas = "Riesgo bajo";
            }
            elseif($intr_deman_cuantitativas == 33.4 or $intr_deman_cuantitativas <= 45.8){
                $Resintr_deman_cuantitativas = "Riesgo medio";
            }
            elseif($intr_deman_cuantitativas == 45.9 or $intr_deman_cuantitativas <= 54.2){
                $Resintr_deman_cuantitativas = "Riesgo alto";
            }
            elseif($intr_deman_cuantitativas == 54.3 or $intr_deman_cuantitativas <= 100){
                $Resintr_deman_cuantitativas = "Riesgo muy alto";
            }
            
            //intr_deman_carmental
            if($intr_deman_carmental == 0 or $intr_deman_carmental <= 60.0){
                $Resintr_deman_carmental = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_deman_carmental == 60.1 or $intr_deman_carmental <= 70.0){
                $Resintr_deman_carmental = "Riesgo bajo";
            }
            elseif($intr_deman_carmental == 70.1 or $intr_deman_carmental <= 80.0){
                $Resintr_deman_carmental = "Riesgo medio";
            }
            elseif($intr_deman_carmental == 80.1 or $intr_deman_carmental <= 90.0){
                $Resintr_deman_carmental = "Riesgo alto";
            }
            elseif($intr_deman_carmental == 90.1 or $intr_deman_carmental <= 100){
                $Resintr_deman_carmental = "Riesgo muy alto";
            }
            
            //intr_recom_reconocimiento
            if($intr_recom_reconocimiento == 0 or $intr_recom_reconocimiento <= 4.2){
               $Resintr_recom_reconocimiento = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_recom_reconocimiento == 4.3 or $intr_recom_reconocimiento <= 16.7){
                $Resintr_recom_reconocimiento = "Riesgo bajo";
            }
            elseif($intr_recom_reconocimiento == 16.8 or $intr_recom_reconocimiento <= 25){
               $Resintr_recom_reconocimiento = "Riesgo medio";
            }
            elseif($intr_recom_reconocimiento == 25.1 or $intr_recom_reconocimiento <= 37.5){
                $Resintr_recom_reconocimiento = "Riesgo alto";
            }
            elseif($intr_recom_reconocimiento == 37.6 or $intr_recom_reconocimiento <= 100){
               $Resintr_recom_reconocimiento = "Riesgo muy alto";
            }
            
            
            //intr_recom_recompensas
            if($intr_recom_recompensas == 0 or $intr_recom_recompensas <= 0.9){
                $Resintr_recom_recompensas = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_recom_recompensas == 1.0 or $intr_recom_recompensas <= 5.0){
                $Resintr_recom_recompensas = "Riesgo bajo";
            }
            elseif($intr_recom_recompensas == 5.1 or $intr_recom_recompensas <= 10.0){
                $Resintr_recom_recompensas = "Riesgo medio";
            }
            elseif($intr_recom_recompensas == 10.1 or $intr_recom_recompensas <= 20.0){
                $Resintr_recom_recompensas = "Riesgo alto";
            }
            elseif($intr_recom_recompensas == 20.1 or $intr_recom_recompensas <= 100){
                $Resintr_recom_recompensas = "Riesgo muy alto";
            }

            //totales


            //intr_total_liderazgo_rela
            if($intr_total_liderazgo_rela == 0 or $intr_total_liderazgo_rela <= 9.1){
                $Resintr_total_liderazgo_rela = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_total_liderazgo_rela == 9.2 or $intr_total_liderazgo_rela <= 17.7){
                $Resintr_total_liderazgo_rela = "Riesgo bajo";
            }
            elseif($intr_total_liderazgo_rela == 17.8 or $intr_total_liderazgo_rela <= 25.6){
                $Resintr_total_liderazgo_rela = "Riesgo medio";
            }
            elseif($intr_total_liderazgo_rela == 25.7 or $intr_total_liderazgo_rela <= 34.8){
                $Resintr_total_liderazgo_rela = "Riesgo alto";
            }
            elseif($intr_total_liderazgo_rela == 34.9 or $intr_total_liderazgo_rela <= 100){
                $Resintr_total_liderazgo_rela = "Riesgo muy alto";
            }

             //intr_total_ctrl
             if($intr_total_ctrl == 0 or $intr_total_ctrl <= 10.7){
                $Resintr_total_ctrl = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_total_ctrl == 10.8 or $intr_total_ctrl <= 19.0){
                $Resintr_total_ctrl = "Riesgo bajo";
            }
            elseif($intr_total_ctrl == 19.1 or $intr_total_ctrl <= 29.8){
                $Resintr_total_ctrl = "Riesgo medio";
            }
            elseif($intr_total_ctrl == 29.9 or $intr_total_ctrl <= 40.5){
                $Resintr_total_ctrl = "Riesgo alto";
            }
            elseif($intr_total_ctrl == 40.6 or $intr_total_ctrl <= 100){
                $Resintr_total_ctrl = "Riesgo muy alto";
            }

            //intr_total_deman
            if($intr_total_deman == 0 or $intr_total_deman <= 28.5){
                $Resintr_total_deman = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_total_deman == 28.6 or $intr_total_deman <= 35.0){
                $Resintr_total_deman = "Riesgo bajo";
            }
            elseif($intr_total_deman == 35.1 or $intr_total_deman <= 41.5){
                $Resintr_total_deman = "Riesgo medio";
            }
            elseif($intr_total_deman == 41.6 or $intr_total_deman <= 47.5){
                $Resintr_total_deman = "Riesgo alto";
            }
            elseif($intr_total_deman == 47.6 or $intr_total_deman <= 100){
                $Resintr_total_deman = "Riesgo muy alto";
            }

            //intr_total_recompensas
            if($intr_total_recompensas == 0 or $intr_total_recompensas <= 4.5){
                $Resintr_total_recompensas = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_total_recompensas == 4.6 or $intr_total_recompensas <= 11.4){
                $Resintr_total_recompensas = "Riesgo bajo";
            }
            elseif($intr_total_recompensas == 11.5 or $intr_total_recompensas <= 20.5){
                $Resintr_total_recompensas = "Riesgo medio";
            }
            elseif($intr_total_recompensas == 20.6 or $intr_total_recompensas <= 29.5){
                $Resintr_total_recompensas = "Riesgo alto";
            }
            elseif($intr_total_recompensas == 29.6 or $intr_total_recompensas <= 100){
                $Resintr_total_recompensas = "Riesgo muy alto";
            }

            //total_intralaboral_fin
            if($total_intralaboral_fin == 0 or $total_intralaboral_fin <= 19.7){
                $Restotal_intralaboral_fin = "Sin riesgo o riesgo despreciable";
            }
            elseif($total_intralaboral_fin == 19.8 or $total_intralaboral_fin <= 25.8){
                $Restotal_intralaboral_fin = "Riesgo bajo";
            }
            elseif($total_intralaboral_fin == 25.9 or $total_intralaboral_fin <= 31.5){
                $Restotal_intralaboral_fin = "Riesgo medio";
            }
            elseif($total_intralaboral_fin == 31.6 or $total_intralaboral_fin <= 38.0){
                $Restotal_intralaboral_fin = "Riesgo alto";
            }
            elseif($total_intralaboral_fin == 38.1 or $total_intralaboral_fin <= 100){
                $Restotal_intralaboral_fin = "Riesgo muy alto";
            }


            //total_extralaboral_fin
            if($total_extralaboral_fin == 0 or $total_extralaboral_fin <= 18.8){
                $Restotal_extralaboral_fin = "Sin riesgo o riesgo despreciable";
            }
            elseif($total_extralaboral_fin == 18.9 or $total_extralaboral_fin <= 24.4){
                $Restotal_extralaboral_fin = "Riesgo bajo";
            }
            elseif($total_extralaboral_fin == 24.5 or $total_extralaboral_fin <= 29.5){
                $Restotal_extralaboral_fin = "Riesgo medio";
            }
            elseif($total_extralaboral_fin == 29.6 or $total_extralaboral_fin <= 35.4){
                $Restotal_extralaboral_fin = "Riesgo alto";
            }
            elseif($total_extralaboral_fin == 35.5 or $total_extralaboral_fin <= 100){
                $Restotal_extralaboral_fin = "Riesgo muy alto";
            }

             
            
            //array_push($array2,$inaid);
         }else{
             //intr_lider_liderazgo
             if($intr_lider_liderazgo == 0 or $intr_lider_liderazgo <= 3.8){
                $Resintr_lider_liderazgo = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_lider_liderazgo == 3.9 or $intr_lider_liderazgo <= 13.5){
                $Resintr_lider_liderazgo = "Riesgo bajo";
            }
            elseif($intr_lider_liderazgo == 13.6 or $intr_lider_liderazgo <= 25.0){
                $Resintr_lider_liderazgo = "Riesgo medio";
            }
            elseif($intr_lider_liderazgo == 25.1 or $intr_lider_liderazgo <= 38.5){
                $Resintr_lider_liderazgo = "Riesgo alto";
            }
            elseif($intr_lider_liderazgo == 38.6 or $intr_lider_liderazgo <= 100){
                $Resintr_lider_liderazgo = "Riesgo muy alto";
            }

            //intr_lider_relaciones
            if($intr_lider_relaciones == 0 or $intr_lider_relaciones <= 6.3){
               $Resintr_lider_relaciones = "Sin riesgo o riesgo despreciable";
           }
           elseif($intr_lider_relaciones == 6.4 or $intr_lider_relaciones <= 14.6){
               $Resintr_lider_relaciones = "Riesgo bajo";
           }
           elseif($intr_lider_relaciones == 14.7 or $intr_lider_relaciones <= 27.1){
               $Resintr_lider_relaciones = "Riesgo medio";
           }
           elseif($intr_lider_relaciones == 27.2 or $intr_lider_relaciones <= 37.5){
               $Resintr_lider_relaciones = "Riesgo alto";
           }
           elseif($intr_lider_relaciones == 37.6 or $intr_lider_relaciones <= 100){
               $Resintr_lider_relaciones = "Riesgo muy alto";
           }

            //intr_lider_retroalimenta
            if($intr_lider_retroalimenta == 0 or $intr_lider_retroalimenta <= 5.0){
                $Resintr_lider_retroalimenta = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_lider_retroalimenta == 5.1 or $intr_lider_retroalimenta <= 20.0){
                $Resintr_lider_retroalimenta = "Riesgo bajo";
            }
            elseif($intr_lider_retroalimenta == 20.1 or $intr_lider_retroalimenta <= 30){
                $Resintr_lider_retroalimenta = "Riesgo medio";
            }
            elseif($intr_lider_retroalimenta == 30.1 or $intr_lider_retroalimenta <= 50.0){
                $Resintr_lider_retroalimenta = "Riesgo alto";
            }
            elseif($intr_lider_retroalimenta == 50.1 or $intr_lider_retroalimenta <= 100){
                $Resintr_lider_retroalimenta = "Riesgo muy alto";
            }

             //no aplica intr_lider_rela_colabora
             if($intr_lider_rela_colabora == 0 or $intr_lider_rela_colabora <= 13.9){
                $Resintr_lider_rela_colabora = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_lider_rela_colabora == 14.0 or $intr_lider_rela_colabora <= 25.0){
                $Resintr_lider_rela_colabora = "Riesgo bajo";
            }
            elseif($intr_lider_rela_colabora == 25.1 or $intr_lider_rela_colabora <= 33.3){
                $Resintr_lider_rela_colabora = "Riesgo medio";
            }
            elseif($intr_lider_rela_colabora == 33.4 or $intr_lider_rela_colabora <= 47.2){
                $Resintr_lider_rela_colabora = "Riesgo alto";
            }
            elseif($intr_lider_rela_colabora == 47.3 or $intr_lider_rela_colabora <= 100){
                $Resintr_lider_rela_colabora = "Riesgo muy alto";
            }

            //claridad intr_ctrl_rol
            if($intr_ctrl_rol == 0 or $intr_ctrl_rol <= 0.9){
                $Resintr_ctrl_rol = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_ctrl_rol == 1.0 or $intr_ctrl_rol <= 5.0){
                $Resintr_ctrl_rol = "Riesgo bajo";
            }
            elseif($intr_ctrl_rol == 5.1 or $intr_ctrl_rol <= 15.0){
                $Resintr_ctrl_rol = "Riesgo medio";
            }
            elseif($intr_ctrl_rol == 15.1 or $intr_ctrl_rol <= 30.0){
                $Resintr_ctrl_rol = "Riesgo alto";
            }
            elseif($intr_ctrl_rol == 30.1 or $intr_ctrl_rol <= 100){
                $Resintr_ctrl_rol = "Riesgo muy alto";
            }

             //capacitiacion intr_ctrl_capacita
             if($intr_ctrl_capacita == 0 or $intr_ctrl_capacita <= 0.9){
                $Resintr_ctrl_capacita = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_ctrl_capacita == 1.0 or $intr_ctrl_capacita <= 16.7){
                $Resintr_ctrl_capacita = "Riesgo bajo";
            }
            elseif($intr_ctrl_capacita == 16.8 or $intr_ctrl_capacita <= 25.0){
                $Resintr_ctrl_capacita = "Riesgo medio";
            }
            elseif($intr_ctrl_capacita == 25.1 or $intr_ctrl_capacita <= 50.0){
                $Resintr_ctrl_capacita = "Riesgo alto";
            }
            elseif($intr_ctrl_capacita == 51.0 or $intr_ctrl_capacita <= 100){
                $Resintr_ctrl_capacita = "Riesgo muy alto";
            }

             //oportunidad intr_ctrl_oportunidades
             if($intr_ctrl_oportunidades == 0 or $intr_ctrl_oportunidades <= 12.5){
                $Resintr_ctrl_oportunidades = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_ctrl_oportunidades == 12.6 or $intr_ctrl_oportunidades <= 25.0){
                $Resintr_ctrl_oportunidades = "Riesgo bajo";
            }
            elseif($intr_ctrl_oportunidades == 25.1 or $intr_ctrl_oportunidades <= 37.5){
                $Resintr_ctrl_oportunidades = "Riesgo medio";
            }
            elseif($intr_ctrl_oportunidades == 37.6 or $intr_ctrl_oportunidades <= 56.3){
                $Resintr_ctrl_oportunidades = "Riesgo alto";
            }
            elseif($intr_ctrl_oportunidades == 56.4 or $intr_ctrl_oportunidades <= 100){
                $Resintr_ctrl_oportunidades = "Riesgo muy alto";
            }

             //manejo intr_ctrl_cambio
             if($intr_ctrl_cambio == 0 or $intr_ctrl_cambio <= 16.7){
                $Resintr_ctrl_cambio = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_ctrl_cambio == 16.8 or $intr_ctrl_cambio <= 33.3){
                $Resintr_ctrl_cambio = "Riesgo bajo";
            }
            elseif($intr_ctrl_cambio == 33.4 or $intr_ctrl_cambio <= 41.7){
                $Resintr_ctrl_cambio = "Riesgo medio";
            }
            elseif($intr_ctrl_cambio == 41.8 or $intr_ctrl_cambio <= 58.3){
                $Resintr_ctrl_cambio = "Riesgo alto";
            }
            elseif($intr_ctrl_cambio == 58.4 or $intr_ctrl_cambio <= 100){
                $Resintr_ctrl_cambio = "Riesgo muy alto";
            }

              //control intr_ctrl_autonomia
            if($intr_ctrl_autonomia == 0 or $intr_ctrl_autonomia <= 33.3){
                $Resintr_ctrl_autonomia = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_ctrl_autonomia == 33.4 or $intr_ctrl_autonomia <= 50.0){
                $Resintr_ctrl_autonomia = "Riesgo bajo";
            }
            elseif($intr_ctrl_autonomia == 50.1 or $intr_ctrl_autonomia <= 66.7){
                $Resintr_ctrl_autonomia = "Riesgo medio";
            }
            elseif($intr_ctrl_autonomia == 66.8 or $intr_ctrl_autonomia <= 75.0){
                $Resintr_ctrl_autonomia = "Riesgo alto";
            }
            elseif($intr_ctrl_autonomia == 75.1 or $intr_ctrl_autonomia <= 100){
                $Resintr_ctrl_autonomia = "Riesgo muy alto";
            }

            //demandas_ambientales  intr_deman_ambiental
            if($intr_deman_ambiental == 0 or $intr_deman_ambiental <= 22.9){
                $Resintr_deman_ambiental = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_deman_ambiental == 23.0 or $intr_deman_ambiental <= 31.3){
                $Resintr_deman_ambiental = "Riesgo bajo";
            }
            elseif($intr_deman_ambiental == 31.4 or $intr_deman_ambiental <= 39.6){
                $Resintr_deman_ambiental = "Riesgo medio";
            }
            elseif($intr_deman_ambiental == 39.7 or $intr_deman_ambiental <= 47.9){
                $Resintr_deman_ambiental = "Riesgo alto";
            }
            elseif($intr_deman_ambiental == 48.0 or $intr_deman_ambiental <= 100){
                $Resintr_deman_ambiental = "Riesgo muy alto";
            }

             //demandas_emocionales intr_deman_emocionales
             if($intr_deman_emocionales == 0 or $intr_deman_emocionales <= 19.4){
                $Resintr_deman_emocionales = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_deman_emocionales == 19.5 or $intr_deman_emocionales <= 27.8){
                $Resintr_deman_emocionales = "Riesgo bajo";
            }
            elseif($intr_deman_emocionales == 27.9 or $intr_deman_emocionales <= 38.9){
                $Resintr_deman_emocionales = "Riesgo medio";
            }
            elseif($intr_deman_emocionales == 39.0 or $intr_deman_emocionales <= 47.2){
                $Resintr_deman_emocionales = "Riesgo alto";
            }
            elseif($intr_deman_emocionales == 47.3 or $intr_deman_emocionales <= 100){
                $Resintr_deman_emocionales = "Riesgo muy alto";
            }

              //demandas_jornada intr_deman_jornada
              if($intr_deman_jornada == 0 or $intr_deman_jornada <= 25.0){
                $Resintr_deman_jornada = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_deman_jornada == 25.1 or $intr_deman_jornada <= 37.5){
                $Resintr_deman_jornada = "Riesgo bajo";
            }
            elseif($intr_deman_jornada == 37.6 or $intr_deman_jornada <= 45.8){
                $Resintr_deman_jornada = "Riesgo medio";
            }
            elseif($intr_deman_jornada == 45.9 or $intr_deman_jornada <= 58.3){
                $Resintr_deman_jornada = "Riesgo alto";
            }
            elseif($intr_deman_jornada == 58.4 or $intr_deman_jornada <= 100){
                $Resintr_deman_jornada = "Riesgo muy alto";
            }

              //$influ_extralaboral
              if($intr_deman_influencia == 0 or $intr_deman_influencia <= 12.5){
                $Resintr_deman_influencia = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_deman_influencia == 12.6 or $intr_deman_influencia <= 25.0){
                $Resintr_deman_influencia = "Riesgo bajo";
            }
            elseif($intr_deman_influencia == 25.1 or $intr_deman_influencia <= 31.3){
                $Resintr_deman_influencia = "Riesgo medio";
            }
            elseif($intr_deman_influencia == 31.4 or $intr_deman_influencia <= 50.0){
                $Resintr_deman_influencia = "Riesgo alto";
            }
            elseif($intr_deman_influencia == 50.1 or $intr_deman_influencia <= 100){
                $Resintr_deman_influencia = "Riesgo muy alto";
            }
               //demandas_cuantitativas intr_deman_cuantitativas
               if($intr_deman_cuantitativas == 0 or $intr_deman_cuantitativas <= 16.7){
                $Resintr_deman_cuantitativas = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_deman_cuantitativas == 16.8 or $intr_deman_cuantitativas <= 33.3){
                $Resintr_deman_cuantitativas = "Riesgo bajo";
            }
            elseif($intr_deman_cuantitativas == 33.4 or $intr_deman_cuantitativas <= 41.7){
                $Resintr_deman_cuantitativas = "Riesgo medio";
            }
            elseif($intr_deman_cuantitativas == 41.8 or $intr_deman_cuantitativas <= 50.0){
                $Resintr_deman_cuantitativas = "Riesgo alto";
            }
            elseif($intr_deman_cuantitativas == 50.1 or $intr_deman_cuantitativas <= 100){
                $Resintr_deman_cuantitativas = "Riesgo muy alto";
            }

               //demandas_mental intr_deman_carmental
               if($intr_deman_carmental == 0 or $intr_deman_carmental <= 50.0){
                $Resintr_deman_carmental = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_deman_carmental == 50.1 or $intr_deman_carmental <= 65.0){
                $Resintr_deman_carmental = "Riesgo bajo";
            }
            elseif($intr_deman_carmental == 65.1 or $intr_deman_carmental <= 75.0){
                $Resintr_deman_carmental = "Riesgo medio";
            }
            elseif($intr_deman_carmental == 75.1 or $intr_deman_carmental <= 85.0){
                $Resintr_deman_carmental = "Riesgo alto";
            }
            elseif($intr_deman_carmental == 85.1 or $intr_deman_carmental <= 100){
                $Resintr_deman_carmental = "Riesgo muy alto";
            }
            //intr_recom_reconocimiento
            if($intr_recom_reconocimiento == 0 or $intr_recom_reconocimiento <= 0.9){
                $Resintr_recom_reconocimiento = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_recom_reconocimiento ==1.0 or $intr_recom_reconocimiento <= 12.5){
                $Resintr_recom_reconocimiento = "Riesgo bajo";
            }
            elseif($intr_recom_reconocimiento == 12.6 or $intr_recom_reconocimiento <= 25){
                $Resintr_recom_reconocimiento = "Riesgo medio";
            }
            elseif($intr_recom_reconocimiento == 25.1 or $intr_recom_reconocimiento <= 37.5){
                $Resintr_recom_reconocimiento = "Riesgo alto";
            }
            elseif($intr_recom_reconocimiento == 37.6 or $intr_recom_reconocimiento <= 100){
                $Resintr_recom_reconocimiento = "Riesgo muy alto";
            }
            //intr_recom_recompensas
            if($intr_recom_recompensas == 0 or $intr_recom_recompensas <= 0.9){
                $Resintr_recom_recompensas = "Sin riesgo o riesgo despreciable";
            }
            elseif($intr_recom_recompensas == 1.0 or $intr_recom_recompensas <= 6.3){
                $Resintr_recom_recompensas = "Riesgo bajo";
            }
            elseif($intr_recom_recompensas == 6.4 or $intr_recom_recompensas <= 12.5){
                $Resintr_recom_recompensas = "Riesgo medio";
            }
            elseif($intr_recom_recompensas == 12.6 or $intr_recom_recompensas <= 18.8){
                $Resintr_recom_recompensas = "Riesgo alto";
            }
            elseif($intr_recom_recompensas == 18.9 or $intr_recom_recompensas <= 100){
                $Resintr_recom_recompensas = "Riesgo muy alto";
            }

                        //intr_total_liderazgo_rela
                        if($intr_total_liderazgo_rela == 0 or $intr_total_liderazgo_rela <= 8.3){
                            $Resintr_total_liderazgo_rela = "Sin riesgo o riesgo despreciable";
                        }
                        elseif($intr_total_liderazgo_rela == 8.4 or $intr_total_liderazgo_rela <= 17.5){
                            $Resintr_total_liderazgo_rela = "Riesgo bajo";
                        }
                        elseif($intr_total_liderazgo_rela == 17.6 or $intr_total_liderazgo_rela <= 26.7){
                            $Resintr_total_liderazgo_rela = "Riesgo medio";
                        }
                        elseif($intr_total_liderazgo_rela == 26.8 or $intr_total_liderazgo_rela <= 38.3){
                            $Resintr_total_liderazgo_rela = "Riesgo alto";
                        }
                        elseif($intr_total_liderazgo_rela == 38.4 or $intr_total_liderazgo_rela <= 100){
                            $Resintr_total_liderazgo_rela = "Riesgo muy alto";
                        }
            
                         //intr_total_ctrl
                         if($intr_total_ctrl == 0 or $intr_total_ctrl <= 19.4){
                            $Resintr_total_ctrl = "Sin riesgo o riesgo despreciable";
                        }
                        elseif($intr_total_ctrl == 19.5 or $intr_total_ctrl <= 26.4){
                            $Resintr_total_ctrl = "Riesgo bajo";
                        }
                        elseif($intr_total_ctrl == 26.5 or $intr_total_ctrl <= 34.7){
                            $Resintr_total_ctrl = "Riesgo medio";
                        }
                        elseif($intr_total_ctrl == 34.8 or $intr_total_ctrl <= 43.1){
                            $Resintr_total_ctrl = "Riesgo alto";
                        }
                        elseif($intr_total_ctrl == 43.2 or $intr_total_ctrl <= 100){
                            $Resintr_total_ctrl = "Riesgo muy alto";
                        }
            
                        //intr_total_deman
                        if($intr_total_deman == 0 or $intr_total_deman <= 26.9){
                            $Resintr_total_deman = "Sin riesgo o riesgo despreciable";
                        }
                        elseif($intr_total_deman == 27.0 or $intr_total_deman <= 33.3){
                            $Resintr_total_deman = "Riesgo bajo";
                        }
                        elseif($intr_total_deman == 33.4 or $intr_total_deman <= 37.8){
                            $Resintr_total_deman = "Riesgo medio";
                        }
                        elseif($intr_total_deman == 37.9 or $intr_total_deman <= 44.2){
                            $Resintr_total_deman = "Riesgo alto";
                        }
                        elseif($intr_total_deman == 44.3 or $intr_total_deman <= 100){
                            $Resintr_total_deman = "Riesgo muy alto";
                        }
            
                        //intr_total_recompensas
                        if($intr_total_recompensas == 0 or $intr_total_recompensas <= 2.5){
                            $Resintr_total_recompensas = "Sin riesgo o riesgo despreciable";
                        }
                        elseif($intr_total_recompensas == 2.6 or $intr_total_recompensas <= 10.0){
                            $Resintr_total_recompensas = "Riesgo bajo";
                        }
                        elseif($intr_total_recompensas == 10.1 or $intr_total_recompensas <= 17.5){
                            $Resintr_total_recompensas = "Riesgo medio";
                        }
                        elseif($intr_total_recompensas == 17.6 or $intr_total_recompensas <= 27.5){
                            $Resintr_total_recompensas = "Riesgo alto";
                        }
                        elseif($intr_total_recompensas == 27.6 or $intr_total_recompensas <= 100){
                            $Resintr_total_recompensas = "Riesgo muy alto";
                        }

                        //total_intralaboral_fin
            if($total_intralaboral_fin == 0 or $total_intralaboral_fin <= 20.6){
                $Restotal_intralaboral_fin = "Sin riesgo o riesgo despreciable";
            }
            elseif($total_intralaboral_fin == 20.7 or $total_intralaboral_fin <= 26.0){
                $Restotal_intralaboral_fin = "Riesgo bajo";
            }
            elseif($total_intralaboral_fin == 26.1 or $total_intralaboral_fin <= 31.2){
                $Restotal_intralaboral_fin = "Riesgo medio";
            }
            elseif($total_intralaboral_fin == 31.3 or $total_intralaboral_fin <= 38.7){
                $Restotal_intralaboral_fin = "Riesgo alto";
            }
            elseif($total_intralaboral_fin == 38.8 or $total_intralaboral_fin <= 100){
                $Restotal_intralaboral_fin = "Riesgo muy alto";
            }

            //total_extralaboral_fin
            if($total_extralaboral_fin == 0 or $total_extralaboral_fin <= 19.9){
                $Restotal_extralaboral_fin = "Sin riesgo o riesgo despreciable";
            }
            elseif($total_extralaboral_fin == 20.0 or $total_extralaboral_fin <= 24.8){
                $Restotal_extralaboral_fin = "Riesgo bajo";
            }
            elseif($total_extralaboral_fin == 24.9 or $total_extralaboral_fin <= 29.5){
                $Restotal_extralaboral_fin = "Riesgo medio";
            }
            elseif($total_extralaboral_fin == 29.6 or $total_extralaboral_fin <= 35.4){
                $Restotal_extralaboral_fin = "Riesgo alto";
            }
            elseif($total_extralaboral_fin == 35.5 or $total_extralaboral_fin <= 100){
                $Restotal_extralaboral_fin = "Riesgo muy alto";
            }
         }

             //extralab_tiempof
             if($extralab_tiempof == 0 or $extralab_tiempof <= 6.3){
                $Resextralab_tiempof = "Sin riesgo o riesgo despreciable";
            }
            elseif($extralab_tiempof == 6.4 or $extralab_tiempof <= 25.0){
                $Resextralab_tiempof = "Riesgo bajo";
            }
            elseif($extralab_tiempof == 25.1 or $extralab_tiempof <= 37.5){
                $Resextralab_tiempof = "Riesgo medio";
            }
            elseif($extralab_tiempof == 37.6 or $extralab_tiempof <= 50.0){
                $Resextralab_tiempof = "Riesgo alto";
            }
            elseif($extralab_tiempof == 50.1 or $extralab_tiempof <= 100){
                $Resextralab_tiempof = "Riesgo muy alto";
            }

             //extralab_relafami
             if($extralab_relafami == 0 or $extralab_relafami <= 8.3){
                $Resextralab_relafami = "Sin riesgo o riesgo despreciable";
            }
            elseif($extralab_relafami == 8.4 or $extralab_relafami <= 25.0){
                $Resextralab_relafami = "Riesgo bajo";
            }
            elseif($extralab_relafami == 25.1 or $extralab_relafami <= 33.3){
                $Resextralab_relafami = "Riesgo medio";
            }
            elseif($extralab_relafami == 33.4 or $extralab_relafami <= 50.0){
                $Resextralab_relafami = "Riesgo alto";
            }
            elseif($extralab_relafami == 50.1 or $extralab_relafami <= 100){
                $Resextralab_relafami = "Riesgo muy alto";
            }

             //extralab_comunicacion
             if($extralab_comunicacion == 0 or $extralab_comunicacion <= 5.0){
                $Resextralab_comunicacion = "Sin riesgo o riesgo despreciable";
            }
            elseif($extralab_comunicacion == 5.1 or $extralab_comunicacion <= 15.0){
                $Resextralab_comunicacion = "Riesgo bajo";
            }
            elseif($extralab_comunicacion == 15.1 or $extralab_comunicacion <= 25.0){
                $Resextralab_comunicacion = "Riesgo medio";
            }
            elseif($extralab_comunicacion == 25.1 or $extralab_comunicacion <= 35.0){
                $Resextralab_comunicacion = "Riesgo alto";
            }
            elseif($extralab_comunicacion == 35.1 or $extralab_comunicacion <= 100){
                $Resextralab_comunicacion = "Riesgo muy alto";
            }

             //extralab_situacion_econo
             if($extralab_situacion_econo == 0 or $extralab_situacion_econo <= 16.7){
                $Resextralab_situacion_econo = "Sin riesgo o riesgo despreciable";
            }
            elseif($extralab_situacion_econo == 16.8 or $extralab_situacion_econo <= 25.0){
                $Resextralab_situacion_econo = "Riesgo bajo";
            }
            elseif($extralab_situacion_econo == 25.1 or $extralab_situacion_econo <= 41.7){
                $Resextralab_situacion_econo = "Riesgo medio";
            }
            elseif($extralab_situacion_econo == 41.8 or $extralab_situacion_econo <= 50.0){
                $Resextralab_situacion_econo = "Riesgo alto";
            }
            elseif($extralab_situacion_econo == 50.1 or $extralab_situacion_econo <= 100){
                $Resextralab_situacion_econo = "Riesgo muy alto";
            }

              //extralab_carvivienda
              if($extralab_carvivienda == 0 or $extralab_carvivienda <= 5.6){
                $Resextralab_carvivienda = "Sin riesgo o riesgo despreciable";
            }
            elseif($extralab_carvivienda == 5.7 or $extralab_carvivienda <= 11.1){
                $Resextralab_carvivienda = "Riesgo bajo";
            }
            elseif($extralab_carvivienda == 11.2 or $extralab_carvivienda <= 16.7){
                $Resextralab_carvivienda = "Riesgo medio";
            }
            elseif($extralab_carvivienda == 16.8 or $extralab_carvivienda <= 27.8){
                $Resextralab_carvivienda = "Riesgo alto";
            }
            elseif($extralab_carvivienda == 27.9 or $extralab_carvivienda <= 100){
                $Resextralab_carvivienda = "Riesgo muy alto";
            }

              //extralab_influenciaent
              if($extralab_influenciaent == 0 or $extralab_influenciaent <= 8.3){
                $Resextralab_influenciaent = "Sin riesgo o riesgo despreciable";
            }
            elseif($extralab_influenciaent == 8.4 or $extralab_influenciaent <= 16.7){
                $Resextralab_influenciaent = "Riesgo bajo";
            }
            elseif($extralab_influenciaent == 16.8 or $extralab_influenciaent <= 25.0){
                $Resextralab_influenciaent = "Riesgo medio";
            }
            elseif($extralab_influenciaent == 25.1 or $extralab_influenciaent <= 41.7){
                $Resextralab_influenciaent = "Riesgo alto";
            }
            elseif($extralab_influenciaent == 41.8 or $extralab_influenciaent <= 100){
                $Resextralab_influenciaent = "Riesgo muy alto";
            }

               //extralab_desplazamiento
               if($extralab_desplazamiento == 0 or $extralab_desplazamiento <= 0.9){
                $Resextralab_desplazamiento = "Sin riesgo o riesgo despreciable";
            }
            elseif($extralab_desplazamiento == 1.0 or $extralab_desplazamiento <= 12.5){
                $Resextralab_desplazamiento = "Riesgo bajo";
            }
            elseif($extralab_desplazamiento == 12.6 or $extralab_desplazamiento <= 25.0){
                $Resextralab_desplazamiento = "Riesgo medio";
            }
            elseif($extralab_desplazamiento == 25.1 or $extralab_desplazamiento <= 43.8){
                $Resextralab_desplazamiento = "Riesgo alto";
            }
            elseif($extralab_desplazamiento == 43.9 or $extralab_desplazamiento <= 100){
                $Resextralab_desplazamiento = "Riesgo muy alto";
            }

                           //extralab_total
                           if($extralab_total == 0 or $extralab_total <= 12.9){
                            $Resextralab_total = "Sin riesgo o riesgo despreciable";
                        }
                        elseif($extralab_total == 13.0 or $extralab_total <= 17.7){
                            $Resextralab_total = "Riesgo bajo";
                        }
                        elseif($extralab_total == 17.8 or $extralab_total <= 24.2){
                            $Resextralab_total = "Riesgo medio";
                        }
                        elseif($extralab_total == 24.3 or $extralab_total <= 32.3){
                            $Resextralab_total = "Riesgo alto";
                        }
                        elseif($extralab_total == 32.4 or $extralab_total <= 100){
                            $Resextralab_total = "Riesgo muy alto";
                        }

            //estres_fisiolo
            if($estres_fisiolo == 0 or $estres_fisiolo <= 7.8){
                $Resestres_fisiolo = "Sin riesgo o riesgo despreciable";
            }
            elseif($estres_fisiolo == 7.9 or $estres_fisiolo <= 12.6){
                $Resestres_fisiolo = "Riesgo bajo";
            }
            elseif($estres_fisiolo == 12.7 or $estres_fisiolo <= 17.7){
                $Resestres_fisiolo = "Riesgo medio";
            }
            elseif($estres_fisiolo == 17.8 or $estres_fisiolo <= 25.0){
                $Resestres_fisiolo = "Riesgo alto";
            }
            elseif($estres_fisiolo == 25.1 or $estres_fisiolo <= 100){
                $Resestres_fisiolo = "Riesgo muy alto";
            }

             //estres_comportamiento
             if($estres_comportamiento == 0 or $estres_comportamiento <= 7.8){
                $Resestres_comportamiento = "Sin riesgo o riesgo despreciable";
            }
            elseif($estres_comportamiento == 7.9 or $estres_comportamiento <= 12.6){
                $Resestres_comportamiento = "Riesgo bajo";
            }
            elseif($estres_comportamiento == 12.7 or $estres_comportamiento <= 17.7){
                $Resestres_comportamiento = "Riesgo medio";
            }
            elseif($estres_comportamiento == 17.8 or $estres_comportamiento <= 25.0){
                $Resestres_comportamiento = "Riesgo alto";
            }
            elseif($estres_comportamiento == 25.1 or $estres_comportamiento <= 100){
                $Resestres_comportamiento = "Riesgo muy alto";
            }

             //estres_intelectuales
             if($estres_intelectuales == 0 or $estres_intelectuales <= 7.8){
                $Resestres_intelectuales = "Sin riesgo o riesgo despreciable";
            }
            elseif($estres_intelectuales == 7.9 or $estres_intelectuales <= 12.6){
                $Resestres_intelectuales = "Riesgo bajo";
            }
            elseif($estres_intelectuales == 12.7 or $estres_intelectuales <= 17.7){
                $Resestres_intelectuales = "Riesgo medio";
            }
            elseif($estres_intelectuales == 17.8 or $estres_intelectuales <= 25.0){
                $Resestres_intelectuales = "Riesgo alto";
            }
            elseif($estres_intelectuales == 25.1 or $estres_intelectuales <= 100){
                $Resestres_intelectuales = "Riesgo muy alto";
            }

             //estres_psicoemocionales
             if($estres_psicoemocionales == 0 or $estres_psicoemocionales <= 7.8){
                $Resestres_psicoemocionales = "Sin riesgo o riesgo despreciable";
            }
            elseif($estres_psicoemocionales == 7.9 or $estres_psicoemocionales <= 12.6){
                $Resestres_psicoemocionales = "Riesgo bajo";
            }
            elseif($estres_psicoemocionales == 12.7 or $estres_psicoemocionales <= 17.7){
                $Resestres_psicoemocionales = "Riesgo medio";
            }
            elseif($estres_psicoemocionales == 17.8 or $estres_psicoemocionales <= 25.0){
                $Resestres_psicoemocionales = "Riesgo alto";
            }
            elseif($estres_psicoemocionales == 25.1 or $estres_psicoemocionales <= 100){
                $Resestres_psicoemocionales = "Riesgo muy alto";
            }

            //estres_total
            if($estres_total == 0 or $estres_total <= 7.8){
                $Resestres_total = "Sin riesgo o riesgo despreciable";
            }
            elseif($estres_total == 7.9 or $estres_total <= 12.6){
                $Resestres_total = "Riesgo bajo";
            }
            elseif($estres_total == 12.7 or $estres_total <= 17.7){
                $Resestres_total = "Riesgo medio";
            }
            elseif($estres_total == 17.8 or $estres_total <= 25.0){
                $Resestres_total = "Riesgo alto";
            }
            elseif($estres_total == 25.1 or $estres_total <= 100){
                $Resestres_total = "Riesgo muy alto";
            }

            $array2 = array("emdcedula"=>$emdcedula,
                            "emdnombres"=>$emdnom,
                            "emdapellidos"=>$emdape,
                            "emdciudad"=>$emdciu,
                            "emdempresa"=>$emdempresa,
                            "arenombre"=>$arenombre,
                            "Resintr_lider_liderazgo"=>$Resintr_lider_liderazgo,
                            "Resintr_lider_relaciones"=>$Resintr_lider_relaciones,
                            "Resintr_lider_retroalimenta"=>$Resintr_lider_retroalimenta,
                            "Resintr_lider_rela_colabora"=>$Resintr_lider_rela_colabora,
                            "Resintr_total_liderazgo_rela"=>$Resintr_total_liderazgo_rela,
                            "intr_total_liderazgo_rela_val"=>$intr_total_liderazgo_rela_val,
                            "intr_lider_liderazgo_val"=>$intr_lider_liderazgo_val,
                            "intr_lider_relaciones_val"=>$intr_lider_relaciones_val,
                            "intr_lider_retroalimenta_val"=>$intr_lider_retroalimenta_val,
                            "intr_lider_rela_colabora_val"=>$intr_lider_rela_colabora_val,
                            "Resintr_ctrl_rol"=>$Resintr_ctrl_rol,
                            "Resintr_ctrl_capacita"=>$Resintr_ctrl_capacita,
                            "Resintr_ctrl_oportunidades"=>$Resintr_ctrl_oportunidades,
                            "Resintr_ctrl_cambio"=>$Resintr_ctrl_cambio,
                            "Resintr_ctrl_autonomia"=>$Resintr_ctrl_autonomia,
                            "Resintr_total_ctrl"=>$Resintr_total_ctrl,
                            "intr_total_ctrl_val"=>$intr_total_ctrl_val,
                            "intr_ctrl_rol_val"=>$intr_ctrl_rol_val,
                            "intr_ctrl_capacita_val"=>$intr_ctrl_capacita_val,
                            "intr_ctrl_cambio_val"=>$intr_ctrl_cambio_val,
                            "intr_ctrl_oportunidades_val"=>$intr_ctrl_oportunidades_val,
                            "intr_ctrl_autonomia_val"=>$intr_ctrl_autonomia_val,
                            "Resintr_deman_ambiental"=>$Resintr_deman_ambiental,
                            "Resintr_deman_responsa"=>$Resintr_deman_responsa,
                            "Resintr_deman_consistencia"=>$Resintr_deman_consistencia,
                            "Resintr_deman_emocionales"=>$Resintr_deman_emocionales,
                            "Resintr_deman_jornada"=>$Resintr_deman_jornada,
                            "Resintr_deman_influencia"=>$Resintr_deman_influencia,
                            "Resintr_deman_cuantitativas"=>$Resintr_deman_cuantitativas,
                            "Resintr_deman_carmental"=>$Resintr_deman_carmental,
                            "Resintr_total_deman"=>$Resintr_total_deman,
                            "intr_total_deman_val"=>$intr_total_deman_val,
                            "intr_deman_ambientales_val"=>$intr_deman_ambientales_val,
                            "intr_deman_emocionales_val"=>$intr_deman_emocionales_val,
                            "intr_deman_cuantitativas_val"=>$intr_deman_cuantitativas_val,
                            "intr_deman_influencia_val"=>$intr_deman_influencia_val,
                            "intr_deman_responsa_val"=>$intr_deman_responsa_val,
                            "intr_deman_carmental_val"=>$intr_deman_carmental_val,
                            "intr_deman_consistencia_val"=>$intr_deman_consistencia_val,
                            "intr_deman_jornada_val"=>$intr_deman_jornada_val,
                            "Resintr_recom_reconocimiento"=>$Resintr_recom_reconocimiento,
                            "Resintr_recom_recompensas"=>$Resintr_recom_recompensas,
                            "Resintr_total_recompensas"=>$Resintr_total_recompensas,
                            "intr_total_recompensas_val"=>$intr_total_recompensas_val,
                            "intr_recom_recompensas_val"=>$intr_recom_recompensas_val,
                            "intr_recom_reconocimiento_val"=>$intr_recom_reconocimiento_val,
                            "Resextralab_tiempof"=>$Resextralab_tiempof,
                            "Resextralab_relafami"=>$Resextralab_relafami,
                            "Resextralab_comunicacion"=>$Resextralab_comunicacion,
                            "Resextralab_situacion_econo"=>$Resextralab_situacion_econo,
                            "Resextralab_carvivienda"=>$Resextralab_carvivienda,
                            "Resextralab_influenciaent"=>$Resextralab_influenciaent,
                            "Resextralab_desplazamiento"=>$Resextralab_desplazamiento,
                            "Resextralab_total"=>$Resextralab_total,
                            "extralab_total_val"=>$extralab_total_val,
                            "extralab_tiempof_val"=>$extralab_tiempof_val,
                            "extralab_relafami_val"=>$extralab_relafami_val,
                            "extralab_comunicacion_val"=>$extralab_comunicacion_val,
                            "extralab_situacion_econo_val"=>$extralab_situacion_econo_val,
                            "extralab_carvivienda_val"=>$extralab_carvivienda_val,
                            "extralab_influenciaent_val"=>$extralab_influenciaent_val,
                            "extralab_desplazamiento_val"=>$extralab_desplazamiento_val,
                            "Resestres_fisiolo"=>$Resestres_fisiolo,
                            "Resestres_comportamiento"=>$Resestres_comportamiento,
                            "Resestres_intelectuales"=>$Resestres_intelectuales,
                            "Resestres_psicoemocionales"=>$Resestres_psicoemocionales,
                            "Resestres_total"=>$Resestres_total,
                            "estres_total_val"=>$estres_total_val,
                            "estres_fisiolo_val"=>$estres_fisiolo_val,
                            "estres_comportamiento_val"=>$estres_comportamiento_val,
                            "estres_intelectuales_val"=>$estres_intelectuales_val,
                            "psicoemocionales_val"=>$psicoemocionales_val,
                            "total_general"=>$total_general,
                            "Restotal_intralaboral_fin"=>$Restotal_intralaboral_fin,
                            "Restotal_extralaboral_fin"=>$Restotal_extralaboral_fin,
                            "total_general_val"=>$total_general_val,
                            "total_intralaboral_fin_val"=>$total_intralaboral_fin_val,
                            "total_extralaboral_fin_val"=>$total_extralaboral_fin_val
                            );

            array_push($arraytotal,$array2);
            $array = [];
        }

        return $arraytotal;
    }
    

}