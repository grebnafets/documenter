(function makeString_repeat_Global(){if(typeof String.prototype.repeat!=="function"||typeof String.repeat!=="function"){String.prototype.repeat=function(b){var a;a="";if(b<1){return""}while(b>0){a+=this;b=b-1}return a}}}());(function makeString_trim_Global(){if(typeof String.prototype.trim!=="function"||typeof String.trim!=="function"){String.prototype.trim=function(){return this.replace(/^\s+|\s+$/g,"")}}}());(function makeString_rtrim_Global(){if(typeof String.prototype.rtrim!=="function"||typeof String.rtrim!=="function"){String.prototype.rtrim=function(){return this.replace(/^\s+/,"")}}}());(function(){var a="JSON data is missing. ";a+="Hint: did you include the JSON file after the script?";if(DATA.documenter===undefined){throw new Error(a)}if(typeof String.prototype.repeat!=="function"&&typeof String.repeat!=="function"){throw new Error("String.repeat() prototype is missing")}if(typeof String.prototype.rtrim!=="function"&&typeof String.rtrim!=="function"){throw new Error("String.rtrim() prototype is missing")}}());var Docm={};Docm.parse={};Docm.Data=DATA.documenter;Docm.prependSpan=function(b){var c,a,d;c=b;if(c.classes!==undefined){c=c.classes}a=c;d='<span class="'+a+'">';return d};Docm.appendSpan=function(){var a;a="</span>";return a};Docm.addSpan=function(e,c){var b,d,f,a;b="";d=false;f=false;a=false;if(typeof e[c]==="string"){b+=Docm.prependSpan(e[c])+c+Docm.appendSpan()}else{b+=Docm.prependSpan(e[c])+c;if(e[c].end_token!==undefined){d=e[c].end_token}else{if(e[c].qend_token!==undefined){f=e[c].qend_token}}}if(e[c].classes!==undefined){if(e[c].classes.indexOf("string")!==-1){a=true}}return{output:b,end_token:d,qend_token:f,is_string:a}};Docm.parse.code=function(c,a){var s,r,v,u,f,q,n,l,z,d,o,w,h,m;m=Docm.Data[c];a=a.rtrim();q="";h="";z=false;d=false;o=false;w=false;l=[];function g(i){if(i){h+=n;h+=Docm.appendSpan();s=s-1;d=false}else{h+=q;h+=Docm.appendSpan();z=false}if(u==="\n"){h+="<br />"}q=""}function t(){var i;i=Docm.addSpan(m,q);h+=i.output;z=i.end_token;d=i.qend_token;w=i.is_string;q=""}function k(){var i,j;r=s+1;j=a[r];while(j!==" "&&j!=="\n"&&j!==""&&m[u+j]!==undefined){u+=a[r];r=r+1;j=a[r]}r=r-1;s=r;i=Docm.addSpan(m,u);h=h+n+i.output;z=i.end_token;d=i.qend_token;w=i.is_string;q=""}function x(){s=s+1;u=a[s];n=q;q+=u;h+=q;q=""}function y(){h+=q;q="";u=""}function e(){l[m._ignore[u]]=new RegExp(m._ignore[u],"i")}function b(){return l[m._ignore[u]].test(q)}function p(){return m._nextValid[q][f]!==undefined}for(s=0,v=a.length;s<v;s+=1){u=a[s];f=a[s+1];n=q;q+=u;if(w===false&&q.length>6){switch(q){case"_nextValid":y();break;case"_ignore":y();break}}switch(u){case"\\":x();break;case"<":if((z!==false||d!==false)){if(w===false){o=true}else{q=n+"&#60;"}}break;case">":if((z!==false||d!==false)){if(w===false){o=false}else{q=n+"&#62;"}}break;case" ":if(z===false&&d===false){h+=n+"&nbsp;";q=""}else{if(o===false){q=n+"&nbsp;"}else{q=n+" "}}break;case"\t":h+="&nbsp;".repeat(8);break;case"\n":if(z!=="\n"){h+=q+"<br />";q=""}break}if(z!==false){if(q.indexOf(z)!==-1){g(false)}}else{if(d!==false){if(d[u]!==undefined){g(true)}}else{if(m[q]!==undefined&&q.length>1){if(m._nextValid[q]===undefined){t()}else{if(p()){t()}}}else{if(m[u]!==undefined){if(m._ignore[u]===undefined){k()}else{if(l[m._ignore[u]]===undefined){e();if(!b()){k()}}else{if(!b()){k()}}}}}}}}return"<code>"+h+"</code>"};var Str=document.getElementById("scriptid").innerHTML;console.info("Code length is: "+Str.trim().length);console.time("Docm.parse.code excecution time");var Code=Docm.parse.code("js",Str);console.timeEnd("Docm.parse.code excecution time");console.time("Code to dom");document.getElementById("document").innerHTML=Code;console.timeEnd("Code to dom");