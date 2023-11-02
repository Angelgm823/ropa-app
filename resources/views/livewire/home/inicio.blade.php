<div>
    <h1>Componente Inicio</h1>

    <x-card cardTitle="card Title" cardFooter="card Footer">
        <x-slot:cardTools>
            <a href="#" class="btn btn-primary">Crear</a>
        </x-slot>


        <x-table>

            <x-slot:thead>
                <th>thead</th>
                <th>thead</th>

            </x-slot>

            <x-slot:body>
                <tr>
                    <td>...</td>
                    <td>...</td>
                </tr>


        </x-table>

    </x-card>
</div>
