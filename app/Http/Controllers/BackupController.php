<?php

namespace App\Http\Controllers;

    use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{

    public function index() {
        $files = File::files(storage_path('app/Laravel'));
        $backups = [];
        foreach ($files as $file) {
            $filename = pathinfo($file, PATHINFO_BASENAME);
            $filesize = filesize($file);
            $timestamp = filemtime($file);
            $date = date('Y-m-d H:i:s', $timestamp);
            $backups[] = [
                'filename' => $filename,
                'filesize' => $this->formatSizeUnits($filesize),
                'created_at' => $date,
            ];
        }
        $n =0;
        return view('admin.backup.index', compact('backups','n'));
    }
    
    private function formatSizeUnits($bytes) {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }
        return $bytes;
    }

    public function backup()
    {
        $ba = Artisan::call('backup:run');
        return redirect()->route('admin.backups.index', $ba)->with('info', 'Backup realizado con éxito');
        //return back()->with('info', 'Backup realizado con éxito');
    }

    public function download($file_name)
    {              
        $file_path = storage_path('app/Laravel/'.$file_name);
        return response()->download($file_path);
    }


}
