<div class="mb-3">
    <label class="form-label">Title <span class="text-danger">*</span></label>
    <input type="text" name="title" class="form-control" value="{{ $blog->title ?? old('title') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Author <span class="text-danger">*</span></label>
    <select name="author_id" class="form-select" required>
        <option value="">Select Author</option>
        @foreach($authors as $author)
            <option value="{{ $author->id }}" 
                {{ isset($blog) && $blog->author_id == $author->id ? 'selected' : '' }}>
                {{ $author->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Content <span class="text-danger">*</span></label>
    <textarea name="content" class="form-control" rows="6" required>{{ $blog->content ?? old('content') }}</textarea>
</div>
