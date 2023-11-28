<?php

namespace App\Http\Interfaces;

use App\Http\Requests\StoreCertficateRequest;
use App\Http\Requests\UpdateCertficateRequest;


interface UserCertficateInterface
{
    public function getCertficate();
    public function createCertficate(StoreCertficateRequest $request);
    public function updateCertficate(int $id, UpdateCertficateRequest $request);
    public function deleteCertficate(int $id);
    public function getByIdCertficate(int $id);
}
