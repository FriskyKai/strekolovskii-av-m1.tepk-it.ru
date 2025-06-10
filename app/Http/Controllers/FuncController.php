<?php

namespace App\Http\Controllers;

use App\Models\MaterialType;
use App\Models\ProductType;

class FuncController extends Controller
{
    // Метод из 4 задания
    public function method_4m(ProductType $productTypeId, MaterialType $materialTypeId, int $quantity, float $p1, float $p2, float $storage) {
        try {
            // Валидация
            if ($quantity <= 0 || $p1 <= 0 || $p2 <= 0 || $storage < 0) {
                return -1;
            }

            $productType = ProductType::findOrFail($productTypeId);
            if (!$productType instanceof ProductType) {
                return -1;
            }

            $materialType = MaterialType::findOrFail($materialTypeId);
            if (!$materialType instanceof MaterialType) {
                return -1;
            }

            // Кол-во материала с учётом брака
            $material_quantity = $p1 * $p2 * $productType->coefficient * $quantity * (1 + $materialType->defect / 100);

            return max(0, ceil($material_quantity - $storage));
        } catch (\Exception $e) {
            return -1;
        }
    }

}
