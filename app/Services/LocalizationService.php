<?php

namespace App\Services;

use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\HttpException;

class LocalizationService
{
    public static function getStates()
    {
        try {
            return Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados/');
        } catch (ConnectException $ce) {
            dd($ce);
        } catch (HttpException $he) {
            dd($he);
        } 
    }
}