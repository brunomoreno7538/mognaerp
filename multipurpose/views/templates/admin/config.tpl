<form method="post">
    <div class="col-md-6">
        <div class="panel">
            <div class="panel-heading">
                {l s='Configuracao' mod='multipurpose'}
            </div>
            <div class="panel-body">
                        <label>
                            {l s='Escreva' mod='multipurpose'}
                        </label>
                        <input type="text" name="texto" id="texto" class="form-control" value={$novoValor}>
            </div>
            <div class="panel-footer">
                <button type="submit" name='textoenviado' class="btn btn-success pull-right">
                    <i class="icon-save"></i>
                    Salvar
                </button>
            </div>
        </div>
    </div>
</form>