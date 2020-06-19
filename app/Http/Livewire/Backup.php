<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Adapter\Local;
use Livewire\Component;

class Backup extends Component
{
    public function create()
    {
        $status = 'success';
        $message = '';

        try {
            ini_set('max_execution_time', 600);

            \Artisan::call('backup:run');

            $output = \Artisan::output();
            if (strpos($output, 'Backup failed because')) {
                preg_match('/Backup failed because(.*?)$/ms', $output, $match);
                $message .= "Backup Manager -- backup process failed because ";
                $message .= isset($match[1]) ? $match[1] : '';
                $status = 'error';
                Log::error($message . PHP_EOL . $output);
            } else {
                Log::info("Backup Manager -- backup process has started");
                $message = "Le backup est en cours de traitement";
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $status = 'error';
            $message = $e->getMessage();
        }

        session()->flash($status, $message);
    }

    public function delete($disk_name, $file_name)
    {
        $disk = Storage::disk($disk_name);

        if ($disk->exists($file_name)) {
            $disk->delete($file_name);

            session()->flash('success', __("Le fichier de sauvegarde a été supprimé."));
        } else {
            session()->flash('error', __("Le fichier de sauvegarde n'existe pas."));
        }
    }

    public function render()
    {
        if (!count(config('backup.backup.destination.disks'))) {
            dd(__('Aucun "backup disks" est configuré dans config/backup.php'));
        }

        $backups = collect();

        foreach (config('backup.backup.destination.disks') as $disk_name) {
            $disk = Storage::disk($disk_name);
            $adapter = $disk->getDriver()->getAdapter();
            $files = $disk->allFiles();

            // make an array of backup files, with their filesize and creation date
            foreach ($files as $k => $f) {
                // only take the zip files into account
                if (substr($f, -4) === '.zip' && $disk->exists($f)) {
                    $backup = [
                        'file_path'     => $f,
                        'file_name'     => str_replace('laravel-backup/', '', $f),
                        'file_size'     => $disk->size($f),
                        'last_modified' => $disk->lastModified($f),
                        'disk'          => $disk_name,
                        'download'      => ($adapter instanceof Local) ? true : false,
                    ];

                    $backups->add($backup);
                }
            }
        }

        $backups = collect($backups)->reverse();

        return view('livewire.backup', compact('backups'));
    }
}
