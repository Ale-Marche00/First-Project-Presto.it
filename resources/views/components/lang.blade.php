@php
      $locale = substr(app()->getLocale(), 0, 2);

      $flagMap = [
              'en' => 'gb',     // 🇬🇧 English (UK)
              'it' => 'it',     // 🇮🇹 Italiano
              'es' => 'es',     // 🇪🇸 Español
              'fr' => 'fr',     // 🇫🇷 Français
              'de' => 'de',     // 🇩🇪 Deutsch
              'pt' => 'pt',     // 🇵🇹 Português
              'ru' => 'ru',     // 🇷🇴 Rumeno
              'zh' => 'cn',     // 🇨🇳 中文 (Cina)
              'ja' => 'jp',     // 🇯🇵 日本語
              'ko' => 'kr',     // 🇰🇷 한국어
              'ar' => 'sa',     // 🇸🇦 العربية (Arabia Saudita)
              'tr' => 'tr',     // 🇹🇷 Türkçe
      ];

      $flag = $flagMap[$locale] ?? 'un'; // fallback: bandiera ONU (o altro default)
@endphp

<!-- Bottone fisso in basso a sinistra con la bandiera della lingua corrente -->
<div class="position-fixed bottom-0 start-0 mb-4 ms-4">
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#languageModal">
            <span class="flag-icon flag-icon-{{ $flag }} me-2"
                  style="width: 40px; height: 30px; border-radius: 5px;"></span>
      </button>
</div>





<!-- Finestra Modale per la selezione della lingua -->
<!-- Finestra Modale per la selezione della lingua -->
<div class="modal fade" id="languageModal" tabindex="-1" aria-labelledby="languageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="languageModalLabel">{{ __('ui.language_modal_title') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- Colonna 1: Lingue principali -->
          <div class="col-md-6">
            <ul class="list-unstyled">
              <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'en']) }}">
                  <x-_locale lang="en" /> {{ __('ui.english') }}</a></li>
              <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'it']) }}">
                  <x-_locale lang="it" /> {{ __('ui.italian') }}</a></li>
              <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'es']) }}">
                  <x-_locale lang="es" /> {{ __('ui.spanish') }}</a></li>
              <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'fr']) }}">
                  <x-_locale lang="fr" /> {{ __('ui.french') }}</a></li>
              <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'de']) }}">
                  <x-_locale lang="de" /> {{ __('ui.german') }}</a></li>
              <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'pt']) }}">
                  <x-_locale lang="pt" /> {{ __('ui.portuguese') }}</a></li>
            </ul>
          </div>

          <!-- Colonna 2: Lingue extra -->
          <div class="col-md-6">
            <ul class="list-unstyled">
              <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'ru']) }}">
                  <x-_locale lang="ru" /> {{ __('ui.russian') }}</a></li>
              <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'zh']) }}">
                  <x-_locale lang="zh" /> {{ __('ui.chinese') }}</a></li>
              <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'ja']) }}">
                  <x-_locale lang="ja" /> {{ __('ui.japanese') }}</a></li> <!-- Giapponese -->
              <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'ko']) }}">
                  <x-_locale lang="ko" /> {{ __('ui.korean') }}</a></li> <!-- Coreano -->
              <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'ar']) }}">
                  <x-_locale lang="ar" /> {{ __('ui.arabic') }}</a></li> <!-- Arabo -->
              <li><a class="dropdown-item" href="{{ route('change.language', ['lang' => 'tr']) }}">
                  <x-_locale lang="tr" /> {{ __('ui.turkish') }}</a></li> <!-- Turco -->
            </ul>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
