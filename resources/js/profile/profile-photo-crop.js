const STAGE_HEIGHT = 450;

export function createProfilePhotoCropper(canvas, image) {
    const ctx = canvas.getContext('2d');
    let stageW = 0;
    let stageH = STAGE_HEIGHT;
    let scale = 1;
    let offsetX = 0;
    let offsetY = 0;
    let cropSize = 0;
    let cropX = 0;
    let cropY = 0;
    let dragging = false;
    let dragStartX = 0;
    let dragStartY = 0;
    let dragOffsetX = 0;
    let dragOffsetY = 0;

    function measure() {
        const parent = canvas.parentElement;
        stageW = parent?.clientWidth || 600;
        stageH = Math.min(STAGE_HEIGHT, Math.round(window.innerHeight * 0.7));

        canvas.width = stageW;
        canvas.height = stageH;

        cropSize = Math.min(stageW, stageH) * 0.82;
        cropX = (stageW - cropSize) / 2;
        cropY = (stageH - cropSize) / 2;

        const fitScale = Math.max(stageW / image.naturalWidth, stageH / image.naturalHeight);
        scale = fitScale;
        offsetX = (stageW - image.naturalWidth * scale) / 2;
        offsetY = (stageH - image.naturalHeight * scale) / 2;
        clampPosition();
    }

    function clampPosition() {
        const imgW = image.naturalWidth * scale;
        const imgH = image.naturalHeight * scale;

        offsetX = Math.min(cropX, Math.max(offsetX, cropX + cropSize - imgW));
        offsetY = Math.min(cropY, Math.max(offsetY, cropY + cropSize - imgH));
    }

    function draw() {
        ctx.clearRect(0, 0, stageW, stageH);
        ctx.fillStyle = '#e9ecef';
        ctx.fillRect(0, 0, stageW, stageH);

        ctx.drawImage(image, offsetX, offsetY, image.naturalWidth * scale, image.naturalHeight * scale);

        ctx.save();
        ctx.fillStyle = 'rgba(0, 0, 0, 0.55)';
        ctx.beginPath();
        ctx.rect(0, 0, stageW, stageH);
        ctx.rect(cropX, cropY, cropSize, cropSize);
        ctx.fill('evenodd');
        ctx.restore();

        ctx.strokeStyle = '#ffffff';
        ctx.lineWidth = 2;
        ctx.strokeRect(cropX + 1, cropY + 1, cropSize - 2, cropSize - 2);

        ctx.strokeStyle = 'rgba(255, 255, 255, 0.45)';
        ctx.lineWidth = 1;
        for (let i = 1; i < 3; i += 1) {
            const x = cropX + (cropSize / 3) * i;
            const y = cropY + (cropSize / 3) * i;
            ctx.beginPath();
            ctx.moveTo(x, cropY);
            ctx.lineTo(x, cropY + cropSize);
            ctx.stroke();
            ctx.beginPath();
            ctx.moveTo(cropX, y);
            ctx.lineTo(cropX + cropSize, y);
            ctx.stroke();
        }
    }

    function onPointerDown(event) {
        dragging = true;
        dragStartX = event.clientX;
        dragStartY = event.clientY;
        dragOffsetX = offsetX;
        dragOffsetY = offsetY;
        canvas.setPointerCapture(event.pointerId);
    }

    function onPointerMove(event) {
        if (!dragging) {
            return;
        }

        offsetX = dragOffsetX + (event.clientX - dragStartX);
        offsetY = dragOffsetY + (event.clientY - dragStartY);
        clampPosition();
        draw();
    }

    function onPointerUp(event) {
        dragging = false;
        canvas.releasePointerCapture(event.pointerId);
    }

    function onWheel(event) {
        event.preventDefault();

        const delta = event.deltaY > 0 ? 0.92 : 1.08;
        const nextScale = Math.max(0.05, Math.min(scale * delta, 8));
        const centerX = cropX + cropSize / 2;
        const centerY = cropY + cropSize / 2;

        offsetX = centerX - (centerX - offsetX) * (nextScale / scale);
        offsetY = centerY - (centerY - offsetY) * (nextScale / scale);
        scale = nextScale;
        clampPosition();
        draw();
    }

    function bindEvents() {
        canvas.addEventListener('pointerdown', onPointerDown);
        canvas.addEventListener('pointermove', onPointerMove);
        canvas.addEventListener('pointerup', onPointerUp);
        canvas.addEventListener('pointercancel', onPointerUp);
        canvas.addEventListener('wheel', onWheel, { passive: false });
    }

    function unbindEvents() {
        canvas.removeEventListener('pointerdown', onPointerDown);
        canvas.removeEventListener('pointermove', onPointerMove);
        canvas.removeEventListener('pointerup', onPointerUp);
        canvas.removeEventListener('pointercancel', onPointerUp);
        canvas.removeEventListener('wheel', onWheel);
    }

    function getCroppedCanvas(outputSize) {
        const output = document.createElement('canvas');
        output.width = outputSize;
        output.height = outputSize;

        const sourceX = (cropX - offsetX) / scale;
        const sourceY = (cropY - offsetY) / scale;
        const sourceSize = cropSize / scale;

        output.getContext('2d').drawImage(
            image,
            sourceX,
            sourceY,
            sourceSize,
            sourceSize,
            0,
            0,
            outputSize,
            outputSize
        );

        return output;
    }

    measure();
    bindEvents();
    draw();

    return {
        redraw() {
            measure();
            draw();
        },
        getCroppedCanvas,
        destroy() {
            unbindEvents();
        },
    };
}
