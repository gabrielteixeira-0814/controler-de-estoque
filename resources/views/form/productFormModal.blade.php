
{{-- Form Product --}}
<div class="form-product">
    <form action="" class="form_product" id="form_product">
        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" id="name" name="name" aria-describedby="name">
        </div>
        <div class="mb-3">
          <label for="costPrice" class="form-label">Preço custo</label>
          <input type="text" class="form-control" id="costPrice" name="costPrice">
        </div>
        <div class="mb-3">
          <label for="salePrice" class="form-label">Preço de venda</label>
          <input type="text" class="form-control" id="salePrice" name="salePrice">
        </div>
        <div class="mb-3">
          <label for="type" class="form-label">Tipo</label>
          <select class="form-select" id="type" name="type" aria-label="Default select example">
            <option selected value="1">Simples</option>
            <option value="2">Composto</option>
          </select>
        </div>
    </form>
</div>
