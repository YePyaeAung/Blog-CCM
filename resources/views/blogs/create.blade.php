<x-layout>
    <div class="col-md-5 mx-auto">
        <x-card-wrapper>
            <div class="card-header bg-primary border border-0 mb-5"><h3 class="text-center text-white">Blog Create Form</h3></div>
            <form method="POST" action="/admin/blogs/store">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" required>
                    <x-error err='title'/>
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{old('slug')}}" required>
                    <x-error err='slug'/>
                </div>
                <div class="mb-3">
                    <label for="intro" class="form-label">Intro</label>
                    <input type="text" name="intro" id="intro" class="form-control" value="{{old('intro')}}" required>
                    <x-error err='intro'/>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" name="body" id="body" cols="30" rows="10" required>{{old('body')}}</textarea>
                    <x-error err='body'/>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control" name="category_id" id="category">
                        @foreach ($categories as $category)
                            <option {{$category->id == old('category_id')? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </x-card-wrapper>
    </div>
</x-layout>