<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:100|max:10000000',
            'type' => 'in:money,goods,time',
            'project_id' => 'nullable|exists:projects,id',
            'message' => 'nullable|string|max:1000',
            'payment_method' => 'required_if:type,money|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Аты-жөні міндетті',
            'email.required' => 'Электрондық пошта міндетті',
            'email.email' => 'Электрондық пошта форматы дұрыс емес',
            'amount.required' => 'Сома міндетті',
            'amount.min' => 'Минималды сома 100 теңге',
            'amount.max' => 'Максималды сома 10,000,000 теңге',
            'project_id.exists' => 'Таңдалған жоба табылмады',
            'payment_method.required_if' => 'Төлем әдісі міндетті'
        ];
    }
}
