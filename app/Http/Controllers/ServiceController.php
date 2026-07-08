<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function AfficherTousServices()
    {
        $services = Service::all();
        return view('services.list', compact('services'));

    }

    public function AfficherDetailService(Service $service)
    {
        return view('services.detail-service',compact('service'));
    }

    public  function CreerService(Request $request){
        $messages = [
            'titre.required' => 'Le titre est obligatoire.',
            'titre.string' => 'Le titre doit être du texte.',
            'titre.min' => 'Le titre doit contenir au moins :min caractères.',
            'description.required' => 'La description est obligatoire.',
            'description.min' => 'La description doit contenir au moins :min caractères.',
            'image.image' => "Le fichier envoyé doit être une image.",
            'image.max' => "L'image ne doit pas dépasser :max kilo-octets.",
            'image_url.max' => "L'URL de l'image est trop longue.",
        ];

        $request->validate([
            'titre'=>'required|string|min:3',
            'description'=>'required|string|min:10',
            'image' => 'nullable|image|max:2048',
            'image_url'=>'nullable|string|max:255'
        ], $messages);

        $data = $request->only(['titre', 'description', 'image_url']);
        $data['user_id'] = $request->user()->idUser;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services', 'public');
            $data['image_url'] = 'storage/' . $path;
        }

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', "Service '" . ($data['titre'] ?? '') . "' créé avec succès.");
    }

    public function MettreAjourService(Request $request,Service $service)
    {
        $messages = [
            'titre.required' => 'Le titre est obligatoire.',
            'titre.string' => 'Le titre doit être du texte.',
            'titre.min' => 'Le titre doit contenir au moins :min caractères.',
            'description.required' => 'La description est obligatoire.',
            'description.min' => 'La description doit contenir au moins :min caractères.',
            'image.image' => "Le fichier envoyé doit être une image.",
            'image.max' => "L'image ne doit pas dépasser :max kilo-octets.",
            'image_url.max' => "L'URL de l'image est trop longue.",
        ];

        $request->validate([
            'titre'=>'required|string|min:3',
            'description'=>'required|string|min:10',
            'image' => 'nullable|image|max:2048',
            'image_url'=>'nullable|string|max:255'
        ], $messages);

        $data = $request->only(['titre', 'description', 'image_url']);

        if ($request->hasFile('image')) {
            // remove old image if exists
            if (!empty($service->image_url) && str_starts_with($service->image_url, 'storage/')) {
                $oldPath = substr($service->image_url, strlen('storage/'));
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            $path = $request->file('image')->store('services', 'public');
            $data['image_url'] = 'storage/' . $path;
        }

        $service->update($data);
        return redirect()->route('admin.services.index')->with('success', "Service '" . ($request->titre ?? $service->titre) . "' mis à jour avec succès.");
    }

    public function SupprimerService(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success','Service supprimé avec succès.');
    }
}
