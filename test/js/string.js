/* TESTING STRUCTURE */

var mystring = "string<span class='innerstring'>flabla</span>"+1;
mystring = 'string<span class="innerstring">blafla</span>'+2;
mystring = "string<span class=\"escapedinnerstring\">flafla</span>"+3;
mystring = 'string<span class=\'escapedinnerstring\'>flafla</span>'+4;
mystring = "function reservedwords('_nextValid', '_ignore')"+5;
mystring = 'function reservedwords("_nextValid", "_ignore")'+6;
mystring = 'function reservedwords(\"_nextValid\", \"_ignore\")'+7;
