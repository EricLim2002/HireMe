<div>
  {{-- prevent Livewire from touching the particle canvas itself --}}
  <div id="tsparticles" wire:ignore></div>
</div>

{{-- do NOT include tsParticles CDN here — it will be bundled via Vite --}}
{{-- The app bundle will call/init the particles on load/update --}}
