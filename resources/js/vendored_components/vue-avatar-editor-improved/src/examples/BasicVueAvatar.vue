<script>
let templateHTML = require('./BasicVueAvatar.html');
let templateJS = require('./BasicVueAvatar.js');
let templateRawJS = require('raw-loader!./BasicVueAvatar.js');

let jsDefault = templateJS.default;
jsDefault.template = templateHTML;
jsDefault.methods.getRawHTML = function () {
    return templateHTML;
};
jsDefault.methods.getRawJS = function () {
    return templateRawJS;
};

export default jsDefault;
</script>
