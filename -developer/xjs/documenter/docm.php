<!DOCTYPE html>
<html>
        <head>
                <title>Documenter</title>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <style>
                        /* You might want to change your stylesheet.*/
                        html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,figcaption,figure,footer,header,hgroup,menu,nav,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;outline:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}ins{text-decoration:none}del{text-decoration:line-through}table{border-collapse:collapse;border-spacing:0}h1{font-size:24px}h2{font-size:22px}h3{font-size:20px}h4{font-size:18px}strong{font-weight:bold}a{text-decoration:none}.br{-webkit-border-radius:7px;-moz-border-radius:7px;border-radius:7px;background-clip:padding-box}body{font-family:"Courier New",Courier,monospace}.operator{color:yellow}.logic{color:#c58917}.math{color:red}.native{color:blue}.structure{color:#575}.comment{color:darkgrey}.string{color:orange}.int{color:magenta}.dom_api{color:purple}.obj{color:blueviolet}.attripute{color:green}.variable{color:brown}                        
                </style>
        </head>
        <body id="artargi">
                <div id="document"></div>
                <script id="scriptid" type="text/document">
                        /*
                                include your file here
                        */
                </script>
                
                <script type="text/javascript">
                        var DATA = {"documenter":{"js":{"-=":["operator"],"+=":["operator"],"++":["operator"],"--":["operator"],"&&":["logic"],"||":["logic"],"&":["logic"],"|":["logic"],"===":["logic"],"==":["logic"],"!==":["logic"],"!=":["logic"],"!":["logic"],"<":["logic"],">":["logic"],"<=":["logic"],">=":["logic"],"+":["math"],"-":["math"],"*":["math"],"\/":["math"],"%":["math"],"=":["math"],"1":["int"],"2":["int"],"3":["int"],"4":["int"],"5":["int"],"6":["int"],"7":["int"],"8":["int"],"9":["int"],"0":["int"],"function":["native"],"return":["native"],"if":["native"],"else":["native"],"switch":["native"],"case":["native"],"break":["native"],"default":["native"],"for":["native"],"while":["native"],"do":["native"],"typeof":["native"],"var":["native"],"instanceof":["native"],"void":["native"],"null":["native"],"throw":["native"],"Error":["native"],"new":["native"],"in":["native"],"this":["native"],"delete":["native"],"true":["native"],"false":["native"],"try":["native"],"catch":["native"],"finally":["native"],"with":["native"],"debugger":["native"],"{":["structure"],"}":["structure"],"(":["structure"],")":["structure"],"[":["structure"],"]":["structure"],";":["structure"],":":["structure"],",":["structure"],".":["structure"],"\/\/":{"end_token":"\n","classes":["comment"]},"\/*":{"end_token":"*\/","classes":["comment"]},"\"":{"end_token":"\"","classes":["string"]},"'":{"end_token":"'","classes":["string"]},"document":["dom_api"],"window":["dom_api"],"getElementById":["dom_api obj"],"getElementsByName":["dom_api obj"],"innerHTML":["dom_api","attripute"],"console":["firebug"],"info":["firebug attripute"],"log":["firebug attripute"],"time":["firebug attripute"],"timeEnd":["firebug attripute"],"nextValid":{"do":{" ":1,"{":1,"\n":1},"document":{".":1,"\n":1},"window":{".":1,"[":1,"\n":1},"getElementById":{".":1,"[":1,"(":1,"\n":1},"getElementsByName":{".":1,"[":1,"(":1,"\n":1},"innerHTML":{" ":1,";":1,"=":1,"\n":1},"in":{" ":1,"\t":1,"\n":1},"time":{" ":1,"(":1,"\n":1}},"ignore":{"1":"^[a-zA-Z]","2":"^[a-zA-Z]","3":"^[a-zA-Z]","4":"^[a-zA-Z]","5":"^[a-zA-Z]","6":"^[a-zA-Z]","7":"^[a-zA-Z]","8":"^[a-zA-Z]","9":"^[a-zA-Z]","0":"^[a-zA-Z]"}},"php":{"-=":["operator"],"+=":["operator"],"++":["operator"],"--":["operator"],"&&":["logic"],"||":["logic"],"&":["logic"],"|":["logic"],"===":["logic"],"==":["logic"],"!==":["logic"],"!=":["logic"],"<":["logic"],">":["logic"],"<=":["logic"],">=":["logic"],"+":["math"],"-":["math"],"*":["math"],"\/":["math"],"%":["math"],"=":["math"],"function":["native"],"return":["native"],"if":["native"],"else":["native"],"switch":["native"],"case":["native"],"break":["native"],"default":["native"],"for":["native"],"while":["native"],"do":["native"],"typeof":["native"],"var":["native"],"instanceof":["native"],"void":["native"],"null":["native"],"throw":["native"],"Error":["native"],"new":["native"],"in":["native"],"this":["native"],"delete":["native"],"true":["native"],"false":["native"],"try":["native"],"catch":["native"],"finally":["native"],"with":["native"],"debugger":["native"],"{":["structure"],"}":["structure"],"(":["structure"],")":["structure"],"[":["structure"],"]":["structure"],";":["structure"],":":["structure"],",":["structure"],".":["structure"],"->":["structure"],"\/\/":{"end_token":"\n","classes":["comment"]},"\/*":{"end_token":"*\/","classes":["comment"]},"\"":{"end_token":"\"","classes":["string"]},"'":{"end_token":"'","classes":["string"]},"$":{"qend_token":{" ":1,"=":1,";":1,"(":1,")":1,"{":1,"}":1,"[":1,"]":1,".":1,",":1,"+":1,"-":1,"\/":1,"\\":1},"classes":["variable"]},"nextInvalid":{"do":{" ":1,"{":1,"\n":1},"in":{" ":1,"\t":1}}}}};
                </script>
                
                                
                <script type="text/javascript">
                        (function makeString_repeat_Global(){if(typeof String.prototype.repeat!=="function"||typeof String.repeat!=="function"){String.prototype.repeat=function(b){var a;a="";if(b<1){return""}while(b>0){a+=this;b=b-1}return a}}}());(function makeString_trim_Global(){if(typeof String.prototype.trim!=="function"||typeof String.trim!=="function"){String.prototype.trim=function(){return this.replace(/^\s+|\s+$/g,"")}}}());if(DATA.documenter===undefined){throw new Error("JSON data is missing")}var Docm={};Docm.parse={};Docm.Data=DATA.documenter;Docm.prependSpan=function(d){var e,c,a,b,f;e=d;b="";if(e.classes!==undefined){e=e.classes}a=e.length;for(c=0;c<a;c=c+1){if(b===""){b+=e[c]}else{b+=" ";b+=e[c]}}f='<span class="'+b+'">';return f};Docm.appendSpan=function(){var a;a="</span>";return a};Docm.addSpan=function(d,e){var b,c,f,a;b="";c=false;f=false;a=false;if(Array.isArray(d[e])){b+=Docm.prependSpan(d[e])+e+Docm.appendSpan()}else{b+=Docm.prependSpan(d[e])+e;if(d[e].end_token!==undefined){c=d[e].end_token}else{if(d[e].qend_token!==undefined){f=d[e].qend_token}}}if(d[e].classes!==undefined){if(d[e].classes.indexOf("string")!==-1){a=true}}return{output:b,end_token:c,qend_token:f,is_string:a}};Docm.parse.code=function(c,a){if(Docm.appendSpan===undefined){throw new Error("Docm.appendSpan() is missing")}if(Docm.appendSpan===undefined){throw new Error("Docm.appendSpan() is missing")}var r,q,s,h,p,m,l,u,d,n,t,g,e,b,f,o,k;k=Docm.Data[c];a=a.trim();p="";g="";u=false;d=false;n=false;t=false;s=a.length;r=0;l=[];function b(){e=Docm.addSpan(k,p)}function f(){q=r;while(k[h]!==undefined){if(q<=s){q=q+1;h=a.substring(r,q)}else{break}}q=q-1;h=a.substring(r,q);q=q-1;r=q;g+=m;e=Docm.addSpan(k,h);p=""}function o(){e=false;r=r+1;h=a.charAt(r);m=p;p+=h;g+=p;p=""}while(r<s){e=false;h=a.charAt(r);m=p;p+=h;switch(h){case"\\":o();break;case"<":if((u!==false||d!==false)){if(t===false){n=true}else{p=m+"&#60;"}}break;case">":if((u!==false||d!==false)){if(t===false){n=false}else{p=m+"&#62;"}}break;case" ":if(u===false&&d===false){g+=m+"&nbsp;";p=""}else{if(n===false){p=m+"&nbsp;"}else{p=m+" "}}break;case"\t":g+="&nbsp;".repeat(8);break;case"\n":if(u!=="\n"){g+=p+"<br />";p=""}break}if(u!==false&&p.indexOf(u)!==-1){g+=p;g+=Docm.appendSpan();if(h==="\n"){g+="<br />"}p="";u=false}else{if(d!==false&&d[h]!==undefined){g+=m;g+=Docm.appendSpan();if(h==="\n"){g+="<br />"}r=r-1;p="";d=false}else{if(u===false&&k[p]!==undefined&&p.length>1){if(k.nextValid[p]===undefined){b()}else{if(k.nextValid[p][a.charAt(r+1)]!==undefined){b()}else{if(k.nextValid[p][a.charAt(r+1)+a.charAt(r+2)]!==undefined){b()}}}}else{if(u===false&&k[h]!==undefined){if(k.ignore[h]===undefined){f()}else{if(l[k.ignore[h]]===undefined){l[k.ignore[h]]=new RegExp(k.ignore[h],"i");f()}else{if(!(l[k.ignore[h]].test(p))){f()}}}}}}}if(e){g+=e.output;u=e.end_token;d=e.qend_token;t=e.is_string;p=""}r=r+1}return"<code>"+g+"</code>"};var Str=document.getElementById("scriptid").innerHTML;console.info("Code length is: "+Str.trim().length);console.time("Docm.parse.code excecution time");var Code=Docm.parse.code("js",Str);console.timeEnd("Docm.parse.code excecution time");console.time("Code to dom");document.getElementById("document").innerHTML=Code;console.timeEnd("Code to dom");                        
                </script>
        </body>
</html>
