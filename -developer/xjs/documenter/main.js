/*jslint browser: true, indent: 8, brackets: false */
/*global DATA, console */

/*
 * Comment alias:
 * BRN = BEFORE REFACTORING NOTICE!
 */
(function () {
        var msg = "JSON data is missing. ";
        msg    += "Hint: did you include the JSON file after the script?";
        if (DATA.documenter === undefined) {
                throw new Error(msg);
        }
}());
var Docm         = {};
Docm.parse       = {};
Docm.Data        = DATA.documenter;
Docm.prependSpan = function (data) {
        'use strict';
        var D, i, len, classes, span_start;
        D = data;
        classes = '';
        if (D.classes !== undefined) {
                D = D.classes;
        }
        len = D.length;
        // Get all classes
        for (i = 0; i < len; i = i + 1) {
                if (classes === '') {
                        classes += D[i];
                } else {
                        classes += ' ';
                        classes += D[i];
                }
        }
        span_start = '<span class="' + classes + '">';
        return span_start;
};

Docm.appendSpan = function () {
        'use strict';
        var span_end;
        span_end = '</span>';
        return span_end;
};

Docm.addSpan = function (D, val) {
        'use strict';
        var output, end_token, qend_token, is_string;
        output     = '';
        end_token  = false;
        qend_token = false;
        is_string  = false;
        if (Array.isArray(D[val])) {
                output +=
                        Docm.prependSpan(D[val])
                        + val
                        + Docm.appendSpan();
        } else {
                output += Docm.prependSpan(D[val]) + val;
                if (D[val].end_token !== undefined) {
                        end_token = D[val].end_token;
                } else if (D[val].qend_token !== undefined) {
                        qend_token = D[val].qend_token;
                }
        }
        if (D[val].classes !== undefined) {
                if (D[val].classes.indexOf("string") !== -1) {
                        is_string = true;
                }
        }
        return {
                output: output,
                end_token: end_token,
                qend_token: qend_token,
                is_string: is_string
        };
};

/*
 * This parser has one intentional design weakness.
 * It can't parse html tags within comments.
 * 
 * The reason is very simple. We want to be able to put image tags
 * there :-)
 * 
 * If you don't want that, then feel free to customize this to your liking.
 */

/*
 * Don't bother with the comments. These comments are for me at the moment.
 * I will make better comments, tutorial and documentation when I have
 * conceptualized this procedure in more abstract from... 
 * Edit:
 * I guess I have to 
 * use pictures... I have no idea how to explain the procedure with comments...
 * Edit... I have no fucking clue how to comment for others!!!!
 */
