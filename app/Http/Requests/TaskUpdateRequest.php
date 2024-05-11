<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $task = $this->route('task');
        return [
            'task' => 'required|string|min:10|max:200|unique:tasks,task,' . $task->id,
            'begindate' => 'required|date',
            'enddate' => 'date',
            'project_id' => 'required|integer',
            'user_id' => 'integer',
            'activity_id' => 'required|integer',
        ];
    }
}
