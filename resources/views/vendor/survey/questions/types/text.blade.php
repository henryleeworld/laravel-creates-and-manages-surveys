@component('survey::questions.base', compact('question'))
    <input type="text" name="{{ $question->key }}" id="{{ $question->key }}" class="form-control"
           value="{{ __($value ?? old($question->key)) }}" {{ ($disabled ?? false) ? 'disabled' : '' }}>
@endcomponent