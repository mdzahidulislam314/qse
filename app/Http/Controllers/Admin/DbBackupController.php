<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Ifsnop\Mysqldump\Mysqldump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ZipArchive;
use File;

class DbBackupController extends Controller
{
    public function index()
    {
        $tables = DB::select('SHOW TABLES');
        $db = "Tables_in_".env('DB_DATABASE');
        $data = [
            'title' => 'Dashboard',
            'tables' => $tables,
            'db' => $db
        ];

        return view('admin.backup', $data);
    }

    public function store(Request $request)
    {
        $tableName = $request->tables;
        $host = config('database.connections.mysql.host');
        $dbname = config('database.connections.mysql.database');
        $port = config('database.connections.mysql.port');
        $user = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');

        $dumpSettingsDefault = [
//            'compress' => Mysqldump::GZIP,
            'no-create-info' => true,
            'include-tables' => $tableName,
            'complete-insert' => true,
            'add-locks' => false
        ];

        try {
            $dump = new Mysqldump("mysql:host={$host};dbname={$dbname};port={$port}", $user, $password, $dumpSettingsDefault);
            $dump->start(public_path('dump.sql'));
            /*MySql::create()
                ->setDbName(config('database.connections.mysql.database'))
                ->setPort(config('database.connections.mysql.port'))
                ->setUserName(config('database.connections.mysql.username'))
                ->setPassword(config('database.connections.mysql.password'))
                ->dumpToFile('dump.sql');*/
        } catch (\Exception $e) {
            echo 'mysqldump-php error: ' . $e->getMessage();
//            dd($e);
        } /*catch (DumpFailed $e) {
//            dd($e);
        }*/
        return response()->download(public_path('dump.sql'), date('d-m-Y-h:s:i').'.sql');
    }


//    File backup
//    public function fileBackup()
//    {
//        $zip = new ZipArchive;
//
//        $fileName = 'cvb.zip';
//
//        $folder = public_path('uploads');
//
//        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
//        {
//            /*$files = File::files(public_path('uploads'));
//
//            foreach ($files as $key => $value) {
//                $relativeNameInZipFile = basename($value);
//                $zip->addFile($value, $relativeNameInZipFile);
//            }*/
//
//            // create recursive directory iterator
//            $files = new RecursiveIteratorIterator (new RecursiveDirectoryIterator($folder), RecursiveIteratorIterator::LEAVES_ONLY);
//
//            // let's iterate
//            foreach ($files as $name => $file) {
//                $filePath = $file->getRealPath();
//                $zip->addFile($filePath);
//            }
//
//            $zip->close();
//        }
//
//        return response()->download(public_path($fileName));
//    }
}
