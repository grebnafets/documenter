<!DOCTYPE html>
<html>
        <head>
                <title>Documenter</title>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <style>
                        /* You might want to change your stylesheet.*/
                        html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,figcaption,figure,footer,header,hgroup,menu,nav,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;outline:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}ins{text-decoration:none}del{text-decoration:line-through}table{border-collapse:collapse;border-spacing:0}h1{font-size:24px}h2{font-size:22px}h3{font-size:20px}h4{font-size:18px}strong{font-weight:bold}a{text-decoration:none}.br{-webkit-border-radius:7px;-moz-border-radius:7px;border-radius:7px;background-clip:padding-box}body{font-family:"Courier New",Courier,monospace}.assignop{color:red}.bitwise{color:green}.arithmeop{color:#6f4e37}.logic{color:#575}.math{color:brown}.native{color:blue}.structure{color:#575}.comment{color:darkgrey}.string{color:orange}.int{color:magenta}.obj{color:blueviolet}.variable{color:brown}.ECMAstandard{color:cadetblue}.dom_api{color:purple}.dom_api.attripute{color:green}.firebug{color:red}.firebug.method{color:crimson}                        
                </style>
        </head>
        <body id="artargi">
                <div id="document"></div>
                <script id="scriptid" type="text/document">
                        <!-- include your javascript file here -->  
                </script>
                
                <script type="text/javascript">
                        var DATA = {"documenter":{"js":{"=":"assignop","-=":"assignop","+=":"assignop","*=":"assignop","\/=":"assignop","%=":"assignop",">>=":"assignop","<<=":"assignop",">>>=":"assignop","&":"bitwise","|":"bitwise","~":"bitwise","^":"bitwise",">>":"bitwise",">>>":"bitwise","<<":"bitwise","&&":"logic","||":"logic","===":"logic","==":"logic","!==":"logic","!=":"logic","!":"logic","<":"logic",">":"logic","<=":"logic",">=":"logic","+":"arithmeop","-":"arithmeop","*":"arithmeop","\/":"arithmeop","%":"arithmeop","++":"arithmeop","--":"arithmeop","1":"int","2":"int","3":"int","4":"int","5":"int","6":"int","7":"int","8":"int","9":"int","0":"int","function":"native","return":"native","if":"native","else":"native","switch":"native","case":"native","break":"native","default":"native","for":"native","while":"native","do":"native","typeof":"native","var":"native","instanceof":"native","void":"native","null":"native","throw":"native","Error":"ECMAstandard","new":"native","in":"native","this":"native","delete":"native","true":"native","false":"native","try":"native","catch":"native","finally":"native","with":"native","debugger":"native","Array":"ECMAstandard","Boolean":"ECMAstandard","Date":"ECMAstandard","decodeURI":"ECMAstandard","decodeURIComponent":"ECMAstandard","encodeURI":"ECMAstandard","encodeURIComponent":"ECMAstandard","eval":"ECMAstandard","EvalError":"ECMAstandard","Function":"ECMAstandard","isFinite":"ECMAstandard","isNaN":"ECMAstandard","JSON":"ECMAstandard","Map":"ECMAstandard","Math":"ECMAstandard","Number":"ECMAstandard","Object":"ECMAstandard","parseInt":"ECMAstandard","parseFloat":"ECMAstandard","Promise":"ECMAstandard","Proxy":"ECMAstandard","RangeError":"ECMAstandard","ReferenceError":"ECMAstandard","Reflect":"ECMAstandard","RegExp":"ECMAstandard","Set":"ECMAstandard","String":"ECMAstandard","SyntaxError":"ECMAstandard","System":"ECMAstandard","TypeError":"ECMAstandard","WeakMap":"ECMAstandard","WeakSet":"ECMAstandard","{":"structure","}":"structure","(":"structure",")":"structure","[":"structure","]":"structure",";":"structure",":":"structure",",":"structure",".":"structure","\/\/":{"end_token":"\n","classes":"comment"},"\/*":{"end_token":"*\/","classes":"comment"},"\"":{"end_token":"\"","classes":"string"},"'":{"end_token":"'","classes":"string"},"document":"dom_api","window":"dom_api","length":"dom_api attripute","accessKey":"dom_api attripute","href":"dom_api attripute","tabIndex":"dom_api attripute","target":"dom_api attripute","firstChild":"dom_api attripute","lastChild":"dom_api attripute","nextSibling":"dom_api attripute","nodeName":"dom_api attripute","nodeType":"dom_api attripute","nodeValue":"dom_api attripute","ownerDocument":"dom_api attripute","parentElement":"dom_api attripute","parentNode":"dom_api attripute","previousSibling":"dom_api attripute","children":"dom_api attripute","currentStyle":"dom_api attripute","filters":"dom_api attripute","className":"dom_api attripute","innerHTML":"dom_api attripute","offsetHeight":"dom_api attripute","offsetLeft":"dom_api attripute","offsetParent":"dom_api attripute","offsetTop":"dom_api attripute","offsetWidth":"dom_api attripute","style":"dom_api attripute","title":"dom_api attripute","console":"firebug","info":"firebug method","log":"firebug method","time":"firebug method","timeEnd":"firebug method","group":"firebug method","groupEnd":"firebug method","debug":"firebug method","trace":"firebug method","_nextValid":{"do":{" ":1,"{":1,"\n":1},"var":{" ":1,"=":1,"\n":1},"document":{".":1,"\n":1},"window":{".":1,"[":1,"\n":1},"getElementById":{".":1,"[":1,"(":1,"\n":1},"getElementsByName":{".":1,"[":1,"(":1,"\n":1},"innerHTML":{" ":1,";":1,"=":1,"\n":1},"in":{" ":1,"\t":1,"\n":1},"time":{" ":1,"(":1,"\n":1},"group":{" ":1,"(":1,"\n":1},"debug":{" ":1,"(":1,"\n":1}},"_ignore":{"1":"^[a-zA-Z_]","2":"^[a-zA-Z_]","3":"^[a-zA-Z_]","4":"^[a-zA-Z_]","5":"^[a-zA-Z_]","6":"^[a-zA-Z_]","7":"^[a-zA-Z_]","8":"^[a-zA-Z_]","9":"^[a-zA-Z_]","0":"^[a-zA-Z_]"}},"php":{"-=":["operator"],"+=":["operator"],"++":["operator"],"--":["operator"],"&&":["logic"],"||":["logic"],"&":["logic"],"|":["logic"],"===":["logic"],"==":["logic"],"!==":["logic"],"!=":["logic"],"<":["logic"],">":["logic"],"<=":["logic"],">=":["logic"],"+":["math"],"-":["math"],"*":["math"],"\/":["math"],"%":["math"],"=":["math"],"function":["native"],"return":["native"],"if":["native"],"else":["native"],"switch":["native"],"case":["native"],"break":["native"],"default":["native"],"for":["native"],"while":["native"],"do":["native"],"typeof":["native"],"var":["native"],"instanceof":["native"],"void":["native"],"null":["native"],"throw":["native"],"Error":["native"],"new":["native"],"in":["native"],"this":["native"],"delete":["native"],"true":["native"],"false":["native"],"try":["native"],"catch":["native"],"finally":["native"],"with":["native"],"debugger":["native"],"{":["structure"],"}":["structure"],"(":["structure"],")":["structure"],"[":["structure"],"]":["structure"],";":["structure"],":":["structure"],",":["structure"],".":["structure"],"->":["structure"],"\/\/":{"end_token":"\n","classes":["comment"]},"\/*":{"end_token":"*\/","classes":["comment"]},"\"":{"end_token":"\"","classes":["string"]},"'":{"end_token":"'","classes":["string"]},"$":{"qend_token":{" ":1,"=":1,";":1,"(":1,")":1,"{":1,"}":1,"[":1,"]":1,".":1,",":1,"+":1,"-":1,"\/":1,"\\":1},"classes":["variable"]},"nextInvalid":{"do":{" ":1,"{":1,"\n":1},"in":{" ":1,"\t":1}}}}};
                </script>
                
                                
                <script type="text/javascript">
                        (function makeString_repeat_Global(){if(typeof String.prototype.repeat!=="function"||typeof String.repeat!=="function"){String.prototype.repeat=function(b){var a;a="";if(b<1){return""}while(b>0){a+=this;b=b-1}return a}}}());(function makeString_trim_Global(){if(typeof String.prototype.trim!=="function"||typeof String.trim!=="function"){String.prototype.trim=function(){return this.replace(/^\s+|\s+$/g,"")}}}());(function makeString_rtrim_Global(){if(typeof String.prototype.rtrim!=="function"||typeof String.rtrim!=="function"){String.prototype.rtrim=function(){return this.replace(/^\s+/,"")}}}());(function(){var a="JSON data is missing. ";a+="Hint: did you include the JSON file after the script?";if(DATA.documenter===undefined){throw new Error(a)}if(typeof String.prototype.repeat!=="function"&&typeof String.repeat!=="function"){throw new Error("String.repeat() prototype is missing")}if(typeof String.prototype.rtrim!=="function"&&typeof String.rtrim!=="function"){throw new Error("String.rtrim() prototype is missing")}}());var Docm={};Docm.parse={};Docm.Data=DATA.documenter;Docm.prependSpan=function(b){var c,a,d;c=b;if(c.classes!==undefined){c=c.classes}a=c;d='<span class="'+a+'">';return d};Docm.appendSpan=function(){var a;a="</span>";return a};Docm.addSpan=function(e,c){var b,d,f,a;b="";d=false;f=false;a=false;if(typeof e[c]==="string"){b+=Docm.prependSpan(e[c])+c+Docm.appendSpan()}else{b+=Docm.prependSpan(e[c])+c;if(e[c].end_token!==undefined){d=e[c].end_token}else{if(e[c].qend_token!==undefined){f=e[c].qend_token}}}if(e[c].classes!==undefined){if(e[c].classes.indexOf("string")!==-1){a=true}}return{output:b,end_token:d,qend_token:f,is_string:a}};Docm.parse.code=function(c,a){var s,r,v,u,f,q,n,l,z,d,o,w,h,m;m=Docm.Data[c];a=a.rtrim();q="";h="";z=false;d=false;o=false;w=false;l=[];function g(i){if(i){h+=n;h+=Docm.appendSpan();s=s-1;d=false}else{h+=q;h+=Docm.appendSpan();z=false}if(u==="\n"){h+="<br />"}q=""}function t(){var i;i=Docm.addSpan(m,q);h+=i.output;z=i.end_token;d=i.qend_token;w=i.is_string;q=""}function k(){var i,j;r=s+1;j=a[r];while(j!==" "&&j!=="\n"&&j!==""&&m[u+j]!==undefined){u+=a[r];r=r+1;j=a[r]}r=r-1;s=r;i=Docm.addSpan(m,u);h=h+n+i.output;z=i.end_token;d=i.qend_token;w=i.is_string;q=""}function x(){s=s+1;u=a[s];n=q;q+=u;h+=q;q=""}function y(){h+=q;q="";u=""}function e(){l[m._ignore[u]]=new RegExp(m._ignore[u],"i")}function b(){return l[m._ignore[u]].test(q)}function p(){return m._nextValid[q][f]!==undefined}for(s=0,v=a.length;s<v;s+=1){u=a[s];f=a[s+1];n=q;q+=u;if(w===false&&q.length>6){switch(q){case"_nextValid":y();break;case"_ignore":y();break}}switch(u){case"\\":x();break;case"<":if((z!==false||d!==false)){if(w===false){o=true}else{q=n+"&#60;"}}break;case">":if((z!==false||d!==false)){if(w===false){o=false}else{q=n+"&#62;"}}break;case" ":if(z===false&&d===false){h+=n+"&nbsp;";q=""}else{if(o===false){q=n+"&nbsp;"}else{q=n+" "}}break;case"\t":h+="&nbsp;".repeat(8);break;case"\n":if(z!=="\n"){h+=q+"<br />";q=""}break}if(z!==false){if(q.indexOf(z)!==-1){g(false)}}else{if(d!==false){if(d[u]!==undefined){g(true)}}else{if(m[q]!==undefined&&q.length>1){if(m._nextValid[q]===undefined){t()}else{if(p()){t()}}}else{if(m[u]!==undefined){if(m._ignore[u]===undefined){k()}else{if(l[m._ignore[u]]===undefined){e();if(!b()){k()}}else{if(!b()){k()}}}}}}}}return"<code>"+h+"</code>"};var Str=document.getElementById("scriptid").innerHTML;console.info("Code length is: "+Str.trim().length);console.time("Docm.parse.code excecution time");var Code=Docm.parse.code("js",Str);console.timeEnd("Docm.parse.code excecution time");console.time("Code to dom");document.getElementById("document").innerHTML=Code;console.timeEnd("Code to dom");                        
                </script>
        </body>
</html>
