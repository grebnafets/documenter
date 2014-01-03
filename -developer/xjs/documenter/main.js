/*jslint browser: true, indent: 8, nomen: true */
/*global DATA, console */

/* 
 * ATTENTION!
 * This is not your typical API documentation.
 * This is a prototype code documentation for maintainers.
 */

/* 
 * ABSTRACT IDEA
<img style="border:1px solid black;" src="$assets/img/documenter/abstract.gif" />
 * JSON DATA SNAPSHOT
<img style="border:1px solid black;" src="$assets/img/documenter/JSON-snapshot.gif" />
There can be more then one class name. Each class name is separated with space.
Data index is the token or sign that inticates time to prepend span.
Sometimes, an ending token is needed to know when to close the open span tag.
 */

/* DEPENDENCY CHECK */
(function () {
        'use strict';
        var msg = "JSON data is missing. ";
        msg    += "Hint: did you include the JSON file after the script?";
        if (DATA.documenter === undefined) {
                throw new Error(msg);
        }
        if (typeof String.prototype.repeat !== 'function'
                        && typeof String.repeat !== 'function') {
                throw new Error("String.repeat() prototype is missing");
        }
        if (typeof String.prototype.rtrim !== 'function'
                        && typeof String.rtrim !== 'function') {
                throw new Error("String.rtrim() prototype is missing");
        }
}());

/* 
 * DOCUMENTER GLOBAL NAMESPACE: Docm 
 */
var Docm   = {};
Docm.parse = {};
Docm.Data  = DATA.documenter; //JSON DATA

/* 
 * FUNCTION Docm.prependSpan
 * PARAMS: 
 *      data: obj | DATA.documenter.{program type}.{index}
 * RETURN:
 *      string: &#60;span class="[class1 class2 ...]" &#62;     
 */
Docm.prependSpan = function (data) {
        'use strict';
        var D, classes, span_start;
        D = data;
        if (D.classes !== undefined) {
                D = D.classes;
        }
        classes = D;
        span_start = '<span class="' + classes + '">';
        return span_start;
};

/* 
 * FUNCTION Docm.prependSpan
 * PARAM:
 *      no params
 * RETURN:
        string: &#60;/span &#62;
 */
Docm.appendSpan = function () {
        'use strict';
        var span_end;
        span_end = '</span>';
        return span_end;
};

/* 
 * FUNCTION Docm.addSpan
 * PARAM:
 *      D     : obj        |    DATA.documenter.{program type}
 *      index : string     |    index for DATA.documenter.{program type}  
 * RETURN:
 *      obj :
 *              output     :  string
 *              end_token  :  string _or_ boolean false
 *              qend_token :  string _or_ boolean false
 *              is_string  :  boolean
 */
