<?php
namespace App\Services\Upload;

use Illuminate\Support\Facades\Storage;

trait FileUpload
{
    public function storeFile($file, $location)
    {
        $filename = time().$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();

        $fullPath = $location.$filename;
        $file->storeAs($path, $filename, $this->fileSystem());
        
        return $fullPath;
    }

    public function updateFile($model, $field, $data, $location)
    {
        Storage::disk($this->fileSystem())->delete($model->$field);

        $file = $this->storeFile($data, $location);

        $model->$field = $file;
        
        $model->save();
    }

    private function fileSystem()
    {
        return app()->environment('production') ? 's3' : 'public';
    }
}
