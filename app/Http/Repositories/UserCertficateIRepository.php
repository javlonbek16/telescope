<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\UserCertficateInterface;
use App\Http\Requests\StoreCertficateRequest;
use App\Http\Requests\UpdateCertficateRequest;
use App\Models\UserCerificate;

class UserCertficateIRepository implements UserCertficateInterface
{
    public function __construct(public UserCerificate $certificate)
    {
    }

    public function getCertficate()
    {
        $certificate = UserCerificate::paginate(10);
        return $certificate;
    }
    public function createCertficate(StoreCertficateRequest $request)
    {
        $filePath = $request->file('image_certificate')->store('upload/certificate', 'public');

        $certificate = UserCerificate::create([
            'link_certificate' => $request->link_certificate,
            'image_certificate' => $filePath,
            'company_certificate' => $request->company_certificate,
            'date_reached' => $request->date_reached,
            'expires_date' => $request->expires_date,
            'user_id' => auth()->user()->id,
        ]);
        return $certificate;
    }

    public function updateCertficate(int $id, UpdateCertficateRequest $request)
    {
        $certificate = UserCerificate::find($id);
        if (auth()->user()->id != $certificate->user_id) {
            return response()->json(['error' => 'You are not allowed to this '], 401);
        }

        if (!$certificate) {
            return response()->json(['error' => 'Certificate not found'], 404);
        }
        $filePath = $request->file('image_certificate')->store('upload/certificate', 'public');

        $certificate->update([
            'link_certificate' => $request->link_certificate,
            'image_certificate' => $filePath,
            'company_certificate' => $request->company_certificate,
            'date_reached' => $request->date_reached,
            'expires_date' => $request->expires_date,
        ]);

        return $certificate;
    }
    public function deleteCertficate(int $id)
    {
        $certificate = UserCerificate::find($id);
        if (auth()->user()->id != $certificate->user_id) {
            return response()->json(['error' => 'you are not allowed to this '], 401);
        }

        if (!$certificate) {
            return response()->json(['error' => 'Certificate not found'], 404);
        }
        
        $certificate->delete();
        return ($certificate);
    }

    public function getByIdCertficate(int $id)
    {
        $certificate = UserCerificate::find($id);

        if (!$certificate) {
            return response()->json(['error' => 'Certificate not found'], 404);
        }

        return ($certificate);
    }
}
