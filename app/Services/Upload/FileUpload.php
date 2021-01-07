<?php
namespace App\Services\Upload;

use Illuminate\Support\Facades\Storage;

trait FileUpload
{
    public function storeFile($file, $location)
    {
        $filename = time().$file->getClientOriginalName();

        $fullPath = $location.$filename;
        
        $file->storeAs($location, $filename, $this->fileSystem());
        
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

    public function deleteFile()
    {
        if($this->image)
            Storage::disk($this->fileSystem())->delete($this->image);
    }
}
