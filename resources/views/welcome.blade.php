<!-- Hiển thị thông báo lỗi -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Form tạo sản phẩm -->
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" class="form-control" value="{{ old('price') }}">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Create Product</button>
</form>
