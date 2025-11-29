<h1>Rapportage per klant</h1>

<form method="get" style="margin-bottom: 16px;">
    <input type="hidden" name="route" value="reports">

    Periode:
    <input type="date" name="start" value="<?= htmlspecialchars($startDate) ?>">
    t/m
    <input type="date" name="end" value="<?= htmlspecialchars($endDate) ?>">

    <button type="submit">Vernieuwen</button>
</form>

<?php if (empty($rows)): ?>
    <p>Geen gegevens gevonden in deze periode.</p>
<?php else: ?>

    <table>
        <tr>
            <th>Klant</th>
            <th>Aantal registraties</th>
            <th>Totaal uren</th>
            <th>Reiskosten (€)</th>
            <th>Parkeerkosten (€)</th>
            <th>Loonkosten (€)</th>
            <th>Totaal kosten (€)</th>
        </tr>

        <?php
        $sumHours   = 0;
        $sumTravel  = 0;
        $sumParking = 0;
        $sumWages   = 0;
        $sumTotal   = 0;
        ?>

        <?php foreach ($rows as $r): ?>
            <?php
            $sumHours   += (float)$r['total_hours'];
            $sumTravel  += (float)$r['total_travel'];
            $sumParking += (float)$r['total_parking'];
            $sumWages   += (float)$r['total_wages'];
            $sumTotal   += (float)$r['total_cost'];
            ?>
            <tr>
                <td><?= htmlspecialchars($r['client_name']) ?></td>
                <td><?= (int)$r['session_count'] ?></td>
                <td><?= number_format((float)$r['total_hours'], 2, ',', '.') ?></td>
                <td><?= number_format((float)$r['total_travel'], 2, ',', '.') ?></td>
                <td><?= number_format((float)$r['total_parking'], 2, ',', '.') ?></td>
                <td><?= number_format((float)$r['total_wages'], 2, ',', '.') ?></td>
                <td><?= number_format((float)$r['total_cost'], 2, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>

        <tr>
            <th>Totaal</th>
            <th></th>
            <th><?= number_format($sumHours, 2, ',', '.') ?></th>
            <th><?= number_format($sumTravel, 2, ',', '.') ?></th>
            <th><?= number_format($sumParking, 2, ',', '.') ?></th>
            <th><?= number_format($sumWages, 2, ',', '.') ?></th>
            <th><?= number_format($sumTotal, 2, ',', '.') ?></th>
        </tr>
    </table>

<?php endif; ?>
