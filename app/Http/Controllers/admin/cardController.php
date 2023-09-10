<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\card;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class cardController extends Controller
{
    private $validationRules = [
        'name' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'category_id' => 'required|integer',
        'discount' => 'required|numeric',
        'require_type' => 'required',
        'avilability' => 'required|boolean',
    ];

    public function index(Request $req)
    {
        $card = card::with(['category'])->get();
        return view("admin.card.show", ['card' => $card]);
    }

    public function delete(Request $req, $id)
    {
        card::destroy($id);
        return back()->with('success', "تم الحذف بنجاح");
    }

    public function edit(Request $req, card $card)
    {
        $category = category::all();
        return view('admin.card.edit', ['card' => $card, 'category' => $category]);
    }

    public function add(Request $req)
    {
        $category = category::all();
        return view('admin.card.add', ['category' => $category]);
    }

    public function store(Request $req)
    {
        $data = $req->validate(array_merge($this->validationRules, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]));

        $path = $this->uploadImage($req, 'image', 'images/product', 'public');

        card::create([
            'name' => $data['name'],
            'require_type' => $data['require_type'],
            'description' => $data['description'],
            'image' => $path,
            'price' => $data['price'],
            'category_id' => $data['category_id'],
            'discount' => $data['discount'],
            "avilability" => $data['avilability'],
        ]);

        return redirect("/admin/cards");
    }

    public function update(Request $req, card $card)
    {
        $data = $req->validate($this->validationRules);

        $card = $this->findCardById($card['id']);

        if ($req->hasFile('image')) {
            $path = $this->uploadImage($req, 'image', 'images/product', 'public');
            $this->deleteImage($card['image']);
            $card['image'] = $path;
        }

        $card->update([
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'discount' => $data['discount'],
            'category_id' => $data['category_id'],
            'require_type' => $data['require_type'],
            "avilability" => $data['avilability'],
        ]);

        return redirect("/admin/cards");
    }

    // Helper method to upload an image
    private function uploadImage(Request $request, $fieldName, $storagePath, $disk)
    {
        return $request->file($fieldName)->store($storagePath, $disk);
    }

    // Helper method to delete an image
    private function deleteImage($path)
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    // Helper method to find a card by ID
    private function findCardById($id)
    {
        return card::findOrFail($id);
    }
}
