<x-layout>
    <div class="col-md-5 mx-auto">
        <x-card-wrapper>
            <div class="card-header bg-primary border border-0 mb-5"><h3 class="text-center text-white">Blog Create Form</h3></div>
            <form method="POST" action="/admin/blogs/store" enctype="multipart/form-data">
                @csrf
                <x-form.input name="title"/>
                <x-form.input name="slug"/>
                <x-form.input name="intro"/>
                <x-form.textarea name="body"/>
                <x-form.input name="thumbnail" type="file"/>
                <x-form.select name="category" :categories="$categories"/>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </x-card-wrapper>
    </div>
</x-layout>