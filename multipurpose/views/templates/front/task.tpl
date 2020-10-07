{extends file = 'page.tpl'}
{block name='content'}

<table class="table table-dark">
    <thead>
        <tr>
            <th>Nome</th>
        </tr>
    </thead>
    <tbody>
            {foreach from=$products_name item=product_name}
            <tr>
            <td>{$product_name['name']}</td>
            </tr>
            {/foreach}
    </tbody>
</table>

{/block}
