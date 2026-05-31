<div id="global-loader" class="global-loader-overlay" aria-hidden="true" role="alert" aria-live="polite">
    <div class="global-loader-panel">
        <span class="page-loader global-loader-spinner" aria-hidden="true"></span>
        <p class="global-loader-message mb-0" hidden></p>
    </div>
</div>

<style>
    .global-loader-overlay {
        position: fixed;
        inset: 0;
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.45);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
    }
    .global-loader-overlay.is-active {
        display: flex;
    }
    body.global-loader-active {
        overflow: hidden;
    }
    .global-loader-panel {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        padding: 1.5rem 2rem;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.9);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
    }
    .global-loader-spinner {
        flex-shrink: 0;
    }
    .global-loader-message {
        font-size: 14px;
        color: #4b5563;
        text-align: center;
        max-width: 220px;
    }
    .global-loader-message:not([hidden]) {
        display: block;
    }
</style>
