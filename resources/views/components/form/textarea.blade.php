@props(['name', 'value' => ''])
<x-form.form-wrapper>
    <x-form.label :name="$name"/>
    <textarea {{$attributes->merge(['class' => "form-control"])}} name="{{$name}}" id="{{$name}}" cols="30" rows="10" required>{{old($name, $value)}}</textarea>
    <x-error :err="$name"/>
</x-form.form-wrapper>