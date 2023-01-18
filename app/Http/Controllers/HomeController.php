<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        try {
            $num1 = 5;
            $num2 = 10;
            logger()->debug('Aqui é um log antes da soma!');

            $soma = $num1 + $num2;
            logger()->info('A soma ficou: ', compact('soma'));

            $sub = $num1 - $num2;
            logger()->info('A subtração ficou: ', compact('num1', 'num2', 'sub'));

            if ($sub < 0) {
                logger()->error('Valor negativo', compact('sub'));
            } else {
                logger()->emergency('Valor postivo');
            }

            return "Hello World!";
        } catch (Exception $e){
            logger()->error($e);
            abort(500);
        }
    }

    public function soma($num1, $num2) {
        $soma = $num1 + $num2;

        logger()->info('Soma feita');

        return $soma;
    }

    public function sub($num1, $num2) {
        $sub = $num1 - $num2;

        logger()->debug('Sub feita', compact('num1', 'num2', 'sub'));

        return $sub;
    }

    public function div($num1, $num2) {
        $div = $num1 / $num2;

        if ($num2 == 0) {
            logger()->error('Divisor zero!');
        }

        logger()->info('Div feita');

        return $div;
    }

    public function mult($num1, $num2) {
        if ($num1 < 0 || $num2 < 0) {
            logger()->warning('Negativo');
        }

        return $num1 * $num2;
    }
}