Docm.addSpan = function (D, index) {
        'use strict';
        var output, end_token, qend_token, is_string;
        output     = '';
        end_token  = false;
        qend_token = false;
        is_string  = false;
        if (typeof D[index] === 'string') {
                output +=
                        Docm.prependSpan(D[index])
                        + index
                        + Docm.appendSpan();
        } else {
                output += Docm.prependSpan(D[index]) + index;
                if (D[index].end_token !== undefined) {
                        end_token = D[index].end_token;
                } else if (D[index].qend_token !== undefined) {
                        qend_token = D[index].qend_token;
                }
        }
        if (D[index].classes !== undefined) {
                if (D[index].classes.indexOf("string") !== -1) {
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
 * FUNCTION Docm.parse.code
 * PARAM:
 *      type    : string     |    program type: "js", "php" and so on.
 *      code    : string     |    code text 
 * RETURN:
 *      output : string | HTML parsed code text with span tags
 */
Docm.parse.code = function (type, code) {
        'use strict';       
        var i, j, len,
                charcter, next_char, buffer, buffer_old, cache,
                end_token, qend_token, html_comment, is_string,
                output,
                D;
        D            = Docm.Data[type];
        code         = code.rtrim();
        buffer       = '';
        output       = '';
        end_token    = false;
        qend_token   = false;
        html_comment = false;
        is_string    = false;
        cache        = []; // Cache regExps
        function closeSpan(quick_end_token) {
                if (quick_end_token) {
                        output    += buffer_old;
                        output    += Docm.appendSpan();
                        i          = i - 1; // Read last character again
                        qend_token = false;
                } else {
                        output   += buffer;
                        output   += Docm.appendSpan();
                        end_token = false;
                }
                if (charcter === '\n') {
                        output += '<br />';
                }
                buffer     = '';
        }
        function addSpan_buffer() {
                var tmpOut;
                tmpOut     = Docm.addSpan(D, buffer);
                output    += tmpOut.output;
                end_token  = tmpOut.end_token;
                qend_token = tmpOut.qend_token;
                is_string  = tmpOut.is_string;
                buffer     = '';
        }
        function addSpan_char() {
                var tmpOut, nextChar;
                j = i + 1;
                nextChar = code[j];
                /* 
                 * See if next neighbor characters are also valid
                 */
                while (nextChar !== ' '
                                && nextChar !== '\n'
                                && nextChar !== ''
                                && D[charcter + nextChar] !== undefined) {
                        charcter += code[j];
                        j         = j + 1;
                        nextChar  = code[j];
                }
                j = j - 1;
                /*
                 * Roll i forward to j in case "character" contains more
                 * characters.
                 */
                i = j;
                tmpOut     = Docm.addSpan(D, charcter);
                output     = output + buffer_old + tmpOut.output;
                end_token  = tmpOut.end_token;
                qend_token = tmpOut.qend_token;
                is_string  = tmpOut.is_string;
                buffer     = '';
        }
        function escape_next() {
                i          = i + 1;
                charcter   = code[i];
                buffer_old = buffer;
                buffer    += charcter;
                output    += buffer;
                buffer     = '';
        }
        function save_buffer() {
                output += buffer;
                buffer   = '';
                charcter = '';
        }
        function cacheRegEx() {
                cache[D._ignore[charcter]]
                        = new RegExp(D._ignore[charcter], 'i');
        }
        function testBuffer() {
                return cache[D._ignore[charcter]].test(buffer);
        }
        function appropriateNextChar() {
                return D._nextValid[buffer][next_char] !== undefined;
        }
        for (i = 0, len = code.length; i < len; i += 1) {
                charcter       = code[i];
                next_char      = code[i + 1];
                buffer_old     = buffer;
                buffer        += charcter;
                if (is_string === false && buffer.length > 6) {
                        switch (buffer) {
                        case '_nextValid':
                                save_buffer();
                                break;
                        case '_ignore':
                                save_buffer();
                                break;
                        }
                }
                switch (charcter) {
                case '\\':
                        escape_next();
                        break;
                case '<':
                        if ((end_token !== false || qend_token !== false)) {
                                if (is_string === false) {
                                        html_comment = true;
                                } else {
                                        /* 
                                         * We are inside a string.
                                         * Replace \< for '#60' 
                                         */
                                        buffer = buffer_old + '&#60;';
                                        //                     ^ is #60
                                }
                        }
                        break;
                case '>':
                        if ((end_token !== false || qend_token !== false)) {
                                if (is_string === false) {
                                        html_comment = false;
                                } else {
                                        /* 
                                         * We are inside a string.
                                         * Replace \> for '#62' 
                                         */
                                        buffer = buffer_old + '&#62;';
                                        //                     ^ is #62
                                }
                        }
                        break;
                case ' ':
                        if (end_token === false && qend_token === false) {
                                output += buffer_old + '&nbsp;';
                                //                      ^ is nbsp
                                buffer  = '';
                        } else {
                                if (html_comment === false) {
                                        buffer = buffer_old + '&nbsp;';
                                        //                     ^ is nbsp
                                } else {
                                        /* 
                                         * We are inside a string.
                                         * We don't want &nbsp; in there.
                                         */
                                        buffer = buffer_old + ' ';
                                        //                     ^ is empty space
                                }
                        }
                        break;
                case '\t':
                        output += '&nbsp;'.repeat(8);
                        break;
                case '\n':
                        /* 
                         * If end_token is "\n", then "\n" is index
                         * to the closing span and we should ignore the "\n"
                         * for now.
                         */
                        if (end_token !== '\n') {
                                output += buffer + '<br />';
                                buffer = '';
                        }
                        break;
                }
                /*
                 * if endtoken is found:
                 *      if endtoken if found in buffer:
                 *              close span;
                 * else if qendtoken is found:
                 *      if character is index in qendtoken:
                 *              close span;
                 * 
                 * else if neither endtoken nor qendtoken is set:
                 *      if 
                 *      buffer contains more then one character
                 *      AND
                 *      if buffer is index in JSON DATA:
                 *              add span if buffer is sensible;
                 *
                 *      else if character is index of JSON DATA:
                 *              add span if char is sensible;
                 */
                
                if (end_token !== false) {
                        if (buffer.indexOf(end_token) !== -1) {
                                closeSpan(false);
                        }
                } else if (qend_token !== false) {
                        if (qend_token[charcter] !== undefined) {
                                closeSpan(true);
                        }
                } else if (D[buffer] !== undefined && buffer.length > 1) {
                        if (D._nextValid[buffer] === undefined) {
                                addSpan_buffer();
                        } else if (appropriateNextChar()) {
                                /* 
                                 * If the next character is appropriate,
                                 * then we know we should print this character
                                 * out. Good example is the native "do". 
                                 * We know "do" is "do" if the next char
                                 * ends with space, newline or bracket.
                                 */
                                addSpan_buffer();
                        }
                } else if (D[charcter] !== undefined) {
                        if (D._ignore[charcter] === undefined) {
                                addSpan_char();
                        } else {
                                /*
                                 * We need to check the buffer to understand
                                 * the context of the character before we add
                                 * any span to the output.
                                 */
                                if (cache[D._ignore[charcter]] === undefined) {
                                        cacheRegEx();
                                        if (!testBuffer()) {
                                                addSpan_char();
                                        }
                                } else if (!testBuffer()) {
                                        addSpan_char();
                                }
                        }
                }
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