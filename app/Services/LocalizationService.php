<?php

namespace App\Services;

use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\HttpException;

class LocalizationService
{
    public function getAllStates()
    {
        try {
            $states = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados/');
            return $states->json();
        } catch (ConnectException $ce) {
            dd($ce);
        } catch (HttpException $he) {
            dd($he);
        } 
    }

    public function getAllCitys($stateId)
    {
        try {
            $citys = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados/'.$stateId.'/municipios');
            return $citys->json();
        } catch (ConnectException $ce) {
            dd($ce);
        } catch (HttpException $he) {
            dd($he);
        } 
    }
}