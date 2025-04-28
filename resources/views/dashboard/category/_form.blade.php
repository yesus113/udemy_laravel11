@csrf

<label for="" class="form-control-label">Title</label>
<input class="form-control" type="text" name="title" value="{{ old('title', $category->title) }}">

<label for="" class="form-control-label">Slug</label>
<input class="form-control" type="text" name="slug" value="{{ old('slug', $category->slug) }}">


<button class="btn btn-success mt-2" type="submit">Send</button>
