<?php
namespace App\Traits;

trait WebResponseTrait
{
    public function returnSuccessWithRoute($route, $mes = false) {
        if(!$mes) {
            $mes = 'ok';
        }
        return redirect()->route($route)->with([
            'status' => 'success',
            'message' => $mes
        ]);
    }

    public function returnSuccessWithUrl($url, $mes = false) {
        if(!$mes) {
            $mes = 'ok';
        }
        return redirect($url)->with([
            'status' => 'success',
            'message' => $mes
        ]);
    }

    public function returnFailedWithRoute($route, $mes = false) {
        if(!$mes) {
            $mes = 'failed';
        }
        return redirect()->route($route)->with([
            'status' => 'error',
            'message' => $mes
        ]);
    }

    public function returnFailedWithUrl($url, $mes = false) {
        if(!$mes) {
            $mes = 'failed';
        }
        return redirect($url)->with([
            'status' => 'error',
            'message' => $mes
        ]);
    }

    public function returnSuccess($message) {
        request()->session()->flash('status', 'success');
        request()->session()->flash('message', $message);
        return response()->json(['success' => true]);
    }

    public function returnError($message) {
        request()->session()->flash('status', 'error');
        request()->session()->flash('message', $message);
        return response()->json(['success' => true]);
    }
}
