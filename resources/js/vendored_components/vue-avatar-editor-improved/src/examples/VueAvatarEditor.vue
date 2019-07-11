<script>
let templateHTML = require('./VueAvatarEditor.html');
let templateJS = require('./VueAvatarEditor.js');
let templateRawJS = require('raw-loader!./VueAvatarEditor.js');

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
