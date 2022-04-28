@props([
    'divClass'    => '',
    'submitClass' => '',
    'resetClass'  => '',
    'btnClass'    => '',
    'submitValue' => 'Submit',
    'resetValue'  => 'Reset',
])

<div class="form__btns {{ $divClass }}">
    <input type="submit" class="input--btn {{ $submitClass }} {{ $btnClass }}"
           value="{{ $submitValue }}">
    <input type="reset"  class="input--btn {{ $resetClass }}  {{ $btnClass }}"
           value="{{ $resetValue }}">
</div>