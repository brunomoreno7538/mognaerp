<div class="panel">
    <div class="panel-heading">
        <form method="post">
            <button type="submit" class="btn btn-primary btn-lg pull-right" name="fetchApi"><i class="icon-refresh"></i></button>
        </form>
        {l s='Origin test admin panel' mod='multipurpose'}
    </div>
    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>SKU</th>
                    <th>EAN</th>
                    <th>Nome</th>
                    <th>Stock</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th>Disponível</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$products item=product}
                <tr>
                    <td>{$product['id']}</td>
                    <td>{$product['sku']}</td>
                    <td>{$product['ean']}</td>
                    <td>{$product['name']}</td>
                    <td>{$product['quantity']}</td>
                    <td>{$product['price']}</td>
                    <td>{$product['description']}</td>
                    <td>
                        {if $product['available_for_order'] == 0}
                        Disponível
                        {elseif $product['available_for_order'] == 1}
                        Indisponível
                            {else}
                            Desconhecido
                        {/if}
                    </td>
                    <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"
                         data-sku="{$product['sku']}"  data-ean="{$product['ean']}" data-name="{$product['name']}"
                         data-stock="{$product['quantity']}" data-price="{$product['price']}"
                         data-description="{$product['description']}" data-available="{$product['available_for_order']}"><i class="icon-pencil"></i></a></td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">EAN:</label>
            <input type="text" class="form-control" id="ean" name="ean">
            <input type="hidden" id="sku" name="sku">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Nome:</label>
            <input class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Stock:</label>
            <input class="form-control" id="stock" name="stock">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Preço:</label>
            <input class="form-control" id="price" name="price">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Marca:</label>
            <input class="form-control" id="brand" name="brand">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descrição:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Disponível:</label>
            <input class="form-control" id="available" name="available">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Fábrica:</label>
            <input class="form-control" id="fabrica" name="fabrica">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-success" name="saveData">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var sku = button.data('sku')
    var ean = button.data('ean')
    var name = button.data('name')
    var stock = button.data('stock')
    var price = button.data('price')
    var brand = button.data('brand')
    var description = button.data('description')
    var available = button.data('available')
    var fabrica = button.data('fabrica')
    var modal = $(this)
    modal.find('.modal-title').text('Editar ' + sku)
    modal.find('#sku').val(sku)
    modal.find('#ean').val(ean)
    modal.find('#name').val(name)
    modal.find('#stock').val(stock)
    modal.find('#price').val(price)
    modal.find('#brand').val(brand)
    modal.find('#description').val(description)
    modal.find('#available').val(available)
    modal.find('#fabrica').val(fabrica)
  })
</script>