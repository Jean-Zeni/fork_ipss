<?php

namespace App\Http\Controllers;

use Google\Analytics\Data\V1beta\BatchRunReportsRequest;
use Google\Analytics\Data\V1beta\RunRealtimeReportRequest;
use Illuminate\Http\Request;
use Google\Analytics\Data\V1beta\Client\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\MinuteRange;
use Google\Analytics\Data\V1beta\RunReportRequest;

class SiteAdminController extends Controller
{
    public function index(Request $request){
        $property_id = env('ANALYTICS_PROPERTY_ID');
     
        $client = new BetaAnalyticsDataClient([
            'credentials' => base_path(env('GOOGLE_ANALYTICS_CREDENTIALS_PATH'))
        ]);

        $parametro = $request['data'];
        $date = new \DateTime();
        !$parametro ? $date->sub(new \DateInterval('P7D')) : null;
        $dataConsulta = $date->format('Y-m-d');

        if($parametro && $parametro != 'hoje'){
            $dataConsulta = $parametro == "12m" ? $date->sub(new \DateInterval('P12M')) : $date->sub(new \DateInterval('P'.$parametro.'D'));
            $dataConsulta = $date->format('Y-m-d');
        }
      
        //dd($dataConsulta);
        // Make an API call.
        $requestUsuariosPorCidade = (new RunReportRequest())
            //->setProperty('properties/' . $property_id)
            ->setDateRanges([
                new DateRange([
                    'start_date' => $dataConsulta,
                    'end_date' => 'today',
                ]),
            ])
            ->setDimensions([new Dimension([
                    'name' => 'city',
                ]),
            ])
            ->setMetrics([new Metric([
                    'name' => 'activeUsers',
                ])
            ]);

        $requestNovosUsuariosPorCidade = (new RunReportRequest())
            //->setProperty('properties/' . $property_id)
            ->setDateRanges([
                new DateRange([
                    'start_date' => $dataConsulta,
                    'end_date' => 'today',
                ]),
            ])
            ->setDimensions([new Dimension([
                    'name' => 'city',
                ]),
            ])
            ->setMetrics([new Metric([
                    'name' => 'newUsers',
                ])
            ]);

        $requestUsuariosPorPais = (new RunReportRequest())
            //->setProperty('properties/' . $property_id)
            ->setDateRanges([
                new DateRange([
                    'start_date' => $dataConsulta,
                    'end_date' => 'today',
                ]),
            ])
            ->setDimensions([new Dimension([
                    'name' => 'country',
                ]),
            ])
            ->setMetrics([new Metric([
                    'name' => 'activeUsers',
                ])
            ]);

        $requestViewsPorPagina = (new RunReportRequest())
            //->setProperty('properties/' . $property_id)
            ->setDateRanges([
                new DateRange([
                    'start_date' => $dataConsulta,
                    'end_date' => 'today',
                ]),
            ])
            ->setDimensions([new Dimension([
                    'name' => 'pageTitle',
                ]),
            ])
            ->setMetrics([new Metric([
                    'name' => 'screenPageViews',
                ])
            ]);

        $requestUltimos30Mins = (new RunRealtimeReportRequest())
            ->setProperty('properties/' . $property_id)
            ->setMinuteRanges([new MinuteRange([
                    'name' => '0-4 minutes ago',
                    'start_minutes_ago' => 29
                ]),
            ])
            
            ->setMetrics([new Metric([
                    'name' => 'activeUsers',
                ])
            ]);

        /*Formato Unitário
        $usuariosPorCidade = $client->runReport($requestUsuariosPorCidade);

        $usuariosPorPais = $client->runReport($requestUsuariosPorPais);
        */

        $ultimos30Mins = $client->runRealtimeReport($requestUltimos30Mins);

        //Formato por Lotes de Requisições
        $batchRequest = new BatchRunReportsRequest();
        $batchRequest->setProperty('properties/' . $property_id);
        $batchRequest->setRequests([$requestUsuariosPorCidade, $requestUsuariosPorPais, $requestNovosUsuariosPorCidade, $requestViewsPorPagina]);
        
        $batchResponse = $client->batchRunReports($batchRequest);
        
        //dd($batchResponse->getReports()[0]->getRows()[0]->getMetricValues()[0]->getValue());
        $usuariosPorCidade = $batchResponse->getReports()[0];
        $usuariosPorPais = $batchResponse->getReports()[1];
        $novosUsuariosPorCidade = $batchResponse->getReports()[2];
        $viewsPorPagina = $batchResponse->getReports()[3];
        
        $usuariosAtivosUltimos30Mins = 0;
        foreach ($ultimos30Mins->getRows() as $row) {
            /*foreach ($row->getDimensionValues() as $dimensionValue) {
                print 'Dimension Value: ' . $dimensionValue->getValue() . PHP_EOL;
            }*/
            foreach ($row->getMetricValues() as $metricValue) {
                $usuariosAtivosUltimos30Mins = $metricValue->getValue();
            }
        }

        $totalUsuariosPorPais = 0;
        foreach($usuariosPorPais->getRows() as $row){
            $totalUsuariosPorPais += $row->getMetricValues()[0]->getValue();
        }
    
       
        return view('admin.dashboard', [
            'usuariosPorCidade' => $usuariosPorCidade,
            'usuariosPorPais' => $usuariosPorPais, 
            'usuariosAtivosUltimos30Mins' => $usuariosAtivosUltimos30Mins, 
            'novosUsuariosPorCidade' => $novosUsuariosPorCidade,
            'viewsPorPagina' => $viewsPorPagina,
            'totalUsuariosPorPais' => $totalUsuariosPorPais,
            'parametro' => $parametro
        ]);
    }
}
