import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';
import IMask from 'imask';
import './utilities/dropdown';


setTimeout(()=>
{
    AOS.init();

},1000)

document.addEventListener("DOMContentLoaded", function() 
{
 
    const userTheme = localStorage.getItem("theme")
    const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;
    
    if(userTheme==="dark" || (!userTheme && systemTheme))
    {
        document.documentElement.classList.add("dark")
        document.body.classList.add('darkMode')
        return;
    }
    document.body.classList.add('lightMode')



});
