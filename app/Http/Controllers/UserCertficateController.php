<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\UserCertficateInterface;
use App\Http\Requests\StoreCertficateRequest;
use App\Http\Requests\UpdateCertficateRequest;

class UserCertficateController extends Controller
{

    public function __construct(public UserCertficateInterface $cert)
    {
    }
    public function index()
    {
        return $this->cert->getCertficate();
    }
    public function store(StoreCertficateRequest $request)
    {
        return $this->cert->createCertficate($request);
    }
    public function show($id)
    {
        return $this->cert->getByIdCertficate($id);
    }
    public function update(UpdateCertficateRequest $request,  $id)
    {
        return $this->cert->updateCertficate($id, $request);
    }
    public function destroy($id)
    {
        return $this->cert->deleteCertficate($id);
    }
}
