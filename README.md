("documenter" is the codename for the project, but I don't really have any name for it.)
documenter
==========

It currently understands the following:
- [x] Javascript
- [ ] PHP
  
What it does:
==========

  Documents your program in HTML, displays images within img tags within the comment section in your code.

Why I wrote the "documenter":  
==========

  To help document my own code, which I will later release under GNUv2.

  I wanted the ability to display images within the comment section, thus taking advantage of the
  HTML parser within browsers.
  <br />
  It takes JSON file as input in order to understand how to parse the code.
  It will then add span tags with class names to the code, using the JSON file as reference.
  <br />
  It has one flaw by design*, it can't parse through
  HTML or XML structured data.
  This flaw allows you to put "\<img src="pathtoimage" /\>" within the commment section while parsing the rest of
  your code.
  <br />
  <span style="display:inline-block;width:10px;"></span>
  <span style="font-size:9px;">*(I'm not saying it has only one flaw, only one flaw by design)</span>

If you want to use it:
==========

  It is currently unstable and has only been tested in one browser. Not recomended for commercial use.
  Feel free to let me know if you find any bugs but I am not responsible for any bugs you may find.
  It is a free program under GNUv2 licence, I will fix the bug if I find the time and mood to spare.
  
If you want to help develop it:
==========

  You are more then welcome to.
