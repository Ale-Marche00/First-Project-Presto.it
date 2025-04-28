<div class="container-fluid custom-footer p-5">
  <footer class="row">
    <div class="col-lg-4">
      <p class="text-body-secondary">{{ __('ui.footer_copyright') }}</p>
    </div>

    <div class="col-lg-4">
      <h5>{{ __('ui.footer_useful_links') }}</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="{{ route('revisore.info') }}" class="nav-link p-0 text-body-secondary">{{ __('ui.footer_become_revisor') }}</a></li>
        
      </ul>
    </div>

    <div class="col-lg-4">
      <h5>{{ __('ui.footer_created_by') }}</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2">{{ __('ui.footer_alessandro') }}</li>
        <li class="nav-item mb-2">{{ __('ui.footer_mario') }}</li>
        <li class="nav-item mb-2">{{ __('ui.footer_alessio') }}</li>
        <li class="nav-item mb-2">{{ __('ui.footer_giorgia') }}</li>
      </ul>
    </div>
  </footer>
</div>
