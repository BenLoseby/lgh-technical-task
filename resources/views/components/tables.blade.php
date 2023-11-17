<div id="tables" class="v1-tables">
    <h2><?= __('Contracts Data') ?></h2>
    <table id="contract-table" class="v1-table">
        <thead>
            <tr>
                <th><?= __('Date') ?></th>
                <th><?= __('Contract Count') ?></th>
            </tr>
        </thead>
        <tbody>
            @foreach($contracts as $date => $count)
                <tr class="v1-tr">
                    <td class="v1-td">{{ $date }}</td>
                    <td class="v1-td">{{ $count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2><?= __('Quotes Data') ?></h2>
    <table id="quote-table" class="v1-table">
        <thead>
            <tr>
                <th><?= __('Date') ?></th>
                <th><?= __('Contract Count') ?></th>
            </tr>
        </thead>
        <tbody>
            @foreach($quotes as $date => $count)
                <tr class="v1-tr">
                    <td class="v1-td">{{ $date }}</td>
                    <td class="v1-td">{{ $count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <h2><?= __('Weekly Hire Data') ?></h2>
    <table id="hire-table" class="v1-table">
        <thead>
            <tr>
                <th><?= __('w.c Date') ?></th>
                <th><?= __('Week Value') ?></th>
            </tr>
        </thead>
        <tbody>
            @foreach($hireValue as $date => $value)
                <tr class="v1-tr">
                    <td class="v1-td">{{ $date }}</td>
                    <td class="v1-td">{{ $value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready( function () {
        $('#contract-table').DataTable();
        $('#quote-table').DataTable();
        $('#hire-table').DataTable();

    } );
</script>