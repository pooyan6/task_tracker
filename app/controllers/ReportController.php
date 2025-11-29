<?php

class ReportController extends Controller
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function index(): void
    {
        // پیش‌فرض: ۳۰ روز گذشته
        $defaultEnd   = date('Y-m-d');
        $defaultStart = date('Y-m-d', strtotime('-30 days'));

        $startDate = $_GET['start'] ?? $defaultStart;
        $endDate   = $_GET['end']   ?? $defaultEnd;

        $reportRows = $this->getClientSummary($startDate, $endDate);

        $this->view('reports/index', [
            'pageTitle'       => 'Rapportage per klant',
            'currentUserName' => $_SESSION['user_name'] ?? 'Onbekend',
            'startDate'       => $startDate,
            'endDate'         => $endDate,
            'rows'            => $reportRows,
        ]);
    }

    /**
     * گزارش خلاصه به ازای هر کلاینت در بازه تاریخ
     */
    private function getClientSummary(string $start, string $end): array
    {
        $sql = "
            SELECT
                c.id AS client_id,
                c.name AS client_name,
                COUNT(ws.id) AS session_count,
                SUM(ws.hours) AS total_hours,
                SUM(ws.travel_cost) AS total_travel,
                SUM(ws.parking_cost) AS total_parking,
                SUM(ws.hours * u.hourly_rate) AS total_wages,
                SUM(ws.travel_cost + ws.parking_cost + (ws.hours * u.hourly_rate)) AS total_cost
            FROM work_sessions ws
            JOIN clients c ON ws.client_id = c.id
            JOIN users   u ON ws.user_id   = u.id
            WHERE ws.work_date BETWEEN :start AND :end
            GROUP BY c.id, c.name
            ORDER BY c.name ASC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':start' => $start,
            ':end'   => $end,
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
