<div id="loadingOverlay"
     style="
        display: none; 
        position: fixed; 
        top:0; left:0; width:100%; height:100%; 
        background: rgba(89, 51, 146, 0.5); /* secondary color with opacity */
        z-index: 9999; 
        align-items: center; 
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    ">
    <div id="loader" style="
        width: 50px;
        height: 50px;
        border: 5px solid #f3f3f3; /* light gray border */
        border-top: 5px solid #9455f4; /* main theme */
        border-radius: 50%;
    "></div>
</div>

@push('scripts')
<script>
    const overlay = document.getElementById('loadingOverlay');
    const loader = document.getElementById('loader');
    let animation;

    // Manual control functions
    window.startLoading = function () {
        overlay.style.display = 'flex';
        requestAnimationFrame(() => overlay.style.opacity = 1); // fade in
        animation = gsap.to(loader, {
            rotation: 360,
            duration: 1,
            repeat: -1,
            ease: "linear"
        });
    }

    window.stopLoading = function () {
        overlay.style.opacity = 0; // fade out
        if (animation) animation.kill();
        gsap.set(loader, { rotation: 0 });
        // Wait for transition to finish before hiding
        setTimeout(() => overlay.style.display = 'none', 300);
    }

    document.addEventListener('livewire:load', () => {
        Livewire.hook('message.sent', () => startLoading());
        Livewire.hook('message.processed', () => stopLoading());
    });
</script>
@endpush
