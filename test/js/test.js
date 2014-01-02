/*
 * 
Visual test of image abstract.

I personally think it is a waste of time to try unit test each function.
One should never let the testing rule how you program if there is an alternative
and easier way to do the testing.
Test for html output can easily be implemented at the whole.
If you can implement test for the whole, then that is always preferable.

How this test is implemented.
Outcome is compered to a one way hash string, it is as simple as that.
This will to tell you when one _small_ refactoring change effecteded the whole
outcome of the program!

Test will need change when you have extended the result scope.

NOTE THAT ONE ADDITIONAL COMMENT IN THE TEST FILE WILL CHANGE THE OUTCOME OF
THE TEST!

<img style="border:1px solid black;" src="../../$assets/img/documenter/abstract.gif" />
 */

// 10 is not supposed to be the same color as 11
var x10=11;
var x11 = 12;
var x14 = "string";var x15=13;
do {
        x10++;
} while (x10 < 11);
do{x10++;}while(x10<11);
do
{x10++;}while(x10<11);

document.getElementById("someId").innerHTML
        = "HELLO world";

document
        .getElementById("someId")
        .innerHTML
                = "HELLO world";

switch (buffer) {
case '_nextValid':
        save_buffer();
        break;
case '_ignore':
        save_buffer();
        break;
}

console.log();
console.info();
console.time();
console.timeEnd();

