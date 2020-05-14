<?php

namespace App\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'EduardoCruz.com',
        'product' => 'EduardoCruz.com',
        //'street' => 'Rua Real da Torre',
        'location' => 'Recife, PE, Brazil',
        //'phone' => '555-555-5555',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = 'eduardo@eduardocruz.com';

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'eduardo@eduardocruz.com'
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        //Spark::noCardUpFront()->trialDays(10);

        //Spark::freePlan('Fila de Espera')->features(['Inscreva-se e aguarde novas vagas']);


        Spark::plan('Mensal', 'plan_HFhocp5DrQZTu7')
            ->price(43.34)
            ->features([
                'Aulas semanais ao vivo.', 'Acesso a gravação das aulas semanais.', 'Acesso a lives antigas.'
            ]);


        Spark::plan('Mensal Founder', 'plan_HF9ozhVlP1Pgyg')
            ->price(21.67)
            ->archived()
            ->features([
                'Aulas semanais ao vivo.', 'Acesso a gravação das aulas semanais.', 'Acesso a lives antigas.'
            ]);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
    }
}
