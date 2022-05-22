@props(['categories', 'name'])
<x-form.form-wrapper>
    <x-form.label :name="$name"/>
    <select class="form-control" name="category_id" id="{{$name}}">
        @foreach ($categories as $category)
            <option {{$category->id == old('category_id')? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</x-form.form-wrapper>