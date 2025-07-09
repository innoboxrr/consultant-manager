<?php

namespace Innoboxrr\ConsultantManager\Models\Traits\Storage;

// use Innoboxrr\ConsultantManager\Models\ConsultationChatMessageMeta;

trait ConsultationChatMessageStorage
{

    public function createModel($request)
    {

        $consultationChatMessage = $this->create($request->only($this->creatable));

        return $consultationChatMessage;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, ConsultationChatMessageMeta::class, 'consultation_chat_message_id')->updatePayload();

        return $this;

    }
    */

    public function deleteModel()
    {

        $this->delete();

    }

    public function restoreModel()
    {

        $this->restore();

    }

    public function forceDeleteModel()
    {

        abort(403);

        $this->forceDelete();
        
    }

}