<?php

namespace App\Http\Controllers\Admin;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Upload single file and save to database.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        $file = $request->file('file');
        $name = str_slug(explode('.', $file->getClientOriginalName())[0]). '-' .time();
        $filename = $name . '.' . $file->getClientOriginalExtension();

        $file->storeAs('/uploads', $filename, 'public');

        // save file information to database.
        $data = [
            'disk_name'     => $filename,
            'file_name'     => $file->getClientOriginalName(),
            'file_size'     => $file->getSize(),
            'content_type'  => $file->getClientMimeType(),
            'file_url'      => '/uploads/'.$filename,
            'field'         => 'preview_image',
            'is_public'     => true
        ];

        $media = Media::create($data);

        $response = [
            'status'   => 'success',
            'url'      => asset('storage/uploads/'.$filename),
            'id'       => $media->id,
            'name'     => $filename,
        ];

        return response()->json($response);
    }

    /**
     * Remove a media from the database.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove($id)
    {
        $media = Media::findOrFail($id);

        Storage::disk('public')->delete('/uploads/'.$media->disk_name);

        try {
            $media->delete();
            $response = [
                'status'  => 'success',
                'message' => __('Fichier supprimé avec succès'),
            ];

        } catch (\Exception $exception) {
            $response = [
                'status'  => 'error',
                'message' => $exception->getMessage(),
            ];
        }

        return response()->json($response);
    }
}
