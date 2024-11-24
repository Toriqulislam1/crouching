<?php

namespace App\Services;

use App\Models\Package;

class PackageService
{
    public function getAllPackages()
    {
        return Package::latest()->get();
    }

    public function editPackage($packageId)
    {
        return Package::findOrFail($packageId);
    }

    public function storePackage(array $data)
    {
        $requestAmount = $data['price'];
        if ($data['discount_percent']) {
            if (strpos($data['discount_percent'], '%') !== false) {
                $percentage = (float) str_replace('%', '', $data['discount_percent']);
                $discountAmount = ($percentage / 100) * $requestAmount;
            } else {
                $discountAmount = $data['discount_percent'];
            }
        } else {
            $discountAmount = 0;
        }

        $totalAmount = $requestAmount - $discountAmount;
        $data['final_price'] = $totalAmount;
        $data['feature'] = json_encode($data['feature']);
        $data['batch'] = json_encode($data['batch']);
        return Package::create($data);
    }

    public function updatePackage($packageId, array $data)
    {
        $package = $this->editPackage($packageId);
        $requestAmount = $data['price'];
        if ($data['discount_percent']) {
            if (strpos($data['discount_percent'], '%') !== false) {
                $percentage = (float) str_replace('%', '', $data['discount_percent']);
                $discountAmount = ($percentage / 100) * $requestAmount;
            } else {
                $discountAmount = $data['discount_percent'];
            }
        } else {
            $discountAmount = 0;
        }

        $totalAmount = $requestAmount - $discountAmount;
        $data['final_price'] = $totalAmount;
        $data['feature'] = json_encode($data['feature']);
        $package->update($data);
        return $package;
    }

    public function deletePackage($packageId)
    {
        $package = $this->getPackageById($packageId);
        $package->delete();
    }
}

?>