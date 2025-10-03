<?php

namespace App\Service;

use Google\Client;
use Google\Service\AnalyticsData;
use Google\Service\AnalyticsData\RunReportRequest;

class GoogleAnalyticsService
{
    private AnalyticsData $analyticsData;

    public function __construct(private readonly string $credentialsPath)
    {
        $client = new Client();
        $client->setAuthConfig($credentialsPath);
        $client->addScope('https://www.googleapis.com/auth/analytics.readonly');

        $this->analyticsData = new AnalyticsData($client);
    }

    public function getVisitors(string $propertyId, string $startDate = '7daysAgo', string $endDate = 'today'): int
    {
        $request = new RunReportRequest([
            'dateRanges' => [
                ['startDate' => $startDate, 'endDate' => $endDate]
            ],
            'metrics' => [
                ['name' => 'activeUsers']
            ],
        ]);


        $response = $this->analyticsData->properties->runReport(
            "properties/$propertyId",
            $request
        );

        return $response->rows[0]->metricValues[0]->value ?? 0;
    }
}