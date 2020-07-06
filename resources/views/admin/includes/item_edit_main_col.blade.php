@php
    /** @var \App\Models\BlogPost $item */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->in_stock)
                    In Stock
                @else
                    Not in stock
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Main data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#adddata" role="tab">Additional data</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" value="{{$item->title}}" id="title" type="text" class="form-control"
                                   minlength="3" required>
                        </div>
                        <div class="form-group">
                            <label for="content_raw">Description</label>
                            <textarea name="description" id="description" type="text" class="form-control" rows="20">{{old('description',$item->description)}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" value="{{$item->price}}">
                        </div>
                    </div>
                    <div class="tab-pane" id="adddata" role="tabpanel">
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control"
                                    placeholder="Choose category"
                                    required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}"
                                            @if($categoryOption->id ==$item->category_id) selected @endif>
                                        {{--$categoryOption->id}}.{{$categoryOption->title--}}
                                        {{$categoryOption->id_title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand_id">Brand</label>
                            <select name="brand_id" id="brand_id" class="form-control"
                                    placeholder="Choose brand"
                                    required>
                                @foreach($brandList as $brandOption)
                                    <option value="{{$brandOption->id}}"
                                            @if($brandOption->id ==$item->brand_id) selected @endif>
                                        {{--$categoryOption->id}}.{{$categoryOption->title--}}
                                        {{$brandOption->id_title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Identificator</label>
                            <input name="slug" value="{{$item->slug}}" id="slug" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="image_url">Image url</label>
                            <textarea name="image_url" id="excerpt" class="form-control" rows="3">{{old('image_url',$item->image_url)}}</textarea>
                        </div>
                        <div class="form-check">
                            <input name="in_stock" type="hidden" value="0">
                            <input name="in_stock" type="checkbox" class="form-check-input"
                                   value="1"
                                   @if($item->in_stock)
                                   checked="checked"
                                @endif>
                            <label class="form-check-label" for="in_stock">In stock</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

