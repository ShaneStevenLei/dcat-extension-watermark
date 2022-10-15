;(function () {
    function __canvasWM(options) {
        const canvas = document.createElement('canvas');
        canvas.setAttribute('width', options.width);
        canvas.setAttribute('height', options.height);
        const ctx = canvas.getContext("2d");
        ctx.shadowOffsetX = 2;
        ctx.shadowOffsetY = 2;
        ctx.shadowBlur = 2;
        ctx.textAlign = options.textAlign;
        ctx.textBaseline = options.textBaseline;
        ctx.font = options.fontSize + " " + options.font;
        ctx.fillStyle = options.fillStyle;
        ctx.rotate(Math.PI / 180 * options.rotate);
        ctx.fillText(options.content, parseFloat(options.width) / 2, parseFloat(options.height) / 2);

        const base64Url = canvas.toDataURL();
        const __wm = document.querySelector('.__wm');

        const watermarkDiv = __wm || document.createElement('div');
        const styleStr = "position:absolute;top:0;left:0;width:100%;height:100%;pointer-events:none;background-repeat:repeat;z-index:" + options.zIndex + ";background-image:url('" +  base64Url +"')";
        watermarkDiv.setAttribute('style', styleStr);
        watermarkDiv.classList.add('__wm');
        watermarkDiv.setAttribute('id', '__wm')

        if (!__wm) {
            options.container.style.position = 'relative';
            options.container.insertBefore(watermarkDiv, options.container.firstChild);
        } else if (__wm.getAttribute('style') !== styleStr) {
            window.location.reload("#__wm");
        }
    }

    if (typeof module != 'undefined' && module.exports) {
        module.exports = __canvasWM;
    } else if (typeof define == 'function' && define.amd) {
        define(function () {
            return __canvasWM;
        });
    } else {
        window.__canvasWM = __canvasWM;
    }
})();


