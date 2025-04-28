@csrf

        <label for="" class="form-control-label" >Title</label>
        <input class="form-control" type="text" name="title" value="{{ old('title',$post->title) }}">

        <label for="" class="form-control-label">Slug</label>
        <input class="form-control" type="text" name="slug" value="{{old('slug', $post->slug)}}">

        <label for="" class="form-control-label">Content</label>
        <textarea class="form-control" name="content">
            {{old('content', $post->content)}}
        </textarea>
        
        <label for="" class="form-control-label">Category</label>
        <select class="form-control" name="category_id">
           @foreach ($categories as $title => $id)
               <option {{old('category_id',$post->category_id) == $id ? 'selected' : ''}} value="{{$id}}">{{$title}}</option>
           @endforeach 
        </select>

        <label for="" class="form-control-label">Description</label>
        <textarea class="form-control" name="description">
            {{old('description', $post->description)}}
        </textarea>

        <label for="" class="form-control-label">Posted</label>
        <select class="form-control" name="posted">
            <option {{old('posted',$post->posted) == 'yes' ? 'selected' : ''}} value="yes">Yes</option>
            <option {{old('posted',$post->posted) == 'not'  ? 'selected' : ''}} value="not">Not</option>
        </select>

        @if (isset($task) && $task == 'edit')
            <label for="">Image</label>
            <input type="file" name="image">
        @endif
        


        <button class="btn btn-success my-3" type="submit">Send</button>