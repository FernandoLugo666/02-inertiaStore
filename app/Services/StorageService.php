<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class StorageService
{

    public function saveImage($image)
    {
        if (empty($image)) {
            return null;
        }

        $filename = Carbon::now()->format('YmdHis') . '_' . $image->getClientOriginalName();

        //storeAs($path, $name = null, $disk = null)
        /*| Parámetro       | Qué significa                    |
        | --------------- | -------------------------------- |
        | 1️⃣ `'files'`   | Carpeta donde se guardará        |
        | 2️⃣ `$filename` | Nombre final del archivo         |
        | 3️⃣ `'public'`  | Disco configurado en filesystems |
 */
        $path = $image->storeAs('files', $filename, 'public');

        return $path;
    }
}
