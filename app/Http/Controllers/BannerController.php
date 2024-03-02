<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BannerUpload;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function all_banner(Request $res)
    {
        return ['status' => 'success', 'base_url' => $res->root() . '/public/uploads/', 'data' => BannerUpload::get()];
    }

    // Banner
    public function banner()
    {
        $banner = BannerUpload::get();
        return view('banner.index', compact('banner'));
    }

    public function store_banner(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg',
        ]);
        $fileName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('uploads'), $fileName);
        BannerUpload::create(['path' => $fileName]);
        return back()->with('success', 'File uploaded successfully.');
    }

    public function store_banner_delete(BannerUpload $banner)
    {
        if ($banner != Null) {
            $filePath = public_path('uploads/') . $banner->path;
            $banner->delete();
            if (File::exists($filePath)) {
                File::delete($filePath);
                return back()->with('success', 'File deleted successfully.');
            }
        }

        return back()->with('error', 'File not found.');
    }
}
