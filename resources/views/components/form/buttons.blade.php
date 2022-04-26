@props([
    'divClass'    => '',
    'submitClass' => '',
    'resetClass'  => '',
    'btnClass'    => '',
    'submitValue' => 'Submit',
    'resetValue'  => 'Reset',
])

<div class="form__btns {{ $divClass }}">
    <input type="submit" class="form__btn {{ $submitClass }} {{ $btnClass }}"
           value="{{ $submitValue }}">
    <input type="reset"  class="form__btn {{ $resetClass }}  {{ $btnClass }}"
           value="{{ $resetValue }}">
</div>