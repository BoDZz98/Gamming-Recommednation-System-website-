
console.log('hello from main.js in public')

$("document").ready(function()
{
    setTimeout(function()
    {
        $("#alert").fadeOut().empty();
    },4000);
}
);