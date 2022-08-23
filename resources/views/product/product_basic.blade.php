<div class="product__item__text">
    <h6   data-name_add_to_cart ={{$product->name}}>{{$product->name }}</h6>
    <a data-id_add_to_cart ="{{$product->id}}" data-name_add_to_cart ="{{$product->name}}"     class="add-cart shadow p-1 mb-5  rounded btn btn-outline-secondary">+ Thêm vào giỏ</a>
    <div class="rating">
        <i class="fa fa-star-o"></i>
        <i class="fa fa-star-o"></i>
        <i class="fa fa-star-o"></i>
        <i class="fa fa-star-o"></i>
        <i class="fa fa-star-o"></i>
    </div>
    <h5>${{$product->price}}</h5>
    <div class="product__color__select">
        <label for="pc-4">
            <input type="radio" id="pc-4">
        </label>
        <label class="active black" for="pc-5">
            <input type="radio" id="pc-5">
        </label>
        <label class="grey" for="pc-6">
            <input type="radio" id="pc-6">
        </label>
    </div>
</div>

