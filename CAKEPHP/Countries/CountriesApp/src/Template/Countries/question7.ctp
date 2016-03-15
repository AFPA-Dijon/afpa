
    <div class="row">
        <h4>Villes dont la population est supérieure à celle du Danemark (5330000 hab)</h4>
        <table>
            <tr>
                <th>Nom</th>
                <th>Population</th>
            </tr>
            <?php foreach($cities as $city):?>
            <tr>
                <td><?=$city->name ?></td>
                <td><?=$city->population ?></td>
            </tr>
            <?php endforeach;?>
        </table>
        
    </div>

</div>