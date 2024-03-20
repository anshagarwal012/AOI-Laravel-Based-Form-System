<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forms;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;
use Dompdf\Dompdf;

class FrontendController extends Controller
{
    public function diplomate_registration_form()
    {
        return view('front.diplomate_registration_form');
    }

    public function fellowship_registration_form()
    {
        return view('front.fellowship_registration_form');
    }

    public function membership_form()
    {
        return view('front.membership_form');
    }

    public function registration_form()
    {
        return view('front.registration_form');
    }
    public function presentation_form()
    {
        return view('front.presentation_form');
    }

    public function form_submit(Request $request)
    {
        $data = $request->all();
        $fdata = [];
        $fdata['form_type'] = $data['form_type'];

        $fileName = time() . '.' . $request->Upload_Photo->extension();
        $request->Upload_Photo->move(public_path('uploads'), $fileName);

        $data['Upload_Photo'] = $fileName;

        unset($data['_token']);
        $fdata['form_data'] = json_encode($data);
        $data = Forms::create($fdata);
        // dd($data);
        $this->form_download($data);
        return back()->with('success', 'Form Submitted successfully.');
    }

    public function form_download(Forms $id)
    {
        $data = ['data' => json_decode($id->form_data, true), 'type' => $id->form_type];
        // return view('reports.' . $id->form_type, $data);
        // exit;

        $html = view('reports.' . $id->form_type, $data)->render();

        header('Content-Type: application/pdf');
        // $options = new Options();
        // $options->set('isPhpRemoteEnabled', true);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $pdfContent = $dompdf->output();
        $filePath = public_path('forms/form_' . $id->form_type . '_' . $id->id . '.pdf');
        file_put_contents($filePath, $pdfContent);
        return readFile($filePath);
    }
}
