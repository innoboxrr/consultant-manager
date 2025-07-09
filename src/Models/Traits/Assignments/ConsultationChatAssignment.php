<?php

namespace Innoboxrr\ConsultantManager\Models\Traits\Assignments;

/* Replace the word "Model" and "model" */

trait ConsultationChatAssignment
{

	public function assignModel($request)
	{

        $operationResult = $this->models()->syncWithoutDetaching([
            $request->model_id => [
            	// Pivot values
            ]
        ]);

        return response()->json([
        	'model_id' => $request->model_id,
        	'consultation_chat_id' => $request->consultation_chat_id,
        	'operation' => $operationResult
        ]);

	}

	public function deallocateModel($request)
	{

		$operationResult = $this->models()->detach($request->model_id);

		return response()->json([
        	'model_id' => $request->model_id,
        	'consultation_chat_id' => $request->consultation_chat_id,
        	'operation' => $operationResult
        ]);

	}

}