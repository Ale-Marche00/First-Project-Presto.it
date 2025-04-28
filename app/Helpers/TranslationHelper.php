<?php

namespace App\Helpers;

use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslationHelper
{
    /**
     * Traduci le stringhe mancanti per tutti i file in una lingua.
     *
     * @param string $locale La lingua di destinazione (es. 'it', 'es')
     * @return void
     */
    public static function translateMissingStrings($locale)
    {
        $langPath = resource_path('lang');

        $sourceLangDir = $langPath . '/en';
        $targetLangDir = $langPath . '/' . $locale;

        if (!is_dir($sourceLangDir)) {
            throw new \Exception("La cartella delle lingue inglesi non esiste!");
        }

        if (!is_dir($targetLangDir)) {
            mkdir($targetLangDir, 0755, true);
        }

        // Istanzia il traduttore
        $tr = new GoogleTranslate($locale);

        // Scorri tutti i file PHP nella cartella 'en'
        foreach (glob($sourceLangDir . '/*.php') as $sourceFilePath) {
            $filename = basename($sourceFilePath); // es. ui.php
            $targetFilePath = $targetLangDir . '/' . $filename;

            $sourceStrings = include $sourceFilePath;
            $targetStrings = file_exists($targetFilePath) ? include $targetFilePath : [];

            // Traduci solo le chiavi mancanti
            foreach ($sourceStrings as $key => $value) {
                if (!isset($targetStrings[$key])) {
                    if (is_array($value)) {
                        // Se il valore è un array, traduci i suoi elementi ricorsivamente
                        $targetStrings[$key] = self::translateArray($value, $tr);
                    } else {
                        // Traduci la stringa
                        $translatedValue = $tr->translate($value);
                        $targetStrings[$key] = $translatedValue;
                    }

                    // Stampa la traduzione
                    echo "[{$filename}] Tradotto '$key' ➜ " . (is_array($targetStrings[$key]) ? json_encode($targetStrings[$key]) : $targetStrings[$key]) . "\n";
                }
            }

            // Salva il file tradotto
            file_put_contents($targetFilePath, '<?php return ' . var_export($targetStrings, true) . ';');
        }

        echo "✅ Traduzioni completate per la lingua: $locale\n";
    }

    /**
     * Traduzione ricorsiva per array multidimensionali.
     */
    private static function translateArray(array $array, GoogleTranslate $tr): array
    {
        $translated = [];

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                // Traduci ricorsivamente gli array
                $translated[$key] = self::translateArray($value, $tr);
            } elseif (is_string($value)) {
                // Traduci solo le stringhe
                $translated[$key] = $tr->translate($value);
            } else {
                // Lascia inalterato il valore se non è una stringa
                $translated[$key] = $value;
            }
        }

        return $translated;
    }
}
