<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

trait HandlesAttachmentUpload
{
    /**
     * Handle file upload for a model with polymorphic attachments.
     *
     * @param  Model  $model  The model instance (e.g., Investor, Idea) with attachments relation
     * @param  TemporaryUploadedFile|null  $attachment  The uploaded file
     * @param  string  $baseStoragePath  The base storage path (e.g., 'attachments')
     */
    public function handleAttachmentUpload(Model $model, $attachment, string $baseStoragePath = 'attachments'): void
    {
        if ($attachment instanceof TemporaryUploadedFile) {
            // Delete old file if exists
            if ($model->attachments()->exists()) {
                Storage::disk('public')->delete($model->attachments()->first()->path);
                $model->attachments()->delete();
            }

            // Get model name for folder (e.g., 'Investor' or 'Idea')
            $modelFolder = class_basename($model);

            // Build the storage path (e.g., 'attachments/Investor' or 'attachments/Idea')
            $storagePath = "{$baseStoragePath}/{$modelFolder}";

            // Upload new file to the model-specific folder
            $path = $attachment->store($storagePath, 'public');

            // Store the file path in attachments table
            $model->attachments()->create([
                'path' => $path,
                'original_name' => $attachment->getClientOriginalName(),
            ]);

            // Reset the property after upload
            $this->data['attachment'] = null;
        }
    }
}
