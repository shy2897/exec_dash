<?php

namespace App\Filament\Resources\HRMGraphResource\Widgets\Filtered;

use App\Models\HRM;
use Nette\Utils\DateTime;
use Flowframe\Trend\Trend;
use Illuminate\Support\Carbon;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class FilteredTotalEmployee extends ChartWidget
{
    protected static ?string $heading = 'Total Employee';
    protected $yearRange;
    public int $startYear;
    public int $startMonth;
    public int $endYear;
    public int $endMonth;

    protected function getData(): array
    {
        $startDate = $this->startYear . '-' . str_pad($this->startMonth, 2, '0', STR_PAD_LEFT); // E.g., "2023-01"
        $endDate = $this->endYear . '-' . str_pad($this->endMonth, 2, '0', STR_PAD_LEFT);

        // dd($startDate, $endDate);

        $startStart = Carbon::createFromFormat('Y-m', $startDate)->startOfMonth();
        $endStart = Carbon::createFromFormat('Y-m', $startDate)->endOfMonth();
        $startEnd = Carbon::createFromFormat('Y-m', $endDate)->startOfMonth();
        $endEnd = Carbon::createFromFormat('Y-m', $endDate)->endOfMonth();

        $employee_start = Trend::query(HRM::where('description', 'Total no. of Employees at End of Month: (a+b)-c'))
        ->dateColumn('date')
        ->between(
            start: $startStart,
            end: $endStart,
        )
        ->perMonth()
        ->average('data');

        $employee_end = Trend::query(HRM::where('description', 'Total no. of Employees at End of Month: (a+b)-c'))
        ->dateColumn('date')
        ->between(
            start: $startEnd,
            end: $endEnd,
        )
        ->perMonth()
        ->average('data');


        $startDateFormat = DateTime::createFromFormat('Y-m', $startDate)->format('Y-M');
        $endDateFormat = DateTime::createFromFormat('Y-m', $endDate)->format('Y-M');


        $this->yearRange = '[' . $startDateFormat . ' & ' . $endDateFormat . ']';
        static::$heading = 'Loan Accounts & Clients ' . $this->yearRange;

        return [
            'datasets' => [
                [
                    'label' => 'Total Employees',
                    'data' => $employee_start->map(fn (TrendValue $value) => $value->aggregate)
                            ->merge($employee_end->map(fn (TrendValue $value) => $value->aggregate)),
                    'backgroundColor' => '#268FE9',
                    'borderColor' => '#268FE9',
                    'pointBackgroundColor' => '#268FE9', // Color for inner dots
                    'pointBorderColor' => '#268FE9',
                    'yAxisID' => 'y', // Assign to the first y-axis
                ],
            ],
            'labels' => $employee_start->map(fn (TrendValue $value) => Carbon::parse($value->date)->format('Y-M'))
                             ->merge($employee_end->map(fn (TrendValue $value) => Carbon::parse($value->date)->format('Y-M'))),
        ];
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'x' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Months ' . $this->yearRange,
                        'font' => [
                            'weight' => 'bold', // Make the title text bold
                        ],
                    ],
                    'grid' => [
                        'display' => false, // Remove grid lines for the x-axis
                    ],
                ],
                'y' => [
                    'position' => 'left',
                    'title' => [
                        'display' => true,
                        'text' => 'No of Employees',
                        'font' => [
                            'weight' => 'bold', // Make the title text bold
                        ],
                    ],
                    'grid' => [
                        'color' => 'rgba(128, 128, 128, 0.2)',
                        'borderColor' => 'rgba(128, 128, 128, 0.2)',
                    ],

                ],

            ],

        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
