<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\ContactCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Throwable;

class CompanyController extends Controller
{
    public function listCompany()
    {
        $data = ContactCompany::get();
        return Inertia::render("Dashboard/Company/ListCompany", ["data" => $data]);
    }

    public function createCompany(CompanyRequest $request)
    {
        if ($request->isMethod('POST')) {
            try {
                ContactCompany::create([
                    'name' => $request->name,
                    'identification' => $request->identification,
                    'email' => $request->email,
                    'extra' => $request->extra ?? '',
                    'contact_general_id' => 1,
                    'choices' => 'post',
                ]);

                return redirect()->route('listCompany')->with('success', 'Compañia creada correctamente');
            } catch (Throwable $th) {
                Log::debug('Error createCompany' . $th->getMessage());
                return redirect()->back()->with('error', 'Error al crear la compañía');
            }
        }
        return Inertia::render("Dashboard/Company/CreateCompany");
    }

    public function updateCompany(Request $request, $id)
    {
        $data = ContactCompany::findOrFail($id);
        if ($request->isMethod("PUT")) {
            ///dd($request->all());
            try {
                $data->update([
                    'name' => $request->name,
                    'identification' => $request->identification,
                    'email' => $request->email,
                    'extra' => $request->extra ?? '',
                    'contact_general_id' => 1,
                    'choices' => 'post',

                ]);
                return redirect()->back()->with('success', 'Compañia actualizada correctamente');
            } catch (Throwable $th) {
                Log::debug('Error updateCompany' . $th->getMessage());
                return redirect()->back()->with('error', 'Error al actualizar la compañía');
            }
        }

        return Inertia::render("Dashboard/Company/UpdateCompany", ["data" => $data]);
    }
}
