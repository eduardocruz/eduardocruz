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
        'eduardo@eduardocruz.com',
        //'lilian.cunha.comp@gmail.com',
        //'viniciuspa87@hotmail.com'
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
    public function boot()
    {
        parent::boot();

        //Spark::noCardUpFront()->trialDays(7);

        Spark::noAdditionalTeams();

        //Spark::collectBillingAddress();

        //Spark::promotion('20200518-PROMO');

        //Spark::freePlan('Fila de Espera')->features(['Inscreva-se e aguarde novas vagas'])->trialDays(0);

        Spark::plan('Anual', 'price_1J9znf48gdCLm2TzuVUq6xRC')
            ->yearly()
            ->archived()
            //->trialDays(7)
            ->price(520.00)
            ->features([
                'Dezenas de aulas gravadas com diversos temas.',
                'Piloto Automático: Módulo prático mostrando desde a criação do servidor na Digital Ocean, até o deploy e cobrança no cartão com Stripe Billing e Laravel Spark',
                'Aprendendo a conseguir clientes americanos no Upwork.',
                'Ecossistema do PHP/Laravel.',
                'DevOps com Laravel Forge, Envoyer e muito mais',
                'Expatriados: Entrevistas com brasileiros trabalham no exterior',
                'Sete dias avaliação(Trial)'
            ]);

        Spark::plan('Anual Legacy', 'plan_HFhq659dFFkfbr')
            ->yearly()
            ->archived()
            //->trialDays(7)
            ->price(520.00)
            ->features([
                'Dezenas de aulas gravadas com diversos temas.',
                'Piloto Automático: Módulo prático mostrando desde a criação do servidor na Digital Ocean, até o deploy e cobrança no cartão com Stripe Billing e Laravel Spark',
                'Aprendendo a conseguir clientes americanos no Upwork.',
                'Ecossistema do PHP/Laravel.',
                'DevOps com Laravel Forge, Envoyer e muito mais',
                'Expatriados: Entrevistas com brasileiros trabalham no exterior',
                'Sete dias avaliação(Trial)'
            ]);

        Spark::plan('Anual', 'price_1JeVYf48gdCLm2Tz8B5rrsed')
            ->yearly()
            //->trialDays(7)
            ->price(1040.00)
            ->features([
                'Dezenas de aulas gravadas com diversos temas.',
                'Piloto Automático: Módulo prático mostrando desde a criação do servidor na Digital Ocean, até o deploy e cobrança no cartão com Stripe Billing e Laravel Spark',
                'Aprendendo a conseguir clientes americanos no Upwork.',
                'Ecossistema do PHP/Laravel.',
                'DevOps com Laravel Forge, Envoyer e muito mais',
                'Expatriados: Entrevistas com brasileiros trabalham no exterior',
                'Sete dias avaliação(Trial)'
            ]);

        Spark::plan('Mensal Light', 'plan_HFhocp5DrQZTu7')
            //->trialDays(7)
            ->price(43.34)
            ->archived()
            ->features([
                'Dezenas de aulas gravadas com diversos temas.',
                'Aprendendo a conseguir clientes americanos no Upwork.',
                'Básico e ecossistema do PHP/Laravel.',
                'DevOps e muito mais',
                'Sete dias avaliação(Trial)'
            ]);

        Spark::plan('Mensal', 'price_1JaNPG48gdCLm2TzYZZrISOO')
            //->trialDays(7)
            ->archived()
            ->price(86.68)
            ->features([
                'Dezenas de aulas gravadas com diversos temas.',
                'Aprendendo a conseguir clientes americanos no Upwork.',
                'Básico e ecossistema do PHP/Laravel.',
                'DevOps e muito mais'
            ]);

        Spark::plan('Mensal Founder', 'plan_HF9ozhVlP1Pgyg')
            ->price(21.67)
            ->archived()
            ->features([
                'Aulas semanais ao vivo.', 'Acesso a gravação das aulas semanais.', 'Acesso a lives antigas.'
            ]);

        /*
        Spark::plan('Dev Test', 'plan_H3xDm6bX8tWPey')
            ->price(5.00)
            ->features([
                'Aulas semanais ao vivo.', 'Acesso a gravação das aulas semanais.', 'Acesso a lives antigas.'
            ]);
*/

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
        Spark::useUserModel('App\User');
        Spark::useTeamModel('App\Team');

    }
}