Docm.parse.code = function (type, code) {
        'use strict';
        if (Docm.prependSpan === undefined) {
                throw new Error("Docm.appendSpan() is missing");
        }
        if (Docm.appendSpan === undefined) {
                throw new Error("Docm.appendSpan() is missing");
        }
        if (Docm.addSpan === undefined) {
                throw new Error("Docm.appendSpan() is missing");
        }
        var i, j, len,
                _char, buffer, buffer_old, cache,
                end_token, qend_token, html_comment, is_string,
                output,
                outpBuffer, outpChar, escape,
                D;
        D            = Docm.Data[type];
        /* .trim() in my mind is supposed to be standard to javascript api.
         * If it isn't then add to string prototype with this.replace(/^\s+/, ''); */
        // Use String.replace(/^\s+/, ''); if you don't have String.rtrim()
        code         = code.rtrim();
        /* Store all data inside the buffer untill we know what kind of data
         * we are dealing with here. */
        buffer       = '';
        // Stores our parsed code.
        output       = '';
        // Append buffer to output when token is found.
        end_token    = false;
        // q was thought as "quick" as in ending quickly... I don't know...
        // Write buffer _minus_ _char to output when qtoken is found.
        // Note that qtoken is always one character and not more.
        qend_token   = false;
        /* To take full advantage of html parcing, we want pictures.
         * html_comment will track when we are inside of a comment. */
        html_comment = false;
        /* We also need to know if we are dealing with string or not */
        is_string    = false;
        len          = code.length;
        i            = 0;
        /* Regular expressions will be chaced */
        cache        = [];
        function closeSpan (quick) {
                if (quick) {
                        output += buffer_old;
                        output += Docm.appendSpan();
                        i = i - 1;
                        qend_token = false;
                } else {
                        output += buffer;
                        output += Docm.appendSpan();
                        end_token = false;
                }
                if (_char === '\n') {
                        output += '<br />';
                }
                buffer     = '';
        }
        function outpBuffer () {
                var tmpOut;
                tmpOut     = Docm.addSpan(D, buffer);
                output    += tmpOut.output;
                end_token  = tmpOut.end_token;
                qend_token = tmpOut.qend_token;
                is_string  = tmpOut.is_string;
                buffer     = '';
        }
        function outpChar () {
                var tmpOut;
                // Handle character
                j = i;
                // Check if neighbor characters are also valid
                while (D[_char] !== undefined) {
                        if (j <= len) {
                                j = j + 1;
                                _char = code.substring(i, j);
                        } else {
                                break;
                        }
                }
                // Remove extra caracter that makes _char invalid
                j = j - 1;
                _char = code.substring(i, j);
                // To correct the offset of ( i = i + 1 ) at the bottom
                j = j - 1;
                // Roll i forward to j.
                i = j;
                output    += buffer_old;
                tmpOut     = Docm.addSpan(D, _char);
                output    += tmpOut.output;
                end_token  = tmpOut.end_token;
                qend_token = tmpOut.qend_token;
                is_string  = tmpOut.is_string;
                buffer  = '';
        }
        function escape () {
                i          = i + 1;
                _char      = code.charAt(i);
                buffer_old = buffer;
                buffer    += _char;
                output    += buffer;
                buffer     = '';
        }
        // Iterate through the code once
        while (i < len) {
                _char      = code.charAt(i);
                buffer_old = buffer;
                buffer    += _char;
                switch (_char) {
                case '\\':
                        // Escape
                        escape();
                        break;
                case '<':
                        // Html comment start
                        if ((end_token !== false || qend_token !== false)) {
                                if (is_string === false) {
                                        html_comment = true;
                                } else {
                                        /* We are inside a string.
                                        * Replace \< for '#60' */
                                        buffer = buffer_old + '&#60;';
                                        //                     ^ is #60
                                }
                        }
                        break;
                case '>':
                        // Html comment end
                        if ((end_token !== false || qend_token !== false)) {
                                if (is_string === false) {
                                        html_comment = false;
                                } else {
                                        /* We are inside a string.
                                         * Replace \> for '#62' */
                                        buffer = buffer_old + '&#62;';
                                        //                     ^ is #62
                                }
                        }
                        break;
                case ' ':
                        // Handle space
                        if (end_token === false && qend_token === false) {
                                output += buffer_old + '&nbsp;';
                                //                      ^ is nbsp
                                buffer  = '';
                        } else {
                                if (html_comment === false) {
                                        buffer = buffer_old + '&nbsp;';
                                        //                     ^ is nbsp
                                } else {
                                        /* We are inside a string.
                                         * We don't want &nbsp; in there */
                                        buffer = buffer_old + ' ';
                                        //                     ^ is empty space
                                }
                        }
                        break;
                case '\t':
                        // Handle tap
                        // Comment this out if you don't have String.repeat()
                        output += '&nbsp;'.repeat(8);
                        break;
                case '\n':
                        // Handle new line
                        /* If end_token is set, then br will be 
                         * appended later. */
                        if (end_token !== '\n') {
                                output += buffer + '<br />';
                                buffer = '';
                        }
                        break;
                }
                // Search for ending token
                if (end_token !== false && buffer.indexOf(end_token) !== -1) {
                        // Append closin span
                        closeSpan(false);
                } else if (qend_token !== false && qend_token[_char] !== undefined) {
                        closeSpan(true);
                } else if (end_token === false && D[buffer] !== undefined && buffer.length > 1) {
                        // Handle buffer
                        if (D.nextValid[buffer] === undefined) {
                                outpBuffer();
                        } else if (D.nextValid[buffer][code.charAt(i + 1)] !== undefined) {
                                /* If this is set, then we know we should print this character out.
                                 * Good example is the native "do". We know do is do if the next char ends with 
                                 * space, newline or bracket. */
                                outpBuffer();
                        } else if (D.nextValid[buffer][code.charAt(i + 1) + code.charAt(i + 2)] !== undefined) {
                                /* It serves the same purpose as above but we now check two characters ahead.
                                 * 
                                 * I don't think this part is necessary, but my rational mind failed
                                 * to prove why it is not needed so my "gut" made the decision for me... */
                                outpBuffer();
                        }
                // Should we ignore this part or not?
                } else if (end_token === false && D[_char] !== undefined) {
                        /* Do we need to check the buffer before we output the
                         * char/characters? */
                        if (D.ignore[_char] === undefined) {
                                // No
                                outpChar();
                        } else {
                                // Yes
                                /*** Regexp seems to be the only valid solution
                                 *** to check the buffer dynamically from the 
                                 *** JSON file. (Hei, I tried my best...) ***/
                                if (cache[D.ignore[_char]] === undefined) {
                                        /* Cache regular expression and output
                                         * char/characters */
                                        cache[D.ignore[_char]] = new RegExp(D.ignore[_char], 'i');
                                        outpChar();
                                } else if (!(cache[D.ignore[_char]].test(buffer))) {
                                        /* Output char/characters */
                                        outpChar();
                                }
                        }
                }
                i = i + 1;
        }
        return '<code>' + output + '</code>';
};

var Str = document.getElementById('scriptid').innerHTML;
console.info('Code length is: ' + Str.trim().length);

console.time('Docm.parse.code excecution time');
var Code = Docm.parse.code('js', Str);
console.timeEnd('Docm.parse.code excecution time');

console.time('Code to dom');
document.getElementById('document').innerHTML = Code;
console.timeEnd('Code to dom');