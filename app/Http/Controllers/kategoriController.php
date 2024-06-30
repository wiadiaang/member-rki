<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use Yajra\DataTables\Facades\DataTables;
class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('public.kategori.index');
    }

    public function data(){
        return DataTables::of(kategori::get())->addIndexColumn()
        ->addColumn('action', function($result){
            $actionEdit = route('kategori.edit',$result->id);
            $actionDel = route('kategori.delete',$result->id);
            $actionBtn = '<a href="'.$actionEdit.'" class="btn btn-success btn-sm">Edit</a>
            <a  onclick="confirmation(event)" href="'.$actionDel.'" class="btn btn-danger btn-sm">Delete</a>';
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = new kategori();
        $data["page"] = "Add New kategori";
        $data["method"] = "POST";
        $data["action"] = route('kategori.store');
        return view('public.kategori.form',compact('data','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
         
        $kategoris = kategori::create($input);

        if($kategoris){
            return redirect()
            ->route('kategori.index')
            ->with([
                'success' => 'Add New Data Success'
            ]);
        }else{
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'Add New Data Failed'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = kategori::find($id);
        $data["page"] = "Edit Data kategori";
        $data["method"] = "PUT";
        $data["action"] = route('kategori.update',$id);
       return view('public.kategori.form',compact('data','kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = kategori::find($id);
        $input = $request->all();
         
        $kategoris = $kategori->update($input);
        if($kategoris){
            return redirect()
            ->route('kategori.index')
            ->with([
                'success' => 'Update Data Berhasil'
            ]);
        }else{
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'Update Data Gagal'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategoris = kategori::where("id",$id)->delete();
        if($kategoris){
            return redirect()
            ->route('kategori.index')
            ->with([
                'success' => 'Hapus Data Berhasil'
            ]);
        }else{
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'Hapus Data Gagal'
            ]);
        }
    }
}
