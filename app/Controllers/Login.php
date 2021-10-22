<?php
namespace  App\Controllers;

use App\Models\PenggunaModel_12200910;

class login extends BaseController{

    public function cekLogin(){
        $e = $this->request->getPost('email');
        $s = $this->request->getPost('sandi');
        return view('halaman/beranda', ['email'=>$e, 'sandi'=>$s]);

        $v = $this->validate([
            'email'     => 'required',
            'sandi'     => 'required'
        ],  [ 
            'email' =>[
                'required'      =>  'Email tidak boleh kosong'
            ],
            'sandi' =>[
                'required'      =>  'Sandi tidak boleh kosong'
            ]
        ]);

        $this->session->set('email',$e);
        $this->session->set('sandi',$s);

        if($v == false){
            $this->session->setFlashdata('validator', $this->validator);
           return redirect()->to('/login');
        }else{

            $vl = (new PenggunaModel())->cekLogin($e, $s);

            if($vl == null){
                return redirect()->to('/login')->swith('error', 'User dan sandi salah');
            }else{
                $this->session->set('sudahLogin',true);
                return redirect()->to('/beranda');
            }
        }
    }

public function beranda(){

}
}