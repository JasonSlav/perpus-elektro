<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Category;
use App\Models\Literature;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    // Menampilkan data semua entitas
    public function index()
    {
        $types = Type::all();
        $categories = Category::all();
        $literatures = Literature::with('category')->get(); // Memuat literatur beserta kategori

        return view('library.index', compact('types', 'categories', 'literatures'));
    }

    // Menyimpan Type
    public function storeType(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Type::create($request->all());
        return redirect()->route('library.index');
    }

    // Menyimpan Category
    public function storeCategory(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255', 'type_id' => 'required|exists:types,id']);
        Category::create($request->all());
        return redirect()->route('library.index');
    }

    // Menyimpan Literature
    public function storeLiterature(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'year' => 'required|integer',
            'file_url' => 'required|url',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'detail' => 'nullable|string',
        ]);

        // Konversi 'detail' menjadi JSON jika ada
        $data = $request->all();
        if (!empty($data['detail'])) {
            $data['detail'] = json_encode(['description' => $data['detail']]);
        }
        // Simpan data ke database
        Literature::create($data);

        return redirect()->route('library.index');
    }

    // Menghapus Type
    public function destroyType($id)
    {
        Type::findOrFail($id)->delete();
        return redirect()->route('library.index');
    }

    // Menghapus Category
    public function destroyCategory($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('library.index');
    }

    // Menghapus Literature
    public function destroyLiterature($id)
    {
        Literature::findOrFail($id)->delete();
        return redirect()->route('library.index');
    }

    // Update Type
    public function updateType(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $type = Type::findOrFail($id);
        $type->update($request->all());
        return redirect()->route('library.index');
    }

    // Update Category
    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
        ]);
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('library.index');
    }

    // Update Literature
    public function updateLiterature(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'year' => 'required|integer',
            'file_url' => 'required|url',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'detail' => 'nullable|string',
        ]);

        $literature = Literature::findOrFail($id);
        $data = $request->all();

        // Konversi 'detail' menjadi JSON jika ada
        if (!empty($data['detail'])) {
            $data['detail'] = json_encode(['description' => $data['detail']]);
        }

        $literature->update($data);
        return redirect()->route('library.index');
    }
}
