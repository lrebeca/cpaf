<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(BackupCommand::class)->daily();
        
        // genera una copia de seguridad completa, base de datos y archivos cada día a las 09:00
        $schedule->command("backup:run")->dailyAt("09:00");
            
        // genera una copia de seguridad de la base de datos cada día a las 09:00
        $schedule->command("backup:run --only-db")->dailyAt("09:00");
    
        // genera una copia de seguridad de los archivos cada día a las 09:00
        //$schedule->command("backup:run --only-files")->dailyAt("09:00");
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
