import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';
import $ from "jquery";
import './utilities/dropdown';
import './utilities/maskInput';




setTimeout(()=>
{
    AOS.init();

},1000)

$(function() {
    //Opciones del tema
    const userTheme = localStorage.getItem("theme");
    const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;

    $("body").addClass(userTheme === "dark" || (!userTheme && systemTheme) ? "darkMode" : "lightMode");
    $("html").toggleClass("dark", userTheme === "dark" || (!userTheme && systemTheme));

    //validaciones 


});

