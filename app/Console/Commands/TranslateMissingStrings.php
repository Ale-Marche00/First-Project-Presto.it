<?php

namespace App\Console\Commands;

use App\Helpers\TranslationHelper;
use Illuminate\Console\Command;

class TranslateMissingStrings extends Command
{
    protected $signature = 'translate:missing {locale}';
    protected $description = 'Traduci le stringhe mancanti per una lingua specifica';

    public function handle()
    {
        $locale = $this->argument('locale');

        // Controlla se la lingua è tra quelle supportate
        $supportedLocales = [
            'it',       // Italiano
            'es',       // Spagnolo
            'en',       // Inglese
            'fr',       // Francese
            'de',       // Tedesco
            'pt',       // Portoghese
            'ru',       // Russo
            'zh',    // Cinese (semplificato)
            'ja',       // Giapponese
            'ko',       // Coreano
            'ar',       // Arabo
            'tr',       // Turco
            'pl',       // Polacco
            'nl',       // Olandese
            'sv',       // Svedese
            'fi',       // Finlandese
            'no',       // Norvegese
            'uk',       // Ucraino
            'ro',       // Romeno
            'cs',       // Ceco
            'el',       // Greco
        ];
         // Aggiungi qui le lingue supportate

        if (!in_array($locale, $supportedLocales)) {
            $this->error("Lingua non supportata. Lingue disponibili: it, es, en");
            return;
        }

        try {
            // Chiama l'helper per tradurre le stringhe mancanti
            TranslationHelper::translateMissingStrings($locale);
            $this->info("Traduzioni per '$locale' completate con successo.");
        } catch (\Exception $e) {
            $this->error("Errore: " . $e->getMessage());
        }
    }
}
