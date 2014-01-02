/*jslint browser: true, indent: 8, brackets: false */

(function makeString_repeat_Global() {
        'use strict';
        if (typeof String.prototype.repeat !== 'function' || typeof String.repeat !== 'function') {
                String.prototype.repeat = function (count) {
                        var output;
                        output = '';
                        if (count < 1) {
                                return '';
                        }
                        while (count > 0) {
                                output += this;
                                count   = count - 1;
                        }
                        return output;
                };
        }
}());

(function makeString_trim_Global() {
        'use strict';
        if (typeof String.prototype.trim !== 'function' || typeof String.trim !== 'function') {
                String.prototype.trim = function () {
                        return this.replace(/^\s+|\s+$/g, '');
                };
        }
}());

(function makeString_rtrim_Global() {
        'use strict';
        if (typeof String.prototype.rtrim !== 'function' || typeof String.rtrim !== 'function') {
                String.prototype.rtrim = function () {
                        return this.replace(/^\s+/, '');
                };
        }
}());