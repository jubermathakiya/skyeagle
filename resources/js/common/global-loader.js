let loaderCount = 0;

function getLoaderElement() {
    return document.getElementById('global-loader');
}

function getMessageElement() {
    return document.querySelector('#global-loader .global-loader-message');
}

export function showGlobalLoader(message = '') {
    const loader = getLoaderElement();
    if (!loader) {
        return;
    }

    loaderCount++;

    const messageEl = getMessageElement();
    if (messageEl) {
        if (message) {
            messageEl.textContent = message;
            messageEl.hidden = false;
        } else {
            messageEl.textContent = '';
            messageEl.hidden = true;
        }
    }

    loader.classList.add('is-active');
    loader.setAttribute('aria-hidden', 'false');
    document.body.classList.add('global-loader-active');
}

export function hideGlobalLoader(force = false) {
    const loader = getLoaderElement();
    if (!loader) {
        return;
    }

    if (force) {
        loaderCount = 0;
    } else {
        loaderCount = Math.max(0, loaderCount - 1);
        if (loaderCount > 0) {
            return;
        }
    }

    loader.classList.remove('is-active');
    loader.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('global-loader-active');

    const messageEl = getMessageElement();
    if (messageEl) {
        messageEl.textContent = '';
        messageEl.hidden = true;
    }
}

window.showGlobalLoader = showGlobalLoader;
window.hideGlobalLoader = hideGlobalLoader;

if (!window.__globalLoaderInitialized) {
    window.__globalLoaderInitialized = true;

    document.addEventListener('click', (event) => {
        const trigger = event.target.closest('[data-global-loader]');
        if (!trigger) {
            return;
        }

        const message = trigger.getAttribute('data-global-loader-message') || '';
        showGlobalLoader(message);
    });
}
