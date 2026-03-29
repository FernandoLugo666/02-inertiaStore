<?php

namespace App\Http\Controllers;

use App\Models\ContactGeneral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Throwable;

class GeneralController extends Controller
{
    public function generalTable()
    {
        $data = ContactGeneral::query()->get();
        return Inertia::render("Dashboard/Contact/General", ["data" => $data]);
    }

    public function crearContacto(Request $request)
    {

        if ($request->isMethod('POST')) {
            try {
                ContactGeneral::create([
                    "subject" => $request->subject,
                    "message" => $request->message,
                    "type" => $request->type["name"],
                ]);

                Log::debug("Contacto creado correctamente");
                return redirect()->back()->with('success', 'Contacto creado correctamente');
            } catch (Throwable $th) {

                Log::debug("Error crearContacto" . $th->getMessage());
                return redirect()->back()->with('error', 'NO se pudo crear el contacto');
            }
        }
        return Inertia::render("Dashboard/Contact/CreateContact");
    }

    public function updateContact(Request $request, $id)
    {
        $data = ContactGeneral::findOrFail($id);

        if ($request->isMethod('PUT')) {
            // dd($request->all());
            try {
                $data->update([
                    "subject" => $request->subject,
                    "message" => $request->message,
                    "type" => $request->type
                ]);
                Log::debug('Success, updateContact');
                return redirect()->back()->with('success', 'Contacto actualizado correctamente');
            } catch (Throwable $th) {
                Log::debug('Error updateContact ' . $th->getMessage());
                return redirect()->back()->with('error', 'Error al actualizar el contacto');
            }
        }


        return Inertia::render("Dashboard/Contact/UpdateContact", ["data" => $data]);
    }
}
